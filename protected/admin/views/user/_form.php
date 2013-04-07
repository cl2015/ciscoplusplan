<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->errorSummary($payment); ?>
        <?php echo $form->errorSummary($survey); ?>
        <?php echo $form->errorSummary($reginfo); ?>
        <table>
            <tr>
                <td>
		<?php echo $form->labelEx($model,'id'); ?>
                </td>
                <td>
                <?php echo $model->id; ?>
                </td>
                <td></td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'has_reged'); ?> </td>
               <td> <?php echo $form->dropDownList($model, 'has_reged', User::model()->gethasreged()); ?> </td>
		<td><?php echo $form->error($model,'has_reged'); ?> </td>
	</tr>
        <tr>
            <td><?php echo $form->labelEx($model,'has_code'); ?> </td>
            <td> <?php echo $form->dropDownList($model, 'has_code', User::model()->getHasCodeOptions()); ?> </td>
            <td><?php echo $form->error($model,'has_code'); ?> </td>
        </tr>
        <tr>
		<td><?php echo $form->labelEx($model,'code'); ?> </td>
                <td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?>
                <td> </td>
	</tr>
        <tr>
            <td><?php echo $form->labelEx($model,'type_id'); ?> </td>
            <td> <?php echo $form->dropDownList($model, 'type_id', User::model()->getTypeOptions()); ?> </td>
            <td><?php echo $form->error($model,'type_id'); ?> </td>
        </tr>
       <tr>
		<td><?php echo $form->labelEx($reginfo,'is_online'); ?> </td>
               <td> <?php echo $form->radioButtonList($reginfo, 'is_online', Reginfo::model()->getOnlineOptions()); ?> </td>
		<td><?php echo $form->error($reginfo,'is_online'); ?> </td>
	</tr>
       <tr>
		<td><?php echo $form->labelEx($payment,'has_paid'); ?> </td>
               <td> <?php echo $form->dropDownList($payment, 'has_paid', Payment::model()->getHasPaid()); ?> </td>
		<td><?php echo $form->error($payment,'has_paid'); ?> </td>
    </tr>
    <tr>
		<td><?php echo $form->labelEx($model,'diff'); ?></td>
		<td> <?php echo $form->dropDownList($model, 'diff', User::model()->getDiffOptions()); ?></td>
		<td><?php echo $form->error($model,'diff'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'email'); ?> </td>
		<td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'email'); ?> </td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'organisation'); ?> </td>
		<td><?php echo $form->textField($model,'organisation',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'organisation'); ?> </td>
        </tr>
        <tr>
		<td><?php echo $form->labelEx($model,'relation_with_cisco'); ?> </td>
		<td><?php echo $form->dropDownList($model, 'relation_with_cisco', User::model()->getRelationOptions()); ?> </td>
		<td><?php echo $form->error($model,'relation_with_cisco'); ?> </td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'weibo'); ?> </td>
		<td><?php echo $form->textField($model,'weibo',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'weibo'); ?> </td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'tencent'); ?> </td>
		<td><?php echo $form->textField($model,'tencent',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'tencent'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'full_name'); ?> </td>
		<td><?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'full_name'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'job_title'); ?> </td>
		<td><?php echo $form->dropDownList($model, 'job_title', User::model()->getJobTitleOptions()); ?> </td>
		<td><?php echo $form->error($model,'job_title'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'department'); ?> </td>
		<td><?php echo $form->dropDownList($model, 'department', User::model()->getDepartmentOptions()); ?> </td>
		<td><?php echo $form->error($model,'department'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'working_phone_dis'); ?> </td>
		<td><?php echo $form->textField($model,'working_phone_dis',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'working_phone_dis'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'working_phone'); ?> </td>
		<td><?php echo $form->textField($model,'working_phone',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'working_phone'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'mobile'); ?> </td>
		<td><?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'mobile'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'province'); ?> </td>
		<td><?php echo $form->dropDownList($model, 'province', User::model()->getProvinces()); ?> </td>
		<td><?php echo $form->error($model,'province'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'city'); ?> </td>
		<td><?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>256)); ?> </td>
		<td><?php echo $form->error($model,'city'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'am_name'); ?> </td>
		<td><?php echo $form->textField($model,'am_name',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'am_name'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'am_id'); ?> </td>
		<td><?php echo $form->textField($model,'am_id',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'am_id'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'am_mobile'); ?> </td>
		<td><?php echo $form->textField($model,'am_mobile',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'am_mobile'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'rm_name'); ?> </td>
		<td><?php echo $form->textField($model,'rm_name',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'rm_name'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'rm_id'); ?> </td>
		<td><?php echo $form->textField($model,'rm_id',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'rm_id'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'od_name'); ?> </td>
		<td><?php echo $form->textField($model,'od_name',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'od_name'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'od_id'); ?> </td>
		<td><?php echo $form->textField($model,'od_id',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($model,'od_id'); ?> </td>
	</tr>
        <tr>
            <th colspan="3">付款信息</th>

        </tr>
        <tr>
		<td><?php echo $form->labelEx($reginfo,'paid_amount'); ?> </td>
               <td> <?php echo $reginfo->paid_amount;?> </td>
		<td><?php echo $form->error($reginfo,'paid_amount'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'has_sendinvoice'); ?> </td>
                <td><?php echo $form->dropDownList($payment, 'has_sendinvoice', Payment::model()->getisSendinvoice()); ?> </td>
		<td><?php echo $form->error($payment,'has_sendinvoice'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($model,'has_sended'); ?> </td>
                <td><?php echo $form->dropDownList($model, 'has_sended', User::model()->getHasSendOptions()); ?> </td>
		<td><?php echo $form->error($model,'has_sended'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($reginfo,'payment_type'); ?> </td>
                <td><?php echo $form->dropDownList($reginfo, 'payment_type', Reginfo::model()->getPaymentOptions()); ?> </td>
		<td><?php echo $form->error($reginfo,'payment_type'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'is_invoice'); ?> </td>
		<td><?php echo $form->radioButtonList($payment, 'is_invoice', array('1'=>'是','0'=>'否'), array('separator' => '&nbsp;', 'template' => '{input} {label}'));?> </td>
		<td><?php echo $form->error($payment,'is_invoice'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'invoice_title'); ?> </td>
		<td><?php echo $form->textField($payment,'invoice_title',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($payment,'invoice_title'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'invoice_content'); ?> </td>
		<td><?php echo $form->dropDownList($payment, 'invoice_content', Payment::model()->getContentOptions()); ?> </td>
		<td><?php echo $form->error($payment,'invoice_content'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'recipient_add'); ?> </td>
		<td><?php echo $form->textField($payment,'recipient_add',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($payment,'recipient_add'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'zip_code'); ?> </td>
		<td><?php echo $form->textField($payment,'zip_code',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($payment,'zip_code'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'recipient_name'); ?> </td>
		<td><?php echo $form->textField($payment,'recipient_name',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($payment,'recipient_name'); ?> </td>
	</tr>
        <tr>
		<td><?php echo $form->labelEx($payment,'phone'); ?> </td>
		<td><?php echo $form->textField($payment,'phone',array('size'=>60,'maxlength'=>255)); ?> </td>
		<td><?php echo $form->error($payment,'phone'); ?> </td>
	</tr>
        <tr>
            <td colspan="3">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </td>
	</tr>
</table>
<?php $this->endWidget(); ?>