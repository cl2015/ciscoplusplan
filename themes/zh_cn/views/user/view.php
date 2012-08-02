<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'has_code',
		'code',
		'email',
		'password',
		'organisation',
		'relation_with_cisco',
		'full_name',
		'job_title',
		'department',
		'working_phone_dis',
		'working_phone',
		'mobile',
		'province',
		'city',
		'ec_name',
		'ec_relationship',
		'ec_mobile',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	),
)); ?>
