<?php
$this->breadcrumbs = array(
    'Users',
);
?>
<style>
    .mainContent td{border: 1px solid #76C376;}
</style>
<h1>Users</h1>
<div class="search-form" >
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
        'payment_model'=>$payment_model,
    ));
    ?>
</div>
<h3 style="height:25px;">
    <span style="float:right;">
    <?php
    echo CHtml::link("全部导出", array('user/phpexcels'));
    ?>
    </span>
    <span style="float:left">
    <?php
    echo CHtml::link("添加用户", array("user/create"));
    ?>
    </span>
</h3>
<table>
    <tr>
        <th style="width:50px; background-color:#C5FBBD;">id</th>
        <th style="width:50px; background-color:#C5FBBD;">邀请码</th>
        <th style="width:130px; background-color:#C5FBBD;">是否注册</th>
        <th style="width:130px; background-color:#C5FBBD;">参会方式</th>
        <th style="width:250px; background-color:#C5FBBD;">公司名称</th>
        <th style="width:100px; background-color:#C5FBBD;">姓名</th>
        <th style="width:100px; background-color:#C5FBBD;">邮箱</th>
        <th style="width:100px; background-color:#C5FBBD;">手机</th>
        <th style="width:100px; background-color:#C5FBBD;">AM姓名</th>
        <th style="width:100px; background-color:#C5FBBD;">RM姓名</th>
        <th style="width:100px; background-color:#C5FBBD;">OD姓名</th>
        <th style="width:100px; background-color:#C5FBBD;">与思科的关系</th>
        <th style="width:100px; background-color:#C5FBBD;">新浪微博</th>
        <th style="width:100px; background-color:#C5FBBD;">腾讯微博</th>

        <th style="width:120px; background-color:#C5FBBD;">操作</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo CHtml::link($user->id, array('view', 'id' => $user->id)); ?></td>
            <td><?php
        if (empty($user->code)) {
            echo "暂无";
        } else {
            echo $user->code;
        }
      ?></td>
        <td><?php
        if (empty($user->has_reged) || $user->has_reged == 0) {
            echo "未注册";
        } else {
            echo '已注册';
        }
       ?></td>
        <td><?php echo CHtml::encode(Reginfo::model()->getBackendOnlineText($user->reginfo['is_online'])); ?></td>
        <td><?php echo $user->organisation; ?></td>
        <td><?php echo $user->full_name; ?></td>
        <td> <?php echo $user->email; ?></td>
        <td> <?php echo $user->mobile; ?></td>
        <td> <?php echo $user->am_name; ?></td>
        <td> <?php echo $user->rm_name; ?></td>
        <td> <?php echo $user->od_name; ?></td>
        <td><?php echo CHtml::encode(User::model()->getRelationOptionsText($user->relation_with_cisco)); ?></td>
        <td> <?php echo $user->weibo; ?></td>
        <td> <?php echo $user->tencent; ?></td>
        <td>
<?php echo CHtml::link('删除', "#", array("submit" => array("user/delete", 'id' => $user->id), 'confirm' => '确定要删除吗')); ?>
    <?php echo CHtml::link('编辑', array("user/update",'id'=> $user->id)); ?>
<?php echo CHtml::link('查看', array('user/view','id'=> $user->id)); ?>
                </td>
            </tr>
            <?php endforeach; ?>
    <tr class="nobg">
        <td colspan="15" style="height:30px;" class="tdpage">
            <?php
            $this->widget('CLinkPager', array(
                'header' => '',
                'firstPageLabel' => '首页',
                'lastPageLabel' => '末页',
                'prevPageLabel' => '上一页',
                'nextPageLabel' => '下一页',
                'pages' => $pages,
            ));
            ?>
        </td>
    </tr>
</table>

