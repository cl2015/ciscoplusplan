<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_invoice'); ?>
		<?php echo $form->textField($model,'is_invoice'); ?>
		<?php echo $form->error($model,'is_invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_title'); ?>
		<?php echo $form->textField($model,'invoice_title',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'invoice_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_content'); ?>
		<?php echo $form->textField($model,'invoice_content'); ?>
		<?php echo $form->error($model,'invoice_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'need_mail'); ?>
		<?php echo $form->textField($model,'need_mail'); ?>
		<?php echo $form->error($model,'need_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recipient_name'); ?>
		<?php echo $form->textField($model,'recipient_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'recipient_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recipient_add'); ?>
		<?php echo $form->textField($model,'recipient_add',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'recipient_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_paid'); ?>
		<?php echo $form->textField($model,'has_paid'); ?>
		<?php echo $form->error($model,'has_paid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_sendinvoice'); ?>
		<?php echo $form->textField($model,'has_sendinvoice'); ?>
		<?php echo $form->error($model,'has_sendinvoice'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->