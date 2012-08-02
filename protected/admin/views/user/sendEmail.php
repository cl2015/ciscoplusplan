<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>
<style>
    .row lable{display: inline;float: left;}
</style>
<h1>补发邮件</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $message; ?>
    <table>
        <tr>
		<td><?php echo $form->labelEx($model,'code'); ?></td>
		<td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?></td>
		<td><?php echo $form->error($model,'code'); ?></td>
	</tr>
	 <tr>
		<td><?php echo $form->labelEx($model,'email'); ?></td>
		<td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?></td>
		<td><?php echo $form->error($model,'email'); ?></td>
	</tr>
         <tr>
		<td><?php echo $form->labelEx($model,'language'); ?></td>
                <td><?php echo $form->dropDownList($model, 'language', User::model()->getlanguage()); ?></td>
		<td><?php echo $form->error($model,'language'); ?></td>
    </tr>
	 <tr>
		<td colspan="3" style="text-align: center;"><?php echo CHtml::submitButton($model->isNewRecord ? '发送邮件' : '发送邮件'); ?></td>
	</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->