<?php

class AdminController extends Zend_Controller_Action
{
    var $user='';

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function invitationlistAction()
    {
        // action body
    }

    public function invitationpermissionAction()
    {
        // action body
    }

    public function getuserlistAction()
    {
        // action body
    }

    public function adminprofileAction()
    {
        // action body
    }

    public function requesttypeAction()
    {
        // action body
    }

    public function getuserinformationAction($arr=array()){
        $user=array();
        $this->user[]=$arr;
        return $this->user;
        
        
    }
    
    public function getuserinformationAction($arr=array()){
        $user=array();
        $this->user[]=$arr;
        
        
    }

}











