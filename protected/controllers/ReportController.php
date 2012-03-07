<?php

class ReportController extends Controller
{
	public function actionIndex()
	{
		$sql = "select * from users a,surveys b ,reginfos c where a.id = 1 and b.id = 1 and c.id = 1";
		$command = Yii::app()->db->createCommand($sql);  
		$rows = $command->queryAll(); //结果数组，多行的内容  
		//var_dump($rows);
		//exit();
		$this->render('index',array('rows'=>$rows));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
