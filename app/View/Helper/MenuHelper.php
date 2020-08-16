<?php

App::uses('AppHelper', 'View/Helper');
App::uses('LinkHelper', 'View/Helper');

/**
 * Menus Helper
 *
 * @category Menus.View/Helper
 * @package  Croogo.Menus.View.Helper
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class MenuHelper extends AppHelper {

    public $helpers = array(
        'Html',
        'Link'
    );
    public $_options = array(
        'tag' => 'ul',
        'tagAttributes' => array('class'=>'nav navbar-nav','id'=>'navbar-collapse'),
        'selected' => 'current',
        "class"=>"",
        "liclass"=>"",
        'dropdown' => false,
        'dropdownClass'=>""

    );
    /**
     * constructor
     */
    public function __construct(View $view, $settings = array()) {
        parent::__construct($view);
    }



    /**
     * Merge Link options retrieved from Params behavior
     *
     * @param array $link Link data
     * @param string $param Parameter name
     * @param array $attributes Default options
     * @return string
     */
    protected function _mergeLinkParams($link, $param, $options = array()) {
        if (isset($link['Params'][$param])) {
            $options = array_merge($options, $link['Params'][$param]);
        }

        $booleans = array('true', 'false');
        foreach ($options as $key => $val) {
            if ($val == null) {
                unset($options[$key]);
            }
            if (is_string($val) && in_array(strtolower($val), $booleans)) {
                $options[$key] = (bool)$val;
            }
        }

        return $options;
    }

    /**
     * Nested Links
     *
     * @param array $links model output (threaded)
     * @param array $options (optional)
     * @param integer $depth depth level
     * @return string
     */
    public function menu($links, $options = array(), $depth = 1) {

        $options = array_merge($this->_options, $options);
        $output = '';
        if($this->request->params['lang'] =='eng'){
            $titledb = 'name_en';
        }else{
            $titledb = 'name';
        }
        foreach ($links as $link) {
            $linkAttr = array(
                'id' => 'link-' . $link['Menuitem']['id'],
                'target' => $link['Menuitem']['target'],
                'title' => $link['Menuitem'][$titledb],
                'class' => $link['Menuitem']['class'],
            );
            $linkAttr = $this->_mergeLinkParams($link, 'linkAttr', $linkAttr);
            // if link is in the format: controller:contacts/action:view
            if (strstr($link['Menuitem']['url'], 'controller:')) {
                $link['Menuitem']['url'] = $this->linkStringToArray($link['Menuitem']['url'],array('linkName'=>$link['Menuitem'][$titledb]));
            }
            // Remove locale part before comparing links

            if (!empty($this->_View->request->params['locale'])) {
                $currentUrl = substr($this->_View->request->url, strlen($this->_View->request->params['locale']['lang'] . '/'));
            } else {
                $currentUrl = $this->_View->request->url;
            }
            $linkOutput = "";
            $liAttr =array();
            if (isset($link['children']) && count($link['children']) > 0) {
                $liAttr['class'] = $options['liclass'];
                $linkOutput .= $this->Html->link($link['Menuitem'][$titledb], $link['Menuitem']['url'], $linkAttr);
                $linkOutput.=$options['extenda'];
                if($depth==1){
                    $option2 = array('extenda'=>"<span class=\"caret\"><i class=\"icon-down-dir-1\"></i></span>",'liclass'=>'dropdown-submenu');
                }else{
                    $option2 = array('extenda'=>"",'liclass'=>'dropdown-submenu');
                }
                $linkOutput .= $this->menu($link['children'], $option2+$options, $depth + 1);
            }else{
                $linkOutput .= $this->Html->link($link['Menuitem'][$titledb], $link['Menuitem']['url'], $linkAttr);
            }
            if (Router::url($link['Menuitem']['url']) == Router::url('/' . $currentUrl)) {
                if (!isset($liAttr['class'])) {
                    $liAttr['class'] = '';
                }
                $liAttr['class'] .= ' ' . $options['selected'];
            }
            if($depth > 1 && count($link['children']) >0){
                $liAttr['class'] = $options['liclass'];
            }
            $linkOutput = $this->Html->tag('li', $linkOutput, $liAttr);
            $output .= $linkOutput;
        }
        if ($output != null) {
            $tagAttr = $options['tagAttributes'];
            if ($options['dropdown'] && $depth != 1) {
                $tagAttr['class'] = $options['dropdownClass'];
            }
            $output = $this->Html->tag($options['tag'], $output, $tagAttr);
        }

        return $output;
    }

    /**
     * Converts strings like controller:abc/action:xyz/ to arrays
     *
     * @param string|array $link link
     * @return array
     * @see Use StringConverter::linkStringToArray()
     */
    public function linkStringToArray($link,$options = array()) {
            static $cached = array();
            $options = array_merge(array(
                'useCache' => true,
            ), $options);
            $useCache = $options['useCache'];

            $hash = md5($link);
            if (isset($cached[$hash])) {
                return $cached[$hash];
            }

            if (is_array($link)) {
                $link = key($link);
            }
            if (($pos = strpos($link, '?')) !== false) {
                parse_str(substr($link, $pos + 1), $query);
                $link = substr($link, 0, $pos);
            }
            $link = explode('/', $link);
            $prefixes = Configure::read('Routing.prefixes');
            $linkArr = array_fill_keys($prefixes, false);

            foreach ($link as $linkElement) {
                if ($linkElement != null) {
                    $linkElementE = explode(':', $linkElement);
                    if (isset($linkElementE['1'])) {
                        if (in_array($linkElementE['0'], $prefixes)) {
                            $linkArr[$linkElementE['0']] = strcasecmp($linkElementE['1'], 'false') === 0 ? false : true;
                        } else {
                            if($linkElementE[0] == "id"){
                                $linkArr[$linkElementE['0']] = urldecode($this->Link->seo($linkElementE['1'],$options['linkName']));
                            }else {
                                $linkArr[$linkElementE['0']] = urldecode($linkElementE['1']);
                            }
                        }
                    } else {
                        $linkArr[] = $linkElement;
                    }
                }
            }
            if (!isset($linkArr['plugin'])) {
                $linkArr['plugin'] = false;
            }

            if (isset($query)) {
                $linkArr['?'] = $query;
            }

            $cached[$hash] = $linkArr;
            return $linkArr;

    }

    /**
     * Converts array into string controller:abc/action:xyz/value1/value2
     *
     * @param array $url link
     * @return array
     * @see StringConverter::urlToLinkString()
     */
    public function urlToLinkString($url) {
        return $this->_converter->urlToLinkString($url);
    }

}
