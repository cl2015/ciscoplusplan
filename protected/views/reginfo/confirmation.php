<h1>Confirmation</h1>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step3.png" /></br>
this is confirmation page.
<a href="javascript:alert('This flow is over ,bye ^_^');">click me</a>
</br>
<?php echo CHtml::link(CHtml::encode("click here view profile"), array('user/view', 'id'=>1 )); ?>
</br>
