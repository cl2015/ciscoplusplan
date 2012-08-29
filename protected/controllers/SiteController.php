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
    
    public function actionTest() {
    	//Cisco Plus Sponsors CODE统计_0827_V2_for 李贺
    	/**
    	$sponsors = array(
    			"Intel	0	2	intl",
    			"DC	30	15	dcdc",
    			"Citrix	30	15	ctrx",
    			"APC	20	10	apcc",
    			"ECCOM	5	10	ecco",
    			"Ingram Micro	44	14	igmc",
    			"Didata	15	10	dida",
    			"Panduit	14	11	pand",
    			"Macroview	15	15	macr",
    			"Vega	20	11	vega");
    	
    	foreach($sponsors as $sponsor){
    		$index = 1000;
    		$sponsor_arr = explode("\t", $sponsor);
    		for($i=0;$i<$sponsor_arr[1];$i++){
    			//echo $sponsor ."\t" . $sponsor_arr[3].$index . "<br/>" ;
    			$index++;
    		}
    	}
    	foreach($sponsors as $sponsor){
    		$index = "0000";
    		$sponsor_arr = explode("\t", $sponsor);
    		for($i=0;$i<$sponsor_arr[2];$i++){
    			//echo $sponsor ."\t" . $sponsor_arr[3].$index . "<br/>" ;
    		}
    	}
    	*/
//     	//0829
//     	$nom = array(
//     			"LENT	Danny Zhao	186331	13903071617	jiazhao	wenyong	80524	William Ho	154478	10",
//     	);
//     	foreach($nom as $item){
//     		$arr = explode("\t", $item);
//     		for($i=0;$i<$arr[9];$i++){
//     			echo $item . "</br>";
//     		}
//     	}
    	//0829
//     	$nom = array(
//     				"James Yang	zhayang	18688922571	Service	Kenneth NG	Kenneng	Beth Xu	bxu	20",
//     	);
//     	foreach($nom as $item){
//     		$arr = explode("\t", $item);
//     		for($i=0;$i<$arr[8];$i++){
//     			echo $item . "</br>";
//     		}
//     	}

    	//(*)AM姓名	(*)AM ID	(*)AM 手机	(*)AM部门	(*)RM姓名	(*)RM ID	(*)OD姓名	(*)OD ID
    	$nom = array(
    			"Mandy Xiao	jiaxiao	18621363889	PBG	Arnold Sun 	arsun	Patrick Shao	pshao	19",
"Angela Shen	rushen	18601362025	PBG	Arnold Sun 	arsun	Patrick Shao	pshao	58",
"Anita	anishen	13926089966	PBG	tonyliu	tliu	William Ho	wiho	13",
"Gary Xu	haixu	13822295102	SE	Ma du	duma	william Ho	wiho	8",
"Robin Chen	lumichen	13925010260	SE	Aivy Tan	aivtan	William Ho	wiho	5",
"Zhang Bin	binzhan	18666094872	SE	zheng jun	junzheng	Jerry Fan	jfan	19",
"Vincent Chen	vincentc	13322800930	SE	Ma du	duma	william Ho	wiho	32",
"Tony Hu	tonhu	13322800727	SE	Ma du	duma	William Ho	wiho	17",
"Jia Peng	pejia	18602010345	SE	刘湘晖	tliu	何达	wiho 	8",
"Mandy Huang	manhuang	18688862842	SE	Ervin Wen	wenyong	William Ho	wiho	10",
"Liu Yun	yunliu2	18677184618	SE	tony  liu	tliu	William Ho 	wiho	7",
    	);
    $index = 2964;
    	foreach($nom as $item){
    		$arr = explode("\t", $item);
    		for($i=0;$i<$arr[8];$i++){
    			echo 
    			$arr[0] . ";"//am name
    			.$arr[1] . ";"//am id
    			.$arr[2] . ";"//mobile
    			.$arr[3] . ";"//am depart
    			.$arr[4] . ";"//rm name
    			.$arr[5] . ";"//rm id
    			.$arr[6] . ";"//od name
    			.$arr[7] . ";"//od id
    			."nom$index" . ";"//code
    			. "</br>";
    			
//     			echo "insert into users
//     			(diff,cc,am_name,am_id,am_mobile,rm_name,rm_id,od_name,od_id,code,type_id) 
//     			values('$arr[3]','$arr[1]@cisco.com','$arr[0]','$arr[1]','$arr[2]','$arr[4]','$arr[5]','$arr[6]','$arr[7]','nom$index',1);";
    			$index++;
    		}
    	}
		exit;
    }
    
    public function actionMakeUsers() {
    	//echo floor(microtime()*1000);
    	set_time_limit(0);
    	ini_set('memory_limit','16M');
    	$users = User::model()->findAll();
    	$code = 2400;
    	foreach($users as $user){
    		echo 'user id is : ' . $user->id . ' </br>' ;
    		for($i=0;$i<$user->ec_mobile+3;$i++){
    			try{
    				echo $i . ' </br>';
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
