<?php
App::uses('AppModel', 'Model');
/**
 * Info Model
 *
 * @property News $News
 */
class Info extends AppModel {
	public $displayField = 'name';
    public $actsAs = array(
        'Uploader.Attachment' => array(
            // Do not copy all these settings, it's merely an example
            'image' => array(
                'name' => '',
                'tempDir' => TMP,
                'uploadDir' => 'files/uploads/info/',
                'baseDir' => 'files/uploads/info/',
                'prepend' => 'info_',
                'dbColumn' => 'image'
            )
        )
    );
}
