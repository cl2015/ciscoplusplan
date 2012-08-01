<?php

/*
 * 管理用户验证类
 * @version $Id: AdminIdentity.php 123 2012-03-16 16:58:02Z xiongzuomang $
 */
class AdminIdentity extends CUserIdentity {
    
    private $_id; //管理用户 id
    private $_isRoot; //是否具有管理权限
    private $_editor; //是否是内容编辑

    /**
     * 从数据库查找记录，然后验证密码
     * @return type
     */
    public function authenticate() {
        $where = array(
            'username' => trim($this->username)
        );
        $admin = Admin::model()->findByAttributes($where);
        if ($admin === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$admin->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $admin->id;
            $isRoot = ($admin->authority == Admin::ADMIN_ROOT) ? $admin->authority : 0;
            $isEditor = ($admin->authority == Admin::ADMIN_EDITOR) ? 1:0;
            $isDatabase = ($admin->authority == Admin::ADMIN_DATABASE)? 1 : 0;
            Yii::trace('isXXX-' . $isRoot . '-' . $isEditor . '-' . $isDatabase);
             $this->setState('username', $this->username);
            $this->setState('isRoot', $isRoot);
            $this->setState('isEditor', $isEditor);
            $this->setState('isDatabase', $isDatabase);//
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }
    
    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }
}


?>
