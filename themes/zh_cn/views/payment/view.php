<h1>
	查看信息
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				'is_invoice'=>array(
						'label'=>'是否需要开具发票',
						'value'=>$model->is_invoice==0?'否':'是',
				),
				'invoice_title',
				'invoice_content'=>array(
						'label'=>'发票内容',
						'value'=>$model->is_invoice==0?'服务费':'会务费',
				),
				'need_mail'=>array(
						'label'=>'是否需要邮寄发票',
						'value'=>$model->is_invoice==0?'否':'是',
				),
				'recipient_name',
				'phone',
				'recipient_add',
				'city',
				'zip_code',
				'country',
	),
)); ?>
