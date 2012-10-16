<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<p>
<h2>this is a email</h2>
dear marc:</br>
welcome blablabla......</br>
<?php echo CHtml::link(CHtml::encode("click here"), array('user/emailreg', 'email' => 'marc.ma@mdigi.cc')); ?> to join.
    <br />
</p>
dear marc:</br>
<?php $this->pageTitle=Yii::app()->name; ?>
