<?php

/**
 * JPhpExcel class file.
 *
 * @author jerry2801 <jerry2801@gmail.com>
 * @version alpha 2
 * @required php-excel Version 1.1 <http://code.google.com/p/php-excel/>
 *
 * A typical usage of JPhpExcel is as follows:
 * <pre>
 *
 * $data=array(
 *     1=>array ('Name','Surname'),
 *     array('Schwarz','Oliver'),
 *     array('Test','Peter')
 * );
 *
 * Yii::import('ext.phpexcel.JPhpExcel');
 * $xls=new JPhpExcel;
 * $xls->addArray($data);
 * $xls->generateXML('中文名',false);
 * </pre>
 */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'php-excel.class.php';

class JPhpExcel extends Excel_XML
{
}