<?php

class ReginfoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/front';
    public $_user = null;

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
            array('allow',
                'actions' => array('test', 'earlyConfirmation', 'pay'),
                'users' => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('attending', 'receivegegpay', 'payment', 'nominationConfirmation', 'employeeConfirmation', 'ordinaryConfirmation', 'attendeeConfirmation', 'pay', 'payOnline','unpayConfirmation'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'attending', 'payment', 'pay', 'confirmation', 'ordinaryConfirmation', 'pay'),
                'users' => array('admin'),
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
        $model = new Reginfo;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Reginfo'])) {
            $model->attributes = $_POST['Reginfo'];
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
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Reginfo'])) {
            $model->attributes = $_POST['Reginfo'];
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
        $dataProvider = new CActiveDataProvider('Reginfo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Reginfo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reginfo']))
            $model->attributes = $_GET['Reginfo'];

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
        $model = Reginfo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'reginfo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAttending() {
        $user = $this->loadUser(Yii::app()->user->id);
        $model = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($model === null) {
            $model = new Reginfo;
            $model->user_id = $user->id;
        }
        $model->setScenario('attending');
        if (isset($_POST['Reginfo'])) {
            $model->attributes = $_POST['Reginfo'];
            //close onsite login
            if(!$model->is_online == 0){
            	$this->redirect(array('site/index'));
				Yii::app()->end();
            }
            
            if ($model->save()) {
                if ($model->is_online == 0) {
                    $this->redirect(array('attendeeConfirmation'));
                } else {
                    $this->redirect(array('payment'));
                }
            }
        }
        $this->render('attending', array('model' => $model));
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

    public function actionPayment() {
        $user = $this->loadUser(Yii::app()->user->id);
        $model = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        $payment = Payment::model()->findbyAttributes(array('user_id' => $user->id));
        if ($model === null) {
            $model = new Reginfo;
            $model->user_id = $user->id;
        }
        if ($payment === null) {
            $payment = new Payment('create');
            $payment->user_id = $user->id;
        }
        $model->setScenario('payment');
        if (isset($_POST['Reginfo']) && isset($_POST['Payment'])) {
            $model->attributes = $_POST['Reginfo'];
            $paymenttype=$model->payment_type;
            $payment->attributes = $_POST['Payment'];
            $model->user_id = $user->id;
            $payment->user_id = $user->id;
            if ($model->validate() && $payment->validate()) {
                if ($model->save() && $payment->save()) {
                    if ($paymenttype != 2) {
                        $this->redirect(array('reginfo/unpayConfirmation'));
                    } else {
                        $this->redirect(array('reginfo/payOnline'));
                    }
                }
            }
        }

        $this->render('payment', array('model' => $model, 'payment' => $payment));
    }

    public function actionUnpayConfirmation(){
        $user = $this->loadUser(Yii::app()->user->id);
        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
        $this->sendMail('email_false',$user->email, $user->cc, $user, $reginfo);
        $this->sendSms($user, $reginfo);
        $this->render('unpayConfirmation', array('model' => $user, 'reginfo' => $reginfo));
    }
    public function actionConfirmation() {
        $user = $this->loadUser(Yii::app()->user->id);
       // $this->sendMail('email','li.he@brightac.com.cn', 'cranelee@gmail.com', $user);
        $this->render('confirmation', array('user' => $user));
    }

    public function actionPay() {
        $model = new Reginfo('pay');
        $user = $this->loadUser(Yii::app()->user->id);
        $model->user_id = Yii::app()->user->id;
        if (isset($_POST['Reginfo'])) {
            $model->attributes = $_POST['Reginfo'];
            if ($model->validate()) {
                $this->redirect(array('ordinaryConfirmation'));
                return;
            }
        }
        $this->render('pay', array('model' => $model));
    }

    public function actionPayOnline() {
        $user = $this->loadUser(Yii::app()->user->id);
        $model = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        $this->layout = false;
        $this->render('payOnline', array('model' => $model));
    }

    public function actionReceivegegpay() {
        //****************************************	//MD5密钥要跟订单提交页相同，如Send.asp里的 key = "test" ,修改""号内 test 为您的密钥
        //如果您还没有设置MD5密钥请登陆我们为您提供商户后台，地址：https://merchant3.chinabank.com.cn/
        $key = 'makexiaoyi123456';  //登陆后在上面的导航栏里可能找到“B2C”，在二级导航栏里有“MD5密钥设置”
        //建议您设置一个16位以上的密钥或更高，密钥最多64位，但设置16位已经足够了
        //****************************************

        $v_oid = trim($_POST['v_oid']);       // 商户发送的v_oid定单编号
        $v_pmode = trim($_POST['v_pmode']);    // 支付方式（字符串）
        $v_pstatus = trim($_POST['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
        $v_pstring = trim($_POST['v_pstring']);   // 支付结果信息 ： 支付完成（当v_pstatus=20时）；失败原因（当v_pstatus=30时,字符串）；
        $v_amount = trim($_POST['v_amount']);     // 订单实际支付金额
        $v_moneytype = trim($_POST['v_moneytype']); //订单实际支付币种
        $v_md5str = trim($_POST['v_md5str']);   //拼凑后的MD5校验值

        /**
         * 重新计算md5的值
         */
        $md5string = strtoupper(md5($v_oid . $v_pstatus . $v_amount . $v_moneytype . $key));

        /**
         * 判断返回信息，如果支付成功，并且支付结果可信，则做进一步的处理
         */
        $user = $this->loadUser(Yii::app()->user->id);
        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
        if ($v_md5str == $md5string) {
            $id = $v_oid;
            $model = Reginfo::model()->findbyPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
            if ($v_pstatus == "20") {
                $payment=Payment::model()->findbyAttributes(array('user_id' => $user->id));
                $payment->has_paid=1;
                $payment->save();
                $this->redirect(array('reginfo/ordinaryConfirmation','model' => $user, 'reginfo' => $reginfo));
                //支付成功，可进行逻辑处理！
                //商户系统的逻辑处理（例如判断金额，判断支付状态，更新订单状态等等）......
                //echo "支付成功";
            } else {
                $model->is_online = 3; //在线支付失败
                $model->save();
                $this->sendMail('email',$user->email, $user->cc, $user, $reginfo);
                $this->sendSms($user, $reginfo);
                $this->render('regpayfalse', array('model' => $user, 'reginfo' => $reginfo));
                //echo "支付失败";
            }
        } else {
            echo "<br>校验失败,数据可疑";
        }
    }

    public function actionNominationConfirmation() {

        $user = $this->loadUser(Yii::app()->user->id);

        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
         $this->sendMail('email',$user->email, $user->cc, $user, $reginfo);
         $this->sendSms($user, $reginfo);
        $this->render('nominationConfirmation', array('model' => $user, 'reginfo' => $reginfo));
    }

    public function actionEmployeeConfirmation() {
        $user = $this->loadUser(Yii::app()->user->id);

        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
        $this->sendMail('email',$user->email, $user->cc, $user, $reginfo);
        $this->sendSms($user, $reginfo);
        $this->render('employeeConfirmation', array('model' => $user, 'reginfo' => $reginfo));
    }

    public function actionOrdinaryConfirmation() {
        $user = $this->loadUser(Yii::app()->user->id);
        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
        $this->sendMail('email',$user->email, $user->cc, $user, $reginfo);
        $this->sendSms($user, $reginfo);
        $this->render('ordinaryConfirmation', array('model' => $user, 'reginfo' => $reginfo));
    }

    public function actionAttendeeConfirmation() {
        $user = $this->loadUser(Yii::app()->user->id);
        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
        $this->sendMail('email',$user->email, $user->cc, $user, $reginfo);
        $this->sendSms($user, $reginfo);
        $this->render('attendeeConfirmation', array('model' => $user, 'reginfo' => $reginfo));
    }

    public function actionEarlyConfirmation() {
        $user = $this->loadUser(Yii::app()->user->id);
        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $user->id));
        if ($reginfo === null) {
            $reginfo = new Reginfo();
            $reginfo->user_id = $user->id;
            $reginfo->save();
        }
        $this->render('earlyConfirmation', array('model' => $user, 'reginfo' => $reginfo));
    }

}
