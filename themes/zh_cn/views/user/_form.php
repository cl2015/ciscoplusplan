<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table >
<th></th><th></th><th></th>

<tr>
	<td><?php echo $form->labelEx($model,'姓名'); ?></td>
	<td><?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'full_name'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'公司名称'); ?></td>
	<td><?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'organisation'); ?></td>
</tr>


<tr>
	<td><?php echo $form->labelEx($model,'所在的省份');?></td>
	<td><?php echo $form->dropDownList($model,'province',$model->getProvinces()); ?></td>
	<td><?php echo $form->error($model,'province'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'所在的城市'); ?></td>
	<td><?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'city'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'您的职务级别'); ?></td>
	<td><?php echo $form->dropDownList($model,'job_title',$model->getJobTitleOptions()); ?></td>
	<td><?php echo $form->error($model,'job_title'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'您的部门'); ?>
	<td><?php echo $form->dropDownList($model,'department',$model->getDepartmentOptions()); ?></td>
	<td><?php echo $form->error($model,'department'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'区号'); ?></td>
	<td><?php echo $form->textField($model,'working_phone_dis',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'working_phone_dis'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'电话'); ?></td>
	<td><?php echo $form->textField($model,'working_phone',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'working_phone'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'手机号码'); ?></td>
	<td><?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'mobile'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'贵单位与思科公司的关系：'); ?></td>
	<td><?php echo $form->dropDownList($model,'relation_with_cisco',$model->getRelationOptions()); ?></td>
	<td><?php echo $form->error($model,'relation_with_cisco'); ?></td>
</tr>

<!--

<tr>
	<td><?php echo $form->labelEx($model,'ec_name'); ?></td>
	<td><?php echo $form->textField($model,'ec_name',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'ec_name'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'ec_relationship'); ?></td>
	<td><?php echo $form->textField($model,'ec_relationship',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'ec_relationship'); ?></td>
</tr>

<tr>
		<td><?php echo $form->labelEx($model,'ec_mobile'); ?></td>
		<td><?php echo $form->textField($model,'ec_mobile',array('size'=>60,'maxlength'=>256)); ?></td>
		<td><?php echo $form->error($model,'ec_mobile'); ?></td>
	</tr>
-->
<!--<tr><td colspan=3>请设立用于登录大会活动网站www.ciscopluschina.com的登录密码。注册完成后，即可在大会网站上使用注册邮箱和此密码登录，专享白皮书下载，视频观看等互动活动。</td></tr>
<tr>
	<td><?php echo $form->labelEx($model,'密码'); ?></td>
	<td><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'password'); ?></td>
</tr>
<tr>
	<td><?php echo $form->labelEx($model,'确认密码'); ?></td>
	<td><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'password'); ?></td>
</tr>-->
<?php echo $form->hiddenField($model,'password',array('size'=>60,'maxlength'=>256)); ?>
</table>
	<div class="row buttons">
		<?php echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
