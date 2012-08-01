<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'has_code',
		'code',
		'email',
		'password',
		'organisation',
		/*
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
		'am_department',
		'od_id',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
		'type_id',
		'has_reged',
		'has_sended',
		'cc',
		'am_name',
		'am_id',
		'am_mobile',
		'rm_name',
		'rm_id',
		'od_name',
		'diff',
		'map_dept',
		'map_title',
		'map_loca',
		'MAIL_ZIP',
		'MAIL_COUNTRY',
		'ImportDate',
		'AUDIENCE',
		'Category',
		'COM_PHONE',
		'STATUS',
		'LAST_NAME',
		'CONF_ID',
		'LOCATION_ID',
		'MAIL_STATE',
		'MAIL_CITY',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
