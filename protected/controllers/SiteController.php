<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (Yii::app()->user->type_id == 10) {
                    $this->redirect(array('report/detail'));
                } elseif (Yii::app()->user->type_id == 11) {
                    $this->redirect(array('report/index'));
                } elseif (Yii::app()->user->type_id == 12) {
                    $this->redirect(array('report/index'));
                } elseif (Yii::app()->user->type_id == 13) {
                    $this->redirect(array('report/financial'));
                } else {
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionBegin() {
        $this->render('begin');
    }
    
    public function actionMakeUsers() {
    	//echo floor(microtime()*1000);
    	set_time_limit(0);
    	ini_set('memory_limit','16M');
    	$users = User::model()->findAll();
    	$code = 1000;
    	foreach($users as $user){
    		//echo $user->id;
    		for($i=0;$i<$user->ec_mobile+3;$i++){
    			try{
    				//echo $i;
    				$copy = new User;
    				$copy->am_id = trim($user->am_id);
    				$copy->am_name = trim($user->am_name);
    				$copy->rm_id = trim($user->rm_id);
    				$copy->rm_name = trim($user->rm_name);
    				$copy->od_id = trim($user->od_id);
    				$copy->od_name = trim($user->od_name);
    				$copy->diff = trim($user->diff);
    				$copy->type_id = 1;
    				$copy->cc = $copy->am_id;
    				$copy->code = 'nom' . $code;
    				$code++;
    				//$copy->save();
    			}catch (Exception $e){
    			}
    		}
    	}
    }

}
