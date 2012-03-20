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

<h1>Report Detail</h1>
<table class="mytable" style="border=1">
<tr>
<th>状态</th>
<th>公司名称</th>
<th>与思科公司的关系</th>
<th>姓名</th>
<th>职务级别</th>
<th>部门</th>
<th>办公室电话（区号）</th>
<th>办公室电话（号码）</th>
<th>手机号码</th>
<th>email</th>
<th>省份</th>
<th>城市</th>
<?php if($user->type_id>10){?>
<th>AM姓名</th>
<th>AM ID</th>
<th>AM部门</th>
<th>AM手机</th>
<?php }?>
<?php if($user->type_id>11){?>
<th>RM姓名</th>
<th>RM ID</th>
<?php }?>
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
<td><?php echo $row['has_reged']=="1"?'已注册':'未注册'?></td>
<td><?php echo $row['organisation'];?></td>
<td><?php if(isset($relation[$row['relation_with_cisco']])){echo $relation[$row['relation_with_cisco']];}?></td>
<td><?php echo $row['full_name'];?></td>
<td><?php if(isset($job_title[$row['job_title']])){echo $job_title[$row['job_title']];}?></td>
<td><?php if(isset($department[$row['department']])){echo $department[$row['department']];}else{echo $row['department']?></td>
<td><?php echo $row['working_phone_dis'];?></td>
<td><?php echo $row['working_phone'];?></td>
<td><?php echo $row['mobile'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php if(isset($province[$row['province']])){echo $province[$row['province']];}?></td>
<td><?php echo $row['city'];?></td>
<?php if($user->type_id>10){?>
<td><?php echo $row['am_name']?></td>
<td><?php echo $row['am_id']?></td>
<td><?php echo $row['am_department']?></td>
<td><?php echo $row['am_mobile']?></td>
<?php }?>
<?php if($user->type_id>11){?>
<td><?php echo $row['rm_name']?></td>
<td><?php echo $row['rm_id']?></td>
<?php }?>
<?php if($user->type_id>12){?>
<td><?php echo $row['od_name']?></td>
<td><?php echo $row['od_id']?></td>
<?php }?>
</tr>
<?php }?>
</table>
