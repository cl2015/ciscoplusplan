<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	public $layout='//layouts/front';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function init(){
		//Yii::app()->language = 'zh_CN';
		$session=new CHttpSession;
		$session->open();
		$language = $session['language'];
		if($language == null){
			$language = Yii::app()->language;
			$session['language'] = $language;
		}else{
			Yii::app()->language = $language;
		}
		//echo Yii::app()->language;
	}
	/**
	 * sendmail
	 */
	public function sendMail($to,$cc="cranelee@gmail.com",$user) {
		//$message = $content;
		$mailer = Yii::app()->mailer;
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->setPathViews('application.views.user');
		$mailer->IsSMTP();
		$mailer->SMTPAuth = true;
		if($cc!="" && $cc!=null){
			$mailer->AddCC($cc);
		}
		$mailer->From = 'admin@brightac.com.cn';
		$mailer->AddReplyTo('gc_cisco_plus@external.cisco.com');
		$mailer->AddAddress($to);
		$mailer->FromName = 'Cisco Plus 2012会务组';
		$mailer->Username = 'admin@brightac.com.cn';    //这里输入发件地址的用户名
		$mailer->Password = 'admin1';    //这里输入发件地址的密码
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('default', 'confirmation');
		$mailer->IsHTML(true);
		$mailer->getView('email',array('model'=>$user));
		$mailer->Send();
	}

}
