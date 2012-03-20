<?php

class ReportController extends Controller
{
	public $layout='//layouts/front';
	private $_user = null;
	private $_users;
	
	public function accessRules() {
		return array(
				array('allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array('index'),
						'users' => array('@'),
				),
				array('deny', // deny all users
						'users' => array('*'),
				),
		);
	}
	
	public function actionIndex()
	{
		$user = $this->loadUser(Yii::app()->user->id);
		$this->_users=$user->getReport();
		$this->render('index',array('model'=>$this->_users,'user'=>$user));
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
