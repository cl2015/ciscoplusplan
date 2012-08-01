<?php

/*
 * @version $Id: AdminLoginForm.php 126 2012-03-16 17:11:58Z xiongzuomang $
 */

class AdminLoginForm extends CFormModel {

    public $username;
    public $password;
    public $verifyCode;
    private $_identity;

    public function rules() {
        return array(
            array('username, password, verifyCode', 'required', 'on' => 'login'),
            array('username, password', 'length', 'min' => '5', 'max' => '20',
                'message' => '{attribute}长度错误', 'on' => 'login'),
            array('password', 'authenticate', 'on' => 'login'),
            array(
                'verifyCode',
                'captcha',
                'allowEmpty' => !CCaptcha::checkRequirements(),
                'on' => 'login'
            ),
        );
    }

    public function attributeLabels() {
        return array(
            'username' => '用户名',
            'password' => '密码',
            'verifyCode' => '验证码'
        );
    }

    public function authenticate() {
        $this->_identity = new AdminIdentity($this->username, $this->password);
        if (!$this->_identity->authenticate())
            $this->addError('password', '密码错误');
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new AdminIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === AdminIdentity::ERROR_NONE) {
            $duration = params('loginDuration');
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
        return false;
    }

}

?>
