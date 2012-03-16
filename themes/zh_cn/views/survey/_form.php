<style>
div.form label {
	text-align: left;
	width: 400px;
}

li.q6 label {
	text-align: left;
	width: 200px;
}

div.form .password label {
	width: 200px;
}
</style>
<div class="form">
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'survey-form',
			'enableAjaxValidation' => true,
	));
	?>
	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model, 'user_id', array('size' => 10, 'maxlength' => 10)); ?>
	<table width="908px" border='0' cellspacing='0' cellpadding='0'>
		<th width="430px"><?php echo Yii::t('default','label_require')?></th>
		<th width=""></th>
		<th width=""></th>
		<tr>
			<td><?php echo $form->labelEx($model,'q1'); ?></td>
			<td><?php if(Yii::app()->language=='zh_cn') {
				echo $form->dropDownList($model, 'q1', $model->getQ11Options());
			}else{
				echo $form->dropDownList($model, 'q1', $model->getQ1Options());
			}
			?>
			</td>
			<td><?php echo $form->error($model, 'q1'); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'q2'); ?></td>
			<td><?php if(Yii::app()->language=='zh_cn') {
				echo $form->dropDownList($model, 'q2', $model->getQ22Options());
			}else{
				echo $form->dropDownList($model, 'q2', $model->getQ2Options());
			}
			?>
			</td>
			<td><?php echo $form->error($model, 'q2'); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'q3'); ?></td>
			<td><?php if(Yii::app()->language=='zh_cn') {
				echo $form->dropDownList($model, 'q3', $model->getQ33Options());
			}else{
				echo $form->dropDownList($model, 'q3', $model->getQ3Options());
			}
			?>
			</td>
			<td><?php echo $form->error($model, 'q3'); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'q4'); ?></td>
			<td><?php if(Yii::app()->language=='zh_cn') {
				echo $form->dropDownList($model, 'q4', $model->getQ44Options());
			}else{
				echo $form->dropDownList($model, 'q4', $model->getQ4Options());
			}
			?>
			</td>
			<td><?php echo $form->error($model, 'q4'); ?></td>
		</tr>
		<td><?php echo $form->labelEx($model,'q5'); ?></td>
		<td><?php if(Yii::app()->language=='zh_cn') {
			echo $form->dropDownList($model, 'q5', $model->getQ55Options());
		}else{
			echo $form->dropDownList($model, 'q5', $model->getQ5Options());
		}
		?>
		</td>
		<td><?php echo $form->error($model, 'q5'); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'q6'); ?></td>
			<?php echo $form->error($model, 'q6'); ?>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan=3><?php if(Yii::app()->language=='zh_cn') { ?> <?php 	echo $form->checkBoxList($model, 'q6', $model->getQ66Options(), array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;float:left; width:240px;line-height:30px;">{input} {label}</li>&nbsp;&nbsp;', 'labelOptions' => array('style' => 'display:inline;'), 'class' => 'AnswerNormal'));?>
				<?php }else{?> <?php 	echo $form->checkBoxList($model, 'q6', $model->getQ6Options(), array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;float:left; width:240px;line-height:30px;">{input} {label}</li>&nbsp;&nbsp;', 'labelOptions' => array('style' => 'display:inline;'), 'class' => 'AnswerNormal'));
				?> <?php }?>
			</td>
		</tr>


	</table>
	<table width="100%">
		<tr>
			<td colspan=3><?php echo Yii::t('default','password info')?>
			</td>
		</tr>
		<tr>
			<td class="password" width="200px"><?php echo $form->labelEx($user, 'password'); ?>
			</td>
			<td width='200px'><?php echo $form->passwordField($user, 'password'); ?>
			</td>
			<td width='508px'><?php echo $form->error($user, 'password'); ?>
			</td>
		</tr>
		<tr>
			<td class="password"><?php echo $form->labelEx($user, 'password2'); ?>
			</td>
			<td><?php echo $form->passwordField($user, 'password2'); ?></td>
			<td><?php echo $form->error($user, 'password'); ?>
			</td>
		</tr>
		<tr>
			<td colspan=3><?php echo CHtml::Button(Yii::t('default','back'),array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
				<?php echo CHtml::submitButton(Yii::t('default','finish'),array("class"=>"submitBg")); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>

</div>
<!-- form -->

