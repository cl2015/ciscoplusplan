<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>
<style>
    .row lable{display: inline;float: left;}
</style>
<h1>Update User <?php echo $model->id; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->errorSummary($payment); ?>
        <?php echo $form->errorSummary($survey); ?>
        <?php echo $form->errorSummary($reginfo); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
                <?php echo $model->id; ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'has_reged'); ?>
                <?php echo $form->dropDownList($model, 'has_reged', User::model()->gethasreged()); ?>
		<?php echo $form->error($model,'has_reged'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php if($model->code!=''){echo $model->code;}else{echo "无邀请码";} ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($reginfo,'is_online'); ?>
                <?php echo $form->dropDownList($reginfo, 'is_online', Reginfo::model()->getOnlineOptions()); ?>
		<?php echo $form->error($reginfo,'is_online'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'has_paid'); ?>
                <?php echo $form->dropDownList($payment, 'has_paid', Payment::model()->getHasPaid()); ?>
		<?php echo $form->error($payment,'has_paid'); ?>
    </div>
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'diff'); ?>
		 <?php echo $form->dropDownList($model, 'diff', User::model()->getDiffOptions()); ?>
		<?php echo $form->error($model,'diff'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'organisation'); ?>
		<?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'organisation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation_with_cisco'); ?>
		<?php echo $form->dropDownList($model, 'relation_with_cisco', User::model()->getRelationOptions()); ?>
		<?php echo $form->error($model,'relation_with_cisco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_title'); ?>
		<?php echo $form->dropDownList($model, 'job_title', User::model()->getJobTitleOptions()); ?>
		<?php echo $form->error($model,'job_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->dropDownList($model, 'department', User::model()->getDepartmentOptions()); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_phone_dis'); ?>
		<?php echo $form->textField($model,'working_phone_dis',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'working_phone_dis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_phone'); ?>
		<?php echo $form->textField($model,'working_phone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'working_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->dropDownList($model, 'province', User::model()->getProvinces()); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'od_id'); ?>
		<?php echo $form->textField($model,'od_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'od_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'am_name'); ?>
		<?php echo $form->textField($model,'am_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'am_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'am_id'); ?>
		<?php echo $form->textField($model,'am_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'am_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'am_mobile'); ?>
		<?php echo $form->textField($model,'am_mobile',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'am_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rm_name'); ?>
		<?php echo $form->textField($model,'rm_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rm_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rm_id'); ?>
		<?php echo $form->textField($model,'rm_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'od_name'); ?>
		<?php echo $form->textField($model,'od_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'od_name'); ?>
	</div>
        <h2>付款信息</h2>
        <div class="row">
		<?php echo $form->labelEx($reginfo,'paid_amount'); ?>
                <?php echo $reginfo->paid_amount;?>
		<?php echo $form->error($reginfo,'paid_amount'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'is_invoice'); ?>
		<?php echo $form->radioButtonList($payment, 'is_invoice', array('1'=>'是','0'=>'否'), array('separator' => '&nbsp;', 'template' => '{input} {label}'));?>
		<?php echo $form->error($payment,'is_invoice'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'invoice_title'); ?>
		<?php echo $form->textField($payment,'invoice_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($payment,'invoice_title'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'invoice_content'); ?>
		<?php echo $form->textField($payment,'invoice_content',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($payment,'invoice_content'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'recipient_add'); ?>
		<?php echo $form->textField($payment,'recipient_add',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($payment,'recipient_add'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'zip_code'); ?>
		<?php echo $form->textField($payment,'zip_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($payment,'zip_code'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'recipient_name'); ?>
		<?php echo $form->textField($payment,'recipient_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($payment,'recipient_name'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($payment,'phone'); ?>
		<?php echo $form->textField($payment,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($payment,'phone'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->