<?php

/**
 * @version $Id: AdminController.php 220 2012-03-25 08:30:41Z limin $ 
 */
class AdminController extends Controller {

    public function init() {
        Yii::app()->theme = "backend";
    }

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('index'),
                'users' => array('@'),
                'expression' => '($user->isRoot or $user->isEditor)'
            ),
            array(
                'deny',
                'actions' => array('index'),
                'users' => array('*')
            )
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xffffff,
                'maxLength' => 4,
                'padding' => 4,
                'minLength' => 4,
                'transparent' => true, //显示为�?�?    			'width' => '130',
                'height' => '45'
            )
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //echo "admin/admin/index";exit;
        //var_dump(Yii::app()->user->isRoot);exit;
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
     * Displays the login page
     */
    public function actionLogin() {
        $model = new AdminLoginForm();
        // collect user input data
        if (isset($_POST['AdminLoginForm'])) {
            $model->setScenario("login");
            $model->attributes = $_POST['AdminLoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(array('admin/index'));
            }
        }
        $data = array(
            'model' => $model
        );
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        if (Yii::app()->user->logout()) {
            $this->redirect(array('admin/index'));
        }
    }

}