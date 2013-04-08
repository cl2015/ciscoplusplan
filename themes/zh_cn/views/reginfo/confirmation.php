<h1>Confirmation</h1>
<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/step3.png" />
</br>
<p>
	尊敬的<?php echo $user->full_name;?>先生/女士:<br /> 感谢您注册Cisco Connect大中华区上海站活动。<br />
</p>
<p>
	您的参会码是：<?php echo $user->id;?> ，请保管好您的参会码，此码是您参会的唯一凭证。<br />
</p>

<p>
	如欲了解更多会议详情，请访问Cisco Connect 主页<br /> 我们期待着您的参与！ <br />
</p>
<p>

	会议日期：2013年5月28日 <br />
	签到时间：8:00am - 9:00am<br />
	会议地点：上海浦东嘉里大酒店<br />
</p>
<p>

	仍存在疑问？请发送电子邮件至:<a href="mailto:go_cisco_connect@external.cisco.com">go_cisco_connect@external.cisco.com</a><br/> 或致电Cisco Connect:
	 400-890-9901<br />
<p>
<p>
	<b>Cisco Connect 2013注册团队</b>
</p>
<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscoconnect.com/index.html',array('target'=>'_blank')); ?>
</br>
