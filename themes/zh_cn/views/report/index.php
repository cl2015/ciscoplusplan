<style type="text/css"> 
/* CSS Document */ 

body { 
font: normal 11px auto "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
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
font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
text-align: right; 
} 

th { 
font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
color: #4f6b72; 
border-right: 1px solid #C1DAD7; 
border-bottom: 1px solid #C1DAD7; 
border-top: 1px solid #C1DAD7; 
letter-spacing: 2px; 
text-transform: uppercase; 
text-align: left; 
padding: 6px 6px 6px 12px; 
background: #CAE8EA  no-repeat; 
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
font-size:11px; 
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
font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
} 

th.specalt { 
border-left: 1px solid #C1DAD7; 
border-top: 0; 
background: #f5fafa no-repeat; 
font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
color: #797268; 
} 
/*---------for IE 5.x bug*/ 
html>body td{ font-size:11px;} 
body,td,th { 
font-family: 宋体, Arial; 
font-size: 12px; 
} 
</style> 

<h1>Report Summary</h1>
<h2><?php echo CHtml::link(CHtml::encode("OD Reporting Page"), array('report/index','type'=>'OD','email'=>$user->email)); ?></h2>
<h2><?php echo CHtml::link(CHtml::encode("RM Reporting Page"), array('report/index','type'=>'RM','email'=>$user->email)); ?></h2>

<table class="mytable" style="border:1">
<tr>
<?php if($type=='OD'){?>
<th>Cisco OD</th>
<?php }?>
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
<?php if($type=='OD'){?>
<td><?php echo $row['od_id']?></td>
<?php }?>
<td><?php echo $row['rm_id']?></td>
<td><?php echo $row['ec_mobile']?></td>
<td><?php echo $row['nomination']?></td>
<td><?php echo $row['ec_mobile']>0?$row['nomination']/$row['ec_mobile']*100:'nil'?>%</td>
<td><?php echo $row['registeration']?></td>
<td><?php echo $row['nomination']>0?$row['registeration']/$row['nomination']*100:'nil'?>%</td>
<td><?php echo CHtml::link(CHtml::encode("Detail List"), array('report/detail','type'=>$type,'email'=>$user->email,'am'=>$row['am_id']),array('target'=>'_blank')); ?></td>
</tr>
<?php }?>
</table>
