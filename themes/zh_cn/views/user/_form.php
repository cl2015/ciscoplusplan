<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>true,
	)); ?>

	<p class="note">
		<?php echo Yii::t('default','label_required')?>
	</p>
	<?php echo $form->errorSummary($model); ?>
	<table>
		<th></th>
		<th></th>
		<th></th>
		<?php if(Yii::app()->language=="zh_cn"){?>
		<tr>
			<td><?php echo $form->labelEx($model,Yii::t('full_name','full_name')); ?>
			</td>
			<td><?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'full_name'); ?>
			</td>
		</tr>
		<?php }else{?>
		<tr>
			<td><?php echo $form->labelEx($model,'first_name'); ?>
			</td>
			<td><?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'first_name'); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'last_name'); ?>
			</td>
			<td><?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>256)); ?>
			</td>
			<td><?php echo $form->error($model,'last_name'); ?>
			</td>
		</tr>
		<?php }?>

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
			<td><?php if(Yii::app()->language=='en'){?> <?php echo $form->dropDownList($model,'province',$model->getEnProvinces()); ?>
				<?php }else{?> <?php echo $form->dropDownList($model,'province',$model->getProvinces()); ?>
				<?php }?></td>
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
<!--
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
-->
		<tr>
			<td><?php echo $form->labelEx($model,'mobile'); ?>
			</td>
			<td><?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256,'onchange'=>'isok()')); ?>
			</td>
			<td id="mobile_error"><?php echo $form->error($model,'mobile'); ?>
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
		<tr>
			<td><?php echo $form->labelEx($model,'weibo'); ?></td>
			<td><?php echo $form->textField($model,'weibo',array('size'=>60,'maxlength'=>255)); ?></td>
			<td><?php echo $form->error($model,'weibo'); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'tencent'); ?></td>
			<td><?php echo $form->textField($model,'tencent',array('size'=>60,'maxlength'=>255)); ?></td>
			<td><?php echo $form->error($model,'tencent'); ?></td>
		</tr>
	</table>
	<div class="row buttons">
		<?php //echo CHtml::Button('back',array("onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton(Yii::t('default','continue'),array('class'=>'submitBg')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
<script>
    function isok(){
        if(!$("#User_mobile").val().match(/^1([3|4|5|8])\d{9}$/)){
            $("#mobile_error").html("手机号码第一位只能为1，第二位不为0、1、2、6、7、9！");
            $("#User_mobile").val("");
        }
    }
</script>


