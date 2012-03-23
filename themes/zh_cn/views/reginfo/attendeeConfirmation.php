<?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png"/>
<?php }else{?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3_en.jpg"/>
<?php }?>

<?php echo $this->renderPartial('_confirmation', array('model'=>$model,'reginfo'=>$reginfo)); ?>
<?php if($reginfo['is_online']=='0'){?>
<! --参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "注册成功1"});
</script>
<?php }else{?>
<! --参加现场活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "注册成功2"});
</script>
<?php }?>

<?php if($reginfo['payment_type']=='1'){?>
<!-- 选择现场支付 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "现场支付"});
</script>
<?php }?>