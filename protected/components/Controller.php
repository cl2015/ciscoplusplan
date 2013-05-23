<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	
	public $close = false;
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
		if(date('Y-m-d') >= '2013-05-26'){
			$this->close = true;
		}
	}

	/**
	 * sendmail
	 */
	public function sendMail($is_false='',$to,$cc="",$user,$reginfo) {
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
		$mailer->From = 'go_cisco_connect@external.cisco.com';
		$mailer->AddReplyTo('go_cisco_connect@external.cisco.com');
		$mailer->AddAddress($to);
		$mailer->FromName = 'Cisco Connect 2013会务组';
		//$mailer->Username = 'admin@brightac.com.cn';    //这里输入发件地址的用户名
		//$mailer->Password = '';    //这里输入发件地址的密码
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('default', 'confirmation');
		$mailer->IsHTML(true);
                if($is_false=='email_false'){
                    $mailer->getView('email_false',array('model'=>$user,'reginfo'=>$reginfo));
                }else{
		$mailer->getView('email',array('model'=>$user,'reginfo'=>$reginfo));
                }
		$mailer->Send();
	}
	
	public function sendPassword($user,$reginfo){
		//$message = $content;
		$mailer = Yii::app()->mailer;
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->setPathViews('application.views.user');
		$mailer->IsSMTP();
		$mailer->IsSendmail();
		$mailer->SMTPAuth = true;
		$mailer->From = 'go_cisco_connect@external.cisco.com';
		$mailer->AddReplyTo('go_cisco_connect@external.cisco.com');
		$mailer->AddAddress($user->email);
		$mailer->FromName = 'Cisco Connect 2013会务组';
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('default', 'Forget Password');
		$mailer->IsHTML(true);
		$mailer->getView('forgetPasswordEmail',array('model'=>$user,'reginfo'=>$reginfo));
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
				$message = 'Dear ' .$user->full_name . ', thanks for registering Cisco Connect 2013 Shanghai. Please attend our meeting on time with your confirmation ID ' .$user->id. '  [Cisco Connect 2013 Event Committee Team] ';
			}else{
				$message = 'Dear ' .$user->full_name . ', thanks for registering Cisco Connect 2013 Shanghai. Please remember your email address ' .$user->email. ' and your password '. $user->password .' Log in www.ciscoconnect.com [Cisco Connect 2013 Event Committee Team]';

			}
		}else{
			if(!($user->type_id== 4 && $reginfo->is_online==0)){
				$message = '尊敬的' . $user->full_name . '感谢您注册Cisco Connect大中华区上海站活动！您的参会码是 ' .$user->id . '。【Cisco Connect大中华区活动会务组】';
			}else{
				$message = '尊敬的' . $user->full_name . '感谢您注册Cisco Connect大中华区活动！凭注册邮箱和密码登录了解最新信息视频。【Cisco Connect大中华区活动会务组】';
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
