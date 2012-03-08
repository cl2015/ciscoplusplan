<h1>Update User <?php echo $model->id; ?></h1>

<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step1.png"/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
