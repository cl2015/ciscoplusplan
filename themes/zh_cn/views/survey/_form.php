<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'survey-form',
                'enableAjaxValidation' => false,
            ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->hiddenField($model, 'user_id', array('size' => 10, 'maxlength' => 10)); ?>

    <div class="row">

        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                <td vAlign='top' width='1%' >&nbsp;&nbsp;</td>
                <td vAlign='top' class='QuestionNormal' width='50%' >
                    <FONT CLASS = 'QuestionNormal'>贵单位的网络建设的投资方向是?</FONT>
                </td>
                <td >
                    <?php echo $form->dropDownList($model, 'q1', $model->getQ11Options()); ?>
                    <?php echo $form->error($model, 'q1'); ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="row">
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                <td vAlign='top' width='1%' >&nbsp;&nbsp;</td>
                <td vAlign='top' class='QuestionNormal' width='50%' >
                    <FONT CLASS = 'QuestionNormal'>贵单位在什么时间范围内将有网络扩张、升级或安全等方面的网络项目？</FONT>
                    <font color='red'>*</font>
                    <input type='hidden' name='control_identifier' value='贵单位在什么时间范围内将有网络扩张、升级或安全等方面的网络项目？'><input type='hidden' name='control_identifier' value='a138169'>
                </td>
                <td >
                    <?php echo $form->dropDownList($model, 'q2', $model->getQ22Options()); ?>
                    <?php echo $form->error($model, 'q2'); ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="row">
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                <td vAlign='top' width='1%' >&nbsp;&nbsp;</td>
                <td vAlign='top' class='QuestionNormal' width='50%' >
                    <FONT CLASS = 'QuestionNormal'>贵单位如果计划进行网络扩张、升级或安全等网络项目，预算大概在什么范围（RMB）：</FONT>
                    <font color='red'>*</font>
                    <input type='hidden' name='control_identifier' value='贵单位如果计划进行网络扩张、升级或安全等网络项目，预算大概在什么范围（RMB）：'>
                    <input type='hidden' name='control_identifier' value='a138170'>
                </td>
                <td >
                    <?php echo $form->dropDownList($model, 'q3', $model->getQ33Options()); ?>
                    <?php echo $form->error($model, 'q3'); ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="row">
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                <td vAlign='top' width='1%' >&nbsp;&nbsp;</td>
                <td vAlign='top' class='QuestionNormal' width='50%' >
                    <FONT CLASS = 'QuestionNormal'>贵公司的PC数量是</FONT></td>
                <td >
                    <?php echo $form->dropDownList($model, 'q4', $model->getQ44Options()); ?>
                    <?php echo $form->error($model, 'q4'); ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                <td vAlign='top' width='1%' >&nbsp;&nbsp;</td>
                <td vAlign='top' class='QuestionNormal' colspan='2' >
                    <FONT CLASS = 'QuestionNormal'>您在信息化管理和网络建设中技术职责是什么</FONT>
                </td>
            </tr>
            <tr>
                <td width=1%></td>
                <td colspan=2 >
                    <ul style="width:600px;">
                        <?php echo $form->checkBoxList($model, 'q5[]', $model->getQ55Options(), array('separator' => '', 'template' => '<li style="list-style: none outside none;float:left; width:140px;line-height:30px;">{input} {label}</li>&nbsp;&nbsp;', 'labelOptions' => array('style' => 'display:inline;'), 'class' => 'AnswerNormal')); ?>
                        <?php echo $form->error($model, 'q5'); ?>
                    </ul>
                </td>
            </tr>
            <tr><td colspan=3>请设立用于登录大会活动网站www.ciscopluschina.com的登录密码。注册完成后，即可在大会网站上使用注册邮箱和此密码登录，专享白皮书下载，视频观看等互动活动。</td></tr>
            
        </table>
        <table>
            <tr>

                <td width=1%></td>
                <td width="75px;" ><?php echo $form->labelEx($user, '密码：',array('style'=>'width: 70px;')); ?>
                </td>
                <td><?php echo $form->passwordField($user, 'password', array('size' => 20, 'maxlength' => 256)); ?><?php echo $form->error($user, 'password'); ?></td>
            </tr>
            <tr>
                <td width=1%></td>
                <td><?php echo $form->labelEx($user, '确认密码：',array('style'=>'width: 70px;')); ?></td>
                <td><?php echo $form->passwordField($user, 'password', array('size' => 20, 'maxlength' => 256)); ?><?php echo $form->error($user, 'password'); ?></td>
            </tr>
        </table>
    </div>
    <div class="row buttons">
        <?php echo CHtml::Button('back', array("onclick" => "javascript:history.go(-1)")); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
