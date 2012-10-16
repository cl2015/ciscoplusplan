<?php if(Yii::app()->language=='zh_cn'){?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.png"/>
<?php }else{?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1_en.jpg"/>
<?php }?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
