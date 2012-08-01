<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-form',
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
		<?php echo $form->labelEx($model,'reg_date'); ?>
		<?php echo $form->textField($model,'reg_date'); ?>
		<?php echo $form->error($model,'reg_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reg_id'); ?>
		<?php echo $form->textField($model,'reg_id',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'reg_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reg_type'); ?>
		<?php echo $form->textField($model,'reg_type',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'reg_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reg_name'); ?>
		<?php echo $form->textField($model,'reg_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'reg_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reg_address'); ?>
		<?php echo $form->textField($model,'reg_address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'reg_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		<?php echo $form->textField($model,'payment_type'); ?>
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paid_amount'); ?>
		<?php echo $form->textField($model,'paid_amount',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'paid_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_online'); ?>
		<?php echo $form->textField($model,'is_online'); ?>
		<?php echo $form->error($model,'is_online'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->