<style type="text/css">
/* CSS Document */
body {
	font: normal 11px auto Arial, Helvetica, sans-serif;
	color: #4f6b72;
	background: #E6EAE9;
}

a {
	color: #c75f3e;
}

#mytable {
	padding: 0;
	margin: 0;
	border-collapse: collapse;
}

caption {
	padding: 0 0 5px 0;
	width: 700px;
	font: italic 11px Arial, Helvetica, sans-serif;
	text-align: right;
}

th {
	font: bold 11px Arial, Helvetica, sans-serif;
	color: #4f6b72;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #CAE8EA no-repeat;
}
/*power by www.winshell.cn*/
th.nobg {
	border-top: 0;
	border-left: 0;
	border-right: 1px solid #C1DAD7;
	background: none;
}

td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	font-size: 11px;
	padding: 6px 6px 6px 12px;
	color: #4f6b72;
}
/*power by www.winshell.cn*/
td.alt {
	background: #F5FAFA;
	color: #797268;
}

th.spec {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #fff no-repeat;
	font: bold 10px Arial, Helvetica, sans-serif;
}

th.specalt {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa no-repeat;
	font: bold 10px Arial, Helvetica, sans-serif;
	color: #797268;
}
/*---------for IE 5.x bug*/
html>body td {
	font-size: 11px;
}

body,td,th {
	font-family: Arial;
	font-size: 12px;
}
</style>
<style bogus="1">
table {
	border-collapse: collapse;
	table-layout: fixed;
	overflow: hidden;
}

td {
	overflow: hidden;
	white-space: nowrap;
}
</style>

<h1>Report Detail</h1>
<table class="mytable">
	<tr>
		<td><input id='q1' type=radio name="show" value=1
			onclick="showCol(1);" /><label for="q1" style="display: inline;">OD
				Detail List</label>
		</td>
		<td><input id='q2' type=radio name="show" value=1
			onclick="showCol(2);" /> <label for="q2" style="display: inline;">RM
				Detail List</label></td>
		<td><input id='q3' type=radio name="show" value=1
			onclick="showCol(3);" /> <label for="q3" style="display: inline;">AM
				Detail List</label></td>
	</tr>
</table>
<div id="tableBox">
	<table class="mytable" style="width:1500px">
		<tr>
			<th>状态</th>
			<th>数据来源</th>
			<th>付费状态</th>
			<th>公司名称</th>
			<th>与思科公司的关系</th>
			<th>姓名</th>
			<th>职务级别</th>
			<th>部门</th>
			<?php /* ?>

			<th>办公室电话（区号）</th>
			<th>办公室电话（号码）</th>
			<?php */?>

			<th>手机号码</th>
			<th>email</th>
			<th>省份</th>
			<th>城市</th>
			<th>参会凭证注册ID号</th>
			<th>网站注册密码</th>
			<th class="RM">AM姓名</th>
			<th class="RM">AM ID</th>
			<th class="RM">AM部门</th>
			<th class="RM">AM手机</th>
			<th class="OD">RM姓名</th>
			<th class="OD">RM ID</th>
			<?php if($user->type_id>12){?>
			<th>OD姓名</th>
			<th>OD ID</th>
			<?php }?>
		</tr>
		<?php $relation  = User::model()->getRelationOptions();
		$job_title = User::model()->getJobTitleOptions();
		$province = User::model()->getProvinces()+User::model()->getEnProvinces();
		$department = User::model()->getDepartmentOptions();
		//var_dump($relation[1]);
		;?>
		<?php foreach ($model as $row) {?>
		<tr>
			<td><?php echo $row['has_reged']=="1"?'已注册':'未注册'?>&nbsp;</td>
			<td><?php if($row['type_id']=="1"){echo "提名";}else if($row['type_id']=="2"){echo "内部员工";}else if($row['type_id']=="4"){echo "付费用户";}else{echo "code";}?></td>
			<td>
				<?php if($row['type_id']=='4'&&$row['is_online']=="1"){?>
				<?php echo $row['has_paid']==0?"未付费":"已付费";?>
				<?php }else{?>
				免费（在线会议用户或提名用户）
				<?php }?>
				&nbsp;
			</td>
			<td><?php echo $row['organisation'];?>&nbsp;</td>
			<td><?php if(isset($relation[$row['relation_with_cisco']])){
				echo $relation[$row['relation_with_cisco']];
			}?>&nbsp;</td>
			<td><?php echo $row['full_name'];?>&nbsp;</td>
			<td><?php if(isset($job_title[$row['job_title']])){
				echo $job_title[$row['job_title']];
			}?>&nbsp;</td>
			<td><?php if(isset($department[$row['department']])){
				echo $department[$row['department']];
			}else{echo $row['department'];
			}?>&nbsp;</td>
			<?php /*?>

			//<td><?php echo $row['working_phone_dis'];?>&nbsp;</td>
			//<td><?php echo $row['working_phone'];?>&nbsp;</td>
			<?php */?>

			<td><?php echo $row['mobile'];?>&nbsp;</td>
			<td><?php echo $row['email'];?>&nbsp;</td>
			<td><?php if(isset($province[$row['province']])){
				echo $province[$row['province']];
			}?>&nbsp;</td>
			<td><?php echo $row['city'];?>&nbsp;</td>
			<td><?php echo $row['id'];?>&nbsp;</td>
			<td><?php echo $row['password'];?>&nbsp;</td>
			<td class="RM"><?php echo $row['am_name']?>&nbsp;</td>
			<td class="RM"><?php echo $row['am_id']?>&nbsp;</td>
			<td class="RM"><?php echo $row['am_department']?>&nbsp;</td>
			<td class="RM"><?php echo $row['am_mobile']?>&nbsp;</td>
			<td class="OD"><?php echo $row['rm_name']?>&nbsp;</td>
			<td class="OD"><?php echo $row['rm_id']?>&nbsp;</td>
			<?php if($user->type_id>12){?>
			<td><?php echo $row['od_name']?>&nbsp;</td>
			<td><?php echo $row['od_id']?>&nbsp;</td>
			<?php }?>
		</tr>
		<?php }?>
	</table>
</div>
<script
	src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script>
		function showCol(id){
			if(id==1){			
				$(".RM").show();
				$(".OD").show();
			}else if(id==2) {
				$(".RM").show();
				$(".OD").hide();
			}else {
				$(".RM").hide();
				$(".OD").hide();
			}
			//$("#id").hide();
		}</script>
