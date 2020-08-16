<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'dev.thangtn@gmail.com',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => 'dev.thangtn@gmail.com',
		'host' => 'smtp.gmail.com',
		'port' => 465,
		'timeout' => 90,
		'username' => 'dev.thangtn@gmail.com',
		'password' => 'ka_love_forever',
		'client' => null,
		'log' => false,
		'tls' => true
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	public $gmail = array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'timeout' => 90,
        'from' => array('dev.thangtn@gmail.com'=>'Administrator'),
		//'host' => 'smtp.gmail.com',
        'username' => 'dev.thangtn@gmail.com',
		'password' => 'ka_love_forever',
        'transport' => 'Smtp',
        'tls' => false,
		'host' => 'ssl://smtp.gmail.com',
        'delivery' => 'smtp'
    );

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
