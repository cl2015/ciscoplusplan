<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
	)); ?>
	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<?php /*?>
	<div class="row">
	<?php echo $form->label($model,'id'); ?>
	<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'has_code'); ?>
	<?php echo $form->textField($model,'has_code'); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'code'); ?>
	<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>128)); ?>
	</div>
	<div class="row">
	<?php echo $form->label($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'organisation'); ?>
	<?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'relation_with_cisco'); ?>
	<?php echo $form->textField($model,'relation_with_cisco',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'full_name'); ?>
	<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'job_title'); ?>
	<?php echo $form->textField($model,'job_title',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'department'); ?>
	<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'working_phone_dis'); ?>
	<?php echo $form->textField($model,'working_phone_dis',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'working_phone'); ?>
	<?php echo $form->textField($model,'working_phone',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'mobile'); ?>
	<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?>
	</div>
	<?php /*?>
	<div class="row">
	<?php echo $form->label($model,'province'); ?>
	<?php echo $form->textField($model,'province',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'city'); ?>
	<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'ec_name'); ?>
	<?php echo $form->textField($model,'ec_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'ec_relationship'); ?>
	<?php echo $form->textField($model,'ec_relationship',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'ec_mobile'); ?>
	<?php echo $form->textField($model,'ec_mobile',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'created_at'); ?>
	<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'created_by'); ?>
	<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'updated_at'); ?>
	<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'updated_by'); ?>
	<?php echo $form->textField($model,'updated_by'); ?>
	</div>
	<?php */?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- search-form -->
