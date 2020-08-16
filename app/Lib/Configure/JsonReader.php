<?php
/**
 * JsonReader File
 * 
 * PHP 5
 * 
 * @uses ConfigReaderInterface
 * @package JsonReader
 * @copyright Nobody. Do as you will with this thing. Rip it, pretend you made it, sell it
 * @author Paul Connolley (connrs) <paul.connolley@gmail.com> 
 * @license WTFPL {@link http://sam.zoy.org/wtfpl/}
 */

/**
 * Json Reader allows Configure to load configuration values from
 * JSON files
 */
class JsonReader implements ConfigReaderInterface {
/**
 * The file extension used when loading configuration files eg: 'json'/'js'.
 * 
 * @var string
 * @access public
 */
    public $ext = '.json';

/**
 * The path this reader finds files on. 
 * 
 * @var bool
 * @access protected
 */
    protected $_path = null;

/**
 * Constructor for JSON Config file reading
 * 
 * @param string $path The path to read JSON Files from.
 */
    public function __construct($path = null) {
        if (!$path) {
            $path = APP . 'Config' . DS;
        }
        $this->_path = $path;
    }

/**
 * Read a JSON configuration file and return its contents.
 * 
 * @param string $key. The identifier to read from. If the key has a . it will be treated
 *  as a plugin prefix.
 * @return array parsed configuration values
 * @throws ConfigurationException when files don't exist or when files contain '..' as this could lead to abusive reads.
 */
    public function read($key) {
        if (strpos($key, '..') !== false) {
            throw new ConfigureException(__d('cake_dev', 'Cannot load configuration files with ../ in them.'));
        }
        if (substr($key, -5) === '.json') {
            $key = substr($key, 0, -5);
        }
        list($plugin, $key) = pluginSplit($key);

        if ($plugin) {
            $file = App::pluginPath($plugin) . 'Config' . DS . $key;
        } else {
            $file = $this->_path . $key;
        }
        $file .= $this->ext;
        if (!is_file($file)) {
            if (!is_file(substr($file, 0, -5))) {
                throw new ConfigureException(__d('cake_dev', 'Could not load configuration files: %s or %s', $file, substr($file, 0, -5)));
            }
        }
        $contents = file_get_contents($file);
        if (empty($contents)) {
            return array();
        }
        $json = json_decode($contents, true);
        if (empty($json)) {
            if ($json === null) {
                throw new ConfigureException(__d('cake_dev', 'There was a problem decoding JSON in file: %s', $file));
            } else {
                return array();
            }
        }
        return $json;
    }
    public function dump($filename, $data) {
        $runtime = array(
            'routes' => '',
            'controller_properties' => '',
            'model_properties' => '',
        );
        if (isset($data['Plugins'])) {
            $data['Plugins'] = array_diff_key($data['Plugins'], $runtime);
        }
        $options = 0;
        if (version_compare(PHP_VERSION, '5.3.3', '>=')) {
            $options |= JSON_NUMERIC_CHECK;
        }
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $options |= JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT;
        }
        $contents = $this->stringify($data, $options);
        return $this->_writeFile($this->_path . $filename, $contents);
    }
    protected function stringify($json, $options = 0) {
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            return json_encode($json, $options);
        } elseif (version_compare(PHP_VERSION, '5.3.0', '>=')) {
            $json = json_encode($json, $options);
        } else {
            $json = json_encode($json);
        }
        $json = str_replace(array('\/', ':{', ':"', ':['), array('/', ': {', ': "', ': ['), $json);
        $found = preg_match_all('/:([0-9]+)/', $json, $matches);
        if ($found) {
            foreach ($matches[0] as $i => $search) {
                $json = preg_replace('/' . $search . '/', ': ' . $matches[1][$i], $json);
            }
        }
        $result         = '';
        $pos            = 0;
        $strLen         = strlen($json);
        $indentStr      = "\t";
        $newLine        = "\n";
        $prevChar       = '';
        $outOfQuotes    = true;
        for ($i = 0; $i <= $strLen; $i++) {
            $char = substr($json, $i, 1);
            if ($char == '"' && $prevChar != '\\') {
                $outOfQuotes = !$outOfQuotes;
            } elseif (($char == '}' || $char == ']') && $outOfQuotes) {
                $result .= $newLine;
                $pos --;
                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }
            $result .= $char;
            if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos ++;
                }
                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }
            $prevChar = $char;
        }
        return $result;
    }
    protected function _writeFile($file, $contents) {
        return file_put_contents($file, $contents);
    }
}