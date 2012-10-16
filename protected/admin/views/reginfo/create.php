<?php
$this->breadcrumbs=array(
	'Reginfos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reginfo', 'url'=>array('index')),
	array('label'=>'Manage Reginfo', 'url'=>array('admin')),
);
?>

<h1>Create Reginfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>