<?php

App::uses('Helper', 'View');

class AppHelper extends Helper {

	public function url($url = null, $full = false) {
		if(!isset($this->request->params['admin'])){
			if (is_array($url) && !array_key_exists('lang', $url)) {
				if(empty($this->request->params['lang']))
					$url['lang'] = Configure::read('Config.language');
				else $url['lang'] = $this->request->params['lang'];
			}
		}
		return parent::url($url, $full);
	}
}