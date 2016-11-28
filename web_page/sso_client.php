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
		$host_login = "http://".parse_url($url,PHP_URL_HOST);
		$host_web = "http://".$_SERVER['HTTP_HOST'];
		if($host_login != $host_web){
			// destroy session
			session_destroy();
		}
		header("location:".$url."?o=l");
		echo 'Please Wait...<meta http-equiv="refresh" content="0;url='.$url.'?o=l&u='.$this_page.'">';
		exit;
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
