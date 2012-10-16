<h1>Create Survey</h1>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step2.png" />
<?php echo $this->renderPartial('_form', array('model'=>$model,'user'=>$user)); ?>
