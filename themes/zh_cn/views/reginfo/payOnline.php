<!--
 * ====================================================================
 *
 *                Send.php 由网银在线技术支持提供
 *
 *  本页面接收来自上页所有订单信息,并提交支付表单信息到网线在线支付平台....
 *
 *
 * ====================================================================
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>在线支付接口PHP版</title>

        <link href="css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body onLoad="javascript:document.E_FORM.submit()">
        <?php
//****************************************
        $v_mid = '22498045';            // 商户号，这里为测试商户号1001，替换为自己的商户号(老版商户号为4位或5位,新版为8位)即可
        $v_url = 'http://www.brightac.com.cn/reginfo/receivegegpay'; // 请填写返回url,地址应为绝对路径,带有http协议
        $key = '01085866769';           // 如果您还没有设置MD5密钥请登陆我们为您提供商户后台，地址：https://merchant3.chinabank.com.cn/											// 建议您设置一个16位以上的密钥或更高，密钥最多64位，但设置16位已经足够了
//****************************************
        $v_oid = $model->id;
        $v_amount = $model->paid_amount;

        //$v_amount = trim($_POST['v_amount']);                   //支付金额
        $v_moneytype = "CNY";                                            //币种

        $text = $v_amount . $v_moneytype . $v_oid . $v_mid . $v_url . $key;        //md5加密拼凑串,注意顺序不能变
        $v_md5info = strtoupper(md5($text));                             //md5函数加密并转化成大写字母

//        $v_ordername = $model->name; // 订货人姓名
//        $v_ordertel = $model->telephone; // 订货人电话
//        $v_orderemail = $model->email; // 订货人邮件
//        $v_ordermobile = $model->phone; // 订货人手机号
        ?>

        <!--以下信息为标准的 HTML 格式 + ASP 语言 拼凑而成的 网银在线 支付接口标准演示页面 无需修改-->

        <form method="post" name="E_FORM" action="https://Pay3.chinabank.com.cn/PayGate">
            <input type="hidden" name="v_mid"         value="<?php echo $v_mid; ?>">
            <input type="hidden" name="v_oid"         value="<?php echo $model->id; ?>">
            <input type="hidden" name="v_amount"      value="<?php echo $model->paid_amount; ?>">
            <input type="hidden" name="v_moneytype"   value="<?php echo $v_moneytype; ?>">
            <input type="hidden" name="v_url"         value="<?php echo $v_url; ?>">
            <input type="hidden" name="v_md5info"     value="<?php echo $v_md5info; ?>">

            <!--以下几项只是用来记录客户信息，可以不用，不影响支付 -->
            <input type="hidden" name="v_rcvname"      value="cisco">

            <input type="hidden" name="v_ordername"    value="<?php// echo $model->name; ?>">
            <input type="hidden" name="v_ordertel"     value="<?php //echo $model->telephone; ?>">
            <input type="hidden" name="v_ordermobile"  value="<?php //echo $model->phone; ?>">
            <input type="hidden" name="v_orderemail"   value="<?php //echo $model->email; ?>">

        </form>

    </body>
</html>