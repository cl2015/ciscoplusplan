<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'id'=>'form_search'
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
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
		<?php echo $form->labelEx($model,'relation_with_cisco'); ?> 
		<?php echo $form->dropDownList($model, 'relation_with_cisco', User::model()->getRelationOptions(),array('prompt'=>'请选择')); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'organisation'); ?>
		<?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?>
	</div>
        <div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->dropDownList($model, 'department', User::model()->getDepartmentOptions(),array('prompt'=>'请选择')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'am_name'); ?>
		<?php echo $form->textField($model,'am_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rm_name'); ?>
		<?php echo $form->textField($model,'rm_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'od_name'); ?>
		<?php echo $form->textField($model,'od_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>
       <div class="row">
		<?php echo $form->label($payment_model,'has_paid'); ?>
		<?php echo $form->dropDownList($payment_model,'has_paid', Payment::model()->getHasPaid(),array('prompt'=>'请选择')); ?>
	</div>
        <div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->dropDownList($model,'type_id', User::model()->getTypeOptions()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('查询'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->