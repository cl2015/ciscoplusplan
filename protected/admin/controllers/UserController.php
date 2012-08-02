<?php

class UserController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    // public $layout = '//layouts/column2';

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
                'actions' => array('create', 'update', 'index', 'view', 'delete', 'phpexcels','sendEmail'),
                'users' => array('@'),
                'expression' => '$user->isRoot'
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('sendEmail', 'phpexcels', 'index'),
                'users' => array('@'),
                'expression' => '$user->isEditor'
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
        //分页方法
        $criteria = new CDbCriteria();
        $criteria->order = 't.updated_at desc';
        $criteria->limit = '1';
        $criteria->condition = 't.id=:id';
        $criteria->params = array(":id" => $id);
        $users = User::model()->with(array('payment', 'reginfo', 'survey'))->findAll($criteria);
        //var_dump($users);exit;
        $data = array(
            'model' => $users[0],
        );
        $this->render('view', $data);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;
        $reginfo = new Reginfo;
        $payment = new Payment;
        $survey = new Survey;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->code != '') {
                $model->has_code = 0; //0 有邀请码
            } else {
                $model->has_code = 1; //1 无邀请码
            }
            if (isset($_POST['Reginfo'])) {
                $reginfo->attributes = $_POST['Reginfo'];
            }
            $reginfo_user = Reginfo::model()->findbyAttributes(array('user_id' => $model->id));
            if ($reginfo_user === null) {
                $reginfo_user = $reginfo;
                $reginfo_user->user_id = $model->id;
            }
            if (isset($_POST['Payment'])) {
                $payment->attributes = $_POST['Payment'];
            }
            $Payment_user = Payment::model()->findbyAttributes(array('user_id' => $model->id));
            if ($Payment_user === null) {
                $Payment_user = $payment;
                $Payment_user->user_id = $model->id;
            }
            if (isset($_POST['Survey'])) {
                $survey->attributes = $_POST['Survey'];
            }
            $survey_user = Survey::model()->findbyAttributes(array('user_id' => $model->id));
            if ($survey_user === null) {
                $survey_user = $survey;
                $survey_user->user_id = $model->id;
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('create', array(
            'model' => $model,
            'reginfo' => $reginfo,
            'payment' => $payment,
            'survey' => $survey,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $reginfo = Reginfo::model()->findbyAttributes(array('user_id' => $id));
        $payment = Payment::model()->findbyAttributes(array('user_id' => $id));
        $survey = Survey::model()->findbyAttributes(array('user_id' => $id));
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if ($survey === null) {
            $survey = new Survey;
            $survey->user_id = $model->id;
        }
        if ($reginfo === null) {
            $reginfo = new Reginfo;
            $reginfo->user_id = $model->id;
        }
        if ($payment === null) {
            $payment = new Payment;
            $payment->user_id = $model->id;
        }
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'reginfo' => $reginfo,
            'payment' => $payment,
            'survey' => $survey,
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
            Survey::model()->deleteAll('user_id=:userid', array(':userid' => $id));
            Reginfo::model()->deleteAll('user_id=:userid', array(':userid' => $id));
            Payment::model()->deleteAll('user_id=:userid', array(':userid' => $id));

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User'])) {
            $model->attributes = $_GET['User'];
        }
        $payment_model = new Payment('search');
        $payment_model->unsetAttributes();  // clear any default values
        if (isset($_GET['Payment'])) {
            $payment_model->attributes = $_GET['Payment'];
        }
        //分页方法
        $criteria = new CDbCriteria();
        $criteria->order = 't.updated_at desc';
        $criteria->limit = '1';
        $criteria->condition = "1";
        $params = array();
        if (isset($model->id) && !empty($model->id)) {
            $criteria->condition .= " and  t.id=:id";
            $params[':id'] = $model->id;
        }
        if (isset($model->code) && !empty($model->code)) {
            $criteria->condition .= " and   t.code=:code";
            $params[':code'] = $model->code;
        }
        if (isset($model->email) && !empty($model->email)) {
            $criteria->condition .= " and   t.email=:email";
            $params[':email'] = $model->email;
        }
        if (isset($model->relation_with_cisco) && !empty($model->relation_with_cisco)) {
            $criteria->condition .= "  and  t.relation_with_cisco=:relation_with_cisco";
            $params[':relation_with_cisco'] = $model->relation_with_cisco;
        }
        if (isset($model->organisation) && !empty($model->organisation)) {
            $criteria->condition .= " and   t.organisation=:organisation";
            $params[':organisation'] = $model->organisation;
        }
        if (isset($model->full_name) && !empty($model->full_name)) {
            $criteria->condition .= " and   t.full_name=:full_name";
            $params[':full_name'] = $model->full_name;
        }
        if (isset($model->am_name) && !empty($model->am_name)) {
            $criteria->condition .= " and   t.am_name=:am_name";
            $params[':am_name'] = $model->am_name;
        }
        if (isset($model->rm_name) && !empty($model->rm_name)) {
            $criteria->condition .= " and   t.rm_name=:rm_name";
            $params[':rm_name'] = $model->rm_name;
        }
        if (isset($model->od_name) && !empty($model->od_name)) {
            $criteria->condition .= " and   t.od_name=:od_name";
            $params[':od_name'] = $model->od_name;
        }
        if (isset($payment_model->has_paid) && !empty($payment_model->has_paid)) {
            $criteria->condition .= " and   payment.has_paid=:has_paid";
            $params[':has_paid'] = $payment_model->has_paid;
        }
        $criteria->params = $params;
        $counts = User::model()->with(array('payment', 'reginfo', 'survey'))->count($criteria);
        $pageUrl = array(
            'User[id]' => $model->id,
            'User[code]' => $model->code,
            'User[email]' => $model->email,
            'User[relation_with_cisco]' => $model->relation_with_cisco,
            'User[organisation]' => $model->organisation,
            'User[full_name]' => $model->full_name,
            'User[am_name]' => $model->am_name,
            'User[rm_name]' => $model->rm_name,
            'User[od_name]' => $model->od_name,
            'Payment[has_paid]' => $payment_model->has_paid,
            'yt0' => 'Search',
        );
        $pager = new CPagination($counts);
        $pager->pageSize = 10;
        $pager->applyLimit($criteria);
        $pager->params = $pageUrl; //需要翻页时候带着的参数
        $users = User::model()->with(array('payment', 'reginfo', 'survey'))->findAll($criteria);
        $pageUrl = Yii::app()->createUrl('/user/phpexcels', $pageUrl, "&");
        $data = array(
            'users' => $users,
            'pages' => $pager,
            'model' => $model,
            'payment_model' => $payment_model,
            'log_url' => $pageUrl,
        );
        $this->render('index', $data);
    }

    public function actionPhpexcels() {
    	ini_set('memory_limit', '1280M');
    	ini_set('memory_limit', '1280M');
        //分页方法
        $criteria = new CDbCriteria();
        $criteria->order = 't.updated_at desc';
        $data_arr = User::model()->with(array('payment', 'reginfo', 'survey'))->findAll($criteria);
        $array[0][] = "参会码";
        $array[0][] = "注册状态";
        $array[0][] = "参会类型";
        $array[0][] = "邀请码";
        $array[0][] = "付款状态";
        $array[0][] = "公司名称";
        $array[0][] = "与思科公司关系";
        $array[0][] = "姓名";

        $array[0][] = "职务级别";
        $array[0][] = "部门";
        $array[0][] = "区号";
        $array[0][] = "电话";
        $array[0][] = "手机号码";
        $array[0][] = "Email";
        $array[0][] = "省份";
        $array[0][] = "城市";

        $array[0][] = "公司地址";
        $array[0][] = "AM姓名";
        $array[0][] = "AM ID";
        $array[0][] = "AM 手机";
        $array[0][] = "RM 姓名";
        $array[0][] = "RM ID";
        $array[0][] = "OD 姓名";

        $array[0][] = "分区";
        $array[0][] = "是否参加Dinner";
        $array[0][] = "是否参加ITM";
        $array[0][] = "付款金额";
        $array[0][] = "是否需要发票";
        $array[0][] = "发票抬头";
        $array[0][] = "发票内容";
        $array[0][] = "发票邮寄地址";

        $array[0][] = "发票邮寄邮编";
        $array[0][] = "发票接收人姓名";
        $array[0][] = "发票接收人电话";
        $array[0][] = "是否已开具发票";
        $i = 1;
        foreach ($data_arr as $data) {
            $array[$i][] = CHtml::encode($data->id);
            if (empty($data->has_reged) || $data->has_reged == 0) {
                $has_reged = "未注册";
            } else {
                $has_reged = '已注册';
            }
            $array[$i][] = $has_reged;
            $array[$i][] = CHtml::encode(Reginfo::model()->getOnlineText($data->reginfo['is_online']));
            $array[$i][] = CHtml::encode($data->code);
            if ($data->payment['has_paid'] == 0 || empty($data->payment['has_paid'])) {
                $has_paid = "未支付";
            } else {
                $has_paid = "已支付";
            }
            $array[$i][] = $has_paid;
            $array[$i][] = CHtml::encode($data->organisation);
            $array[$i][] = CHtml::encode(User::model()->getRelationOptionsText($data->relation_with_cisco));
            $array[$i][] = CHtml::encode($data->full_name);

            $array[$i][] = CHtml::encode(User::model()->getJobTitleText($data->job_title));
            $array[$i][] = CHtml::encode($data->department);
            $array[$i][] = CHtml::encode($data->working_phone_dis);
            $array[$i][] = CHtml::encode($data->working_phone);
            $array[$i][] = CHtml::encode($data->mobile);
            $array[$i][] = CHtml::encode($data->email);
            $array[$i][] = CHtml::encode($data->province);
            $array[$i][] = CHtml::encode($data->city);

            $array[$i][] = CHtml::encode($data->organisation);
            $array[$i][] = CHtml::encode($data->am_name);
            $array[$i][] = CHtml::encode($data->am_id);
            $array[$i][] = CHtml::encode($data->am_mobile);
            $array[$i][] = CHtml::encode($data->rm_name);
            $array[$i][] = CHtml::encode($data->rm_id);
            $array[$i][] = CHtml::encode($data->od_name);
            $array[$i][] = CHtml::encode($data->diff);

            $array[$i][] = CHtml::encode($data->MAIL_ZIP);
            $array[$i][] = CHtml::encode($data->MAIL_COUNTRY);
            $array[$i][] = CHtml::encode($data->reginfo['paid_amount']);
            if ($data->payment['is_invoice'] == 0) {
                $is_invoice= "不需要";
            } else {
                $is_invoice= "需要开具发票";
            }
            $array[$i][] = $is_invoice;
            $array[$i][] = CHtml::encode($data->payment['invoice_title']);
            $array[$i][] = CHtml::encode($data->payment['invoice_content']);
            $array[$i][] = CHtml::encode($data->payment['recipient_add']);

            $array[$i][] = CHtml::encode($data->payment['zip_code']);
            $array[$i][] = CHtml::encode($data->payment['recipient_name']);
            $array[$i][] = CHtml::encode($data->payment['phone']);
            if($data->payment['has_sendinvoice']==0){$has_sendinvoice="未开具发票";}else{$has_sendinvoice= "已开具发票";}
            $array[$i][] = $has_sendinvoice;
            $i++;
        }
        Yii::import('application.extensions.phpexcel.JPhpExcel');
        $xls = new JPhpExcel('UTF-8', false, 'cisco_reginfo');
        $xls->addArray($array);
        $xls->generateXML('cisco_reginfo');
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

    public function actionSendEmail() {
        $model = new User;
        $message = '';
        $model->setScenario('sendemail');
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $user = User::model()->findByAttributes(array('email' => $model->email, 'code' => $model->code));
            $this->setLanguage($model->language);
            if ($user === null) {
                $message = "不存在此用户";
            } else {
                $reginfo = Reginfo::model()->findByAttributes(array('user_id' => $model->id));
                if($reginfo===null){
                    $reginfo=new Reginfo;
                }
                $this->sendMail('email', $user->email, $user->cc, $user,$reginfo);
            }
        }
        $this->render('sendEmail', array(
            'model' => $model,
            'message' => $message,
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

    public function setLanguage($language) {
        if (in_array($language, array('zh_cn', 'en_us', 'en'))) {
            $session = new CHttpSession;
            $session->open();
            $session['language'] = $language;
            Yii::app()->language = $language;
        }
        return true;
    }

    public function actionLanguage($language) {
        $this->setLanguage($language);
        if (CHttpRequest::getUrlReferrer() == null || CHttpRequest::getUrlReferrer() == 'http://223.4.134.123/index.php?r=user/loading&language=zh_cn') {
            $this->redirect(array('user/loading'));
        } else {
            $this->redirect(CHttpRequest::getUrlReferrer());
        }
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

}
