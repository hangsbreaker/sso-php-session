<?php
require 'sso_manager.php';
is_login();
/*$host = 'localhost';
$user ='root';
$pass = '';
$db = '';
mysql_connect($host,$user,$pass) or die (mysql_error());*/

if(isset($_POST['submit'])){
	if($_POST['username']=='admin' && $_POST['password']=='admin'){
		$_SESSION['username']='Administrator';
		$_SESSION['name']='Hangs Breaker';
		// sso login
		sso_login();
	}else{
		echo "Not Logged In";
	}
}
// if logout
if(isset($_GET['o'])){
	sso_logout();
}
print_r($_SESSION);
if(!empty($_SESSION)){
	echo '<h2>Logged In</h2>
			<a href="http://localhost/sso/manager/login.php?o=l">Logout</a>';
}else{
?>
<br>
Login
<form method="post" action="#">
<input type="text" name="username" placeholder="Username"/><br>
<input type="password" name="password" placeholder="Password"/><br>
<input type="submit" name="submit" value="Submit"/><br>
</form>
<?php
}
?>
