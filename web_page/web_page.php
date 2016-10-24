<?php
require 'sso_client.php';
sso_login('http://localhost/sso/manager/login.php');


if(isset($_SESSION['username'])){
	echo "welcome login";
	print_r($_SESSION);
}

?>
<a href="http://localhost/sso/manager/login.php?o=l">Logout</a>
