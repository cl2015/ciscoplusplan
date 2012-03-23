<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-loading-form',
			'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	<table width="628" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<th width="266" height="45" valign="top" scope="col"><?php echo Yii::t('default','label_required')?>
			</th>
			<th width="362" scope="col">&nbsp;</th>
			<th width="" scope="col">&nbsp;</th>
		</tr>
		<tr>
		<td><?php echo $form->labelEx($model,'email'); ?></td>
		<td><?php echo $form->textField($model,'email'); ?></td>
		<td><?php echo $form->error($model,'email'); ?><?php echo $message["email"];?></td>
		</tr>
		<td><?php echo $form->labelEx($model,'code'); ?></td>
		<td><?php echo $form->textField($model,'code'); ?></td>
		<td><?php echo $form->error($model,'code'); ?><?php echo $message["code"];?></td>
		</tr>

	</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('default','continue'),array("class"=>"submitBg")); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>
<!-- form -->
<script type="text/javascript">
ACTracker.track({ "type": "event","action": "loading"});
</script>


