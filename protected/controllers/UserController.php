<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','loading','view','attending','emailreg','ordinaryUpdate'),
			'users'=>array('*'),
		),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions'=>array('create','update'),
		'users'=>array('*'),
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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

		if(isset($_POST['User']))
		{
			
			$model->attributes=$_POST['User'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('survey/create'));
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionLoading($email='')
	{
		$model=new User('loading');
		$model->email = $email;

		// uncomment the following code to enable ajax-based validation
	/*
	if(isset($_POST['ajax']) && $_POST['ajax']==='user-loading-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
	 */

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			/*
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
			 */
			$this->redirect(array('update','id'=>1));
		}
		$this->render('loading',array('model'=>$model));
	}
	public function actionAttending(){
		$model = $this->loadModel(1);
		if(isset($_POST['User']))
		{
			$this->redirect(array('payment/create'));
		}
		$this->render('attending',array('model'=>$model));
	}

	public function actionEmailreg($email)
	{
		$model = new User();
		$emailRecord = User::model()->findByAttributes(array('email'=>$email));
		
		if (!$emailRecord) {
			$model->addError('email', 'email不存在');
		}else if ( !$emailRecord->password == '' ){
			$model->addError('email','email已注册');
		}else{

		//	$this->redirect(array('update',array('id'=>1));
		}
		//$this->render('emailreg',$model);
		$this->redirect(array('update','id'=>1));
		
	}

	/*
	 *ordinary udpate profile
	 */
		
	public function actionOrdinaryUpdate($id){
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('survey/ordinaryCreate'));
		}

		$this->render('ordinaryUpdate',array(
			'model'=>$model,
		));
	}

	}
	public function actionOrdinaryLoading()
	{
		$model=new User('ordinaryLoading');

		// uncomment the following code to enable ajax-based validation
	/*
	if(isset($_POST['ajax']) && $_POST['ajax']==='user-loading-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
	 */

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			/*
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
			 */
			$this->redirect(array('ordinaryUpdate','id'=>1));
		}
		$this->render('ordinaryLoading',array('model'=>$model));
	}

}

