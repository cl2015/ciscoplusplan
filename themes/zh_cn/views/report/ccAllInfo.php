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

<h1>Call Center查看用户信息</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
	<?php $this->renderPartial('//user/_search',array(
			'model'=>$model,
	)); ?>
</div>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'user-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
				'email',
				'mobile',
				'full_name',
				array(
            'header' => '',
            'type' => 'raw',
            'value' => function($data) {
                return 1;
            }
        )
				),
							)
); ?>
