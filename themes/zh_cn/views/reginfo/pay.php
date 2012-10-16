<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-pay-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">this is a virtual payment page,at next week,you will see a real payment page redriect to China Bank Online payment center.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="row">
		<?php echo $form->labelEx($model,'paid_amount'); ?>
		<?php echo $form->textField($model,'paid_amount',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'paid_amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
