<?php

class ApiController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
         
        $this->_todo = array(
            "1" => "Buy milk",
            "2" => "Pour glass of milk",
            "3" => "Eat cookies"
        );
    }

    public function indexAction()
    {
        echo Zend_Json::encode($this->_todo);
    }

    public function getAction()
    {
        // action body
    }

    public function postAction()
    {
        $item = $this->_request->getPost('item');

        $this->_todo[count($this->_todo) + 1] = $item;

        echo Zend_Json::encode($this->_todo);
    }

    public function putAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
    }


}



