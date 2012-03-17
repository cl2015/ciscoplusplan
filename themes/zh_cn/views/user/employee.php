<?php if(Yii::app()->language=='zh_cn'){?>
<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/4.png" />
<?php }else{?>
<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/4_en.jpg" />
<?php }?>
<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>true,
	)); ?>

	<p class="note">
		<?php echo Yii::t('default','label_required');?>
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
			<td><?php echo $form->labelEx($model,'ec_name'); ?>
			</td>
			<td><?php echo $form->textField($model,'ec_name',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'$ec_name'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'department'); ?>
			
			<td><?php echo $form->dropDownList($model, 'department', $model->getEmployeeDepartmentOptions());?>
			</td>
			<td><?php echo $form->error($model,'department'); ?>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td><?php echo $form->labelEx($model,'others'); ?><?php echo $form->textField($model,'others',array('size'=>40,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'others'); ?>
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
		<?php //echo CHtml::Button(Yii::t('default','back'),array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton(Yii::t('default','finish'),array("class"=>"submitBg")); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

