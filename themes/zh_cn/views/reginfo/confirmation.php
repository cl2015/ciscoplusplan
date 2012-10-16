<h1>Confirmation</h1>
<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/step3.png" />
</br>
<p>
	尊敬的<?php echo $user->full_name;?>先生/女士:<br /> 感谢您注册武汉 Cisco Plus 2012 <br />
</p>
<p>
	您的参会码是：<?php echo $user->id;?> ，请保管好您的参会码，此码是您参会的唯一凭证。<br />
</p>

<p>
	如欲了解更多会议详情，请访问Cisco Plus 主页<br /> 我们期待着您的参与！ <br />
</p>
<p>

	会议日期：2012 年 11 月 22 日<br /> 
	会议地点：武汉万达威斯汀酒店<br />
</p>
<p>

	仍存在疑问？请发送电子邮件至:<a href="gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com<br /> 或致电Cisco Plus:
	 400-890-9901<br />
<p>
<p>
	<b>Cisco Plus 2012注册团队</b>
</p>
<!-- p>
<a href="###" >酒店预定</a><br/>
<a href="###" >发送电子邮件至客户服务部</a><br/>
<a href="###" >我的注册信息</a><br/>
<a href="###" >返回Cisco Plus 主页</a><br/>
<a href="###" >Cisco Plus 的注册与活动条款 </a><br/>
</p> -->
<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
</br>
