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
	public $layout='//layouts/column1';
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
		/**
	 * sendmail
	 */
	public function sendMail($to,$cc="cranelee@gmail.com",$content) {
		//$message = $content;
		$mailer = Yii::app()->mailer;
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->setPathViews('application.views.user');
		$mailer->IsSMTP();
		$mailer->SMTPAuth = true;
		$mailer->AddCC($cc);
		$mailer->From = 'admin@brightac.com.cn';
		$mailer->AddReplyTo('admin@brightac.com.cn');
		$mailer->AddAddress($to);
		$mailer->FromName = 'admin';
		$mailer->Username = 'admin@brightac.com.cn';    //这里输入发件地址的用户名
		$mailer->Password = 'admin1';    //这里输入发件地址的密码
		$mailer->SMTPDebug = true;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('demo', 'Yii rulez!');
		$mailer->IsHTML(true);
		$mailer->getView('email');
		$mailer->Send();
	}

}
