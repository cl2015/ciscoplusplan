<style type="text/css">
/* CSS Document */
body {
	font: normal 11px auto Arial, "Trebuchet MS", Verdana, Helvetica,
		sans-serif;
	color: #4f6b72;
	background: #E6EAE9;
}

a {
	color: #c75f3e;
}

#mytable {
	width: 100%;
	padding: 0;
	margin: 0;
}

caption {
	padding: 0 0 5px 0;
	width: 700px;
	font: italic 11px Arial, Helvetica, sans-serif;
	text-align: right;
}

#mytable th {
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
#mytable th.nobg {
	border-top: 0;
	border-left: 0;
	border-right: 1px solid #C1DAD7;
	background: none;
}

#mytable td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	font-size: 11px;
	padding: 6px 6px 6px 12px;
	color: #4f6b72;
}
/*power by www.winshell.cn*/
#mytable td.alt {
	background: #F5FAFA;
	color: #797268;
}

#mytable th.spec {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #fff no-repeat;
	font: bold 10px Arial, Helvetica, sans-serif;
}

#mytable th.specalt {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa no-repeat;
	font: bold 10px"Arial, Helvetica, sans-serif;
	color: #797268;
}
/*---------for IE 5.x bug*/
html>body td {
	font-size: 11px;
}

body,td,th {
	font-family: Arial, 宋体;
	font-size: 12px;
}
</style>

<h1>Report Summary</h1>
<table style="border:0;">
	<tr>
		<td><input id='q1' type=radio name="show" value=1
			onclick="showCol(1);" /><label for="q1" style="display: inline;">OD
				Detail List</label>
		</td>
		<td><input id='q2' type=radio name="show" value=2 checked 
			onclick="showCol(2);" /> <label for="q2" style="display: inline;">RM
				Detail List</label></td>
	</tr>
</table>

<table class="mytable" style="border: 1">
	<tr>
		<th class="OD">Cisco OD</th>
		<th>Cisco RM</th>
		<th>Quota</th>
		<th>Nomination</th>
		<th>Nomination %</th>
		<th>Registeration</th>
		<th>Registeration %</th>
		<th>Detail List</th>
	</tr>

	<?php foreach ($data as $row) {?>
	<tr>
		<td class="OD">&nbsp;<?php echo $row['od_id']?>
		</td>
		<td>&nbsp;<?php echo $row['rm_id']?>
		</td>
		<td>&nbsp;<?php echo $row['ec_mobile']?>
		</td>
		<td>&nbsp;<?php echo $row['nomination']?>
		</td>
		<td>&nbsp;<?php echo $row['ec_mobile']>0?round($row['nomination']/$row['ec_mobile']*100,2):'0'?>%
		</td>
		<td>&nbsp;<?php echo $row['registeration']?>
		</td>
		<td>&nbsp;<?php echo $row['nomination']>0?round($row['registeration']/$row['nomination']*100,2):'0'?>%
		</td>
		<td>&nbsp;<?php echo CHtml::link(CHtml::encode("Detail List"), array('report/detail','type'=>$type,'email'=>$user->email,'am'=>$row['am_id']),array('target'=>'_blank')); ?>
		</td>
	</tr>
	<?php }?>
</table>
<script
	src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script>
	function showCol(id){
		if(id==1){			
			$(".OD").show();
		}else if(id==2) {
			$(".OD").hide();
		}else {
			$(".OD").hide();
		}
		//$("#id").hide();
	}
	showCol(3);
	</script>

