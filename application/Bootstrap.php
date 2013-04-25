<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public function _initRoutes() {

        $front = Zend_Controller_Front::getInstance();

        $router = $front->getRouter();

        $restRoute = new Zend_Rest_Route($front);
        $router->addRoute('default', $restRoute);
    }

    protected function _initMail() {
        try {
            $config = array(
                'auth' => 'login',
                'username' => 'username@gmail.com',
                'password' => 'password',
                'ssl' => 'ssl',
                'port' => 465
            );

            $mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
            Zend_Mail::setDefaultTransport($mailTransport);
        } catch (Zend_Exception $e) {

        }
    }

}

