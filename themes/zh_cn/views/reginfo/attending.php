<style type="text/css">
<!--
.ziti {
	color: #FFF;
	font-weight: bold;
}
-->
</style>
<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-attending-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'is_online'); ?>
		<?php echo $form->radioButtonList($model,'is_online',$model->getOnlineOptions(),array('separator'=>'', 'template' =>'<li class="q6" style="list-style: none outside none;display:block; width:600px;float:none;">{input} {label}</li>', 'labelOptions' => array('style' => 'display:inline;'))); ?>
		<?php echo $form->error($model,'is_online'); ?>
	</div>
	<div style="clear:both;"></div>

	<div class="row buttons">
		<?php echo CHtml::Button(Yii::t('default','back'),array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton(Yii::t('default','continue'),array("class"=>"submitBg")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
