<?php if(Yii::app()->language=='zh_cn'){?>
<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png" />
<?php if($reginfo['is_online']=='0'){?>
<! --参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "在线活动完成量"});
</script>
<?php }else{?>
<! --参加现场活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "现场活动继续"});
</script>
<?php if($reginfo['payment_type']=='1'){?>
<!-- 选择现场支付 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "线下支付完成数量"});
</script>
<?php }?>
<?php }?>


<?php }else{?>
<?php if($reginfo['is_online']=='0'){?>
<! --参加在线活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E在线活动完成量"});
</script>
<?php }else{?>
<! --参加现场活动 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E现场活动继续"});
</script>
<?php if($reginfo['payment_type']=='1'){?>
<!-- 选择现场支付 -->
<script type="text/javascript">
        ACTracker.track({"type": "event", "action": "E线下支付完成数量"});
</script>
<?php }?>
<?php }?>


<img
	src="<?php echo Yii::app()->request->baseUrl; ?>/images/3_en.jpg" />
<?php }?>

<?php echo $this->renderPartial('_confirmation', array('model'=>$model,'reginfo'=>$reginfo)); ?>

<script
	charset="utf-8"
	src="http://apps.acs86.com/h.ashx?o=sub&id=917&em=<?php echo $model->email?>"></script>
<!-- PV Tracking Tags --><script type="text/javascript">
  MltTracker = { mid: 250023, ers: [{ "type": "pageview" }], track: function (er) {this.ers.push(er);} };
   (function (){
      var js = document.createElement("script"), scri = document.getElementsByTagName("script")[0];
      js.type = "text/javascript";
      js.async = true;
      scri.parentNode.insertBefore(js, scri);
      js.src = location.protocol == "https:" ? "https://secure.mlt01.com/nt.js" : "http://static.mlt01.com/nt.js";
   })();
</script>

