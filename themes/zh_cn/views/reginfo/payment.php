<style type="text/css">
<!--
.ziti {
	color: #FFF;
	font-weight: bold;
}
-->
</style>
<?php if(Yii::app()->language=='en'){?>

	<?php 
		if($model->created_at<'2012-04-24 00:00:00'){
			$price = '$948.00';
		}elseif($model->created_at<'2012-05-08 00:00:00'){
			$price = '$948.00';
		}elseif($model->created_at<'2012-05-21 00:00:00'){
			$price = '$1,264.00';
		}else{
			$price = '$1,580.00';
		}
	?>
	<?php echo $model->created_at ?>
	当前价格为<?php echo $price;?>元
	
<img src=http://www.ciscopluschina.com/EN/images/agenda.gif align=center>

<?php }else{?>
	Current Price is RMB <?php echo $price;?>
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
