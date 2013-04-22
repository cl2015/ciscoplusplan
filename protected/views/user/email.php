<br />
<?php if(Yii::app()->language == 'zh_cn'){?>
<img src="http://223.4.134.123/images/mainBg.jpg" />
	<?php
		$today = date("Y-m-d");
		if($today<'2013-05-20'){
			$paydate = '4月15日-5月19日';
			$price = '948.00';
		}elseif($today<'2013-05-27'){
			$paydate = '5月20日-5月26日';
			$price = '1264';
		}else{
			$paydate = '5月27日-5月28日';
			$price = '1580.00';
		}
	?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> 
	感谢您注册Cisco Connect大中华区上海站活动！<br />
</p>
<p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
	您的参会码是：<?php echo $model->id;?> 请保管好您的参会码，此码是您参会的唯一凭证。<br />
	<?php }?>
	
	<?php if($model->type_id==2){?>
	您的注册邮箱是：<?php echo $model->email;?>；
	网站注册密码是：123456。
	请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com.cn">Cisco Connect 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>

	<?php if($model->type_id!=2){?>
	您的注册邮箱是：<?php echo $model->email;?>；
	网站注册密码是：<?php echo $model->password;?>。
	<?php if($model->type_id==4 && $reginfo->is_online==1){?>
	您的报名时间为：<?php echo $reginfo->created_at?>, 票价为<?php echo $price?>元。
	<?php }?>
	请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com.cn">Cisco Connect 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
<?php if($model->type_id!=4){?>
<p>
	会议日期：2013年5月28日 <br />
	签到时间：8:00am - 9:00am<br />
	会议地点：上海浦东嘉里大酒店<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscoconnect.com.cn">Cisco Connect 主页</a><br/>
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
Thank you for registering for Cisco Connect 2013 ShangHai.<br />
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
<b>Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.</b><br />
<?php }?>

<?php if($model->type_id==2){?>
Your registration confirmation email is <?php echo $model->email;?>;
Your website login password is 123456.<br />
<?php if($model->type_id==4 && $reginfo->is_online==1){?>
Your registration time: <?php echo $reginfo->created_at?>, Ticket price is : RMB <?php echo $price?>
<?php }?>
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscoconnect.com.cn">Cisco Connect Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>

<?php if($model->type_id!=2){?>
Your registration confirmation email is <?php echo $model->email;?>;
Your website login password is <?php echo $model->password;?>.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscoconnect.com.cn">Cisco Connect Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>
</p>
<p>
Event Date:           May 28, 2013<br />
Sign in time:         8:00am—9:00am<br />
Venue:                Pudong Kerry Hotel Shanghai, PRC<br />
For more conference details, please visit the <a href="http://www.ciscoconnect.com.cn"> Cisco Connect Home Page</a>.<br />
We look forward to seeing you!
</p>
<p> 
If you have any questions concerning your registration, please mail to: go_cisco_connect@external.cisco.com  or call: 400-890-9901<br />
</p> 
<p>  
Cisco Connect 2013 Greater China Event Committee Team
</p>
<?php }?>