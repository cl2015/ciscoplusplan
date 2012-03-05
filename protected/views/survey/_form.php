<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->hiddenField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">

		<h2>1. What is your company's network construction investment prospects?</h2>
		<?php echo $form->dropDownList($model,'q1',$model->getQ1Options()); ?>
		<?php echo $form->error($model,'q1'); ?>
	</div>

	<div class="row">
		<h2>2. When will your company for network expansion, upgrade or safety network projects ?</h2>
		<?php echo $form->dropDownList($model,'q2',$model->getQ2Options()); ?>
		<?php echo $form->error($model,'q2'); ?>
	</div>

	<div class="row">
		<h2>3. If your company plans to network expansion, upgrade or safety network projects,  the budget probably is (RMB)</h2>
		<?php echo $form->dropDownList($model,'q3',$model->getQ3Options()); ?>
		<?php echo $form->error($model,'q3'); ?>
	</div>

	<div class="row">
		<h2>4. Your company's PC number is:</h2>
		<?php echo $form->dropDownList($model,'q4',$model->getQ4Options()); ?>
		<?php echo $form->error($model,'q4'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
