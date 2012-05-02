<?php
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

<h1>财务查看用户信息</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
	<?php $this->renderPartial('//user/_search',array(
			'model'=>$model,
	)); ?>
</div>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'user-grid',
		'dataProvider'=>$model->adminSearch(),
		'filter'=>$model,
		'columns'=>array(
				//'id',
				//'has_code',

				'email',
				'mobile',
				'full_name',
				//'password',
				'has_reged'=>array(
						'name'=>'has_reged',
						'value'=>function($data)
						{
							return $data->has_reged==1?'已注册':'未注册';
						},

						),
						'payment.is_invoice'=>array(
								'name'=>'payment.is_invoice',
								'type'=>'raw',
								'value'=>function($data)
								{
									if(count($data->payment)>0){
										return $data->payment->is_invoice==0?'不需要':'需要';
									}
								},
						),
						'payment.need_mail'=>array(
								'name'=>'payment.need_mail',
								'type'=>'raw',
								'value'=>function($data)
								{
									if(count($data->payment)>0){
										return $data->payment->need_mail==0?'不需要':'需要';
									}
								},
								),
						'payment.has_paid'=>array(
								'name'=>'payment.has_paid',
								'type'=>'raw',
								'value'=>function($data)
								{
									if(count($data->payment)>0){
										return $data->payment->has_paid==0?'未收款':'已收款';
									}
								},
								),
						'payment.has_sendinvoice'=>array(
								'name'=>'payment.has_sendinvoice',
								'type'=>'raw',
								'value'=>function($data)
								{
									if(count($data->payment)>0){
										return $data->payment->has_sendinvoice==0?'未邮寄发票':'已邮寄发票';
									}
								},
						),
						array(            // display a column with "view", "update" and "delete" buttons
								'class'=>'CButtonColumn',
								'template'=>'{viewInvoice}<br/>{paid}<br/>{sent}',
								'buttons'=>array
								(
										'viewInvoice' => array(
												'label'=>'查看发票信息',
												'url'=>'Yii::app()->createUrl("payment/viewInvoice", array("id"=>$data->payment->id))',
												'visible'=>'$data->payment!=null && $data->payment->is_invoice==1',
												'options'=>array('target'=>'_blank'),
												
										),
										'paid' => array
										(
												'label'=>'确认已付款',
												'url'=>'Yii::app()->createUrl("payment/paid", array("id"=>$data->payment->id))',
												'visible'=>'$data->payment!=null && $data->payment->has_paid==0',
												'click'=>'function(){return confirm("are you sure ?");}',
										),
										'sent' => array
										(
												'label'=>'确认已邮寄发票',
												'url'=>'Yii::app()->createUrl("payment/sent", array("id"=>$data->payment->id))',
												'visible'=>'$data->payment!=null && $data->payment->has_sendinvoice==0 && $data->payment->need_mail==1',
												'click'=>'function(){return confirm("are you sure ?");}',
										),
								),
						),
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
										'created_at',
										'created_by',

										'updated_by',
										*/
										),
										)
										); ?>
