<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>true,
	)); ?>

	<p class="note">
		标记<span class="required">*</span>的为必填项
	</p>
	<?php echo $form->errorSummary($model); ?>
	<table>
		<th></th>
		<th></th>
		<th></th>

		<tr>
			<td><?php echo $form->labelEx($model,Yii::t('full_name','full_name')); ?>
			</td>
			<td><?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'full_name'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'job_title'); ?>
			</td>
			<td><?php echo $form->dropDownList($model,'job_title',$model->getJobTitleOptions()); ?>
			</td>
			<td><?php echo $form->error($model,'job_title'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'department'); ?>
			
			<td><?php echo $form->dropDownList($model,'department',$model->getDepartmentOptions()); ?>
			</td>
			<td><?php echo $form->error($model,'department'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'mobile'); ?>
			</td>
			<td><?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'mobile'); ?>
			</td>
		</tr>
	</table>
	<div class="row buttons">
		<?php //echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton('继续'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

