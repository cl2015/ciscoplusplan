<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>

	<div class="row">

		<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td vAlign='top' width='1%' >&nbsp;&nbsp;</td><td vAlign='top' class='QuestionNormal' width='50%' ><FONT CLASS = 'QuestionNormal'>贵单位的网络建设的投资方向是?</FONT></td><td ><select  CLASS='AnswerNormal'  name='a138168' size='1'><option value='_NA'>请选择一个</option><option value="局域网(LAN)" >局域网(LAN)</option><option value="广域网(WAN)" >广域网(WAN)</option><option value="城域网(MAN)" >城域网(MAN)</option><option value="无线解决方案" >无线解决方案</option><option value="光纤通信" >光纤通信</option><option value="统一通信" >统一通信</option><option value="IP 语音" >IP 语音</option><option value="思科网真" >思科网真</option><option value="DSL接入方案" >DSL接入方案</option><option value="有线接入方案" >有线接入方案</option><option value="数据中心" >数据中心</option><option value="存储网络" >存储网络</option><option value="虚拟专网及安全解决方案" >虚拟专网及安全解决方案</option><option value="不确定" >不确定</option><option value="其它" >其它</option></select></td></tr></table>	</div>

	<div class="row">
<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td vAlign='top' width='1%' >&nbsp;&nbsp;</td><td vAlign='top' class='QuestionNormal' width='50%' ><FONT CLASS = 'QuestionNormal'>贵单位在什么时间范围内将有网络扩张、升级或安全等方面的网络项目？</FONT><font color='red'>*</font> <input type='hidden' name='control_identifier' value='贵单位在什么时间范围内将有网络扩张、升级或安全等方面的网络项目？'><input type='hidden' name='control_identifier' value='a138169'></td><td ><select  CLASS='AnswerNormal'  name='a138169' size='1'><option value='_NA'>请选择一个</option><option value="三个月内" >三个月内</option><option value="四至六个月" >四至六个月</option><option value="七至十二个月" >七至十二个月</option><option value="十二个月以上" >十二个月以上</option><option value="没有计划" >没有计划</option><option value="不确定" >不确定</option></select></td></tr></table>
	</div>

	<div class="row">
		<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td vAlign='top' width='1%' >&nbsp;&nbsp;</td><td vAlign='top' class='QuestionNormal' width='50%' ><FONT CLASS = 'QuestionNormal'>贵单位如果计划进行网络扩张、升级或安全等网络项目，预算大概在什么范围（RMB）：</FONT><font color='red'>*</font> <input type='hidden' name='control_identifier' value='贵单位如果计划进行网络扩张、升级或安全等网络项目，预算大概在什么范围（RMB）：'><input type='hidden' name='control_identifier' value='a138170'></td><td ><select  CLASS='AnswerNormal'  name='a138170' size='1'><option value='_NA'>请选择一个</option><option value="0-1万" >0-1万</option><option value="1-5万" >1-5万</option><option value="5-15万" >5-15万</option><option value="15-25万" >15-25万</option><option value="25-50万" >25-50万</option><option value="50-100万" >50-100万</option><option value="100-200万" >100-200万</option><option value="200-500万" >200-500万</option><option value="500-1000万" >500-1000万</option><option value="1000万以上" >1000万以上</option><option value="预算不确定" >预算不确定</option><option value="没有预算" >没有预算</option><option value="不知道/不负责" >不知道/不负责</option></select></td></tr></table>	</div>

	<div class="row">
		<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td vAlign='top' width='1%' >&nbsp;&nbsp;</td><td vAlign='top' class='QuestionNormal' width='50%' ><FONT CLASS = 'QuestionNormal'>贵公司的PC数量是</FONT></td><td ><select  CLASS='AnswerNormal'  name='a138171' size='1'><option value='_NA'>请选择一个</option><option value="1 - 4台" >1 - 4台</option><option value="5 - 19台" >5 - 19台</option><option value="20 - 49台" >20 - 49台</option><option value="50 - 99台" >50 - 99台</option><option value="100 - 249台" >100 - 249台</option><option value="250 - 499台" >250 - 499台</option><option value="500 - 999台" >500 - 999台</option><option value="1000 - 1999台" >1000 - 1999台</option><option value="2000 - 4999台" >2000 - 4999台</option><option value="5000 - 9999台" >5000 - 9999台</option><option value="10000台以上" >10000台以上</option><option value="无" >无</option></select></td></tr></table>	</div>
	<div class="row">
<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td vAlign='top' width='1%' >&nbsp;&nbsp;</td><td vAlign='top' class='QuestionNormal' colspan='2' ><FONT CLASS = 'QuestionNormal'>您在信息化管理和网络建设中技术职责是什么</FONT></td></tr><tr><td width=1%></td><td colspan=2 ><table border="0" cellpadding="0" cellspacing="0"><tr><td valign='top'><input type='checkbox' value="IP通讯" name='a138159'  ><FONT CLASS = 'AnswerNormal'>IP通讯</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="IT应用" name='a138159'  ><FONT CLASS = 'AnswerNormal'>IT应用</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="光纤网络" name='a138159'  ><FONT CLASS = 'AnswerNormal'>光纤网络</FONT>&nbsp;&nbsp;</td><td width='*'></td></tr><tr><td valign='top'><input type='checkbox' value="安全 - 应用安全" name='a138159'  ><FONT CLASS = 'AnswerNormal'>安全 - 应用安全</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="安全 - 政策安全等级" name='a138159'  ><FONT CLASS = 'AnswerNormal'>安全 - 政策安全等级</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="安全 - 网络安全" name='a138159'  ><FONT CLASS = 'AnswerNormal'>安全 - 网络安全</FONT>&nbsp;&nbsp;</td><td width='*'></td></tr><tr><td valign='top'><input type='checkbox' value="数据中心 - 基础架构" name='a138159'  ><FONT CLASS = 'AnswerNormal'>数据中心 - 基础架构</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="数据中心 - 存储" name='a138159'  ><FONT CLASS = 'AnswerNormal'>数据中心 - 存储</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="数据中心 - 服务器" name='a138159'  ><FONT CLASS = 'AnswerNormal'>数据中心 - 服务器</FONT>&nbsp;&nbsp;</td><td width='*'></td></tr><tr><td valign='top'><input type='checkbox' value="数据中心 - 应用网络" name='a138159'  ><FONT CLASS = 'AnswerNormal'>数据中心 - 应用网络</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="无线" name='a138159'  ><FONT CLASS = 'AnswerNormal'>无线</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="系统维护" name='a138159'  ><FONT CLASS = 'AnswerNormal'>系统维护</FONT>&nbsp;&nbsp;</td><td width='*'></td></tr><tr><td valign='top'><input type='checkbox' value="网络维护" name='a138159'  ><FONT CLASS = 'AnswerNormal'>网络维护</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="网络运营" name='a138159'  ><FONT CLASS = 'AnswerNormal'>网络运营</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="视频系统" name='a138159'  ><FONT CLASS = 'AnswerNormal'>视频系统</FONT>&nbsp;&nbsp;</td><td width='*'></td></tr><tr><td valign='top'><input type='checkbox' value="语音系统" name='a138159'  ><FONT CLASS = 'AnswerNormal'>语音系统</FONT>&nbsp;&nbsp;</td><td valign='top'><input type='checkbox' value="语音 - 呼叫中心" name='a138159'  ><FONT CLASS = 'AnswerNormal'>语音 - 呼叫中心</FONT>&nbsp;&nbsp;</td><td width='*'></td></tr></TABLE></td></tr></table>
	</div>
	</div class="row buttons">
		<?php echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
