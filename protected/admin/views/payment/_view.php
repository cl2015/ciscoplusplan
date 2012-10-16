<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_invoice')); ?>:</b>
	<?php echo CHtml::encode($data->is_invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_title')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_content')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('need_mail')); ?>:</b>
	<?php echo CHtml::encode($data->need_mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recipient_name')); ?>:</b>
	<?php echo CHtml::encode($data->recipient_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recipient_add')); ?>:</b>
	<?php echo CHtml::encode($data->recipient_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_paid')); ?>:</b>
	<?php echo CHtml::encode($data->has_paid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_sendinvoice')); ?>:</b>
	<?php echo CHtml::encode($data->has_sendinvoice); ?>
	<br />

	*/ ?>

</div>