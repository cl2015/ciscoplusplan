<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-attending-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'has_code'); ?>
		<?php echo $form->radioButtonList($model,'has_code',$model->getOptions(),array('onclick'=>'showCode();')); ?>
		<?php echo $form->error($model,'has_code'); ?>
	</div>

	<div class="row" id="code" style="display:none">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<h2>2. Please enter your registration email:</h2>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::resetButton('Cancel'); ?>
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
<?php CHtml::ajaxLink('下一个', array('getQuote'),
	array('update' => '#quote-of-the-day'))?>
	<script type="text/javascript">

	function showCode(){
		if ( $("input[name=User[has_code]][value=0]").attr("checked")=="checked" )  {
			$("#code").show();
		}else{
			$("#code").hide();
		}

	}
</script>
</div><!-- form -->

