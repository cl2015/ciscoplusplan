<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step0.png" />
</br>
<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-loading-form',
			'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" id="email" style="display: block">
		<h2>请输入您的邮箱地址：</h2>
		<li class="input"><?php echo $form->textField($model,'email'); ?></li>
		<li class="error"><?php echo $form->error($model,'email'); ?></li>
	</div>
	<div style="clear:both"></div>
	<div class="row" id="code" style="display: block">
		<h2>如果您之前收到了邀请码，请在下面输入，如果没有，直接点击继续，进入下一页面。(格式XXX-XXX-XXX):</h2>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('继续'); ?>
	</div>
	<?php $this->endWidget(); ?>
	<?php CHtml::ajaxLink('下一个', array('getQuote'),
			array('update' => '#quote-of-the-day'))?>
	<script type="text/javascript">

	function showCode(){
		if ( $("input[name=User[has_code]][value=0]").attr("checked")=="checked" )  {
			//$("#email").hide();
			$("#code").show();
		}else{
			$("#code").hide();
			$("#email").show();
		}

	}
</script>
</div>
<!-- form -->

