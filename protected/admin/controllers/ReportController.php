<?php

class ReportController extends Controller
{
	public $layout='//layouts/front';
	private $_user = null;
	private $_users;

	public function accessRules() {
		return array(
				array('allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array('index','detail','ccAllInfo','divi','locationNomination'),
						'users' => array('*'),
				),
				array('allow',
						'actions'=>array('allUsers'),
						'users'=>array('*'),
				),
				array('allow',
						'actions'=>array('financial'),
						'users'=>array('@'),
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
	public function actionIndex($email='',$type='RM'){
		if($email!=''){
			$model=new LoginForm;
			$model->username = $email;
			if(!$model->login()){
				$this->redirect(array('site/login'));
			}
		}
		if(!Yii::app()->user->type_id){
			$this->redirect(array('site/login'));
		}
		$reports=User::model()->getSummaryByUser(Yii::app()->user->email,Yii::app()->user->type_id);
		$this->render('index',array('model'=>$reports));
	}

	public function actionDetail($email='',$type='AM',$am='')
	{
		if($email!=''){
			$model=new LoginForm;
			$model->username = $email;
			if(!$model->login()){
				$this->redirect(array('site/login'));
			}
		}
		if(!Yii::app()->user->type_id){
			$this->redirect(array('site/login'));
		}
		$reports=User::model()->getDetailByUser(Yii::app()->user->email,Yii::app()->user->type_id);
		$this->render('detail',array('model'=>$reports));
	}

	public function actionAllUsers(){
		//$user = $this->loadUser(Yii::app()->user->id);
		$user = new User();
		$user->email = 'admin';
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
		$cc = 'ieboxie@gmail.com';
		$mailer = Yii::app()->mailer;
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->setPathViews('application.views.user');
		$mailer->IsSMTP();
		$mailer->IsSendmail();
		$mailer->SMTPAuth = true;
		$mailer->From = 'go_cisco_plus@external.cisco.com';
		//$mailer->From = 'admin@brightac.com.cn';
		//$mailer->AddReplyTo('go_cisco_plus@external.cisco.com');
		$mailer->AddAddress($to);
		$mailer->AddAddress('cxx1108@gmail.com');

		$mailer->AddCC($cc);
		$mailer->FromName = 'Cisco Plus 2012会务组';
		//$mailer->Username = 'admin@brightac.com.cn';    //这里输入发件地址的用户名
		//$mailer->Password = 'admin1';    //这里输入发件地址的密码
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('default', 'Daily Report');
		$mailer->IsHTML(true);
		$mailer->getView('dailyReport',array('model'=>$data));
		$mailer->Send();
		echo date('Y-m-d H:i:s');
		Yii::app()->end();
	}
	//call center使用查看所有用户的信息
	public function actionCcAllInfo(){
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('ccAllInfo',array(
				'model'=>$model,
		));
	}
	//财务查看用户的信息
	public function actionFinancial(){
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
		
		$this->render('financial',array(
				'model'=>$model,
		));
	}
	
	//最新报表
	public function actionDivi(){
		$model = new Report;
		$this->render('divi',array('result'=>$model->diffNomination(),));
	}
	public function actionLocationNomination(){
		$model = new Report;
		$this->render('locationNomination',array('result'=>$model->locationNomination(),));
	}
	public function actionLocationPublic(){
		$model = new Report;
		$this->render('locationPublic',array('result'=>$model->locationPublic(),));
	}
	public function actionJobtitleNomination(){
		$model = new Report;
		$this->render('jobtitleNomination',array('result'=>$model->jobtitleNomination(),));
	}
	public function actionJobtitlePublic(){
		$model = new Report;
		$this->render('jobtitlePublic',array('result'=>$model->jobtitlePublic(),));
	}
	public function actionDeptNomination(){
		$model = new Report;
		$this->render('deptNomination',array('result'=>$model->departmentNomination(),));
	}
	public function actionDeptPublic(){
		$model = new Report;
		$this->render('deptPublic',array('result'=>$model->departmentPublic(),));
	}
	

}
