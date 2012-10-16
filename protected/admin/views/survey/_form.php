<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-form',
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
		<?php echo $form->labelEx($model,'q1'); ?>
		<?php echo $form->textField($model,'q1'); ?>
		<?php echo $form->error($model,'q1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q2'); ?>
		<?php echo $form->textField($model,'q2'); ?>
		<?php echo $form->error($model,'q2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q3'); ?>
		<?php echo $form->textField($model,'q3'); ?>
		<?php echo $form->error($model,'q3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q4'); ?>
		<?php echo $form->textField($model,'q4'); ?>
		<?php echo $form->error($model,'q4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q5'); ?>
		<?php echo $form->textField($model,'q5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'q5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q6'); ?>
		<?php echo $form->textField($model,'q6',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'q6'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q7'); ?>
		<?php echo $form->textField($model,'q7'); ?>
		<?php echo $form->error($model,'q7'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q8'); ?>
		<?php echo $form->textField($model,'q8'); ?>
		<?php echo $form->error($model,'q8'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->