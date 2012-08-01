<?php
$this->breadcrumbs=array(
	'Surveys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Survey', 'url'=>array('index')),
	array('label'=>'Manage Survey', 'url'=>array('admin')),
);
?>

<h1>Create Survey</h1>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/o_step3.jpg" />
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
