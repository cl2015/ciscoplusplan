<style type="text/css">
<!--
.ziti {
	color: #FFF;
	font-weight: bold;
}

.required {
	color: red;
}

.errorMessage {
	color: red;
	font-size: 0.9em;
}
-->
</style>
<?php
 $paydate = '8月15日-9月18日';
 $price = '528';
 $paid_amount='528';
?>


	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'reginfo-payment-form1',
			'enableAjaxValidation'=>false,
	)); ?>
<?php echo $form->hiddenField($model,'paid_amount',array('size'=>60,'maxlength'=>256,'value'=>$paid_amount)); ?>
		<table width="628" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="30" colspan="2" valign="top" scope="col">您需要支付的票价为：<?php echo $price;?>元人民币（<?php echo $paydate;?>）<br /><span
					class="required"> *</span> 请选择付款方式：</td>

			</tr>
			<tr>
				<td height="45" colspan="2" valign="top" scope="col"
					style="line-height: 35px;"><input id="Reginfo_payment_type_0"
					type="radio" name="Reginfo[payment_type]" value="0" checked="<?php if($model->payment_type = 0){ echo 'checked';}?>"> 线下付款
					（如选择线下付款，请在9月20日以前完成付款）<br /> <?php echo $form->error($model,'payment_type'); ?>
					公司名称：北京敦煌秀富咨询有限责任公司 （大会指定票务代理） <br /> 开户银行：北京银行八里庄支行<br /> 银行账号：01090  32070  012010  8152160</td>

			</tr>
			<tr>
				<td colspan="2" style="line-height: 35px;" scope="col">
                                    <input id="Reginfo_payment_type_1" type="radio" name="Reginfo[payment_type]" value="1" <?php if($model->payment_type = 1){ echo 'checked';}?>> 现场付款 &nbsp; &nbsp; &nbsp;
                                        <input id="Reginfo_payment_type_2" type="radio" name="Reginfo[payment_type]" value="2" <?php if($model->payment_type = 2){ echo 'checked';}?>> 在线付款
					<br /> <?php echo $form->error($model,'payment_type'); ?>
					 <span class="required">*</span>
					是否需要开具发票？ <?php echo $form->radioButtonList($payment, 'is_invoice', array('1'=>'是','0'=>'否'), array('separator' => '&nbsp;', 'template' => '{input} {label}'));?>
					<br /> <?php echo $form->error($payment,'is_invoice'); ?> <span
					class="required">*</span> 发票开具抬头： <?php echo $form->textField($payment,'invoice_title',array('size'=>60,'maxlength'=>512)); ?>
					<br /> <?php echo $form->error($payment,'invoice_title'); ?>
					如果发票付款方未作特别说明，则默认为"个人"<br /> 发票内容应为： <?php echo $form->radioButtonList($payment, 'invoice_content', array(0=>'会务费',1=>'会议费'), array('separator' => '&nbsp;', 'template' => '{input} {label}'));?>
					<?php echo $form->error($payment,'invoice_content'); ?></td>
			</tr>
                        <script>
                        function isneed_mail(val){
                            if(val==0){
                                $(".isgray").attr("style","");
                                $(".isgray input").attr("color","gray");
                                $(".isgray input").attr("val","");
                                $(".isgray input").attr("readonly","readonly");
                            }else{
                                $(".isgray input").attr("color","");
                                $(".isgray input").attr("readonly","");
                            }
                        }
                    </script>
			<tr>
				<td width="130" height="37"><b><span class="required">* </span> </b>是否需要邮寄发票：</td>
				<td width="503"><?php echo $form->radioButtonList($payment, 'need_mail', array(1=>'是',0=>'否'), array('separator' => '&nbsp;', 'template' => '{input} {label}','onchange'=>'isneed_mail(this.value)'));?>
					<?php echo $form->error($payment,'invoice_content'); ?></td>
			</tr>
			<tr class="isgray">
				<td height="37"><b><span class="required">*</span> </b>收件人姓名：</td>
				<td><?php echo $form->textField($payment,'recipient_name',array('size'=>60,'maxlength'=>256,'color'=>'gray','readonly'=>'readonly')); ?>
					<?php echo $form->error($payment,'recipient_name'); ?></td>
			</tr>
			<tr  class="isgray">

				<td height="37"><b><span class="required">*</span> </b>联系电话：</td>
				<td><?php echo $form->textField($payment,'phone',array('size'=>60,'maxlength'=>256,'color'=>'gray','readonly'=>'readonly')); ?>
					<?php echo $form->error($payment,'phone'); ?></td>
			</tr>
			<tr  class="isgray">
				<td height="37"><b><span class="required">*</span> </b>发票寄送地址：</td>
				<td><?php echo $form->textField($payment,'recipient_add',array('size'=>60,'maxlength'=>256,'color'=>'gray','readonly'=>'readonly')); ?>
					<?php echo $form->error($payment,'recipient_add'); ?>
				</td>
			</tr>

			<tr  class="isgray">
				<td height="37"><b><span class="required">*</span> </b>城市：</td>
				<td><?php echo $form->textField($payment,'city',array('size'=>60,'maxlength'=>256,'color'=>'gray','readonly'=>'readonly')); ?>
		<?php echo $form->error($payment,'city'); ?></td>
			</tr>
			<tr  class="isgray">
				<td height="37"><b><span class="required">*</span> </b>邮政编码：</td>
				<td>	<?php echo $form->textField($payment,'zip_code',array('color'=>'gray','readonly'=>'readonly')); ?>
		<?php echo $form->error($payment,'zip_code'); ?>
				</td>

			</tr>
			<tr  class="isgray">
				<td height="37">国家（地区）：</td>
				<td><?php echo $form->textField($payment,'country',array('size'=>60,'maxlength'=>256,'color'=>'gray','readonly'=>'readonly')); ?>
		<?php echo $form->error($payment,'country'); ?></td>
			</tr>
			<tr>
				<td height="60" colspan=2>
				<?php echo CHtml::Button(Yii::t('default','back'),array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton('确认提交',array("class"=>"submitBg")); ?></td>

			</tr>
			<tr>
				<td height="40"></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	<?php $this->endWidget(); ?>

