<br/>
<p>
<b>尊敬的<?php echo $model->full_name;?></b><br /> <br /> 
	<b>您好！</b><br /><br /> 
	感谢您报名参加Cisco Plus大中华区北京站现场活动。<br />
</p>
<p>
	<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
		您的注册ID号是：<?php echo $model->id;?> 。<br /><br />
		您所需支付的费用为： 948元人民币 
	
	<?php }?>
	
	<?php if($model->type_id==2){?>
		您的注册邮箱是：<?php echo $model->email;?>；
		网站注册密码是：123456。
		请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com.cn">Cisco Plus 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>


	<?php if($model->type_id!=2){?>
		您的注册邮箱是：<?php echo $model->email;?>；
		网站注册密码是：<?php echo $model->password;?>。
		请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com.cn">Cisco Plus 主页</a>。专享白皮书下载，视频观看等精彩互动活动。<br/>
	<?php }?>
</p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>	
<p>
	会议日期：2012 年 5 月 22-23 日 <br />
	签到时间：早八点开始<br />
	会议地点：国家会议中心<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscoconnect.com.cn">Cisco Plus 主页</a><br/>
</p>
<?php }?>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:<a href="mailto:go_cisco_plus@external.cisco.com">go_cisco_plus@external.cisco.com</a><br/>
	或致电: 400-156-3788
<p>
<p>
	<b>Cisco Plus大中华区活动会务组</b>
</p>
<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscoconnect.com.cn/index.html',array('target'=>'_blank')); ?>
