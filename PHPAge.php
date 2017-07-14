<?php
class Age{
	private $img;
	public function __construct($img){
		$this->img=$img;
	}
	function age(){
	
    $host = "https://dm-23.data.aliyun.com";
    $path = "/rest/160601/face/age_detection.json";
    $method = "POST";
    $appcode = "f338ea3f202e43fcbff82c09a0719d8d";
    $headers = array();
    array_push($headers, "Authorization:APPCODE ".$appcode);
    //根据API的要求，定义相对应的Content-Type
    array_push($headers, "Content-Type".":"."application/json; charset=UTF-8");
    $querys = file_get_contents($this->img);
	// $imgpath="imgdata";
	$data=base64_encode($querys);
	// echo $data;
    $bodys = "{\"inputs\":[{\"image\":{\"dataType\":50,\"dataValue\":\"".$data."\"},\"type\":{\"dataType\":10,\"dataValue\":3}}]}";
    $url = $host . $path;

    $curl = curl_init();
	
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);
	//重要参数,想更全面了解可以自己打印看看
    $output=curl_exec($curl);
	$result=json_decode($output,true);
	$jsonarr=$result['outputs'][0]['outputValue']['dataValue'];
	curl_close($curl);
	return $jsonarr;
	}
}
?>
