<?php
$this->breadcrumbs=array(
	'Reginfos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reginfo', 'url'=>array('index')),
	array('label'=>'Create Reginfo', 'url'=>array('create')),
	array('label'=>'View Reginfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reginfo', 'url'=>array('admin')),
);
?>

<h1>Update Reginfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>