<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-attending-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	<h2>Please choose  attending form:</h2>
		<?php echo $form->labelEx($model,'is_online'); ?>
		<?php echo $form->radioButtonList($model,'is_online',$model->getOnlineOptions()); ?>
		<?php echo $form->error($model,'is_online'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::Button('back',array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton('continue',array("class"=>"submitBg")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
