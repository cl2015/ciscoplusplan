 <?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png"/>
<?php if($reginfo['is_online']=='0'){?>
<! --参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "在线活动完成量"});
</script>
<?php }else{?>
<! --参加现场活动 -->
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
<! --参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E在线活动完成量"});
</script>
<?php }else{?>
<! --参加现场活动 -->
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
<?php if(Yii::app()->language == 'zh_cn'){?>
<p>
	尊敬的<?php echo $model->full_name;?><br /> <br />
	感谢您注册Cisco Plus大中华区武汉站现场活动。<br />
</p>
<p>
	<?php if(!($model->type_id== 4 && $reginfo->is_online==0)){?>
		您的参会码是：<?php echo $model->id;?> 。请保管好您的参会码，此码是您参会的唯一凭证。<br />

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
	为了方便您的参会，请了解付款信息如下：<br/>
	<span style="color:red;">（温馨提示：请务必填写参会码，以便我们进行款项核对，谢谢支持。）</span><br/>
	银行汇款/银行转账<br/>
	银行账号：01090  32070  012010  8152160<br/>
	开户行：北京银行八里庄支行<br/>
	开户公司：北京敦煌秀富咨询有限责任公司<br/>
</p>

<p>
	会议日期：2012年11月22日 <br />
	签到时间：早八点开始<br />
	会议地点：武汉万达威斯汀酒店<br />
	如欲了解更多会议详情，请访问<a href="http://www.ciscopluschina.com">Cisco Plus 主页</a><br/>
</p>
<?php }?>
<p>
	我们期待着您的参与！ <br/>
	问题或建议,请发送电子邮件至:<a href="mailto:gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com</a><br/>
	或致电: 400-890-9901
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
Thank you for registering for Cisco Plus 2012 WuHan.<br />
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
In order to facilitate your participation, please understand the payment information as follows:<br/>
<style color="red">( reminder: Please fill in all code, so that we can make a payment check, thank you for your support. )</style><br/>
Bank Remittances/ Bank Transfer<br/>
Accounts: 01090  32070  012010  8152160<br/>
Bank of Deposit: Bank of Beijing Balizhuang Branch<br/>
Accounts Company: Beijing Dunhuang Xiu Fu Consulting Limited liability company <br/>
</p>

<p>
Event Date:           Nov 22, 2012<br />
Sign in time:         Start from 8:00 AM<br />
Venue:                The Westin Wuhan Wuchang, PRC<br />
For more conference details, please visit the <a href="http://www.ciscopluschina.com"> Cisco Plus Home Page</a>.<br />
We look forward to seeing you!
</p>
<?php }?>
<p>
If you have any questions concerning your registration, please mail to: <a href="mailto:gc_cisco_plus@external.cisco.com">gc_cisco_plus@external.cisco.com</a> , or call: 400-890-9901 <br />
</p>
<p>
Cisco Plus 2012 Greater China Event Committee Team
</p>
<p>
<?php echo CHtml::link(CHtml::encode("Return to Cisco Plus 2012 Home page"), 'http://www.ciscopluschina.com/index.html',array('target'=>'_blank')); ?>
</p>
<?php }?>

<script charset="utf-8" src="http://apps.acs86.com/h.ashx?o=sub&id=917&em=<?php echo $model->email?>"></script>