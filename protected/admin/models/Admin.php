<?php

/*
 * @version $Id: Admin.php 126 2012-07-30 17:11:58Z limin $
 */
class Admin extends CActiveRecord {
    
    const ADMIN_ROOT = 9;
    const ADMIN_EDITOR = 6;
    const ADMIN_DATABASE = 1;
    
    public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'admins';
	}
    
    /**
	 * 检查传入的密码是否同数据库记录符合.
	 * @param string 需要验证的密码
	 * @return boolean 密码是否正确
	 */
	public function validatePassword($password) {
		return  md5($password) === $this->password;
	}
}

?>
