<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<link rel="shortcut icon" href="http://www.cisco.com/favicon.ico">
<title>Cisco Plus大中华区活动2012</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />


<!-- PV监测代码 -->
<script type="text/javascript">
ACTracker = {
mid: 221409,
ers: [{ "type": "pageview" }],
track: function (er) 
{
    this.ers.push(er);
}};
(function ()
{
    var js = document.createElement("script"), scri = document.getElementsByTagName("script")[0];
    js.type = "text/javascript";
    js.async = true;
    scri.parentNode.insertBefore(js, scri);
    js.src = location.protocol == "https:" ? "https://secure.acs86.com/act.js" : "http://static.acs86.com/act.js";
})();
</script>
</head>
<body>
<div id="box">
  <div class="header" >
    <ul style="width: 450px;">
      <li><?php if(Yii::app()->user->isGuest){
          echo CHtml::link('登陆',array('/site/login'));
      }else{
          echo CHtml::link('退出',array('/site/logout'));
      }?>  |</li>
      <li><?php echo CHtml::link('注册信息',array('user/index'));?>　|</li>
      <li><?php echo CHtml::link('日报',array('report/divi'));?>　|</li>
      <li><?php echo CHtml::link('补发邮件',array('user/sendEmail'));?>　|</li>
      <li><a href="http://www.ciscoconnect.com/contact.html">联系我们</a>　|</li>
      <li style="padding-top:0px;*padding-top:2px;"><a href="http://www.ciscoconnect.com/index.html">返回主页</a></li>
    </ul>
  </div>
  <div class="mainBg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainBg.jpg" /></div>
  <div class="mainContent">
    <?php echo $content; ?>
	
  </div>
</div>

</body>
</html>
