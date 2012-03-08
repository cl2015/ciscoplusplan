<div class="form">
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'survey-form',
			'enableAjaxValidation' => true,
	));
	?>
	<p class="note">
		标记<span class="required">*</span>的为必填项
	</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model, 'user_id', array('size' => 10, 'maxlength' => 10)); ?>
	<div class="row">

		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<tr>
				<td><?php echo $form->labelEx($model,'q1'); ?></td>
				<td><?php echo $form->dropDownList($model, 'q1', $model->getQ11Options()); ?>
				</td>
				<td><?php echo $form->error($model, 'q1'); ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'q2'); ?></td>
				<td><?php echo $form->dropDownList($model, 'q2', $model->getQ22Options()); ?>
				</td>
				<td><?php echo $form->error($model, 'q2'); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'q3'); ?></td>
				<td><?php echo $form->dropDownList($model, 'q3', $model->getQ33Options()); ?>
				</td>
				<td><?php echo $form->error($model, 'q3'); ?></td>
			</tr>

			<tr>
				<td><?php echo $form->labelEx($model,'q4'); ?></td>
				<td><?php echo $form->dropDownList($model, 'q4', $model->getQ44Options()); ?>
				</td>
				<td><?php echo $form->error($model, 'q4'); ?></td>
			</tr>
			<td><?php echo $form->labelEx($model,'q5'); ?></td>
			<td><?php echo $form->dropDownList($model, 'q5', $model->getQ55Options()); ?>
			</td>
			<td><?php echo $form->error($model, 'q5'); ?></td>
			</tr>
		</table>
	</div>
	<div class="row">
		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<tr>
				<td><?php echo $form->labelEx($model,'q6'); ?></td>
			</tr>
			<tr>
				<td>
					<ul style="width: 600px;">
						<?php echo $form->checkBoxList($model, 'q6', $model->getQ66Options(), array('separator' => '', 'template' => '<li style="list-style: none outside none;float:left; width:140px;line-height:30px;">{input} {label}</li>&nbsp;&nbsp;', 'labelOptions' => array('style' => 'display:inline;'), 'class' => 'AnswerNormal')); ?>

					</ul>
				</td>
				<td><?php echo $form->error($model, 'q6'); ?></td>
			</tr>


		</table>
		<table>
			<tr>
				<td colspan=3>请设立用于登录大会活动网站<a href="http://www.ciscopluschina.com">www.ciscopluschina.com</a>的登录密码。注册完成后，即可在大会网站上使用注册邮箱和此密码登录，专享白皮书下载，视频观看等互动活动。</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($user, 'password'); ?></td>
				<td><?php echo $form->passwordField($user, 'password'); ?></td>
				<td><?php echo $form->error($user, 'password'); ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($user, 'password2'); ?></td>
				<td><?php echo $form->passwordField($user, 'password2'); ?></td>
				<td><?php echo $form->error($user, 'password'); ?>
				</td>
			</tr>
		</table>
	</div>
	<div class="row buttons">
		<?php //echo CHtml::Button('返回', array("onclick" => "javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton('完成'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

