<style type="text/css">
<!--
.ziti {
	color: #FFF;
	font-weight: bold;
}
-->
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reginfo-attending-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'is_online'); ?>
		<?php echo $form->radioButtonList($model,'is_online',$model->getOnlineOptions(),array('separator'=>'', 'template' =>'<li class="q6" style="list-style: none outside none;display:block; width:600px;float:none;">{input} {label}</li>', 'labelOptions' => array('style' => 'display:inline;'))); ?>
		<?php echo $form->error($model,'is_online'); ?>
	</div>
	<div style="clear:both;"></div>
<?php if(Yii::app()->language=='en'){?>
<table width="713" height="211" border="1px;" align="center"
	cellpadding="0" cellspacing="0" bordercolor="E5E0EC">
	<tr class="ziti">
		<td width="88" align="center" valign="middle" bgcolor="#8064A2"></td>
		<td width="150" align="center" valign="middle" bgcolor="#8064A2">Phase</td>
		<td width="102" align="center" valign="middle" bgcolor="#8064A2">Price</td>
		<td width="104" align="center" valign="middle" bgcolor="#8064A2">Discount</td>
		<td width="131" align="center" valign="middle" bgcolor="#8064A2">Dates</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle" bgcolor="#E5E0EC">&nbsp;</td>
		<td width="150" align="center" valign="middle" bgcolor="#E5E0EC">Early
			Bird</td>
		<td width="102" align="center" valign="middle" bgcolor="#E5E0EC"> ¥  
			948.00</td>
		<td width="104" align="center" valign="middle" bgcolor="#E5E0EC">40%
			off</td>
		<td width="131" align="center" valign="middle" bgcolor="#E5E0EC">16
			Mar-23 Apr</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle">&nbsp;</td>
		<td width="150" align="center" valign="middle">Early Bird Extension</td>
		<td width="102" align="center" valign="middle"> ¥   948.00</td>
		<td width="104" align="center" valign="middle">40% off</td>
		<td width="131" align="center" valign="middle">24 Apr- 7 May</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle" bgcolor="#E5E0EC">&nbsp;</td>
		<td width="150" align="center" valign="middle" bgcolor="#E5E0EC">Pre-register</td>
		<td width="102" align="center" valign="middle" bgcolor="#E5E0EC"> ¥
			1,264.00</td>
		<td width="104" align="center" valign="middle" bgcolor="#E5E0EC">20%
			off</td>
		<td width="131" align="center" valign="middle" bgcolor="#E5E0EC">8
			May- 20 May</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle">&nbsp;</td>
		<td width="150" align="center" valign="middle">On-site registration</td>
		<td width="102" align="center" valign="middle"> ¥ 1,580.00</td>
		<td width="104" align="center" valign="middle">&nbsp;</td>
		<td width="131" align="center" valign="middle">21 May- 22 May</td>
	</tr>
</table>
<?php }else{?>
<table width="731" height="192" border="1px;" align="center"
	cellpadding="0" cellspacing="0" bordercolor="E5E0EC">
	<tr class="ziti">
		<td width="88" align="center" valign="middle" bgcolor="#8064A2"></td>
		<td width="150" align="center" valign="middle" bgcolor="#8064A2">阶段</td>
		<td width="102" align="center" valign="middle" bgcolor="#8064A2">票价</td>
		<td width="104" align="center" valign="middle" bgcolor="#8064A2">折扣</td>
		<td width="131" align="center" valign="middle" bgcolor="#8064A2">有效期</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle" bgcolor="#E5E0EC">&nbsp;</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC">特惠购票</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC"> ¥   948.00</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC">6折</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC">3月16日-4月23日</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle">&nbsp;</td>
		<td align="center" valign="middle">特惠购票延长期</td>
		<td align="center" valign="middle"> ¥   948.00</td>
		<td align="center" valign="middle">6折</td>
		<td align="center" valign="middle">4月24日-5月7日</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle" bgcolor="#E5E0EC">&nbsp;</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC">优惠购票</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC"> ¥ 1,264.00</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC">8折</td>
		<td align="center" valign="middle" bgcolor="#E5E0EC">5月8日-5月20日</td>
	</tr>
	<tr>
		<td width="88" align="center" valign="middle">&nbsp;</td>
		<td align="center" valign="middle">现场购票</td>
		<td align="center" valign="middle"> ¥ 1,580.00</td>
		<td align="center" valign="middle"></td>
		<td align="center" valign="middle">5月21日-5月22日</td>
	</tr>
</table>
<?php }?>


	<div class="row buttons">
		<?php echo CHtml::Button(Yii::t('default','back'),array('class'=>'submitBg',"onclick"=>"javascript:history.go(-1)")); ?>
		<?php echo CHtml::submitButton(Yii::t('default','continue'),array("class"=>"submitBg")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
