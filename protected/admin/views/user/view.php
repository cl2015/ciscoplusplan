<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->id,
);
?>

<h1>View User #<?php echo $model->id; ?></h1>
<h3 style="float: right;">
    <?php echo CHtml::link('编辑', array("user/update/id/" . $model->id)); ?>
    <?php echo CHtml::link('删除', "#", array("submit" => array("user/delete", 'id' => $model->id), 'confirm' => '确定要删除吗')); ?>
</h3>
<h2>基本信息</h2>
<b>参会码:</b>
<?php echo CHtml::encode($model->id); ?>
    <br />
    <b>注册状态:</b>
<?php
    if (empty($model->has_reged) || $model->has_reged == 0) {
        echo "未注册";
    } else {
        echo '已注册';
    }
?>
    <br />
    <b>参会类型:</b>

<?php echo CHtml::encode(Reginfo::model()->getOnlineText($model->reginfo['is_online'])); ?>
    <br />
    <b>邀请码:</b>
<?php echo CHtml::encode($model->code); ?>
    <br />
    <b>付款状态:</b>
<?php if($model->payment['has_paid']==0){echo "未支付";}else{echo "已支付";} ?>
    <br />
    <b>公司名称:</b>
<?php echo CHtml::encode($model->organisation); ?>
    <br />
    <b>与思科公司关系:</b>
<?php echo CHtml::encode(User::model()->getRelationOptionsText($model->relation_with_cisco)); ?>
    <br />
    <b>姓名:</b>
<?php echo CHtml::encode($model->full_name); ?>
    <br />
    <b>职务级别:</b>    
<?php echo CHtml::encode(User::model()->getJobTitleText($model->job_title)); ?>
    <br />
    <b>部门:</b>
<?php echo CHtml::encode($model->department); ?>
    <br />
    <b>区号:</b>
<?php echo CHtml::encode($model->working_phone_dis); ?>
    <br />
    <b>电话:</b>
<?php echo CHtml::encode($model->working_phone); ?>
    <br />
    <b>手机号码:</b>
<?php echo CHtml::encode($model->mobile); ?>
    <br />
    <b>Email:</b>
<?php echo CHtml::encode($model->email); ?>
    <br />
    <b>省份:</b>
<?php echo CHtml::encode($model->province); ?>
    <br />
    <b>城市:</b>
<?php echo CHtml::encode($model->city); ?>
    <br />
    <b>公司地址:</b>
<?php echo CHtml::encode($model->organisation); ?>
    <br />
    <b>AM姓名:</b>
<?php echo CHtml::encode($model->am_name); ?>
    <br />
    <b>Cc:</b>
<?php echo CHtml::encode($model->cc); ?>
    <br />
    <b>AM ID:</b>
<?php echo CHtml::encode($model->am_id); ?>
    <br />
    <b>AM 手机:</b>
<?php echo CHtml::encode($model->am_mobile); ?>
    <br />
    <b>RM 姓名:</b>
<?php echo CHtml::encode($model->rm_name); ?>
    <br />
    <b>RM ID:</b>
<?php echo CHtml::encode($model->rm_id); ?>
    <br />
    <b>OD 姓名:</b>
<?php echo CHtml::encode($model->od_name); ?>
    <br />
    <b>分区:</b>
<?php echo CHtml::encode($model->diff); ?>
    <br />
    <b>是否参加Dinner:</b>
<?php echo CHtml::encode($model->MAIL_ZIP); ?>
    <br />
    <b>是否参加ITM:</b>
<?php echo CHtml::encode($model->MAIL_COUNTRY); ?>
    <br />

    <h2>付款信息</h2>

    <b>付款金额:</b>
<?php echo CHtml::encode($model->reginfo['paid_amount']); ?>
    <br />
    <b>是否需要发票:</b>
<?php if($model->payment['is_invoice']==0){echo "不需要";}else{
    echo "需要开具发票";
} ?>
    <br />
    <b>发票抬头:</b>
<?php echo CHtml::encode($model->payment['invoice_title']); ?>
    <br />
    <b>发票内容:</b>
<?php echo CHtml::encode($model->payment['invoice_content']); ?>
    <br />
    <b>发票邮寄地址:</b>
<?php echo CHtml::encode($model->payment['recipient_add']); ?>
    <br />
    <b>发票邮寄邮编:</b>
<?php echo CHtml::encode($model->payment['zip_code']); ?>
    <br />
    <b>发票接收人姓名:</b>
<?php echo CHtml::encode($model->payment['recipient_name']); ?>
    <br />
    <b>发票接收人电话:</b>
<?php echo CHtml::encode($model->payment['phone']); ?>
    <br />
    <b>是否已开具发票:</b>
<?php if($model->payment['has_sendinvoice']==0){echo "未开具发票";}else{echo "已开具发票";} ?>
    <br />
    <!--<b>是否已邮寄发票:</b>
<?php //if($model->payment['has_sendinvoice']==0){echo "未开具发票";}else{echo "已开具发票";} ?>
    <br />-->
    <b>付款方式:</b>
<?php echo CHtml::encode(Reginfo::model()->getPaymentText($model->reginfo['payment_type'])); ?>
<br />