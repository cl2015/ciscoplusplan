<?php
$this->breadcrumbs=array(
	'Reginfos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reginfo', 'url'=>array('index')),
	array('label'=>'Create Reginfo', 'url'=>array('create')),
	array('label'=>'Update Reginfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reginfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reginfo', 'url'=>array('admin')),
);
?>

<h1>View Reginfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'reg_date',
		'reg_id',
		'reg_type',
		'reg_name',
		'reg_address',
		'payment_type',
		'paid_amount',
		'is_online',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
		'has_paid',
	),
)); ?>
