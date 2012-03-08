<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'OrdinaryUpdate',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->id; ?></h1>

<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/o_step2.jpg"/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
