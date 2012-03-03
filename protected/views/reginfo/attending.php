<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-attending-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'is_online'); ?>
		<?php echo $form->radioButtonList($model,'is_online',$model->getOnlineOptions()); ?>
		<?php echo $form->error($model,'is_online'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
