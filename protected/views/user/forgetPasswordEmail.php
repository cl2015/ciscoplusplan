<br />
<?php if(Yii::app()->language == 'zh_cn'){?>
<img src="http://223.4.134.123/images/mainBg.jpg" />
<p>
	尊敬的<?php echo $model->full_name;?><br /> 
	感谢您注册Cisco Connect大中华区成都站活动！<br />
</p>
<p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
	您的注册ID号是：<?php echo $model->id;?> 请保存好此信息，作为大会参会凭证。<br />
	<?php }?>
	
	<?php if($model->type_id==2){?>
	您的注册邮箱是：<?php echo $model->email;?>；
	网站注册密码是：123456。
	请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com">Cisco Connect 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>

	<?php if($model->type_id!=2){?>
	您的注册邮箱是：<?php echo $model->email;?>；
	网站注册密码是：<?php echo $model->password;?>。
	请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com">Cisco Connect 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
	
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
	<p>
	会议日期：2013年8月23日 <br />
	签到时间：8:00am - 9:00am<br />
	会议地点：成都世纪城天堂洲际大饭店<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscoconnect.com">Cisco Connect 主页</a><br/>
</p>
<?php }?>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:go_cisco_connect@external.cisco.com<br/>
	或致电: 400-890-9901
<p>
<p>
	<b>Cisco Connect大中华区活动会务组</b>
</p>

<?php }else{?>
<img src="http://223.4.134.123/images/mainBg_en.jpg" />
<br/>

Dear <?php echo $model->full_name;?> ,
<p>
Thank you for registering for Cisco Connect 2013 ChengDu.<br />
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
<b>Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.</b><br />
<?php }?>

<?php if($model->type_id==2){?>
Your registration confirmation email is <?php echo $model->email;?>;
Your website login password is 123456.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscoconnect.com">Cisco Connect Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>

<?php if($model->type_id!=2){?>
Your registration confirmation email is <?php echo $model->email;?>;
Your website login password is <?php echo $model->password;?>.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscoconnect.com">Cisco Connect Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>
</p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
<p>
For more conference details, please visit the <a href="http://www.ciscoconnect.com"> Cisco Connect Home Page</a>.<br />
We look forward to seeing you!
</p>
<?php }?>
<p> 
If you have any questions concerning your registration, please mail to: go_cisco_connect@external.cisco.com  or call: 400-890-9901<br />
</p> 
<p>  
Cisco Connect 2013 Greater China Event Committee Team
</p>
<?php }?>