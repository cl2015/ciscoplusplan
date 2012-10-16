<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode(User::model()->getUsername($data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q1')); ?>:</b>
        
	<?php echo CHtml::encode(Survey::model()->getQ1Text($data->q1)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q2')); ?>:</b>
	<?php echo CHtml::encode(Survey::model()->getQ2Text($data->q2)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q3')); ?>:</b>
	<?php echo CHtml::encode(Survey::model()->getQ3Text($data->q3)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q4')); ?>:</b>
	<?php echo CHtml::encode(Survey::model()->getQ4Text($data->q4)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q5')); ?>:</b>
	<?php echo CHtml::encode(Survey::model()->getQ5Text($data->q5)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q6')); ?>:</b>
	<?php echo CHtml::encode(Survey::model()->getQ6Text($data->q6)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7')); ?>:</b>
	<?php echo CHtml::encode($data->q7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q8')); ?>:</b>
	<?php echo CHtml::encode($data->q8); ?>
	<br />

</div>