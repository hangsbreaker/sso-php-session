<?php
session_start();
$this_page = "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
// assigment encode session from url to local
if(isset($_GET['s'])){
	$sesi = json_decode(base64_decode($_GET['s']),true);
	foreach($sesi as $key=>$val){
		$_SESSION[$key]=$val;
	}
	header("location:".$GLOBALS['this_page']);
}

function sso_login($url=''){
	// if logout
	if(isset($_GET['o'])){
		session_destroy();
		header("location:".$url."?o=l");
		echo "Harap tunggu...";
	}else{
		if(empty($_SESSION)){
			header("location:".$url."?u=".$GLOBALS['this_page']);
		}else{
			if(isset($_SESSION['url'])){
				if(!in_array($GLOBALS['this_page'],$_SESSION['url'])){
					//echo "location:".$url."?u=".$GLOBALS['this_page'];
					header("location:".$url."?u=".$GLOBALS['this_page']);
				}
			}
		}
	}
}

//print_r($_SESSION);
?>
