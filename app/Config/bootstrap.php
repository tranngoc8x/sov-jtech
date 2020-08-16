<?php

Cache::config('default', array('engine' => 'File'));
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));
Configure::write('Config.language','vie');

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));
 //CakePlugin::load('DebugKit');
CakePlugin::load('Acl', array('bootstrap' => true));// plugin phân quyền
CakePlugin::load('Uploader');
//plugin I18n
define('DEFAULT_LANGUAGE', 'vie'); // The 3 letters code for your default language
Configure::write('Config.languages', array('eng', 'vie')); //List of languages you want to support
CakePlugin::load('I18n', array(
	'routes' => true
));
// CakePlugin::load('ViewCells');
#CakePlugin::load('Search');