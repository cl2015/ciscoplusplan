<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'OrdinaryUpdate',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->id; ?></h1>

<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/o_step2.jpg"/>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'action' => array(""=>'user/ordinaryUpdate'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organisation'); ?>
		<?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'organisation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation_with_cisco'); ?>
		<?php echo $form->dropDownList($model,'relation_with_cisco',$model->getRelationOptions()); ?>
		<?php echo $form->error($model,'relation_with_cisco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_title'); ?>
		<?php echo $form->dropDownList($model,'job_title',$model->getJobTitleOptions()); ?>
		<?php echo $form->error($model,'job_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->dropDownList($model,'department',$model->getDepartmentOptions()); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_phone_dis'); ?>
		<?php echo $form->textField($model,'working_phone_dis',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'working_phone_dis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_phone'); ?>
		<?php echo $form->textField($model,'working_phone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'working_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_name'); ?>
		<?php echo $form->textField($model,'ec_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'ec_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_relationship'); ?>
		<?php echo $form->textField($model,'ec_relationship',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'ec_relationship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_mobile'); ?>
		<?php echo $form->textField($model,'ec_mobile',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'ec_mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

