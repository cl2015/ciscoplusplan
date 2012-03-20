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
	}

	/**
	 * sendmail
	 */
	public function sendMail($to,$cc="cranelee@gmail.com",$user,$reginfo) {
		//$message = $content;
		$mailer = Yii::app()->mailer;
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->setPathViews('application.views.user');
		$mailer->IsSMTP();
		$mailer->IsSendmail();
		$mailer->SMTPAuth = true;
		if($cc!="" && $cc!=null){
			$mailer->AddCC($cc);
		}
		$mailer->From = 'gc_cisco_plus@external.cisco.com';
		$mailer->AddReplyTo('gc_cisco_plus@external.cisco.com');
		$mailer->AddAddress($to);
		$mailer->FromName = 'Cisco Plus 2012会务组';
		//$mailer->Username = 'admin@brightac.com.cn';    //这里输入发件地址的用户名
		//$mailer->Password = 'admin1';    //这里输入发件地址的密码
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('default', 'confirmation');
		$mailer->IsHTML(true);
		$mailer->getView('email',array('model'=>$user,'reginfo'=>$reginfo));
		$mailer->Send();
	}

	public function sendSms($user,$reginfo){
		if($user->has_sended == 1){
			return true;
		}
		set_time_limit(0);
		header("Content-Type: text/html; charset=UTF-8");
		define('SCRIPT_ROOT',  dirname(__FILE__).'/../extensions/sms/');
		require_once SCRIPT_ROOT.'Client.php';
		/**
		 * 网关地址
		 */
		$gwUrl = 'http://sdkhttp.eucp.b2m.cn/sdk/SDKService';
		/**
		 * 序列号,请通过亿美销售人员获取
		 */
		//$serialNumber = '0SDK-EMY-0130-LBXNR';
		$serialNumber = '3SDK-EMY-0130-MKRUT';

		/**
		 * 密码,请通过亿美销售人员获取
		 */
		//$password = '941018';
		$password = '991211';//特服号：037825
		/**
		 * 登录后所持有的SESSION KEY，即可通过login方法时创建
		 */
		$sessionKey = '160928';
		/**
		 * 连接超时时间，单位为秒
		 */
		$connectTimeOut = 10;

		/**
		 * 远程信息读取超时时间，单位为秒
		 */
		$readTimeOut = 10;
		$proxyhost = false;
		$proxyport = false;
		$proxyusername = false;
		$proxypassword = false;
		$client = new Client($gwUrl,$serialNumber,$password,$sessionKey,$proxyhost,$proxyport,$proxyusername,$proxypassword,$connectTimeOut,$readTimeOut);
		//var_dump($client);
		$client->setOutgoingEncoding("UTF-8");
		$statusCode = $client->login();

		$message = '';
		if(Yii::app()->language=='en'){
			if(!($user->type_id== 4 && $reginfo->is_online==0)){
				$message = 'Dear ' .$user->full_name . ', thanks for registering Cisco Plus 2012 Beijing. Please attend our meeting on time with your confirmation ID ' .$user->id. '  [Cisco Plus 2012 Event Committee Team] ';
			}else{
				$message = 'Dear ' .$user->full_name . ', thanks for registering Cisco Plus 2012 Beijing. Please remember your email address ' .$user->email. ' and your password '. $user->password .' Log in www.ciscopluschina.com [Cisco Plus 2012 Event Committee Team]';

			}
		}else{
			if(!($user->type_id== 4 && $reginfo->is_online==0)){
				$message = '尊敬的' .$user->full_name . '， 感谢注册Cisco Plus大中华区北京站活动。请携带参会ID ' .$user->id . '，准时参会。【Cisco Plus大中华区活动会务组】 ';
			}else{
				$message = '尊敬的' .$user->full_name . '， 感谢注册Cisco Plus大中华区北京站活动。请牢记您的注册邮箱 ' .$user->email . '和注册密码' . $user->password . ' ，登录www.ciscopluschina.com[Cisco Plus大中华区活动会务组] ';
			}
		}
		$statusCode = $client->sendSMS(array($user->mobile),$message);
		if($statusCode == '0'){
			$user->has_sended = 1;
			$user->save();
		}
		//echo "处理状态码:".$statusCode;
	}

}
