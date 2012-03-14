<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-loading-form',
			'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<table width="628" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<th width="166" height="45" valign="top" scope="col"><em>标记<span>*</span>的为必填项
			</em>
			</th>
			<th width="362" scope="col">&nbsp;</th>
			<th width="" scope="col">&nbsp;</th>
		</tr>
		<tr>
		<td>请输入您的邮箱地址：<span>*</span></td>
		<td><?php echo $form->textField($model,'email'); ?></td>
		<td><?php echo $form->error($model,'email'); ?><?php echo $message["email"];?></td>
		</tr>
		<td>如果您之前收到了邀请码，请在下面输入，如果没有，直接点击继续，进入下一页面。</td>
		<td><?php echo $form->textField($model,'code'); ?></td>
		<td><?php echo $form->error($model,'code'); ?><?php echo $message["code"];?></td>
		</tr>

	</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton('继续',array("class"=>"submitBg")); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>
<!-- form -->

