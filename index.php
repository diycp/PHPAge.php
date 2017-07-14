<?php
 require_once 'PHPAge.php';
 header("Content-Type:text/html;charset=utf-8;");
 $age=new Age('./test.jpg');//Pictures of faces
 $result=$age->age();
 $jsonarr=json_decode($result,true);
 if($jsonarr['errno']==0){
	 
	echo "<img src='./test.jpg' width=300px height=400px /><br/>";
	echo "json包:";
	print_r($result);
	echo "<br/>";
	foreach($jsonarr['age'] as $k=>$v){
	echo "年龄".$k.":".$v;
	}
	echo "数量:".$jsonarr['number'];
	echo "脸部区域X:".$jsonarr['rect'][0];
	echo "脸部区域Y:".$jsonarr['rect'][1];
	echo "脸部区域H:".$jsonarr['rect'][2];
	echo "脸部区域W:".$jsonarr['rect'][3];
 }
 

?>
