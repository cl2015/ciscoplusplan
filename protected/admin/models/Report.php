<?php

class Report extends CFormModel {
	public $result;

	public function updateLocation(){
		$dbCommand = Yii::app()->db->createCommand();
		
		$result = $dbCommand->update('users', array('map_loca'=>'GD'),"province = '广东'");
		$result = $dbCommand->update('users', array('map_loca'=>'FJ'),"province = '福建'");
		$result = $dbCommand->update('users', array('map_loca'=>'GX'),"province = '广西'");
		$result = $dbCommand->update('users', array('map_loca'=>'HN'),"province = '海南'");
		$result = $dbCommand->update('users', array('map_loca'=>'N/A'),"province is null or province = ''");
		$result = $dbCommand->update('users', array('map_loca'=>'Other cities'),"map_loca is null or map_loca = ''");
		return true;
	}

	public function updateJobtitle(){
		$dbCommand = Yii::app()->db->createCommand();
		$result = $dbCommand->update('users', array('map_title'=>'GM'),"job_title = 1");
		$result = $dbCommand->update('users', array('map_title'=>'CXO'),"job_title = 2");
		$result = $dbCommand->update('users', array('map_title'=>'CXO'),"job_title = 3");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title = 4");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title = 5");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title = 6");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title = 7");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title = 8");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title = 9");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title = 10");
		$result = $dbCommand->update('users', array('map_title'=>'GM'),"job_title ='总裁/总经理'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='员工'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='经理（无下属员工）'");
		$result = $dbCommand->update('users', array('map_title'=>'CXO'),"job_title ='首席信息官/IT总监'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='总监/资深经理'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='经理 (有下属员工)'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='经理（有下属员工）'");
		$result = $dbCommand->update('users', array('map_title'=>''),"job_title =''");
		$result = $dbCommand->update('users', array('map_title'=>'CXO'),"job_title ='CXO'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='主任'");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title ='其它'");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title ='办公室行政'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='网络处数据中心'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='网络处'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='网络处项目经理'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='网络处商务'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='技术经理'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='项目经理'");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title ='业务经理'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='网络管理员'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='网络处副处长'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='技术总监'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='销售总监'");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title ='联盟经理'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='服务总监'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='处长'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='经理'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='科长'");
		$result = $dbCommand->update('users', array('map_title'=>'ITP'),"job_title ='经理 (无下属员工)'");
		$result = $dbCommand->update('users', array('map_title'=>'GM'),"job_title ='副总经理'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='部门负责人'");
		$result = $dbCommand->update('users', array('map_title'=>'Others'),"job_title ='产品经理'");
		$result = $dbCommand->update('users', array('map_title'=>'Department Head'),"job_title ='课长'");
		$result = $dbCommand->update('users', array('map_title'=>'N/A'),"map_title is null or map_title =''");
		return true;
	}

	public function updateDepartment(){
		$dbCommand = Yii::app()->db->createCommand();
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT部门'");
		$result = $dbCommand->update('users', array('map_dept'=>'决策管理'),"department = '办公室管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'采购'),"department = '采购'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '电子商务'");
		$result = $dbCommand->update('users', array('map_dept'=>'客户服务'),"department = '服务部'");
		$result = $dbCommand->update('users', array('map_dept'=>'客户服务'),"department = '服务运作部'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '工程设计'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '技术支持'");
		$result = $dbCommand->update('users', array('map_dept'=>'决策管理'),"department = '决策管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'客户服务'),"department = '客户服务'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '培训 / 教育'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '其它'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '商业/市场开发'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '生产管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '市场营銷 / 公共关系 / 广告'");
		$result = $dbCommand->update('users', array('map_dept'=>'网络管理'),"department = '网络管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '销售'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '销售运作部'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '信息化管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '信息中心'");
		$result = $dbCommand->update('users', array('map_dept'=>'研究 / 开发'),"department = '研究 / 开发'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '业务部门'");
		$result = $dbCommand->update('users', array('map_dept'=>'决策管理'),"department = '总经理室'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '信息技术部'");
		$result = $dbCommand->update('users', array('map_dept'=>'网络管理'),"department = '网络部'");
		$result = $dbCommand->update('users', array('map_dept'=>'网络管理'),"department = '网络架构'");
		$result = $dbCommand->update('users', array('map_dept'=>'网络管理'),"department = '网络架构部'");
		$result = $dbCommand->update('users', array('map_dept'=>'网络管理'),"department = '信通中心'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = 'IT规划与云计算实施部'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '运维部'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '运行维护部'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT信息'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '顾问咨询'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '交付中心'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '渠道部门'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '海外部'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '科技局'");
		$result = $dbCommand->update('users', array('map_dept'=>'客户服务'),"department = '服务产品部'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '系统集成及产品部'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '信息'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '信息'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '基础架构'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '信息系统部'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '商业 / 市场开发'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '顾问咨询'");
		$result = $dbCommand->update('users', array('map_dept'=>'客户服务'),"department = '客户服务'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '电子商业'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '工程'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '行政管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '财务 / 会计'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '人事'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '法律'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '物流'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '制造'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '市场行銷'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 应用开发'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 数据中心'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 存储'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 服务器'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 安全'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 电信'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = 'IT – 运营'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '网络管理'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '操作 / 行政'");
		$result = $dbCommand->update('users', array('map_dept'=>'采购'),"department = '采购'");
		$result = $dbCommand->update('users', array('map_dept'=>'研究 / 开发'),"department = '研究 / 开发'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '销售'");
		$result = $dbCommand->update('users', array('map_dept'=>'信息化管理'),"department = '技术支援'");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"department = '培训 / 教育'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '产品与市场部'");
		$result = $dbCommand->update('users', array('map_dept'=>'业务部门'),"department = '战略事业发展部'");
		$result = $dbCommand->update('users', array('map_dept'=>'N/A'),"department is null or department = ''");
		$result = $dbCommand->update('users', array('map_dept'=>'其它'),"map_dept is null or map_dept = ''");
		return true;
	}

	public function locationNomination(){
		$this->updateLocation();
		$dbCommand = Yii::app()->db->createCommand('select map_loca ,sum(has_reged) as registration from users where type_id = 1 group by map_loca');
		$result = $dbCommand->queryAll();
		return $result;
	}

	public function locationPublic(){
		$this->updateLocation();
		$dbCommand = Yii::app()->db->createCommand('SELECT map_loca , sum(u.has_reged) AS total, count(p.has_paid) as payment,sum(p.has_paid) AS paid FROM users u LEFT JOIN payments p ON u.id = p.user_id, reginfos r WHERE u.type_id = 4 AND u.id = r.user_id group by map_loca');
		$result = $dbCommand->queryAll();
		return $result;
	}

	public function jobtitleNomination(){
		$this->updateJobtitle();
		$dbCommand = Yii::app()->db->createCommand('select map_title,sum(has_reged) as registration  from users where type_id = 1 group by map_title');
		$result = $dbCommand->queryAll();
		return $result;
	}

	public function jobtitlePublic(){
		$this->updateJobtitle();
		$dbCommand = Yii::app()->db->createCommand('SELECT map_title , sum(u.has_reged) AS total, count(p.has_paid) as payment,sum(p.has_paid) AS paid FROM users u LEFT JOIN payments p ON u.id = p.user_id, reginfos r WHERE u.type_id = 4 AND u.id = r.user_id group by map_title');
		$result = $dbCommand->queryAll();
		return $result;
	}

	public function departmentNomination(){
		$this->updateDepartment();
		$dbCommand = Yii::app()->db->createCommand('select map_dept,sum(has_reged) as registration  from users where type_id = 1 group by map_dept');
		$result = $dbCommand->queryAll();
		return $result;
	}

	public function departmentPublic(){
		$this->updateDepartment();
		$dbCommand = Yii::app()->db->createCommand('SELECT map_dept , sum(u.has_reged) AS total, count(p.has_paid) as payment,sum(p.has_paid) AS paid FROM users u LEFT JOIN payments p ON u.id = p.user_id, reginfos r WHERE u.type_id = 4 AND u.id = r.user_id group by map_dept');
		$result = $dbCommand->queryAll();
		return $result;
	}
	
	public function diffNomination(){
		$dbCommand = Yii::app()->db->createCommand('select diff,count(1) as total,sum(has_reged) as registration  from users where type_id <= 2 group by diff');
		$result = $dbCommand->queryAll();
		return $result;
	}















}
