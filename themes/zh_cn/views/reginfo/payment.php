<style type="text/css">
<!--
.ziti {
	color: #FFF;
	font-weight: bold;
}
-->
</style>
<?php if(Yii::app()->language=='en'){?>

<img src=http://www.ciscopluschina.com/EN/images/agenda.gif align=center>

<?php }else{?>
<img src=http://www.ciscopluschina.com/images/agenda.gif align=center>

<?php }?>
<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'reginfo-payment-form',
			'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		<?php echo $form->radioButtonList($model,'payment_type',$model->getPaymentOptions(),array('separator'=>'', 'template' =>'<li class="q6" style="list-style: none outside none;display:block;float:left; width:140px;">{input} {label}</li>', 'labelOptions' => array('style' => 'display:inline;'))); ?>
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div style="clear:both;"></div>
	<div class="row buttons">
		<?php echo CHtml::Button(Yii::t('default','back'),array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton(Yii::t('default','continue'),array("class"=>"submitBg")); ?>

	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
