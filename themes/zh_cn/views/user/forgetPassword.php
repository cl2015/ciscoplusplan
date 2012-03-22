<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>true,
	)); ?>

	<p class="note">
		<?php echo Yii::t('default','label_required')?><br />
		<?php echo Yii::t('default',$message);?>
	</p>
	<?php echo $form->errorSummary($model); ?>
	<table>
		<th></th>
		<th></th>
		<th></th>
		<tr>
			<td><?php echo $form->labelEx($model,'email'); ?>
			</td>
			<td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'email'); ?>
			</td>
		</tr>
	</table>
	<div class="row buttons">
		<?php //echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton(Yii::t('default','continue'),array('class'=>'submitBg')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

