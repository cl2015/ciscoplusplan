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
			<td><?php echo $form->labelEx($model,'organisation'); ?>
			</td>
			<td><?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'organisation'); ?>
			</td>
		</tr>


		<tr>
			<td><?php echo $form->labelEx($model,'province');?>
			</td>
			<td><?php echo $form->dropDownList($model,'province',$model->getProvinces()); ?>
			</td>
			<td><?php echo $form->error($model,'province'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'city'); ?>
			</td>
			<td><?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'city'); ?>
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
			<td><?php echo $form->labelEx($model,'working_phone_dis'); ?>
			</td>
			<td><?php echo $form->textField($model,'working_phone_dis',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'working_phone_dis'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'working_phone'); ?>
			</td>
			<td><?php echo $form->textField($model,'working_phone',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'working_phone'); ?>
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

		<tr>
			<td><?php echo $form->labelEx($model,'relation_with_cisco'); ?>
			</td>
			<td><?php echo $form->dropDownList($model,'relation_with_cisco',$model->getRelationOptions()); ?>
			</td>
			<td><?php echo $form->error($model,'relation_with_cisco'); ?>
			</td>
		</tr>

		<!--

<tr>
	<td><?php echo $form->labelEx($model,'ec_name'); ?></td>
	<td><?php echo $form->textField($model,'ec_name',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'ec_name'); ?></td>
</tr>

<tr>
	<td><?php echo $form->labelEx($model,'ec_relationship'); ?></td>
	<td><?php echo $form->textField($model,'ec_relationship',array('size'=>60,'maxlength'=>256)); ?></td>
	<td><?php echo $form->error($model,'ec_relationship'); ?></td>
</tr>

<tr>
		<td><?php echo $form->labelEx($model,'ec_mobile'); ?></td>
		<td><?php echo $form->textField($model,'ec_mobile',array('size'=>60,'maxlength'=>256)); ?></td>
		<td><?php echo $form->error($model,'ec_mobile'); ?></td>
	</tr>
-->
	</table>
	<div class="row buttons">
		<?php //echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton('继续'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

