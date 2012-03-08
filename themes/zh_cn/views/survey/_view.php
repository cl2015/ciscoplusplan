<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q1')); ?>:</b>
	<?php echo CHtml::encode($data->q1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q2')); ?>:</b>
	<?php echo CHtml::encode($data->q2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q3')); ?>:</b>
	<?php echo CHtml::encode($data->q3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q4')); ?>:</b>
	<?php echo CHtml::encode($data->q4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	*/ ?>

</div>