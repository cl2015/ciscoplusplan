<?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png"/>
<?php if($reginfo['is_online']=='0'){?>
<!--参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "在线活动完成量"});
</script>
<?php }else{?>
<!--参加现场活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "现场活动继续"});
</script>
<?php if($reginfo['payment_type']=='1'){?>
<!-- 选择现场支付 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "线下支付完成数量"});
</script>
<?php }?>
<?php }?>


<?php }else{?>
<?php if($reginfo['is_online']=='0'){?>
<!--参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E在线活动完成量"});
</script>
<?php }else{?>
<!--参加现场活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E现场活动继续"});
</script>
<?php if($reginfo['payment_type']=='1'){?>
<!-- 选择现场支付 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E线下支付完成数量"});
</script>
<?php }?>
<?php }?>


<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3_en.jpg"/>
<?php }?>

<br /><br/><br/>
<?php
if(Yii::app()->language == 'zh_cn'){?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> <br />
	感谢您注册Cisco Connect大中华区成都站活动。<br />
</p>
<p>
        您的参会码是：<?php echo $model->id;?> ，请保管好您的参会码，此码是您参会的唯一凭证。<br />
        您的注册邮箱是：<?php echo $model->email;?>，
        网站注册密码是：<?php echo $model->password;?>。
        请您凭此邮箱和密码登录大会活动网站<a href="http://www.ciscoconnect.com.cn">Cisco Connect 主页</a>，专享白皮书下载，视频观看等精彩互动活动。<br/>
</p>
<p>
	<span style="color:red;">（温馨提示：您未完成支付，为了方便您的参会，请提前到会议签到收费处完成付费。）</span><br/>
</p>
<p>
	会议日期：2013年8月23日<br />
	签到时间：8:00am—9:00am<br />
	会议地点：成都世纪城天堂洲际大饭店<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscoconnect.com.cn">Cisco Connect 主页</a><br/>
</p>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:<a href="mailto:go_cisco_connect@external.cisco.com">go_cisco_connect@external.cisco.com</a><br/>
	或致电: 400-890-9901
<p>
<p>
	<b>Cisco Connect大中华区活动会务组</b>
</p>
<?php echo CHtml::link(CHtml::encode("返回首页"), 'http://www.ciscoconnect.com.cn/index.html',array('target'=>'_blank')); ?>
<?php }else{?>
<p>
Dear <?php echo $model->full_name;?> ,<br /> <br />
</p>
<p>
Thank you for registering for Cisco Connect 2013 ChengDu.<br />
</p>
<p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
<b>Your registration confirmation ID is <?php echo $model->id;?>.Please save this information for the conference attending.</b><br />
<?php }?>

<?php if($model->type_id==2){?>
<br />
Your registration confirmation email is <?php echo $model->email;?>;<br />
Your website login password is 123456.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscoconnect.com.cn">Cisco Connect Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>


<?php if($model->type_id!=2){?>
<br />
Your registration confirmation email is <?php echo $model->email;?>;<br />
Your website login password is <?php echo $model->password;?>.<br />
This email address and password were used to login the active site of the General Assembly <a href="http://www.ciscoconnect.com.cn">Cisco Connect Home Page</a>.Exclusive white papers, video viewing and other interactive activities.<br/>

<?php }?>
</p>
<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
<p>
Event Date: 2013.8.23<br />
Sign in time: 8:00 am-9:00am<br />
Venue: InterContinental Century City Chengdu <br/>
For more conference details, please visit the <a href="http://www.ciscoconnect.com.cn"> Cisco Connect Home Page</a>.<br />
We look forward to seeing you!
</p>
<?php }?>
<p>
If you have any questions concerning your registration, please mail to: <a href="mailto:go_cisco_connect@external.cisco.com">go_cisco_connect@external.cisco.com</a> , or call: 400-890-9901<br />
</p>
<p>
Cisco Connect 2013 Greater China Event Committee Team
</p>
<p>
<?php echo CHtml::link(CHtml::encode("Return to Cisco Connect 2013 Home page"), 'http://www.ciscoconnect.com.cn/index.html',array('target'=>'_blank')); ?>
</p>
<?php }
 ?>

<script charset="utf-8" src="http://apps.acs86.com/h.ashx?o=sub&id=917&em=<?php echo $model->email?>"></script>