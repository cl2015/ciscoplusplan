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
						'users' => array('@'),
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

	public function actionAllUsers(){
		$user = $this->loadUser(Yii::app()->user->id);
		$this->_usersgetSummaryReport->getAdminReport();
		$this->render('detail',array('model'=>$this->_users,'user'=>$user));
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

}
