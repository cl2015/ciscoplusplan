<br />
<?php if(Yii::app()->language == 'zh_cn'){?>
<img src="http://223.4.134.123/images/mainBg.jpg" />
	<?php
		$today = date("Y-m-d");
		if($today<'2012-11-22'){
			$paydate = '10月15日-11月20日';
			$price = '436.00';
		}else{
			$paydate = '11月21日-11月22日';
			$price = '728.00';
		}
	?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> 
	感谢您注册Cisco Plus大中华区武汉站活动！<br />
</p>
<p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
	您的参会码是：<?php echo $model->id;?> 请保管好您的参会码，此码是您参会的唯一凭证。<br />
	<?php }?>
	
	<?php if($model->type_id==2){?>
	您的注册邮箱是：<?php echo $model->email;?>；
	网站注册密码是：123456。
	请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>

	<?php if($model->type_id!=2){?>
	您的注册邮箱是：<?php echo $model->email;?>；
	网站注册密码是：<?php echo $model->password;?>。
	<?php if($model->type_id==4 && $reginfo->is_online==1){?>
	您的报名时间为：<?php echo $reginfo->created_at?>, 票价为<?php echo $price?>元。
	<?php }?>
	请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
	<p>
	会议日期：2012年11月22日 <br />
	签到时间：早八点开始<br />
	会议地点：武汉万达威斯汀酒店<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a><br/>
</p>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:gc_cisco_plus@external.cisco.com<br/>
	或致电: 400-890-9901
<p>
<p>
	<b>Cisco Plus大中华区活动会务组</b>
</p>

<?php }else{?>
<img src="http://223.4.134.123/images/mainBg_en.jpg" />
<br/>

Dear <?php echo $model->full_name;?> ,
<p>
Thank you for registering for Cisco Plus 2012 WuHan.<br />
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
<b>Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.</b><br />
<?php }?>

<?php if($model->type_id==2){?>
Your registration confirmation email is <?php echo $model->email;?>;
Your website login password is 123456.<br />
<?php if($model->type_id==4 && $reginfo->is_online==1){?>
Your registration time: <?php echo $reginfo->created_at?>, Ticket price is : RMB <?php echo $price?>
<?php }?>
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscopluschina.com">Cisco Plus Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>

<?php if($model->type_id!=2){?>
Your registration confirmation email is <?php echo $model->email;?>;
Your website login password is <?php echo $model->password;?>.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscopluschina.com">Cisco Plus Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>
</p>
<p>
Event Date:           2012.11.22<br />
Sign in time:         Start from 8:00 AM<br />
Venue:                The Westin Wuhan Wuchang<br />
For more conference details, please visit the <a href="http://www.ciscopluschina.com"> Cisco Plus Home Page</a>.<br />
We look forward to seeing you!
</p>
<p> 
If you have any questions concerning your registration, please mail to: gc_cisco_plus@external.cisco.com  or call: 400-890-9901<br />
</p> 
<p>  
Cisco Plus 2012 Greater China Event Committee Team
</p>
<?php }?>