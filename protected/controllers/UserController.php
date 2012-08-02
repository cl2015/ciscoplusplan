<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/front';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('loading', 'check', 'reg', 'language', 'forgetPassword'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('nominationUpdate', 'employeeUpdate', 'ordinaryUpdate', 'attendeeUpdate'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'view', 'attending', 'emailreg', 'ordinaryUpdate', 'index'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $model = $this->loadModel(Yii::app()->user->id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {

            $model->attributes = $_POST['User'];
            if ($model->save())
            //$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('survey/create'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionLoading($email='', $language="") {
// 		if(date('Y-m-d')>'2012-05-18'){
// 			$this->redirect(array('site/index'));
// 			Yii::app()->end();
// 		}
        $this->setLanguage($language);
        $model = new User('loading');
        $model->email = $email;
        $message = array("email" => "", "code" => '', "has_code" => "");
        // uncomment the following code to enable ajax-based validation

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-loading-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['User'])) {
            /**
             * 1.有email不需要code		nomination
             * 2.有email不需要code		employee
             * 3.有email需要code			ordinary
             * 4.无email无code		attendee,web
             * 5.有email有多个code
             * 6.无email有code,		Sponsor
             */
        	
        	/**
        	 * 二期：都改成靠code分析，先导入code 和type_id
        	 */
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                if (isset($model->code) && $model->code != null && $model->code != '') {
                    $user = User::model()->findByAttributes(array('code' => $model->code));
                    
                    if ($user->has_reged){
                    	$message['email'] = Yii::t('default', 'This code has been reged.');
                    }elseif ($user === null) {
                    	//public
                    	$model->type_id = 4;
                        if ($model->save()) {
                            if ($model->login()) {
                                $this->redirect(array('attendeeUpdate'));
                            } else {
                                $messge['email'] = Yii::t('default', "error");
                            }
                        }
                        $message['email'] = Yii::t('default', 'reg error.');
                    }elseif( $user->email == '' || $model->email == $user->email){
                    	$user->email = $model->email;
                    	
						$user->setScenario('loading');
                    	if($user->save()){
                    		if ($user->login()) {
                    			if($user->type_id == 1){
                    				$this->redirect(array('nominationUpdate'));
                    			}elseif($user->type_id == 2){
                    				$this->redirect(array('employeeUpdate'));
                    			}else{
                    				$this->redirect(array('attendeeUpdate'));
                    			}
                    		} else {
                    			$messge['email'] = Yii::t('default', "error");
                    		}
                    	}else{
                    		var_dump($user->errors);
                    		$messge['email'] = Yii::t('default', "error");
                    	}
                    }else{
                    	$messge['email'] = Yii::t('default', "error");
                    }
                } else {
                	$messge['email'] = Yii::t('default', "error");
                }
            }
        }
        $this->render('loading', array('model' => $model, 'message' => $message));
    }

    public function actionReg() {
        $this->redirect(array('user/loading'));
    }

    public function actionAttending() {
        $model = $this->loadModel(1);
        if (isset($_POST['User'])) {
            $this->redirect(array('payment/create'));
        }
        $this->render('attending', array('model' => $model));
    }

    public function actionEmailreg($email) {
        $model = new User();
        $emailRecord = User::model()->findByAttributes(array('email' => $email));

        if (!$emailRecord) {
            $model->addError('email', 'email不存在');
        } else if (!$emailRecord->password == '') {
            $model->addError('email', 'email已注册');
        } else {

            //	$this->redirect(array('update',array('id'=>1));
        }
        //$this->render('emailreg',$model);
        $this->redirect(array('update', 'id' => 1));
    }

    public function actionOrdinaryLoading() {
        $model = new User('ordinaryLoading');

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='user-loading-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            /*
              if($model->validate())
              {
              // form inputs are valid, do something here
              return;
              }
             */
            $this->redirect(array('ordinaryUpdate', 'id' => 1));
        }
        $this->render('ordinaryLoading', array('model' => $model));
    }

    public function actionCheck($email, $password, $callback) {
        $user = User::model()->findByAttributes(array('email' => $email));
        $retArr = array();
        if ($user === null) {
            $retArr['status'] = 'false';
            $retArr['user'] = array();
            $retArr['url'] = 'http://www.ciscopluschina.com';
        } elseif ($user->password != $user->encrypt($password)) {
            $retArr['status'] = 'false';
            $retArr['user'] = array();
            $retArr['url'] = 'http://www.ciscopluschina.com';
        } else {
            $retArr['status'] = 'true';
            $retArr['user'] = array('id' => $user->id, 'email' => $user->email);
            $retArr['url'] = '';
        }
        //echo $CJavaScript::jsonEncode(array($retArr));
        echo $callback . '(\'' . CJavaScript::jsonEncode(array($retArr)) . '\')';
        Yii::app()->end();
    }

    /*
     * ordinary udpate profile
     */

    public function actionNominationUpdate() { {
            $model = $this->loadModel(Yii::app()->user->id);
            $model->setScenario('update');
            if ($model->type_id != "1" && $model->type_id != '6') {
                $this->redirect(array("user/loading"));
            } else {
                if (isset($_POST['User'])) {
                    $model->attributes = $_POST['User'];
                    if ($model->save())
                        $this->redirect(array('survey/nominationCreate'));
                }
                $this->render('nominationUpdate', array(
                    'model' => $model,
                ));
            }
        }
    }

    public function actionEmployeeUpdate() { {
            $model = $this->loadModel(Yii::app()->user->id);
            $model->setScenario('employeeUpdate');
            if ($model->type_id != "2") {
                $this->redirect(array("user/loading"));
            } else {
                if (isset($_POST['User'])) {
                    $model->attributes = $_POST['User'];
                    $model->has_reged = 1;
                    if ($model->others != '')
                        $model->department = $model->others;
                    if ($model->save())
                        $this->redirect(array('reginfo/employeeConfirmation'));
                }
                $this->render('employee', array(
                    'model' => $model,
                ));
            }
        }
    }

    public function actionOrdinaryUpdate() { {
            $model = $this->loadModel(Yii::app()->user->id);
            $model->setScenario('update');
            if ($model->type_id != "3") {
                $this->redirect(array("user/loading"));
            } else {
                if (isset($_POST['User'])) {
                    $model->attributes = $_POST['User'];
                    if ($model->save())
                        $this->redirect(array('survey/ordinaryCreate'));
                }
                $this->render('ordinaryUpdate', array(
                    'model' => $model,
                ));
            }
        }
    }

    public function actionAttendeeUpdate() { {
            $model = $this->loadModel(Yii::app()->user->id);
            $model->setScenario('update');
            if ($model->type_id != "4") {
                $this->redirect(array("user/loading"));
            } else {
                if (isset($_POST['User'])) {
                    $model->attributes = $_POST['User'];
                    if ($model->save())
                        $this->redirect(array('survey/attendeeCreate'));
                }
                $this->render('attendeeUpdate', array(
                    'model' => $model,
                ));
            }
        }
    }

    public function actionLanguage($language) {
        $this->setLanguage($language);
        if (CHttpRequest::getUrlReferrer() == null || CHttpRequest::getUrlReferrer() == 'http://223.4.134.123/index.php?r=user/loading&language=zh_cn') {
            $this->redirect(array('user/loading'));
        } else {
            $this->redirect(CHttpRequest::getUrlReferrer());
        }
    }

    public function setLanguage($language) {
        if (in_array($language, array('zh_cn', 'en_us', 'en'))) {
            $session = new CHttpSession;
            $session->open();
            $session['language'] = $language;
            Yii::app()->language = $language;
        }
        return true;
    }

    /**
     * find password
     */
    public function actionForgetPassword() {
        $model = new User('forgetPassword');
        $message = '';

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                $user = User::model()->findByAttributes(array('email' => $model->email));
                if ($user === null) {
                    $message = 'You have not registered.';
                } else {
                    $reginfo = Reginfo::model()->findByAttributes(array('user_id' => $user->id));
                    $this->sendPassword($user, $reginfo);
                    $message = 'Password has been sent to your mailbox.';
                }
            }
        }
        $this->render('forgetPassword', array('model' => $model, 'message' => $message));
    }

}

