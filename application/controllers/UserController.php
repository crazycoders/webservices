<?php

class UserController extends Zend_Controller_Action {

    var $response;
    var $requestType;
    static $userInformation;

    public function init() {

        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction() {

        if (isset($_SERVER['HTTP_XML_ADDITIONAL_INFO'])) {
            $xmlrequest = ($_SERVER['HTTP_XML_ADDITIONAL_INFO']);
        } else {
            $xmlrequest = trim($_REQUEST['xmlrequest']);
        }
//        print_r($this->getrequesttypeAction(Zend_Json::decode($request->getPost("request"), true)));
//        die();
    }

    public function postAction() {


        $request = $this->getRequest();
        $this->response = $request->getPost("xmlrequest");
        $this->response = str_replace('\n', 'nlbr', $this->response);
        $this->response = trim($this->response);
        $this->response = stripslashes($this->response);
        $this->response = preg_replace('/\s+/', ' ', ($this->response));
        //$this->response = $this->getActualJsonAction($this->response);
        $this->response = utf8_encode($this->response);
        $this->response = Zend_Json::decode($this->response, true);
        $this->requestType = $this->getrequesttypeAction($this->response);
        echo $this->getOperationAction($this->requestType);
    }

    function getActualJsonAction($str=NULL) {
        if (strpos($str, "(sti)rdquo;") != FALSE) {
            $str = str_replace("(sti)rdquo;", "�", $str);
        }

        if (strpos($str, "(sti)quot;") != FALSE) {
            $str = str_replace("(sti)quot;", "\\\"", $str);
        }

        if (strpos($str, "(sti)nDash;") != FALSE) {

            $str = str_replace("(sti)nDash;", "-", $str);
        }

        if (strpos($str, "(sti)sDash;") != FALSE) {
            $str = str_replace("(sti)sDash;", "-", $str);
        }

        if (strpos($str, "(sti)aphos;") != FALSE) {
            $str = str_replace("(sti)aphos;", "'", $str);
        }

        if (strpos($str, "(sti)mDash;") != FALSE) {
            $str = str_replace("(sti)mDash;", "�", $str);
        }

        if (strpos($str, "(sti)iexcl;") != FALSE) {
            $str = str_replace("(sti)iexcl;", "�", $str);
        }

        if (strpos($str, "(sti)iquest;") != FALSE) {
            $str = str_replace("(sti)iquest;", "�", $str);
        }

        if (strpos($str, "(sti)ldquo;") != FALSE) {
            $str = str_replace("(sti)ldquo;", "�", $str);
        }

        if (strpos($str, "(sti)lsquo;") != FALSE) {
            $str = str_replace("(sti)lsquo;", "�", $str);
        }

        if (strpos($str, "(sti)rsquo;") != FALSE) {
            $str = str_replace("(sti)rsquo;", "�", $str);
        }

        if (strpos($str, "(sti)laquo;") != FALSE) {
            $str = str_replace("(sti)laquo;", "�", $str);
        }

        if (strpos($str, "(sti)raquo;") != FALSE) {
            $str = str_replace("(sti)raquo;", "�", $str);
        }

        if (strpos($str, "(sti)amp;") != FALSE) {
            $str = str_replace("(sti)amp;", "&", $str);
        }

        if (strpos($str, "(sti)cent;") != FALSE) {
            $str = str_replace("(sti)cent;", "�", $str);
        }

        if (strpos($str, "(sti)copy;") != FALSE) {
            $str = str_replace("(sti)copy;", "�", $str);
        }

        if (strpos($str, "(sti)divide;") != FALSE) {
            $str = str_replace("(sti)divide;", "�", $str);
        }

        if (strpos($str, "(sti)gt;") != FALSE) {
            $str = str_replace("(sti)gt;", ">", $str);
        }
        if (strpos($str, "(sti)lt;") != FALSE) {
            $str = str_replace("(sti)lt;", "<", $str);
        }

        if (strpos($str, "(sti)micro;") != FALSE) {
            $str = str_replace("(sti)micro;", "�", $str);
        }
        if (strpos($str, "(sti)middot;") != FALSE) {
            $str = str_replace("(sti)middot;", "�", $str);
        }
        if (strpos($str, "(sti)para;") != FALSE) {
            $str = str_replace("(sti)para;", "�", $str);
        }

        if (strpos($str, "(sti)plusmn;") != FALSE) {
            $str = str_replace("(sti)plusmn;", "�", $str);
        }
        if (strpos($str, "(sti)euro;") != FALSE) {
            $str = str_replace("(sti)euro;", "�", $str);
        }
        if (strpos($str, "(sti)pound;") != FALSE) {
            $str = str_replace("(sti)pound;", "�", $str);
        }
        if (strpos($str, "(sti)reg;") != FALSE) {
            $str = str_replace("(sti)reg;", "�", $str);
        }

        if (strpos($str, "(sti)sect;") != FALSE) {
            $str = str_replace("(sti)sect;", "�", $str);
        }
        if (strpos($str, "(sti)trade;") != FALSE) {
            $str = str_replace("(sti)trade;", "�", $str);
        }
        if (strpos($str, "(sti)yen;") != FALSE) {
            $str = str_replace("(sti)yen;", "�", $str);
        }
        if (strpos($str, "(sti)degrees;") != FALSE) {
            $str = str_replace("(sti)degrees;", "�", $str);
        }
        if (strpos($str, "(sti)a;") != FALSE) {
            $str = str_replace("(sti)a;", "�", $str);
        }
        if (strpos($str, "(sti)e;") != FALSE) {
            $str = str_replace("(sti)e;", "�", $str);
        }
        if (strpos($str, "(sti)e1;") != FALSE) {
            $str = str_replace("(sti)e1;", "�", $str);
        }
        /* if(strpos($str,"(sti)a1;") != FALSE)
          {
          $str = str_replace("(sti)a1;","�",$str);
          }
          if(strpos($str,"(sti)a2;") != FALSE)
          {
          $str = str_replace("(sti)a2;","�",$str);
          } */

        return $str;
    }

    public function putAction() {
        // action body
    }

    public function deleteAction() {
        // action body
    }

    public function logoutAction() {
        // action body
    }

    public function loginAction() {
        return $this->loggedinInformationAction();
    }

    public function userLogoutAction() {
         return $this->loggedoutAction();
    }

    public function signupAction() {
        return $this->saveInformationAction();
    }

    public function getuserinformationAction() {
        return $this->getUserInfoAction();
    }

    public function changepasswordAction() {
        return $this->changepassAction();
    }

    public function editprofileAction() {
        return $this->editUserInfoAction();
    }

    public function changeaddressAction() {
        return $this->changeuseraddressAction();
    }

    public function getprovinceAction() {
        return $this->getprovincesAction();
    }

    public function saveaddressAction() {
        // action body
    }

    public function adminLoggedInAction() {
        return $this->administratorLoggedInAction();
    }

    public function approveinviteeAction() {
        //$this->approveinviteAction();
        $body = '<a>' . rand(8, 20) . '</a>';
        if ($this->sendMailAction($this->response[$this->requestType]['email'], 'Subject', $body)) {
            return $this->getSuccessResponseStringAction("000", "confirmation sent successfully!");
        }
        return false;
    }

    public function sendMailAction($email_to=NULL, $subject=NULL, $body=NULL) {
        $email_from = "brij420@gmail.com";
        $name_from = "Brijesh Kumar";
        $email_to = "brij420@gmail.com";
        $name_to = "Brijesh";
        $mail = new Zend_Mail ();
        $mail->setReplyTo($email_from, $name_from);
        $mail->setFrom($email_from, $name_from);
        $mail->addTo($email_to, $name_to);
        $mail->setSubject($subject);
        $mail->setBodyText($body);
        return $mail->send();
    }

    public function forgotpasswordAction() {
        $body = '<a>' . rand(8, 20) . '</a>';
        if ($this->sendMailAction($this->response[$this->requestType]['email'], 'Subject', $body)) {
            return $this->getSuccessResponseStringAction("000", "email has been sent successfully!");
        }
        return false;
    }

    public function getInviteeListAction() {
        return $this->getInviteesListAction();
    }

    public function userRegisterationByAdminAction() {
        return $this->userRegisterationByAdministratorAction();
    }

    public function getrequesttypeAction($xmlrequest=NULL) {
        $response_array = array('UserSignup', 'UserLogin', 'UserInformation',
            'editUserInformation', 'changePassword',
            'changeAddress', 'forgotPassword',
            'getProvince', 'adminLoggedIn',
            'userRegisterationByAdmin',
            'getInviteeList',
            'approveinvitee', 'Message');
        $request_keys = array_keys($xmlrequest);
        $key = $request_keys[1];
        if (in_array($key, $response_array)) {
            $match = $key;
        } else {
            $match = '';
        }
        return $match;
    }

    public function getOperationAction() {
        $response = NULL;
        $response = $this->errorCheckAction();
        switch ($this->requestType) {
            case"UserSignup":
                if (is_bool($response)) {
                    return $this->signupAction();
                }
                break;
            case"UserLogin":
                if (is_bool($response)) {
                    return $this->loginAction();
                }
                break;
            case"UserInformation":
                if (is_bool($response)) {
                    return $this->getuserinformationAction();
                }
                break;
                case"UserLogout":
                if (is_bool($response)) {
                    return $this->userLogoutAction();
                }
                break;
            case"editUserInformation":
                if (is_bool($response)) {
                    return $this->editprofileAction();
                }
                break;
            case"changePassword":
                if (is_bool($response)) {
                    return $this->changepasswordAction();
                }
                break;
            case"changeAddress":
                if (is_bool($response)) {
                    return $this->changeaddressAction();
                }
                break;
            case"forgotPassword":
                if (is_bool($response)) {
                    return $this->forgotpasswordAction();
                }
                break;
            case"getProvince":
                if (is_bool($response)) {
                    return $this->getprovinceAction();
                }
                break;
            case"adminLoggedIn":
                if (is_bool($response)) {
                    return $this->adminLoggedInAction();
                }
                break;
            case"userRegisterationByAdmin":
                if (is_bool($response)) {
                    return $this->userRegisterationByAdminAction();
                }
                break;

            case"getInviteeList":
                if (is_bool($response)) {
                    return $this->getInviteeListAction();
                }
                break;

            case"approveinvitee":
                if (is_bool($response)) {
                    return $this->approveinviteeAction();
                }
                break;

            case"approveinvitee":
                if (is_bool($response)) {
                    return $this->signupAction();
                }
                break;
        }
        return $response;
    }

    public function getErrorResponseStringAction($errorcode, $errordesc) {

        $str = '{
		' . $this->responseRepeatStringAction() . '
		"' . $this->requestType . '":{
		"errorCode":"' . $errorcode . '",
		"errorMsg":"' . $errordesc . '"
		}
		}';
        return $str;
    }

    public function getSuccessResponseStringAction($successCode=NULL, $successDesc=NULL, $response=NULL) {
        if ($response) {
            $response = $response . ',';
//        }
            $str = '{
		' . $this->responseRepeatStringAction() . '
		"' . $this->requestType . '":
                ' . $response . '
                    "successCode":"' . $successCode . '",
		    "successMessage":"' . $successDesc . '"
		}';
        } else {
            $str = '{
		' . $this->responseRepeatStringAction() . '
		"' . $this->requestType . '":{
		 ' . $response . '
		"successCode":"' . $successCode . '",
		"successMessage":"' . $successDesc . '"
		}
		}';
        }
        return $str;
    }

    public function errorCheckAction() {
        $response = NULL;
        switch ($this->requestType) {
            case"UserSignup":
                if (isset($this->response['UserSignup']['userFirstName']) && (preg_match('/^[\w]+$/', $this->response['UserSignup']['userFirstName'])) && isset($this->response['UserSignup']['userLastName']) && (preg_match('/^[\w]+$/', $this->response['UserSignup']['userLastName'])) && isset($this->response['UserSignup']['address1']) && (preg_match('/^[\w]+$/', $this->response['UserSignup']['address1'])) && isset($this->response['UserSignup']['city']) && (preg_match('/^[\w]+$/', $this->response['UserSignup']['city'])) && isset($this->response['UserSignup']['province']) && (preg_match('/^[\w]+$/', $this->response['UserSignup']['province'])) && isset($this->response['UserSignup']['postalCode']) && (preg_match('/^[\d]+$/', $this->response['UserSignup']['postalCode'])) && isset($this->response['UserSignup']['telephone']) && (preg_match('/^[\d]+$/', $this->response['UserSignup']['telephone'])) && isset($this->response['UserSignup']['password']) && ($this->response['UserSignup']['password']) && isset($this->response['UserSignup']['email']) && (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $this->response['UserSignup']['email']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid fields!");
                }
                break;

            case"UserLogin":
                if (($this->loggedincheckAction()) && isset($this->response['UserLogin']['userEmail']) && (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $this->response['UserLogin']['userEmail'])) && isset($this->response['UserLogin']['userPassword']) && ($this->response['UserLogin']['userPassword'])) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid username and password!");
                }
                break;

                 case"UserLogout":
                if (isset($this->response['UserLogout']['userId']) ) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid username and password!");
                }
                break;

            case"UserInformation":
                if (isset($this->response['UserInformation']['userId']) && (preg_match('/^[\d]+$/', $this->response['UserInformation']['userId']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "User information not found!");
                }
                break;

            case"editUserInformation":
                if (isset($this->response['editUserInformation']['userId']) && (preg_match('/^[\d]+$/', $this->response['editUserInformation']['userId'])) && isset($this->response['editUserInformation']['firstName']) && (preg_match('/^[\w]+$/', $this->response['editUserInformation']['firstName'])) && isset($this->response['editUserInformation']['lastName']) && (preg_match('/^[\w]+$/', $this->response['editUserInformation']['lastName'])) && isset($this->response['editUserInformation']['email']) && (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $this->response['editUserInformation']['email']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "User enter valid valid input!");
                }
                break;

            case"changePassword":
                if (isset($this->response['changePassword']['userId']) && (preg_match('/^[\d]+$/', $this->response['changePassword']['userId'])) && isset($this->response['changePassword']['password']) && ($this->response['changePassword']['password'])) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid password!");
                }
                break;

            case"changeAddress":
                if (isset($this->response['changeAddress']['userId']) && (preg_match('/^[\d]+$/', $this->response['changeAddress']['userId'])) && isset($this->response['changeAddress']['address1']) && (preg_match('/^[\w]+$/', $this->response['changeAddress']['address1'])) && isset($this->response['changeAddress']['city']) && (preg_match('/^[\w]+$/', $this->response['changeAddress']['city'])) && isset($this->response['changeAddress']['postalcode']) && (preg_match('/^[\d]+$/', $this->response['changeAddress']['postalcode'])) && isset($this->response['changeAddress']['phoneNumber']) && (preg_match('/^[\d]+$/', $this->response['changeAddress']['phoneNumber']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid input!");
                }
                break;

            case"forgotPassword":
                if (isset($this->response['forgotPassword']['userId']) && (preg_match('/^[\d]+$/', $this->response['forgotPassword']['userId'])) && isset($this->response['forgotPassword']['email']) && (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $this->response['forgotPassword']['email']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid email!");
                }
                break;

            case"getProvince":
                if (isset($this->response['getProvince']['userId']) && (preg_match('/^[\d]+$/', $this->response['getProvince']['userId']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Provinces not found!");
                }
                break;

            case"adminLoggedIn":
                if (($this->adminloggedincheckAction()) && isset($this->response['adminLoggedIn']['userId']) && (preg_match('/^[\d]+$/', $this->response['adminLoggedIn']['userId'])) && isset($this->response['adminLoggedIn']['userName']) && (preg_match('/^[\w]+$/', $this->response['adminLoggedIn']['userName'])) && isset($this->response['adminLoggedIn']['Password']) && ($this->response['adminLoggedIn']['Password'])) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid credentials!");
                }
                break;

            case"userRegisterationByAdmin":
                if (isset($this->response['userRegisterationByAdmin']['userId']) && (preg_match('/^[\d]+$/', $this->response['userRegisterationByAdmin']['userId'])) && isset($this->response['userRegisterationByAdmin']['userName']) && (preg_match('/^[\w]+$/', $this->response['userRegisterationByAdmin']['userName'])) && isset($this->response['userRegisterationByAdmin']['inviteeName']) && (preg_match('/^[\w]+$/', $this->response['userRegisterationByAdmin']['inviteeName'])) && isset($this->response['userRegisterationByAdmin']['email']) && (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $this->response['userRegisterationByAdmin']['email'])) && isset($this->response['userRegisterationByAdmin']['relation']) && (preg_match('/^[\w]+$/', $this->response['userRegisterationByAdmin']['relation']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Please enter valid information of user!");
                }
                break;

            case"getInviteeList":
                if (isset($this->response['getInviteeList']['userId']) && (preg_match('/^[\d]+$/', $this->response['getInviteeList']['userId']))) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Invitee list does not exist!");
                }
                break;

            case"approveinvitee":
                if (isset($this->response['approveinvitee']['userId']) && (preg_match('/^[\d]+$/', $this->response['approveinvitee']['userId'])) && isset($this->response['approveinvitee']['inviteeId']) && (preg_match('/^[\d]+$/', $this->response['approveinvitee']['inviteeId'])) && isset($this->response['approveinvitee']['email']) && (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $this->response['approveinvitee']['email'])) && isset($this->response['approveinvitee']['approve']) && ($this->response['approveinvitee']['approve'])) {
                    return true;
                } else {
                    return $this->getErrorResponseStringAction("001", "Invitee not has been approved!");
                }
                break;
        }
        return $response;
    }

    public function getNoResponseMessageAction($errorcode, $errordesc) {

        $str = '{
        "NoData":{
		"errorCode":"' . $errorcode . '",
		"errorMsg":"' . $errordesc . '"
		}
		}';
        return $str;
    }

    public function responseRepeatStringAction() {
        $str = '"GenInfo":{ "appname":"sti",  "appversion":"1.0.0",   "type":"Response"   },';
        return $str;
    }

    public function saveInformationAction() {


        foreach ($this->response[$this->requestType] as $key => $value):
            $this->userInformation[][$key] = $this->response;
        endforeach;
        $this->userInformation[] = $this->response;
        // print_r($this->getSuccessResponseStringAction("000","User information saved successfully"));
        return $this->getSuccessResponseStringAction("000", "User information saved successfully");
        //print_r($this->response[$this->requestType]);       return true;
    }

    public function getUserInfoAction() {
        $userInformation = NULL;
        $userInformation = array(
            "MemberSince" => "Brijesh",
            "email" => "brij420@gmail.com",
            "totalBenefit" => "brij420@gmail.com",
            "numberClaim" => "brij420@gmail.com",
            "email" => "brij420@gmail.com"
        );
        return $this->getSuccessResponseStringAction("000", "User information retrieved successfully", Zend_Json::encode($userInformation));
    }

    public function adminloggedincheckAction() {
        $loggedin = array(
            "username" => "admin",
            "password" => "admin"
        );
        if (($this->response[$this->requestType]['userName'] == $loggedin['username']) && ($this->response[$this->requestType]['Password'] == $loggedin['password'])) {
            return true;
        }
        return false;
    }

    public function loggedincheckAction() {

        $loggedin = array(
            "username" => "john_cook@gmail.com",
            "password" => "john12345"
        );
        if (($this->response[$this->requestType]['userEmail'] == $loggedin['username']) && ($this->response[$this->requestType]['userPassword'] == $loggedin['password'])) {
            return true;
        }
        return false;
    }

    public function administratorLoggedInAction() {
        $loggedin = null;
        $loggedin = array(
            "username" => "admin",
            "password" => "admin"
        );
        return $this->getSuccessResponseStringAction("000", "Admin logged-in successfully!");
    }

    public function loggedinInformationAction() {
        $loggedin = null;
        $loggedin = array(
            "username" => "john_cook@gmail.com",
            "password" => "john12345"
        );
        return $this->getSuccessResponseStringAction("000", "User logged-in successfully!");
    }

    public function editUserInfoAction() {
        $userInformation = null;
        $userInformation = $this->response[$this->requestType];
        return $this->getSuccessResponseStringAction("000", "User information changed successfully");
    }

    public function changepassAction() {
        $password = null;
        $password = $this->response[$this->requestType];
        return $this->getSuccessResponseStringAction("000", "Password has been changed successfully");
    }

    public function changeuseraddressAction() {
        $address = null;
        $address = $this->response[$this->requestType];
        return $this->getSuccessResponseStringAction("000", "Address has been changed successfully");
    }

    public function getprovincesAction() {
        $province = null;
        $province = array(
            "provinceList" => array(
                array(
                    "id" => "1",
                    "name" => "US"
                ),
                array(
                    "id" => "2",
                    "name" => "NY"
                ),
                array(
                    "id" => "3",
                    "name" => "VEGAS"
                ),
                array(
                    "id" => "4",
                    "name" => "New jersey"
                )
                ));
        return $this->getSuccessResponseStringAction("000", "User information retrieved successfully", Zend_Json::encode($province));
    }

    public function userRegisterationByAdministratorAction() {
        foreach ($this->response[$this->requestType] as $key => $value):
            $this->userInformation[][$key] = $this->response;
        endforeach;
        $this->userInformation[] = $this->response;
        return $this->getSuccessResponseStringAction("000", "user registered successfully!");
    }

    public function getInviteesListAction() {
        $invitee = NULL;
        $invitee = array(
            "List" => array(
                array("id" => "1",
                    "Name" => "John",
                    "email" => "john@gmail.com",
                    "status" => "0"
                ),
                array(
                    "id" => "1",
                    "Name" => "Marc",
                    "email" => "marc@gmail.com",
                    "status" => "0"
                )
                ));
        return $this->getSuccessResponseStringAction("000", "Invitee List!", Zend_Json::encode($invitee));
    }

    public function approveinviteAction() {
        $invite = null;
        $invite = array(
            "username" => "john_cook@gmail.com",
            "password" => "john12345"
        );
        return $this->getSuccessResponseStringAction("000", "User logged-in successfully!");
    }

    public function loggedoutAction(){

         return $this->getSuccessResponseStringAction("000", "User logged-out successfully!");
    }

}