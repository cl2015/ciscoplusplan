<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_code')); ?>:</b>
	<?php if($data->has_code==0){echo "无邀请码" ;}else{ echo "有邀请码";} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organisation')); ?>:</b>
	<?php echo CHtml::encode($data->organisation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relation_with_cisco')); ?>:</b>
	<?php echo CHtml::encode($data->relation_with_cisco); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_title')); ?>:</b>
	<?php echo CHtml::encode($data->job_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_phone_dis')); ?>:</b>
	<?php echo CHtml::encode($data->working_phone_dis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_phone')); ?>:</b>
	<?php echo CHtml::encode($data->working_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($data->province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ec_name')); ?>:</b>
	<?php echo CHtml::encode($data->ec_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ec_relationship')); ?>:</b>
	<?php echo CHtml::encode($data->ec_relationship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ec_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->ec_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('am_department')); ?>:</b>
	<?php echo CHtml::encode($data->am_department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('od_id')); ?>:</b>
	<?php echo CHtml::encode($data->od_id); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_reged')); ?>:</b>
	<?php echo CHtml::encode($data->has_reged); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_sended')); ?>:</b>
	<?php echo CHtml::encode($data->has_sended); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc')); ?>:</b>
	<?php echo CHtml::encode($data->cc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('am_name')); ?>:</b>
	<?php echo CHtml::encode($data->am_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('am_id')); ?>:</b>
	<?php echo CHtml::encode($data->am_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('am_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->am_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rm_name')); ?>:</b>
	<?php echo CHtml::encode($data->rm_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rm_id')); ?>:</b>
	<?php echo CHtml::encode($data->rm_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('od_name')); ?>:</b>
	<?php echo CHtml::encode($data->od_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diff')); ?>:</b>
	<?php echo CHtml::encode($data->diff); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_dept')); ?>:</b>
	<?php echo CHtml::encode($data->map_dept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_title')); ?>:</b>
	<?php echo CHtml::encode($data->map_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_loca')); ?>:</b>
	<?php echo CHtml::encode($data->map_loca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAIL_ZIP')); ?>:</b>
	<?php echo CHtml::encode($data->MAIL_ZIP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAIL_COUNTRY')); ?>:</b>
	<?php echo CHtml::encode($data->MAIL_COUNTRY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ImportDate')); ?>:</b>
	<?php echo CHtml::encode($data->ImportDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AUDIENCE')); ?>:</b>
	<?php echo CHtml::encode($data->AUDIENCE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Category')); ?>:</b>
	<?php echo CHtml::encode($data->Category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COM_PHONE')); ?>:</b>
	<?php echo CHtml::encode($data->COM_PHONE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONF_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CONF_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOCATION_ID')); ?>:</b>
	<?php echo CHtml::encode($data->LOCATION_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAIL_STATE')); ?>:</b>
	<?php echo CHtml::encode($data->MAIL_STATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAIL_CITY')); ?>:</b>
	<?php echo CHtml::encode($data->MAIL_CITY); ?>
	<br />

	*/ ?>

</div>