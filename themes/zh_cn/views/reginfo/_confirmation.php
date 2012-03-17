<br />
<?php if(Yii::app()->language == 'zh_cn'){?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> 
	感谢您注册北京Cisco Plus大中华区北京站活动<br />
</p>
<p>
	您的注册ID号是：<?php echo $model->id;?> 请保存好此信息，作为大会参会凭证。<br />
	您的邮箱是：<?php echo $model->email;?><br/>
	<?php if($model->type_id!=2){?>你的密码是：<?php echo $model->password;?>
	密码说明：凭此密码可登录大会活动网站 <a href="www.ciscopluschina.com">www.ciscopluschina.com</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
	</p>
<p>
	会议日期：2012 年 5 月 22-23 日 <br />
	签到时间：早八点开始<br />
	会议地点：国家会议中心<br />
</p>
<p>

	如欲了解更多会议详情，请访问<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a><br/>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:<a href= "mailto:gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com</a><br/>
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
Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.<br />
Your registration email is <?php echo $model->email;?>
<?php if($model->type_id!=2){?>
Your password is <?php echo $model->password;?>.<br />
The  password is used to login the active site of the General Assembly www.ciscopluschina.com 。Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>
</p>
<p>
Event Date:           Mar 22-23, 2012<br />
Sign in time:         Start from 8:00 AM<br />
Venue:                   BIH, Beijing, PRC<br />
For more conference details, please visit the <?php echo CHtml::link(CHtml::encode("Return to Cisco Plus 2012 Home page"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>.<br />
We look forward to seeing you!
</p>
<p> 
If you have any questions concerning your registration, please mail to: <a href= "mailto:gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com</a>, or call: 400-156-3788<br />
</p> 
<p>  
Cisco Plus 2012 conference Team
</p>
<p> 
<?php echo CHtml::link(CHtml::encode("Return to Cisco Plus 2012 Home page"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
</p>
<?php }?>