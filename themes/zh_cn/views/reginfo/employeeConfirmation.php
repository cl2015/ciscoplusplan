<?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/5.png"/>
<?php }else{?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/5_en.jpg"/>
<?php }?>
<?php echo $this->renderPartial('_confirmation', array('model'=>$model,'reginfo'=>$reginfo)); ?>


