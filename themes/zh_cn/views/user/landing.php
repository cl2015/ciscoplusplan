<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-landing-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    <strong style=" font-size:16px;"></strong>
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organisation'); ?>
		<?php echo $form->textField($model,'organisation'); ?>
		<?php echo $form->error($model,'organisation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation_with_cisco'); ?>
		<?php echo $form->textField($model,'relation_with_cisco'); ?>
		<?php echo $form->error($model,'relation_with_cisco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name'); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_title'); ?>
		<?php echo $form->textField($model,'job_title'); ?>
		<?php echo $form->error($model,'job_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departiment'); ?>
		<?php echo $form->textField($model,'departiment'); ?>
		<?php echo $form->error($model,'departiment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_phone_dis'); ?>
		<?php echo $form->textField($model,'working_phone_dis'); ?>
		<?php echo $form->error($model,'working_phone_dis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_phone'); ?>
		<?php echo $form->textField($model,'working_phone'); ?>
		<?php echo $form->error($model,'working_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile'); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province'); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_name'); ?>
		<?php echo $form->textField($model,'ec_name'); ?>
		<?php echo $form->error($model,'ec_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_relationship'); ?>
		<?php echo $form->textField($model,'ec_relationship'); ?>
		<?php echo $form->error($model,'ec_relationship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_mobile'); ?>
		<?php echo $form->textField($model,'ec_mobile'); ?>
		<?php echo $form->error($model,'ec_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->