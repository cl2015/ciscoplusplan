<?php

class ReportController extends Controller
{
	public $layout='//layouts/front';
	private $_user = null;
	private $_users;

	public function accessRules() {
		return array(
				array('allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array('index','detail'),
						'users' => array('*'),
				),
				array('allow',
						'actions'=>array('allUsers'),
						'users'=>array('admin'),
				),
				array('deny', // deny all users
						'users' => array('*'),
				),
		);
	}

	/**
	 * summary report
	 * @param String $type
	 */
	public function actionIndex($email,$type='RM'){
		$user = User::model()->findByAttributes(array('email'=>$email));
		if($user===null || $user->type_id<10){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			$data=User::model()->getSummaryReport();
			$this->render('index',array('data'=>$data,'user'=>$user,'type'=>$type));
		}
	}
	
	public function actionDetail($email,$type='AM',$am)
	{
		$user = User::model()->findByAttributes(array('email'=>$email));
		if($user===null || $user->type_id<10){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			$this->_users=User::model()->getReport($am);
			$this->render('detail',array('model'=>$this->_users,'user'=>$user,'type'=>$type,'am'=>$am));
		}
	}

	public function actionAllUsers(){
		$user = $this->loadUser(Yii::app()->user->id);
		$this->_users=$user->getAdminReport();
		$this->render('allUsers',array('model'=>$this->_users,'user'=>$user,'type'=>'OD','am'=>''));
	}
	protected function loadUser($user_id) {
		if ($this->_user === null) {
			$this->_user = User::model()->findbyPk($user_id);
			if ($this->_user === null) {
				throw new CHttpException(404, 'The requested user does not exist.');
			}
		}
		return $this->_user;
	}
	
	public function actionDailyReport(){
		$data = User::model()->getDailyReport();
		$to = 'li.he@brightac.com.cn';
		$cc = 'mike.xie@gpjevent.com';
		$mailer = Yii::app()->mailer;
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->setPathViews('application.views.user');
		$mailer->IsSMTP();
		$mailer->IsSendmail();
		$mailer->SMTPAuth = true;
		$mailer->From = 'gc_cisco_plus@external.cisco.com';
		$mailer->From = 'admin@brightac.com.cn';
		//$mailer->AddReplyTo('gc_cisco_plus@external.cisco.com');
		$mailer->AddAddress($to);
		
		$mailer->AddCC($cc);
		//$mailer->FromName = 'Cisco Plus 2012会务组';
		//$mailer->Username = 'admin@brightac.com.cn';    //这里输入发件地址的用户名
		//$mailer->Password = 'admin1';    //这里输入发件地址的密码
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('default', 'Daily Report');
		$mailer->IsHTML(true);
		$mailer->getView('dailyReport',array('model'=>$data));
		$mailer->Send();
		echo new CDbExpression('NOW()');
		Yii::app()->end();
	}

}
