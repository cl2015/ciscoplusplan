<?php

class SurveyController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    private $_user = null;

    /**
     * @return array action filters
     * public function filters()
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'attending'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        $model = new Survey;
        //$user = $this->loadUser(1);
        $user = new User;
        //for the show
        $model->user_id = 1; //= $this->loadUser(1);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Survey'])) {
            $model->attributes = $_POST['Survey'];
            $model->q5=implode(",",array_filter($_POST['Survey']['q5']));
            if ($model->save())
            //	$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('reginfo/confirmation'));
        }

        $this->render('create', array(
            'model' => $model,
            'user' => $user,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Survey'])) {
            $model->attributes = $_POST['Survey'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('Survey');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Survey('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Survey']))
            $model->attributes = $_GET['Survey'];

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
        $model = Survey::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'survey-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
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

    public function actionAttending() {
        if (isset($_POST['User'])) {
            $this->redirect(array('payment/create'));
        }
    }

    public function actionOrdinaryCreate() {
        $model = new Survey;
        //for the show
        $model->user_id = 1; //= $this->loadUser(1);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //todo 提交前要对用户是否已有记录做check，如果已有记录。则更新
        if (isset($_POST['Survey'])) {
            $model->attributes = $_POST['Survey'];
            // delete or get old_id
            if ($model->save())
            //	$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('reginfo/attending'));
        }

        $this->render('ordinaryCreate', array(
            'model' => $model,
        ));
    }

}
