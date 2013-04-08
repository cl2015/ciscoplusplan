<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<link rel="shortcut icon" href="http://www.cisco.com/favicon.ico">
<?php if(Yii::app()->language=='zh_cn') {?>
<title>Cisco Connect大中华区活动2013</title>
<?php }else{?>
<title>Cisco Connect Greater China 2013</title>
<?php }?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.min.js"></script>

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
<?php if(Yii::app()->language=='zh_cn') {?>

<div id="box">
  <div class="header">
    <ul>
      <li style=" margin-right:25px;"><?php echo CHtml::link('中文',array('user/language','language'=>'zh_cn'));?> | <?php echo CHtml::link('En',array('user/language','language'=>'en'));?></li>
 	  <li><a href="#" onClick="javascript:window.open('http://www.ciscoconnect.com.cn','','width=268,height=190,toolbar=no, status=no, menubar=no, resizable=no, scrollbars=no');return false;">登录</a>　|</li>
      <li><?php echo CHtml::link('注册',array('user/loading'));?>　|</li>
      <li><a href="http://www.ciscoconnect.com.cn/">联系我们</a>　|</li>
      <li style="padding-top:0px;*padding-top:2px;"><a href="http://www.ciscoconnect.com.cn/">返回主页</a></li>
    </ul>
  </div>
  <div class="mainBg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainBg.jpg" /></div>
  <div class="mainContent">
    <?php echo $content; ?>
	
  </div>
</div>
<?php }else{?>
<div id="box">
  <div class="header">
    <ul>
      <li style=" margin-right:25px;"><?php echo CHtml::link('中文',array('user/language','language'=>'zh_cn'));?> | <?php echo CHtml::link('En',array('user/language','language'=>'en'));?></li>
 	  <li><a href="#" onClick="javascript:window.open('http://www.ciscoconnect.com.cn/EN/','','width=268,height=190,toolbar=no, status=no, menubar=no, resizable=no, scrollbars=no');return false;">Login</a>　|</li>
      <li><?php echo CHtml::link('Register',array('user/loading'));?>　|</li>
      <li><a href="http://www.ciscoconnect.com.cn/EN/contactUs.aspx">Contact Us</a>　|</li>
      <li style="padding-top:0px;*padding-top:2px;"><a href="http://www.ciscoconnect.com.cn/EN/">Homepage</a></li>
    </ul>
  </div>
  <div class="mainBg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainBg_en.jpg" /></div>
  <div class="mainContent">
    <?php echo $content; ?>
	
  </div>
</div>
<?php }?>

</body>
</html>
