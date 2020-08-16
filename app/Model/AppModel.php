<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    public $actsAs = array(
        'Uploader.Attachment' => array(
            'image' => array(
                'name' => '',
                'nameCallback' => 'formatName',
                'baseDir' => '',
                'uploadDir' => '',
                'append' => '',
                'prepend' => '',
                'dbColumn' => 'uploadPath',
                'importFrom' => '',
                'defaultPath' => '',            // Default file path to be used if the field is empty
                'maxNameLength' => null,
                'overwrite' => false,           // Overwrite a file with the same name if it exists
                'stopSave' => true,             // Stop model save() on form upload error
                'allowEmpty' => true,           // Allow an empty file upload to continue
                'saveAsFilename' => false,      // If true, will only save the filename and not relative path
                's3' => array(),
                'metaColumns' => array(
                    'ext' => '',
                    'type' => '',
                    'size' => '',
                    'group' => '',
                    'width' => '',
                    'height' => '',
                    'filesize' => ''
                ),
                'transforms' => array(
                    // 'imageSmall' => array(
                    //     'class' => 'crop',
                    //     'append' => '_thumbnail',
                    //     'overwrite' => true,
                    //     'self' => false,
                    //     'width' => 150,
                    //     'method' =>'scale',
                    //     'height' => 120,
                    //     'dbColumn' => 'imagesmall'
                    // )
                )
            )
        )
    );
    public function formatName($name) {
        return sprintf('%s-%s',strtolower($name) , date('hisdmYy'));
    }
}
