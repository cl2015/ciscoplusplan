<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step0.png" /></br>
<?php var_dump($model);exit();?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-loading-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'has_code'); ?>
		<?php echo $form->radioButtonList($model,'has_code',$model->getHasCodeOptions(),array('onclick'=>'showCode();','separator'=>'')); ?>
	<?php echo $message['email']?>
		<?php echo $form->error($model,'has_code'); ?>
	</div>

	<div class="row" id="code" style="">
		<h2>2. Please enter your registration code:</h2>
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row" id="email" style="display:none">
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
			$("#email").hide();
			$("#code").show();
		}else{
			$("#code").hide();
			$("#email").show();
		}

	}
</script>
</div><!-- form -->

