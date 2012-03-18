<?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png"/>
<?php }else{?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3_en.jpg"/>
<?php }?>


<br />
<br />
<?php if(Yii::app()->language == 'zh_cn'){?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> 
	感谢您注册Cisco Plus大中华区北京站活动！<br />
</p>
<p>
	您的注册ID号是：<?php echo $model->id;?> 请保存好此信息，作为大会参会凭证。<br />
	您的注册邮箱是：<?php echo $model->email;?>；
	<?php if($model->type_id!=2){?>注册密码是：<?php echo $model->password;?>。
	请您凭此邮箱和密码登录大会活动网站<a href="www.ciscopluschina.com">Cisco Plus 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:gc_cisco_plus@external.cisco.com<br/>
	或致电: 400-156-3788
<p>
<p>
	<b>Cisco Plus大中华区活动会务组</b>
</p>
<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
<?php }else{?>
Dear <?php echo $model->full_name;?> ,
<p>
Thank you for registering for Cisco Plus 2012 Beijing.<br />
<b>Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.</b><br />
Your registration confirmation email is <?php echo $model->email;?>;
<?php if($model->type_id!=2){?>
Your password is <?php echo $model->password;?>.<br />.
This email address and password were used to login the active site of the General Assembly.<a href="http://www.ciscopluschina.com">Cisco Plus Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>
<?php }?>
</p>
<p> 
If you have any questions concerning your registration, please mail to: gc_cisco_plus@external.cisco.com, or call: 400-156-3788<br />
</p> 
<p>  
Cisco Plus 2012 Greater China Event Committee Team
</p>
<p> 
<?php echo CHtml::link(CHtml::encode("Return to Cisco Plus 2012 Home page"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
</p>
<?php }?>
