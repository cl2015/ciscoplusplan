<br />
<?php if(Yii::app()->language == 'zh_cn'){?>
<p>
	尊敬的<?php echo $model->full_name;?>先生/女士:<br /> 
	感谢您注册北京 Cisco Plus 2012 <br />
</p>
<p>
	您的注册ID号是：<?php echo $model->id;?> ，请保存好此信息，作为大会参会凭证。<br />
</p>
<p>
	会议日期：2012 年 5 月 22-23 日 <br />
	签到时间：早八点开始<br />
	会议地点：国家会议中心<br />
</p>
<p>

	如欲了解更多会议详情，请访问<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a><br/>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:gc_cisco_plus@external.cisco.com<br/>
	或致电: 400-156-3788
<p>
<p>
	<b>Cisco Plus 2012会务组</b>
</p>

<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
<?php }else{?>
Dear <?php echo $model->full_name;?> Ladies / gentleman,
<p>
Thank you for registering for Cisco Plus 2012 Beijing.<br />
Your registration confirmation ID is <?php echo $model->id;?>.<br />
Please save this information for the conference attending.<br />
</p>
<p>
Event Date:           Mar 22-23, 2012<br />
Sign in time:         Start from 8:00 AM<br />
Venue:                   BIH, Beijing, PRC<br />
For more conference details, please visit the Cisco Plus 2012 home page.<br />
We look forward to seeing you!
</p>
<p> 
If you have any questions concerning your registration, please mail to: gc_cisco_plus@external.cisco.com, or call: 400-156-3788<br />
</p> 
<p>  
Cisco Plus 2012 conference Team
</p>
<p> 
Return to Cisco Plus 2012 Home page
</p>
<?php }?>