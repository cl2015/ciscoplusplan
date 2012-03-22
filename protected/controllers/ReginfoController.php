<?php

class ReginfoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/front';
	public $_user = null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',
						'actions'=>array('test'),
						'users'=>array('*'),
				),
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('attending','payment','nominationConfirmation','employeeConfirmation','ordinaryConfirmation','attendeeConfirmation'),
						'users'=>array('@'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update','attending','payment','pay','confirmation','ordinaryConfirmation'),
						'users'=>array('admin'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Reginfo;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reginfo']))
		{
			$model->attributes=$_POST['Reginfo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
				'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reginfo']))
		{
			$model->attributes=$_POST['Reginfo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
				'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Reginfo');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reginfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reginfo']))
			$model->attributes=$_GET['Reginfo'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Reginfo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reginfo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionAttending(){
		$user = $this->loadUser(Yii::app()->user->id);
		$model = Reginfo::model()->findbyAttributes(array('user_id'=>$user->id));
		if($model === null){
			$model = new Reginfo;
			$model->user_id = $user->id;
		}
		$model->setScenario('attending');
		if(isset($_POST['Reginfo']))
		{
			$model->attributes=$_POST['Reginfo'];
			if($model->save()){
				if ($model->is_online == 0)
				{
					$this->redirect(array('attendeeConfirmation'));
				}else{
					$this->redirect(array('payment'));
				}
			}
		}
		$this->render('attending',array('model'=>$model));
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
	public function actionPayment()
	{
		$user = $this->loadUser(Yii::app()->user->id);
		$model = Reginfo::model()->findbyAttributes(array('user_id'=>$user->id));
		if($model === null){
			$model = new Reginfo;
			$model->user_id = $user->id;
		}
		$model->setScenario('payment');
		if(isset($_POST['Reginfo']))
		{
			$model->attributes=$_POST['Reginfo'];
			if($model->save())
			{
				if ($model->payment_type == 0)
				{
					$this->redirect(array('reginfo/pay'));
				}else{
					$this->redirect(array('reginfo/ordinaryConfirmation'));
				}
			}
		}

		$this->render('payment',array('model'=>$model));
	}
	public function actionConfirmation()
	{
		$user=$this->loadUser(Yii::app()->user->id);
		$this->sendMail('li.he@brightac.com.cn','cranelee@gmail.com',$user);
		$this->render('confirmation',array('user'=>$user));
	}
	public function actionPay()
	{
		$model=new Reginfo('pay');
		$user = $this->loadUser(Yii::app()->user->id);
		$model->user_id = $user_id;
		if(isset($_POST['Reginfo']))
		{
			$model->attributes=$_POST['Reginfo'];
			if($model->validate())
			{
				$this->redirect(array('ordinaryConfirmation'));
				return;
			}
		}
		$this->render('pay',array('model'=>$model));
	}
	public function actionNominationConfirmation()
	{

		$user=$this->loadUser(Yii::app()->user->id);

		$reginfo = Reginfo::model()->findbyAttributes(array('user_id'=>$user->id));
		if($reginfo === null){
			$reginfo = new Reginfo();
			$reginfo->user_id = $user->id;
			$reginfo->save();
		}
		$this->sendMail($user->email,$user->cc,$user,$reginfo);
		$this->sendSms($user,$reginfo);
		$this->render('nominationConfirmation',array('model'=>$user,'reginfo'=>$reginfo));
	}
	public function actionEmployeeConfirmation()
	{
		$user=$this->loadUser(Yii::app()->user->id);

		$reginfo = Reginfo::model()->findbyAttributes(array('user_id'=>$user->id));
		if($reginfo === null){
			$reginfo = new Reginfo();
			$reginfo->user_id = $user->id;
			$reginfo->save();
		}
		$this->sendMail($user->email,$user->cc,$user,$reginfo);
		$this->sendSms($user,$reginfo);
		$this->render('employeeConfirmation',array('model'=>$user,'reginfo'=>$reginfo));
	}
	
	public function actionOrdinaryConfirmation()
	{
		$user=$this->loadUser(Yii::app()->user->id);
		$reginfo = Reginfo::model()->findbyAttributes(array('user_id'=>$user->id));
		if($reginfo === null){
			$reginfo = new Reginfo();
			$reginfo->user_id = $user->id;
			$reginfo->save();
		}
		$this->sendMail($user->email,$user->cc,$user,$reginfo);
		$this->sendSms($user,$reginfo);
		$this->render('ordinaryConfirmation',array('model'=>$user,'reginfo'=>$reginfo));
	}
	
	public function actionAttendeeConfirmation()
	{
		$user=$this->loadUser(Yii::app()->user->id);
		$reginfo = Reginfo::model()->findbyAttributes(array('user_id'=>$user->id));
		if($reginfo === null){
			$reginfo = new Reginfo();
			$reginfo->user_id = $user->id;
			$reginfo->save();
		}
		$this->sendMail($user->email,$user->cc,$user,$reginfo);
		$this->sendSms($user,$reginfo);
		$this->render('attendeeConfirmation',array('model'=>$user,'reginfo'=>$reginfo));
	}


}
