<?php

/**
 * @package 共用方法集合
 * @version $Id: Globals.php 1278 2012-07-18 05:58:01Z lida $
 */

/**
 * 读出配置文件中的相关配置
 * @param String $bundle 模块
 * @param option String $key key
 * @return Array 
 */
function params($bundle, $key = 0) {
	if (isset(Yii::app()->params[$bundle])) {
		$config = Yii::app()->params[$bundle];
		if ($key && isset($config[$key])) {
			return $config[$key];
		}
		return $config;
	}
	return '';
}

/**
 * 解析 pathInfo 字符串，获取其中的搜索条件和关键字
 * @param String $pathInfo http request 中的 pathInfo
 * @return Array 数组
 * p:价格；a:面积；r:房型；t:热门标签；b-e:价格区间；l-h:面积区间；o:排序；n:分页；
 * u:类型标签；d:发布时间；y:建筑年代；s:楼层；g:房源等级；
 */
function parsePathInfo($pathInfo) {
    $path = explode("/", $pathInfo);
    $result = array(
        'keywords' => '',
        'condition' => '',
        'location' => ''
    );
    foreach ($path as $value) {
        if (preg_match("/^_/", $value)) {
            $result['keywords'] = substr($value, 1);
            continue;
        }

        if (preg_match("/^[xqpartblonudysgzc][0-9]+/", $value)) {
            $result['condition'] = $value;
            continue;
        }
        if (preg_match("/^[a-z0-9]+$/", $value)) {
            $result['location'] = $value;
            continue;
        }
    }
    if (($result['location'] == "exchange") or ($result['location'] == "rent") or ($result['location'] == "newHouse") or ($result['location'] == "community") or ($result['location'] == "broker")) {
        $result['location'] = "";
    }
    return $result;
}

/**
 * 
 * 把所在层还成适当的位置
 * @param int $houseallfloor	楼层总数
 * @param int $Located	所在层数
 * @author 
 */
function floorPosition($searchfloor){
		if ($searchfloor <= 33) {
			return "低楼层";
		} else if ($searchfloor <= 66) {
			return "中楼层";
		} else {
			return "高楼层";
		}
}

function detailFloorPosition($searchfloor){
	if ($searchfloor <= 33) {
		return "下";
	} else if ($searchfloor <= 66) {
		return "中";
	} else {
		return "高";
	}
}



function callbackFun($value) {
	if($value != '') {
		return true;
	}
}

/**
 * $parameter 分隔符
 * $value	要分割的字符串
 * return	array
 */
function explodeString($parameter, $value) {	
	//按$parameter 来分割 $value
	$explodeArray = explode("$parameter", $value);
	//回调函数 去掉数组里的空值
	
	
	$array = array_filter($explodeArray, 'callbackFun');
	
	return $array;
}

/**
 * 计算每月按揭
 * @param int $price
 * @return int $mothlyMortgage
 */
function getMonthlyMortgage($price) {
	$config = Yii::app()->params['monthlyMortgage'];
	$tmp = 1 + ($config['bankRate'] / 12);
	$n = $config['years'] * 12;
	$upNumber = $price * 10000 * $config['bankRate'] * pow($tmp, $n);
	$divide = (pow($tmp, $n) - 1);
	$monthlyMortgage = round($upNumber / $divide / 12);
	return $monthlyMortgage;
}



/**
 * 将行政区列表整理成按拼音首字母索引的数组
 * @param Array $subLocations 数组，格式按照数据库定义
 * @return Array $result 格式后的数组
 */
function groupSubLocations(array $subLocations) {
	//整理二级地区字母顺序
	$result = array();
	foreach ($subLocations as $item) {
		$indexChar = strtoupper(substr($item['spell'], 0, 1));
		$result[$indexChar][] = $item;
	}
	return $result;
}




/**
 * 读取存放到cookie中的值
 * @return array $history
 *
 */
function getHousesRecentVisitedFromCookie($type = 'exchangehistorys') {
	$cookie = Yii::app()->request->cookies;
	if (isset($cookie[$type])) {
		$history = CJSON::decode($cookie[$type]->value);
	} else {
		$history = array();
	}
	return $history;
}

/**
 * 将看过的房源放入cookie中
 * @param array $historyRecent 新的房源
 * @param array $history	cookie中的记录
 */
function setHousesRecentVisitedToCookie($historyRecent, $history, $type = 'exchangehistorys') {
	if($history) {
		while(count($history) >= 6) {
			array_splice($history, -1, 1);
		}
		array_unshift($history, $historyRecent);
	}else {
		while(count($history) >= 6) {
			array_splice($history, -1, 1);
		}
		array_push($history, $historyRecent);
	}
	$cookie=new CHttpCookie($type, CJSON::encode($history));
	$cookie->expire = time()+60*60*24*30;  //有限期30天
	Yii::app()->request->cookies[$type]=$cookie;
}		

/**
 * 
 * @param array $url	两个元素，是url前半部分(区域/条件/)和后半部分(关键字)
 * @param int $total	数据总数
 * @param int $now		当前所在页
 * @param int $size		单页数据量
 */

// function createPagingString($url, $total, $now, $size = 3) {
// 	$offSet = 4;
// 	$returnString = $urlPrefix = $urlSuffix = "";
// 	$pageCount = ceil($total/$size);
// 	if (is_array($url)) {
// 		$urlPrefix = $url[0];
// 		$urlSuffix = $url[1];
// 	}
// 	if ($pageCount > 1) {
// 		$from = (($pageCount < (2*$offSet + 1)) or ($now <= $offSet)) ? 1 : ($now - $offSet);
// 		$to = ($pageCount < ($now + $offSet)) ? $pageCount : ($now + $offSet);
// 		$returnString .= ($now > 1) ? '<li class="prev"><a href="'.$urlPrefix.'n'.($now - 1) . $urlSuffix . '">上一页</a></li>' : '';
// 		for ($i = $from ; $i <= $to; $i++) {
// 			$returnString .= ($now == $i) ? '<a href="' . $urlPrefix . 'n' . $i . $urlSuffix . '" ><li class="current">'.$i.'</li></a>'
// 			: '<a href="'.$urlPrefix.'n'.$i.$urlSuffix.'"><li>'.$i.'</li></a>';
// 		}
// 		$returnString .= $now < $pageCount ? '<li class="next"><a href="'.$urlPrefix.'n'.($now + 1).$urlSuffix.'">下一页</a></li>' : '';
// 	}
// 	return $returnString;
// }

function createPagingString($url, $total, $now, $size = 16) {
	$offSet = 4;
	$returnString = $urlPrefix = $urlSuffix = "";
	$pageCount = ceil($total/$size);
	if (is_array($url)) {
		$urlPrefix = $url[0];
		$urlSuffix = $url[1];
	}
	if ($pageCount > 1) {
		$from = (($pageCount < (2*$offSet + 1)) or ($now <= $offSet)) ? 1 : ($now - $offSet);
		$to = ($pageCount < ($now + $offSet)) ? $pageCount : ($now + $offSet);
		$returnString .= ($now > 1) ? '<li class="prev"><a href="'.$urlPrefix.'n'.($now - 1) . $urlSuffix . '">上一页</a></li>' : '';
		for ($i = $from ; $i <= $to; $i++) {
			$returnString .= ($now == $i) ? '<li class="current"><a href="' . $urlPrefix . 'n' . $i . $urlSuffix . '" >'.$i.'</a></li>'
			: '<a href="'.$urlPrefix.'n'.$i.$urlSuffix.'"><li>'.$i.'</li></a> ';
		}
		$returnString .= $now < $pageCount ? '<li class="next"><a href="'.$urlPrefix.'n'.($now + 1).$urlSuffix.'">下一页</a></li>' : '';
	}
	return $returnString;
}

/**
 * 截取字符串，返回的字符串没有乱码
 * @param string $string
 * @param int $length
 * @return string
 */
function getstr($string, $length, $dot='...', $encoding  = 'utf-8') {
	$string = trim($string);
	if($length && strlen($string) > $length) {
		//截断字符
		$wordscut = '';
		if(strtolower($encoding) == 'utf-8') {
			//utf8编码
			$n = 0;
			$tn = 0;
			$noc = 0;
			while ($n < strlen($string)) {
				$t = ord($string[$n]);
				if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
					$tn = 1;
					$n++;
					$noc++;
				} elseif(194 <= $t && $t <= 223) {
					$tn = 2;
					$n += 2;
					$noc += 2;
				} elseif(224 <= $t && $t < 239) {
					$tn = 3;
					$n += 3;
					$noc += 2;
				} elseif(240 <= $t && $t <= 247) {
					$tn = 4;
					$n += 4;
					$noc += 2;
				} elseif(248 <= $t && $t <= 251) {
					$tn = 5;
					$n += 5;
					$noc += 2;
				} elseif($t == 252 || $t == 253) {
					$tn = 6;
					$n += 6;
					$noc += 2;
				} else {
					$n++;
				}
				if ($noc >= $length) {
					break;
				}
			}
			if ($noc > $length) {
				$n -= $tn;
			}
			$wordscut = substr($string, 0, $n);
		} else {
			for($i = 0; $i < $length - 1; $i++) {
				if(ord($string[$i]) > 127) {
					$wordscut .= $string[$i].$string[$i + 1];
					$i++;
				} else {
					$wordscut .= $string[$i];
				}
			}
		}
		$string = $wordscut.$dot;
	}
	return trim($string);
}

	/**
	 * 对二位数组进行排序
	 * @param array $arr
	 * @param str $keys
	 * @param str $type
	 * 
	 */
	function array_sort($arr,$keys,$type='desc'){
		$keysvalue = $new_array = array();
		foreach ($arr as $k=>$v){
			$keysvalue[$k] = $v[$keys];
		}if($type == 'asc'){
			asort($keysvalue);
		}else{
			arsort($keysvalue);
		}
		reset($keysvalue);
		foreach ($keysvalue as $k=>$v){
			$new_array[$k] = $arr[$k];
		}
		return $new_array;
	}
	
	//给定一个价格 返回这个价格所对应的配置文件params.php里的价格区间    暂时注掉 用在房源详情页的折线图
/* 	function priceInterval($price, $priceType = 'salePrices') {
		$priceArray = params($priceType);
		array_shift($priceArray);
		foreach($priceArray as $value) {
			if(($price >= $value['start']) && ($price <= $value['end'])) {
				return $value;
			}
		}
	} */
	
	
	/**
	* return 被禁用的城市的id
	*/
	function falseCitysId() {
		$citys = params('cities');
		$falseCitys = array();
		foreach($citys as $value) {
			if(!$value['enable']) {
				$falseCitys[] = $value['id'];
			}
		}
		return $falseCitys;
	}
	
	/**
	* return 没有被禁用的城市的所有值
	*/
	function trueCity() {
		$citys = params('cities');
		$trueCitys = array();
		foreach($citys as $key => $value) {
			if($value['enable']) {
				$trueCitys[$key] = $value;
			}
		}
		return $trueCitys;
	}
	
		/**
	* return 没有被禁用的城市的id
	*/
	function trueCitysId() {
		$citys = params('cities');
		$trueCitys = array();
		foreach($citys as $value) {
			if($value['enable']) {
				$trueCitys[] = $value['id'];
			}
		}
		return $trueCitys;
	}
	
	//从视图里获取N条明星经纪人
	function getStarBrokers($cityId, $size) {
			$starBrokers = Yii::app()->db->createCommand()
							->select('*')
							->from('view_sync_netbroker')
							->where("companysId = {$cityId} and (salecount != 0 OR rentcount != 0) limit {$size}")
							->queryAll();
				foreach($starBrokers as &$value) {
					$value['district'] = Yii::app()->db->createCommand()
					->select('districtname')
					->from('sync_district')
					->where("districtid = {$value['district']} AND companysid = {$value['companysId']}")
					->queryRow();
				}
				
				foreach($starBrokers as &$item) {
					$name = preg_replace('|[0-9]*|', '', $item['username']);
					$item['username'] = $name;
				}
			return $starBrokers;
	}
	
	function removeInt($str) {
		return preg_replace('|[0-9]*|', '', $str);
	}
	
	function removeLocations($locations) {
		/**
		 * not need any more
		if(is_array($locations)) {
			foreach ($locations as $value) {
				if($value->areaname != '新区') {
					if($value->areaname == '浦东新区') {
					$value->areaname = preg_replace('/新区/', '', $value->areaname);
					}else{
					$value->areaname = preg_replace('/区/', '', $value->areaname);
					$value->areaname = preg_replace('/县/', '', $value->areaname);
					}
				}
			}
		}else {
			if($locations != '新区') {
				if($locations == '浦东新区') {
					$locations = preg_replace('/新区/', '', $locations);
				}else{
				$locations = preg_replace('/区/', '', $locations);
				$locations = preg_replace('/县/', '', $locations);
				}
			}
		}
		*/
		return $locations;
	}
	
	/**
	 * 折线图
	 */
	function getHouseView($cityId, $communityId, $bedroom, $houseType) {
		$nowMonth = $lastMonth = $percentage = 0;
		//获取当前月 和 当前前5个月 还有其中的最小的年和月 和 当前的年和月
		$month = date('m', strtotime('now')); //当前月份
		$monthN1 = date('m', strtotime('-1 month')); 
		$monthN2 = date('m', strtotime('-2 month'));
		$monthN3 = date('m', strtotime('-3 month'));
		$monthN4 = date('m', strtotime('-4 month'));
		$monthN5 = date('m', strtotime('-5 month'));
		$mixYearMonth = date('Ym', strtotime('-5 month'));//最小年月
		$maxYearMonth = date('Ym', strtotime('now'));//当前时间 也是最大时间
		$lastYearMonth = date('Ym',strtotime('-1 month'));//上个年月
		$communityModel = new CommunityPrice();
		//获取当前月 和 当前前5个月的所有值
		$prices = $communityModel->getDetailPriceAverage($cityId, $mixYearMonth, $maxYearMonth, $communityId, $bedroom, $houseType);
		//排序二维数组 来获取当前和之前共6个月中的最高平均 和 最低平均
		$pricesSort = array_sort($prices, 'price', 'asc');
		$minAndMax = array();
		$max = end($pricesSort);
		$min = reset($pricesSort);
		$minAndMax['maxMonth'] = $max['price'];
		$minAndMax['minMonth'] = $min['price'];
		
		//避免数据为整数,视图左侧数据
		if(round($minAndMax['maxMonth'], -2) >= $minAndMax['maxMonth']){
			$minAndMax['maxMonth'] = round($minAndMax['maxMonth'], -2) + 500;
		}else{
			$minAndMax['maxMonth'] = round($minAndMax['maxMonth'], -2) + 500;
		}
		$minAndMax['minMonth'] = ((round($minAndMax['minMonth'], -2)-100) >= 0) ? round($minAndMax['minMonth'], -2)-500 : 0;
		
		if(count($prices) >=2){
			if(intval($prices[0]['pricedate']) == intval($maxYearMonth)) {
				$nowMonth = $prices[0]['price'];	//获取当前月的数据
				$lastMonth = $prices[1]['price']; //获取上个月的数据
			}
			//求房源价格波动百分比
			if(($nowMonth - $lastMonth != 0) and ($lastMonth != 0)){
				$percentage = ($nowMonth - $lastMonth) / $lastMonth;
				$percentage = round($percentage, 2);
			}
		}
		//自定义数据用于显示空数据
		$selfDtae = array('price' => 0);
		$prices = array_sort($prices, 'pricedate', 'asc');
		$prices = changePrices($prices);
		$resource = array(
			'month' => $month,
			'monthN1' => $monthN1,	
			'monthN2' => $monthN2,
			'monthN3' => $monthN3,
			'monthN4' => $monthN4,	
			'monthN5' => $monthN5,
			'nowMonth' => $nowMonth,
			'lastMonth' => $lastMonth,		
			'mixYearMonth' => $mixYearMonth,
			'maxYearMonth' => $maxYearMonth,
			'prices' => $prices,
			'percentage' => $percentage,	
			'minAndMax' => $minAndMax,
		);
		return $resource;
	}
	
	function changePrices($prices) {
		$month1 = date('Ym', strtotime('-5 month'));//最小年月
		$month2 = date('Ym', strtotime('-4 month'));//最小年月
		$month3 = date('Ym', strtotime('-3 month'));//最小年月
		$month4 = date('Ym', strtotime('-2 month'));//最小年月
		$month5 = date('Ym', strtotime('-1 month'));//最小年月
		$month6 = date('Ym', strtotime('now'));//最小年月
		$viewPrice[$month1] = array('price' => 0); 
		$viewPrice[$month2] = array('price' => 0);
		$viewPrice[$month3] = array('price' => 0);
		$viewPrice[$month4] = array('price' => 0);
		$viewPrice[$month5] = array('price' => 0);
		$viewPrice[$month6] = array('price' => 0);
		foreach($viewPrice as $key => $value) {
			foreach($prices as $k => $v) {
				if(intval($key) == intval($v['pricedate'])) {
					$viewPrice[$key] = $v;
				}
			}
		}
		return $viewPrice;
	}

