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
    	header("Content-type:text/html;charset=utf8");
    	$index = 5880;
    	$nom="East-PS	Kathy Chen	kathyche	John Xu	junhxu	Fei Wang	feiwang2	50
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Sichen Fan	sicfan	40
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Ray Zhang	rayzhan	60
East-PS	Kathy Chen	kathyche	John Xu	junhxu	王宏志	jameswan	90
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Yongchi Liu	yongcliu	80
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Wang Chuanjiang	chuawang	90
East-PS	Kathy Chen	kathyche	John Xu	junhxu	xiao hui wei	xiaohwei	140
East-PS	Kathy Chen	kathyche	John Xu	junhxu	鞠炜	weju	30
East-FSI	Kathy Chen	kathyche	Stanley Yuan	styuan	俞昊	hyu2	20
Partners					YU LU	luy2	40
Partners					G-sight		20
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Brenda Chen	brechen	70
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Elle Qian	xiaqian	70
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Zhou Hao Dong	haodzhou	140
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Ivy Chen	shutoche	60
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Eileen Xu	lingxu	40
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Sarah Yang	Saryang	90
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Larry Lu	lelu	50
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Grace Zhang	qiazhan2	50
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Norway Chen	cguowei	90
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Eva Xue	huaxue	90
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Tom Xiong	guxiong	60
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Catherine Mu	limu	50
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Sandy Shao	sashao	70
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Zhang Jing	jzhang4	60
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Yao chenyi	cheyao	80
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	LiangYuDong	yudliang	130
TA	袁惠良	huilyuan	茹伟杰	wru	段义军	yiduan	10
TA	袁惠良	huilyuan	茹伟杰	wru	陶如刚	rutao	10
Partners					Nancy Liu	yunli	20
SP	Ben Wu	wub	Vicky Chang	vichang	Lydia Gong	lydgong	20
SP	Charles Mah	chmah	Chen Bin	binche	邱硕	qiushuo	20
SP	Charles Mah	chmah	Chen Bin	binche	张晓和	alvinzh	10
SP	Charles Mah	chmah	Chen Bin	binche	陈磊	lechen2	10
SP	Charles Mah	chmah	Chen Bin	binche	杨静	jingya	60
SP					刘史铭	shimliu	30
SP					王林	wanglin	30
SP					程展	zhacheng	10
SP					钟佩琦	pezhong	10
SP	王敏	raymondw	Xurong Huang	xurhuang	Su Quandao	squandao	30
SP	王敏	raymondw	raymond wang	raymondw	Zhuping Wang	zhupwang	10
SP					李杰	lijie	20
SP	王敏	raymondw	Yuanyu Bai	yuabai	彭杰中	jiezpeng	10
SP	林小平	norlam	刘水蓉	rongliu	马名裔	mingyma	20
SP					黄晔	yehuang	20
SP	Ben Wu	wub	Vicky Chang	vichang	Claire Zhao	zhmei	10
SP	ben wu	wub	Derek Tse	dtse	赵明亮	zhaom	10
SP	Polly Wang	powang	Vicky Chang	vichang	shendong	shendong	30
Partners					杨惠莉	huilyang	70
 Inside Sales	Hai Guangyue	guahai	Xiao Jihan	Johnsxia	Chen Ying	yingche2	10
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	朱卫东	weidzhu	10
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	袁奇	jeyuen	60
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	陈念	niachen	40
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	姜业普	yejiang	60
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	徐舒	shux	20
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	严宇杰	yuyan	30
ZJ Team	kathy chen	kathyche 	Kevin wang	wangzx	刘攀	panliu	30";
    	$this->makeNom($nom, $index);
    	/**
    	$index = 5760;
    	$nom="ZJ Team	Kathy Chen	Kathyche	Kavin Wang	wangzx	胡文钦	hwenqin@cisco.com	50
ZJ Team	Kathy Chen	kathyche			彭芬	fepeng@cisco.com	70";
    	$this->makeNom($nom, $index);
    	//2013-05-07
    	$nom ="East-PS	Kathy Chen	kathyche	John Xu	junhxu	Sichen Fan	sicfan@cisco.com	30
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Yao chenyi	cheyao@cisco.com	60
Website					Biankai	kbian@cisco.com	20";
    	$this->makeNom($nom, 5650);//next 5760
    	
    	$sponsor_str = "英特尔Intel	10	5	Inte
神州数码Digital China	40	40	dcdc
思杰Citrix	40	40	citr
晓通网络XiaoTong	30	30	xiao
施耐德APC	20	20	apcc
华讯ECCOM	20	20	ecco
英迈Ingram Micro	20	20	ingr
Vmware	20	20	wmwa
NetApp	20	20	neta
联强国际synnex	20	20	synn
达科Didata	20	20	dida
泰科电子TE	20	20	tete
泛达Panduit	20	20	pand
尚阳Systec	20	20	syst
软盛Runsn	20	20	runs
紫越科技	20	20	ziyu
Active Power	20	20	acti
IXIA	20	20	ixia";
    	$sponsors = explode("\n",$sponsor_str);
    	
    	foreach($sponsors as $sponsor){
    		$index = 1000;
    		$sponsor_arr = explode("\t", $sponsor);
    		for($i=0;$i<$sponsor_arr[1];$i++){
    			echo $sponsor ."\t" . $sponsor_arr[3].$index . "<br/>" ;
    			$index++;
    		}
    		$same_index = "0000";
    		$sponsor_arr = explode("\t", $sponsor);
    		for($i=0;$i<$sponsor_arr[2];$i++){
    			echo $sponsor ."\t" . $sponsor_arr[3].$same_index . "<br/>" ;
    		}
    	}
    	exit;
    	
    	//2013-04-26
    	$nom="SP	Ben Wu	wub	Derek Tse	dtse	Stacey	xigeng@cisco.com	10
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Sichen Fan	sicfan@cisco.com	60";
    	$this->makeNom($nom, 5580);//next 5650
    	
    	//2013-04-24
    	$nom = "";
    	$this->makeNom($nom, 1000,'weibo');
    	$nom = "Partners					Luo Yihua	huayluo	90
Partners					王晓娜	xiaonwan	50
Partners					富月	yufu	20
Partners					李新田	xintili	40
Partners					Nancy Liu	yunli	80
Partners					Mei Hengbin	hemei	80
Partners					Xiang Jian	jixiang	100
Partners					徐思		50
Partners					杨惠莉	huilyang	80
Partners					于露	luy2	80
SP	Norman Lam	norlam	Jerry Feng	zhfeng	Pai Peng	papeng@cisco.com	10
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Sandy Shao	sashao	10";
    	$this->makeNom($nom, 4890);//next 
		//2013-4-22
		$nom = "SP	Charles Mah	chmah	Chen Bin	binche	张晓和	alvinzh	10
SP	Charles Mah	chmah	Chen Bin	binche	杨静	jingya	40
SP	Ben Wu	wub	Vicky Chang	vichang	Claire Zhao	zhmei	20
SP	Ben Wu	wub	Vicky Chang	vichang	Chengguo Shan	chenggs	50
SP	Ben Wu	wub	Vicky Chang	vichang	Xi Chen	xic2	10
SP	Ben Wu	wub	Vicky Chang	vichang	Pan Hongbo	panpa	20
SP	Norman Lam	norlam	叶勇	yongye	张伟	wzhang3	10
SP	Norman Lam	norlam	叶勇	yongye	李娜	lindali	10
SP	Norman Lam	norlam	叶勇	yongye	葛全睿	garge	10
SP	Norman Lam	norlam	叶勇	yongye	张明义	mingyi	10
East-LENT	Karthy Chen	kathyche	Robert Jin	rjin	Frank Yang	frayang	40
East-COMM A	Kathy chen	kathyche	Richard Yen	ricyen	xuqin	xuqin	110
East-COMM A	Kathy Chen	kathyche	Richard yen	ricyen	zhu jinsong	jingszhu	50
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	陈念	niachen	30
East-FSI	kathy chen	kathyche	stanley	styuan	maggie	maxie	30";
		$this->makeNom($nom, 4440);//next 4890    	
    	//2013-4-19
    	$nom = "East-LENT	Kathy Chen	kathyche	Robert Jin	rjin	Michael Xu	mzhxu	50
East-LENT	Kathy Chen	kathyche	Robert Jin	rjin	Arthur Wang	arwang2@cisco.com	40
East-LENT	Karthy Chen	kathyche	Robert Jin	rjin	Tang Xiaoxing	statang@cisco.com	50
East-LENT	Karthy Chen	kathyche	Robert Jin	rjin	ANSON TANG	anstang	40
East-COMM A	Kathy Chen	kathyche	Richard Yen	ricyen	Ben Chen	jiach@cisco.com	50
East-COMM A	Kathy Chen	kathyche	Richard Yen	ricyen	Tian Bo	botian@cisco.com	160
East-COMM A	Kathy Chen	kathyche 	Richard Yen	ricyen	Xu Hao	haxu2@cisco.com	90
East-COMM A	Kathy Chen	kathyche	Richard Yen	ricyen	Yang Lei	leiya2@cisco.com	60
East-COMM A	Kathy Chen	kathyche	Richard yen	ricyen	Ying Tang	yingtang@cisco.com	130
East-COMM A	Kathy chen	kathyche	Richard yen	ricyen	仇星	qxing@cisco.com	50
East-COMM A	Kathy Kui Chen	kathyche	Richard Yen	ricyen	吕萍	pilu	60
East-COMM A	Kathy Chen	kathyche	Richard yen	ricyen	Alec Wei	alewei@cisco.com	90";
    	$this->makeNom($nom, 3570);//next 4440
    	//2013-04-18
    	$nom = "					weibo		10";
    	$this->makeNom($nom, 1000,'weibo');
    	$nom = "SP	Charles Mah	chmah	Chen Bin	binche	邱硕	qiushuo	20
SP	Charles Mah	chmah	Chen Bin	binche	张晓和	alvinzh	10
SP	Charles Mah	chmah	Chen Bin	binche	陈磊	lechen2	10
SP	Charles Mah	chmah	Chen Bin	binche	杨静	jingya	60
SP					刘史铭	shimliu	30
SP					王林	wanglin	30
SP					程展	zhacheng	10
SP					钟佩琦	pezhong	10
SP	王敏	raymondw	Xurong Huang	xurhuang	Su Quandao	squandao	30
SP	王敏	raymondw	raymond wang	raymondw	Zhuping Wang	zhupwang	10
SP					李杰	lijie	20
SP	王敏	raymondw	Yuanyu Bai	yuabai	彭杰中	jiezpeng	10
SP	林小平	norlam	刘水蓉	rongliu	马名裔	mingyma	20
SP					黄晔	yehuang	20
SP	Ben Wu	wub	Vicky Chang	vichang	Claire Zhao	zhmei	10
SP	ben wu	wub	Derek Tse	dtse	赵明亮	zhaom	10
SP	Polly Wang	powang	Vicky Chang	vichang	shendong	shendong	30
Partners					杨惠莉	huilyang	70
 Inside Sales	Hai Guangyue	guahai	Xiao Jihan	Johnsxia	Chen Ying	yingche2	10
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	朱卫东	weidzhu	10
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	袁奇	jeyuen	60
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	陈念	niachen	40
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	姜业普	yejiang	60
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	徐舒	shux	20
JS Team	Kathy Chen	kathyche	Wang jianquan	wangje	严宇杰	yuyan	30
ZJ Team	kathy chen	kathyche 	Kevin wang	wangzx	刘攀	panliu	30";
    	$this->makeNom($nom, 1770);//next 2440
    	//2013-04-17
    	$nom = "TA	袁惠良	huilyuan	茹伟杰	wru	段义军	yiduan	10
TA	袁惠良	huilyuan	茹伟杰	wru	陶如刚	rutao	10
Partners					Nancy Liu	yunli	20
SP	Ben Wu	wub	Vicky Chang	vichang	Lydia Gong	lydgong	20";
    	$this->makeNom($nom, 1710);//next 1770
    	//2013-04-16
		$nom =     "East-PS	Kathy Chen	kathyche	John Xu	junhxu	Fei Wang	feiwang2	50
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Sichen Fan	sicfan	40
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Ray Zhang	rayzhan	60
East-PS	Kathy Chen	kathyche	John Xu	junhxu	王宏志	jameswan	90
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Yongchi Liu	yongcliu	80
East-PS	Kathy Chen	kathyche	John Xu	junhxu	Wang Chuanjiang	chuawang	90
East-PS	Kathy Chen	kathyche	John Xu	junhxu	xiao hui wei	xiaohwei	140
East-PS	Kathy Chen	kathyche	John Xu	junhxu	鞠炜	weju	30
East-FSI	Kathy Chen	kathyche	Stanley Yuan	styuan	俞昊	hyu2	20
Partners					YU LU	luy2	40
Partners					G-sight		20
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Brenda Chen	brechen	70
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Elle Qian	xiaqian	70
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Zhou Hao Dong	haodzhou	140
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Ivy Chen	shutoche	60
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Eileen Xu	lingxu	40
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Sarah Yang	Saryang	90
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Larry Lu	lelu	50
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Grace Zhang	qiazhan2	50
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Norway Chen	cguowei	90
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Eva Xue	huaxue	90
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Tom Xiong	guxiong	60
East-COMM B	kathy Chen	kathyche	Stone Chen	stonchen	Catherine Mu	limu	50
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Sandy Shao	sashao	70
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Zhang Jing	jzhang4	60
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	Yao chenyi	cheyao	80
East-COMM B	Kathy Chen	kathyche	Stone Chen	stonchen	LiangYuDong	yudliang	130"	;
		
		$this->makeNom($nom, 1710);   //next 1710
    	
    	$this->makeSameInternal(200,1200);//next 1201
//2013-04-13
    	$this->makeInternal(200,1000);//next 1200
$nom = "East-Others	Hai Guangyue	guahai	Xiao Jihan	Johnsxia	Chen Ying	yingche2	10
East-FSI	kathy chen	kathyche	Stanley yuan	styuan	陈晓	robertcx	10
East-FSI	Kathy Chen	kathyche	Stanley Yuan	styuan	张勇进	yongjzha	10
East-FSI	kathy chen	kathyche	stanley yuan	styuan	Heidi Huang	haihhuan	10
East-Others	Chen kui	kathyche	Wang jianquan	wangje	朱卫东	weidzhu	10
East-Others	Chen kui	kathyche	Wang jianquan	wangje	袁奇	jeyuen	60
East-Others	Chen kui	kathyche	Wang jianquan	wangje	陈念	niachen	50
East-Others	Chen kui	kathyche	Wang jianquan	wangje	姜业普	yejiang	60
East-Others	Chen kui	kathyche	Wang jianquan	wangje	徐舒	shux	10
East-Others	Chen kui	kathyche	Wang jianquan	wangje	严宇杰	yuyan	50
Partners					Luo Yihua	huayluo	20
Partners					富月	yufu	20
Partners					王晓娜	xiaonwan	20
Partners					Mei Hengbin	hemei	40
Partners					Guan Di	diguan	10
SP	Ben Wu	wub	Michael Mi	qimi	Jingjia Liu	jingjliu	10
Partners					李新田	xintili	30
Partners					Xiang Jian	jixiang	60
East-Others	kathy chen	kathyche 	Kevin wang	wangzx	刘攀	panliu	30
East-FSI	chen Kui Kathy	kathyche	Stanley Yuan	styuan	徐毅平	xuyiping	50
TA			Jingdong Li	jdli@cisco.com	biljiang	biljiang	10
TA			XIAOYU LIU	xiaoyliu	Tracy Feng	trfeng	30
TA			Jingdong Li	jdli@cisco.com	Chloe Kang	wenkang	30
TA			Rujun Zhong	rjzhong	Lu Ping	pinglu	30
TA			Rujun Zhong	rjzhong	陆燕	yalu	10
TA			Rujun Zhong	rjzhong	王峰	fengwan2	20
TA			Rujun Zhong	rjzhong	Charles Jun Qian	juqian	10";
$this->makeNom($nom, 1000);   //next 1710 	
//2012-11-15
$nom="Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	李刚	gali2@cisco.com	80
Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	戚宏飞	honqi@cisco.com	80
TA	Jerry Fan	jfan@cisco.com	Peng Yuan	yuapeng@cisco.com	Zhang Yu	yuzhan3@cisco.com	20
TA	Jerry Fan	jfan@cisco.com	Zhong Lizhan	lizzhong@cisco.com	Li Jingdong	jdli@cisco.com	20";
$this->makeNom($nom, 2980);
//2012-11-14
$nom = "					Yurong Zhou	rozhou@cisco.com	100";
$this->makeNom($nom,1200,'part');
//2012.11.14
    	echo 'insert into users (code,type_id,am_name,am) values ';
    	for($i=0;$i<400;$i++){
    		echo "('sino9999',2,'Sinobase','jane_yang'),";
    	}
//2012.11.12
$nom  = "					Yurong Zhou	rozhou@cisco.com	150";
$this->makeNom($nom, 1050,'part');  
  		//2012-11-07
		$nom = "SP	norman lam	norlam@cisco.com	刘水蓉	rongliu@cisco.com	马名裔	mingyma@cisco.com	50";
		$this->makeNom($nom,2880);//next 2930
    	
    	echo 'insert into users (code,type_id,am_id,am_name) values ';
    	$index = 9999;
    	for($i=0;$i<300;$i++){
    		echo "('nova$index',1,'novagin','novagin'),";
    	}
    	//2012-10-30
		$nom = "Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	张涛	taozhang@cisco.com	100
Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	陈岭生	Ischen@cisco.com	50
					Service		50
					Angela		20";
		$this->makeNom($nom,2660);//next 2880
    	
    	//2012-10-25 nom
    	$nom="SP	Norman Lan	norlam@cisco.com	Kathy Liu	rongliu@cisco.com	Eric Wang	erwang2@cisco.com	50
SP	Charles Mah	chmah@cisco.com	Hua Lu	luhua@cisco.com	詹宁	nzhan@cisco.com	50
SP	Min Wang	raymondw@cisco.com	Xurong Huang	xurhuang@cisco.com	Su Quandao	squandao@cisco.com	50
SP	Ben Wu	wub@cisco.com	Vicky Chang	vichang@cisco.com	潘洪波	panpa@cisco.com	50";
    	$this->makeNom($nom, 2460);//next 2660
    	
    	//2012-10-25 int
    	echo 'insert into users (code,type_id,diff) values ';
    	for($i=0;$i<200;$i++){
    		echo "('inter9999',2,'inter'),";
    	}
    	//2012-10-24 nom
    	echo 'insert into users (code,type_id) values ';
    	$index = 1000;
    	for($i=0;$i<30;$i++){
    		echo "('tigg$index',1),";
    		//,('vmwa$index',1),";
    		//('tigg0000',1),";
    		//echo "('dcdc$index',1),('ctrx$index',1),('xiao$index',1),";
    		$index++ ;
    	}
		$nom = "					novagin	he.li@mdigi.cc	400";
		$this->makeNom($nom, 1000,'nova');    	
    	$nom = "					Yurong Zhou	rozhou@cisco.com	50";
    	$this->makeNom($nom, 1000,'part');
    	
    	$nom = "					Lilian Lu	xiaojilu@cisco.com	50";
    	$this->makeNom($nom, 1000,'ccie');
//     	$nom = "Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	戚宏飞	honqi@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	陈岭生	Ischen@cisco.com	50";
//     	$this->makeNom($nom, 2360);//next 2460
    	//2012-10-19 nom
//     	$nom = "Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	王新	xinwang2@cisco.com	200
// Shan Xi\He Nan	Johnny Chen	Johnnyzc@cisco.com	Huang Bin	binhuan@cisco.com	谭超	tchao@ciscosbsa.com	50
// TA	Frank Liu	liufrank@cisco.com	zhong ru jun	rjzhong@cisco.com	Luohao	haoluo@cisco.com	50";
//     	$this->makeNom($nom, 2060);//next 2360
    	//2012-10-18 internal
// 		$this->makeSameInternal(30, 1066);//next 1067
// 		$this->makeInternal(66,1000);//next 1066
// 		exit();    	
    	
		//2012-10-18 nom
// 		$nom = "Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	张惺	xingzha@cisco.com	60
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	戚宏飞	honqi@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	张涛	taozhang@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	王新	xinwang2@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	李刚	gali2@cisco.com	50";
// 		$this->makeNom($nom, 1800);//next 2060

    	
//     	header("Content-Disposition:attachment; filename=导出.xls");//文件名
//     	header("Content-type:application/vnd.ms-excel;charset=utf8"); //表示输出Excel文件
    	//2012-10-16 nom
//     	$nom = "Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	张惺	xingzha@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	戚宏飞	honqi@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	张涛	taozhang@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	王新	xinwang2@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	李刚	gali2@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	帅炜	wshuai@cisco.com	50
// Hu Bei\Hu Nan	Johnny Chen	Johnnyzc@cisco.com	Michael Sun	yosun@cisco.com	陈岭生	Ischen@cisco.com	50
// An Hui\Jiang Xi	Johnny Chen	Johnnyzc@cisco.com	Wu Ke Ping	kepwu@cisco.com	安斐	feian@cisco.com	50
// An Hui\Jiang Xi	Johnny Chen	Johnnyzc@cisco.com	Wu Ke Ping	kepwu@cisco.com	古效文	xiaogu@cisco.com	50
// An Hui\Jiang Xi	Johnny Chen	Johnnyzc@cisco.com	Wu Ke Ping	kepwu@cisco.com	李松	songli@cisco.com	50
// An Hui\Jiang Xi	Johnny Chen	Johnnyzc@cisco.com	Wu Ke Ping	kepwu@cisco.com	姚诚	chyao@cisco.com	50
// Shan Xi\He Nan	Johnny Chen	Johnnyzc@cisco.com	Huang Bin	binhuan@cisco.com	赵树中	shuzhao@cisco.com	50
// Shan Xi\He Nan	Johnny Chen	Johnnyzc@cisco.com	Huang Bin	binhuan@cisco.com	蒋国华	guohjian@cisco.com	50
// Shan Xi\He Nan	Johnny Chen	Johnnyzc@cisco.com	Huang Bin	binhuan@cisco.com	孔燕	kongyan@cisco.com	50
// Shan Xi\He Nan	Johnny Chen	Johnnyzc@cisco.com	Huang Bin	binhuan@cisco.com	汪笑夏	xiaoxwan@cisco.com	50
// Shan Xi\He Nan	Johnny Chen	Johnnyzc@cisco.com	Huang Bin	binhuan@cisco.com	张凯	kaizh@cisco.com	50";
//    	$this->makeNom($nom, 1000);
    	
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
//     	$nom = array(
//     			"Mandy Xiao	jiaxiao	18621363889	PBG	Arnold Sun 	arsun	Patrick Shao	pshao	19",
// "Angela Shen	rushen	18601362025	PBG	Arnold Sun 	arsun	Patrick Shao	pshao	58",
// "Anita	anishen	13926089966	PBG	tonyliu	tliu	William Ho	wiho	13",
// "Gary Xu	haixu	13822295102	SE	Ma du	duma	william Ho	wiho	8",
// "Robin Chen	lumichen	13925010260	SE	Aivy Tan	aivtan	William Ho	wiho	5",
// "Zhang Bin	binzhan	18666094872	SE	zheng jun	junzheng	Jerry Fan	jfan	19",
// "Vincent Chen	vincentc	13322800930	SE	Ma du	duma	william Ho	wiho	32",
// "Tony Hu	tonhu	13322800727	SE	Ma du	duma	William Ho	wiho	17",
// "Jia Peng	pejia	18602010345	SE	刘湘晖	tliu	何达	wiho 	8",
// "Mandy Huang	manhuang	18688862842	SE	Ervin Wen	wenyong	William Ho	wiho	10",
// "Liu Yun	yunliu2	18677184618	SE	tony  liu	tliu	William Ho 	wiho	7",
//     	);
//     $index = 2964;
//     	foreach($nom as $item){
//     		$arr = explode("\t", $item);
//     		for($i=0;$i<$arr[8];$i++){
//     			echo 
//     			$arr[0] . ";"//am name
//     			.$arr[1] . ";"//am id
//     			.$arr[2] . ";"//mobile
//     			.$arr[3] . ";"//am depart
//     			.$arr[4] . ";"//rm name
//     			.$arr[5] . ";"//rm id
//     			.$arr[6] . ";"//od name
//     			.$arr[7] . ";"//od id
//     			."nom$index" . ";"//code
//     			. "</br>";
    			
// //     			echo "insert into users
// //     			(diff,cc,am_name,am_id,am_mobile,rm_name,rm_id,od_name,od_id,code,type_id) 
// //     			values('$arr[3]','$arr[1]@cisco.com','$arr[0]','$arr[1]','$arr[2]','$arr[4]','$arr[5]','$arr[6]','$arr[7]','nom$index',1);";
//     			$index++;
//     		}
//     	}

//     	$sponsors = array(
//     			"Xiaotong	10	31	xiao",
// "NetApp	0	25	neta",
// "Vmware	0	25	vmwa"
//     			);
//     foreach($sponsors as $sponsor){
//     	$index = 1000;
//     	$sponsor_arr = explode("\t", $sponsor);
//     	for($i=0;$i<$sponsor_arr[2];$i++){
//     		echo $sponsor ."\t" . $sponsor_arr[3].$index . "<br/>" ;
//     		//$index++;
//     	}
//     }
//    	header("Content-type:application/vnd.ms-excel;charset=utf8"); //表示输出Excel文件
//    	header("Content-Disposition:attachment; filename=导出.xls");//文件名
//     	echo 'a'.chr(9).'b'.chr(9). iconv("utf8", "gb2312//IGNORE", '中文')  .chr(9).chr(13);
//     	echo 'aaa'.chr(9).'bbb'.chr(9).'ccc'.chr(9).chr(13);
// 		exit;
//$this->layout = false;
 //   	$this->render('test');
    	
//     header("Content-type:application/vnd.ms-excel;charset=utf8");
//     header("Content-Disposition:attachment; filename=导出.xls");
    	
//     	    	$nom = 
//     	    			"Iris FENG	fxiaoyun	13925121638	FSI	Hunter LIN	jinlin	William Ho	wiho	19
// Paul Pang	paupang	18688862984	FSI	Hunter LIN	jinlin	William Ho	wiho	13
// AndyCao 	xucao	13802945932	LENT	Ervin Wen	wenyong	william ho	wiho	10
// Stacey Geng	xigeng	13902257948	LENT	Ervin Wen	wenyong	william ho	wiho	20
// Jack He	kahe	13380071555	LENT	Ervin Wen	wenyong	william ho	wiho	25
// Zhao jiangtao	Jiazhao	13903071617	LENT	Wen yong	wenyong	william Ho	wiho	10
// huangjing 	kihuang	13902258841	LENT	Ervin wen	wenyong	william Ho	wiho	20";
    	    	
//     	    	$delimiter = ";";
//     $nom_arr = explode("\n",$nom);
//     	    $index = 3370;
//     	    	foreach($nom_arr as $item){
//     	    		$arr = explode("\t", $item);
//     	    		for($i=0;$i<$arr[8];$i++){
//     	    		//	echo
//     	    			$arr[0] . $delimiter//am name
//     	    			.$arr[1] . $delimiter//am id
//     	    			.$arr[2] . $delimiter//mobile
//     	    			.$arr[3] . $delimiter//am depart
//     	    			.$arr[4] . $delimiter//rm name
//     	    			.$arr[5] . $delimiter//rm id
//     	    			.$arr[6] . $delimiter//od name
//     	    			.$arr[7] . $delimiter//od id
//     	    			."nom$index" . $delimiter//code
//     	    			. "<br/>";
    	
//     	    			echo 
//     	    			"insert into users
//     	    			(diff,cc,am_name,am_id,am_mobile,rm_name,rm_id,od_name,od_id,code,type_id)
//     	    			values('$arr[3]','$arr[1]@cisco.com','$arr[0]','$arr[1]','$arr[2]','$arr[4]','$arr[5]','$arr[6]','$arr[7]','nom$index',1);";
//     	    			echo "<br/>";
//     	    			$index++;
//     	    		}
//     	    		//echo "insert into users (type_id,email) values (10,'$arr[1]'),(11,'$arr[5]'),(12,'$arr[7]') ;";
//     	    		echo "<br/>";
//     	    	}
    }
    
    public function makeInternal($number,$index){
    	$sql = 'insert into users (code,type_id) values ';
    	for($i=0;$i<$number;$i++){
    		$code = 'inter'.$index;
    		$sql .= "('$code',2),";
    		echo $code;
    		echo '<br/>';
    		$index++;
    	}
    	echo $sql;
    }
    
    public function makeSameInternal($number,$index){
    	$sql = 'insert into users (code,type_id) values ';
    	for($i=0;$i<$number;$i++){
    		$code = 'inter'.$index;
    		$sql .= "('$code',2),";
    		echo $code;
    		echo '<br/>';
    	}
    	echo $sql;
    }
    
    public function makeNom($nom,$index,$prefix='nom'){
    	/**
		 * 分区 	OD姓名 	OD Email 	RM姓名 	RM Email 	AM姓名 	AM Email 	邀请码数量 
    	 */
    	
    	$delimiter = "</td><td>";
    	$return = "</td></tr>";
    	$nom_arr = explode("\n",$nom);
    	
    	$excel_arr = array();
    	$rm_arr = array();
    	$am_arr = array();
    	$od_arr = array();
    	foreach($nom_arr as $item){
    		$arr = explode("\t", $item);
    		$diff = addslashes($arr[0]);
    		$od_name = $arr[1];
    		$od_email = $arr[2];
    		$od_id = str_replace('@cisco.com', '', $od_email);
    		$rm_name = $arr[3];
    		$rm_email = $arr[4];
    		$rm_id = str_replace('@cisco.com', '', $rm_email);
    		$am_name = $arr[5];
    		$cc = $am_email = $arr[6];
    		$am_id = str_replace('@cisco.com', '', $am_email);
    		
    		if(!in_array($am_id, $am_arr)){
    			$am_arr[] = $am_id;
    		}
    		if(!in_array($rm_id, $rm_arr)){
    			$rm_arr[] = $rm_id;
    		}
    		if(!in_array($od_id, $od_arr)){
    			$od_arr[] = $od_id;
    		}
    		for($i=0;$i<$arr[7];$i++){
    			$excel = 
    			$arr[0] . $delimiter//diff
    			.$arr[1] . $delimiter//od name
    			.$arr[2] . $delimiter//od email
    			.$arr[3] . $delimiter//rm name
    			.$arr[4] . $delimiter//rm email
    			.$arr[5] . $delimiter//am name
    			.$arr[6] . $delimiter//am email
    			.$prefix . $index  . $delimiter ; //code
    			
    			$code = $prefix.$index;
    			
    			
    			$excel .= "insert into users (diff,cc,am_name,am_id,rm_name,rm_id,od_name,od_id,code,type_id) values ('$diff','$cc','$am_name','$am_id','$rm_name','$rm_id','$od_name','$od_id','$code',1);";
    			
    			$index++;
    			$excel_arr[] = $excel;
    		}
    	}
    	
    	echo '<table>';
    	foreach($am_arr as $am){
    		echo '<tr><td>';
    		echo "insert into users (type_id,email) values (10,'$am');";
    		echo $return;
    	}
    	foreach($rm_arr as $rm){
	    	echo '<tr><td>';
    		echo "insert into users (type_id,email) values (11,'$rm');";
	    	echo $return;
    	}
    	foreach($od_arr as $od){
	    	echo '<tr><td>';
    		echo "insert into users (type_id,email) values (12,'$od');";
	    	echo $return;
    	}
    	
    	foreach($excel_arr as $excel){
	    	echo '<tr><td>';
    		echo $excel;
	    	echo $return;
    	}
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
