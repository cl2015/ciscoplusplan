<h1>Confirmation</h1>
<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/step3.png" />
</br>
<?php echo $this->renderPartial('_confirmation', array('model'=>$model)); ?>

