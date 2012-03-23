<?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png"/>
<?php }else{?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3_en.jpg"/>
<?php }?>
<?php echo $this->renderPartial('_confirmation', array('model'=>$model,'reginfo'=>$reginfo)); ?>

<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "注册成功"});
</script>