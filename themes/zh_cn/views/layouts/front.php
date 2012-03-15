<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cisco Plus</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

</head>
<body>
<div id="box">
  <div class="header">
    <ul>
      <li style=" margin-right:25px;"><?php echo CHtml::link('中文',array('user/language','language'=>'zh_cn'));?> | <?php echo CHtml::link('En',array('user/language','language'=>'en'));?></li>
 	  <li><a href="#" onClick="javascript:window.open('http://www.ciscopluschina.com/pop.html','','width=268,height=190,toolbar=no, status=no, menubar=no, resizable=no, scrollbars=no');return false;">登录</a>　|</li>
      <li><?php echo CHtml::link('注册',array('user/loading'));?>|</li>
      <li><a href="http://www.ciscopluschina.com/contact.html">联系我们</a>　|</li>
      <li style="padding-top:0px;*padding-top:2px;"><a href="http://www.ciscopluschina.com/index.html">返回主页</a></li>
    </ul>
  </div>
  <div class="mainBg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainBg.jpg" /></div>
  <div class="mainContent">
    <?php echo $content; ?>
	
  </div>
</div>
</body>
</html>
