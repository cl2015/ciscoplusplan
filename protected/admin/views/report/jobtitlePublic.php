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
	text-align: center;
}

th {
	font: bold 11px auto ,Arial, Helvetica, sans-serif;
	color: #4f6b72;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-align: center;
	padding: 6px 6px 6px 6px;
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
	padding: 6px 6px 6px 6px;
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
}
</style>

<h1>Daily Report - Job Title Public</h1>
<ul>
	<li><?php echo CHtml::link('Division',array('report/divi'))?></li>
	<li><?php echo CHtml::link('Location Nomination',array('report/locationNomination'))?></li>
	<li><?php echo CHtml::link('Location Public',array('report/locationPublic'))?></li>
	<li><?php echo CHtml::link('Jobtitle Nomination',array('report/jobtitleNomination'))?></li>
	<li><?php echo CHtml::link('Jobtitle Public',array('report/jobtitlePublic'))?></li>
	<li><?php echo CHtml::link('Department Nomination',array('report/deptNomination'))?></li>
	<li><?php echo CHtml::link('Department Public',array('report/deptPublic'))?></li>
</ul>
<br />
<div id="tableBox">
	<table class="mytable"  style="width: 986px; margin-left: -39px;">
		<tr>
			<th style="width: 100px;" align="center">Job Title</th>
			<th style="width: 100px;" align="center">Public Online (Free)</th>
			<th style="width: 100px;" align="center">Public Onsite (Payment)</th>
			<th style="width: 100px;" align="center">Public Onsite (Paid)</th>
		</tr>
		<?php 
		$total = array('total'=>0,'registration'=>0,'payment'=>0,'paid'=>0);
		$other = array('total'=>0,'registration'=>0,'payment'=>0,'paid'=>0);
		$na = array('total'=>0,'registration'=>0,'payment'=>0,'paid'=>0);
		foreach ($result as $row) {
			$row['paid'] = $row['paid']==null?0:$row['paid'];
			$total['total']+= $row['total'];
			$total['payment']+= $row['payment'];
			$total['paid']+= $row['paid'];
			if($row['map_title']=='Others'){
				$other = $row;
			}elseif($row['map_title']=='N/A'){
				$na = $row;
			}else{
		?>
		<tr>
			<td><?php echo $row['map_title'];?></td>
			<td><?php echo $row['total'] - $row['payment'];?></td>
			<td><?php echo $row['payment'];?></td>
			<td><?php echo $row['paid'];?></td>
		</tr>
		<?php }}?>
		<tr>
			<td>Others</td>
			<td><?php echo $other['total'] - $other['payment'];?></td>
			<td><?php echo $other['payment'];?></td>
			<td><?php echo $other['paid'];?></td>
		</tr>
		<tr>
			<td>N/A</td>
			<td><?php echo $na['total'] - $na['payment'];?></td>
			<td><?php echo $na['payment'];?></td>
			<td><?php echo $na['paid'];?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td><?php echo $total['total'] - $total['payment'];?></td>
			<td><?php echo $total['payment'];?></td>
			<td><?php echo $total['paid'];?></td>
		</tr>
	</table>
</div>

