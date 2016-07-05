<?php
header("Content-Type:text/plain;charset=utf-8");
// $gameArray={
// 	"0":[{name:"传奇世界1",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界2",icon:"img/i2.png",system:"H5",type:"角色扮演",size:0,login:"下载"},
// 	{name:"传奇世界3",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界4",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界5",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界6",icon:"img/i2.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界7",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界8",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界9",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界10",icon:"img/i2.png",system:"苹果",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界11",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界12",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界13",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"},
// 	{name:"传奇世界14",icon:"img/i1.png",system:"H5",type:"角色扮演",size:0,login:"登陆H5"}]
// };
$gameArray='[
{"name":"传奇世界1","icon":"img/i1.png","system":"H5","type":"角色扮演","size":0,"login":"登陆H5"},
{"name":"传奇世界2","icon":"img/i2.png","system":"H5","type":"角色扮演","size":0,"login":"下载"},
{"name":"传奇世界3","icon":"img/i1.png","system":"H5","type":"角色扮演","size":0,"login":"下载"},
{"name":"传奇世界4","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界5","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界6","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界7","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界8","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界9","icon":"img/i1.png","system":"H5","type":"角色扮演","size":0,"login":"下载"},
{"name":"传奇世界10","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界11","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界12","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界13","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界14","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界15","icon":"img/i1.png","system":"H5","type":"角色扮演","size":0,"login":"下载"},
{"name":"传奇世界16","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界17","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界18","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界19","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界20","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界21","icon":"img/i1.png","system":"H5","type":"角色扮演","size":0,"login":"下载"},
{"name":"传奇世界22","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界23","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界24","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界25","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"},
{"name":"传奇世界26","icon":"img/i2.png","system":"H5","type":"角色扮演","size":123,"login":"下载"}
]';
	$array = json_decode($gameArray,true); 
	$len = sizeof($array);
	$temp = $_GET['start'];
	// $end = $_GET['end'] < $len ? $_GET['end'] : ($len-1); 
	$array_temp = array();
	$canload = true;
 	if($_GET['method']=="init"){
 		echo $len;
 	}	
    if($_GET['method']=="request"){
    	if($_GET['end'] < $len){
    		$end = $_GET['end'];
    	}
    	else{
    		$end = $len-1;    		
    	}
    	if($canload){
	    	while($temp<=$end){  
		    array_push($array_temp,$array[$temp]);    	      	
	    	 $temp++;
	    	}
	    	echo json_encode($array_temp);
	    	if($_GET['end'] >= $len){
	    		$canload = false; 
	    	}	    	    		 		
    	}
    	else{
    		echo 0;
    	}

    }  

?>
