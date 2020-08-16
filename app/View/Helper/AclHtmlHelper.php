<?php
App::uses('HtmlHelper', 'View/Helper');

class AclHtmlHelper extends HtmlHelper
{
    var $helpers = array('Session');

    //function link($title, $url = null, $options = array(), $confirmMessage = false)
    function check($url = null)
    {
        $permissions = $this->Session->read('Alaxos.Acl.permissions');
        if(!isset($permissions))
        {
            $permissions = array();
        }

        $aco_path = AclRouter :: aco_path($url);
        //debug($permissions[$aco_path]);
        if(isset($permissions[$aco_path]) && $permissions[$aco_path] == 1)
        {
            //return parent::link($title, $url, $options, $confirmMessage);
            return true;
        }
        else
        {
            return false;
            //return null;
        }
    }
}