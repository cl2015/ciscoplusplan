<style type="text/css">
/* CSS Document */
body {
	font: normal 11px auto , Arial, Helvetica, sans-serif;
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
	font: italic 11px auto , Arial, Helvetica, sans-serif;
	text-align: right;
}

th {
	font: bold 11px auto ,Arial, Helvetica, sans-serif;
	color: #4f6b72;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-align: center;
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
	text-align: center;
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
<?php echo CHtml::link(CHtml::encode("Return To Report Summary"), array('report/index')); ?>
<br />
<table class="mytable">
	<tr>
		<td style="border: 0"><input id='q1' type=radio name="show" value=1
			onclick="showCol(1);" /><label for="q1" style="display: inline;">OD
				Detail List</label>
		</td>
		<td style="border: 0"><input id='q2' type=radio name="show" value=2
			onclick="showCol(2);" /> <label for="q2" style="display: inline;">RM
				Detail List</label></td>
		<td style="border: 0"><input id='q3' type=radio name="show" value=3
			checked onclick="showCol(3);" /> <label for="q3"
			style="display: inline;">AM Detail List</label></td>
	</tr>
</table>
<div id="tableBox">
	<table class="mytable"  style="width: 986px; margin-left: -39px;">
		<tr>
			<th style="width: 30px;">状态</th>
			<th style="width: 100px;">公司名称</th>
			<th style="width: 100px;">与思科公司的关系</th>
			<th style="width: 40px;">姓名</th>
			<th style="width: 100px;">职务级别</th>
			<th style="width: 20px;">部门</th>
			<th style="width: 70px;">手机号码</th>
			<th style="width: 20px;">email</th>
			<th style="width: 20px;">省份</th>
			<th style="width: 20px;">城市</th>
			<th style="width: 35px;">参会凭证注册ID号</th>
			<th style="width: 35px;">网站注册密码</th>
			<th style="widht: 35px;" class="RM">AM姓名</th>
			<th style="widht: 35px;" class="RM">AM部门</th>
			<th style="widht: 35px;" class="OD">RM姓名</th>
		</tr>
		<?php $relation  = User::model()->getRelationOptions();
		$job_title = User::model()->getJobTitleOptions();
		$province = User::model()->getProvinces()+User::model()->getEnProvinces();
		$department = User::model()->getDepartmentOptions();
		?>
		<?php foreach ($model as $row) {?>
		<tr>
			<td><?php echo $row['has_reged']=="1"?'已注册':'未注册'?>&nbsp;</td>
			<td><?php echo $row['organisation'];?>&nbsp;</td>
			<td><?php if(isset($relation[$row['relation_with_cisco']])){
				echo $relation[$row['relation_with_cisco']];
			}else{
				echo $row['relation_with_cisco'];
			}?>&nbsp;</td>
			<td><?php echo $row['full_name'];?>&nbsp;</td>
			<td><?php if(isset($job_title[$row['job_title']])){
				echo $job_title[$row['job_title']];
			}else{
				echo $row['job_title'];
			}?>&nbsp;</td>
			<td><?php if(isset($department[$row['department']])){
				echo $department[$row['department']];
			}else{echo $row['department'];
			}?>&nbsp;</td>
			<td><?php echo $row['mobile'];?>&nbsp;</td>
			<td><?php echo $row['email'];?>&nbsp;</td>
			<td><?php if(isset($province[$row['province']])){
				echo $province[$row['province']];
			}else{
				echo $row['province'];
			}?>&nbsp;</td>
			<td><?php echo $row['city'];?>&nbsp;</td>
			<td><?php echo $row['id'];?>&nbsp;</td>
			<td><?php echo $row['password'];?>&nbsp;</td>
			<td class="RM"><?php echo $row['am_name']?>&nbsp;</td>
			<td class="RM"><?php echo $row['am_department']?>&nbsp;</td>
			<td class="OD"><?php echo $row['rm_name']?>&nbsp;</td>
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
		}

		showCol(3);

		</script>
