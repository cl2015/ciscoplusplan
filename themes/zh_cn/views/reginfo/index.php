<?php
$this->breadcrumbs=array(
	'Reginfos',
);

$this->menu=array(
	array('label'=>'Create Reginfo', 'url'=>array('create')),
	array('label'=>'Manage Reginfo', 'url'=>array('admin')),
);
?>

<h1>Reginfos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
