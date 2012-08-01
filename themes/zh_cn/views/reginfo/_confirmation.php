<br /><br/><br/>
<?php
if(Yii::app()->language == 'zh_cn'){?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> <br />
	感谢您注册Cisco Plus大中华区广州站活动。<br />
</p>
<p>
	<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
		您已成功完成支付，您的参会码是：<?php echo $model->id;?> ，请保管好您的参会码，此码是您参会的唯一凭证。<br />

	<?php }?>

	<?php if($model->type_id==2){?>
		您的注册邮箱是：<?php echo $model->email;?>，
		网站注册密码是：123456。
		请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a>，专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>


	<?php if($model->type_id!=2){?>
		您的注册邮箱是：<?php echo $model->email;?>，
		网站注册密码是：<?php echo $model->password;?>。
		请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a>，专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
</p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
<p>
	会议日期：2012 年 5 月 22-23 日 <br />
	签到时间：早八点开始<br />
	会议地点：国家会议中心<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a><br/>
</p>
<?php }?>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:<a href="mailto:gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com</a><br/>
	或致电: 400-156-3788
<p>
<p>
	<b>Cisco Plus大中华区活动会务组</b>
</p>
<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
<?php }else{?>
<p>
Dear <?php echo $model->full_name;?> ,<br /> <br />
</p>
<p>
Thank you for registering for Cisco Plus 2012 Guangzhou.<br />
</p>
<p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
<b>Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.</b><br />
<?php }?>

<?php if($model->type_id==2){?>
<br />
Your registration confirmation email is <?php echo $model->email;?>;<br />
Your website login password is 123456.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscopluschina.com">Cisco Plus Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>


<?php if($model->type_id!=2){?>
<br />
Your registration confirmation email is <?php echo $model->email;?>;<br />
Your website login password is <?php echo $model->password;?>.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscopluschina.com">Cisco Plus Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>
</p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
<p>
Event Date:           Mar 22-23, 2012<br />
Sign in time:         Start from 8:00 AM<br />
Venue:                China National Convention Center,Guangzhou, PRC<br />
For more conference details, please visit the <a href="http://www.ciscopluschina.com"> Cisco Plus Home Page</a>.<br />
We look forward to seeing you!
</p>
<?php }?>
<p>
If you have any questions concerning your registration, please mail to: <a href="mailto:gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com</a> , or call: 400-156-3788<br />
</p>
<p>
Cisco Plus 2012 Greater China Event Committee Team
</p>
<p>
<?php echo CHtml::link(CHtml::encode("Return to Cisco Plus 2012 Home page"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
</p>
<?php }
 ?>