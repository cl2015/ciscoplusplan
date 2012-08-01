
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/o_step3.jpg" />
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-payment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		<?php echo $form->radioButtonList($model,'payment_type',$model->getPaymentOptions()); ?>
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
