<!DOCTYPE html>
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include('config_local.php');

$login = $_POST['username'];$login = mysql_real_escape_string($login);
$mp = $_POST['password'];$mp = mysql_real_escape_string($mp);

$sql="SELECT * FROM login WHERE username='$login'and password='$mp' ";
$res = mysql_query($sql);
$count=mysql_num_rows($res);
if($count>0)
{

$row=mysql_fetch_object($res);
        $mo=$row->password;
        $username=$row->username;        
		$id=$row->id;
		echo $id;
   $_SESSION['id'] = $id;
	$_SESSION['username'] = $login;
	//echo $_SESSION['username']; echo $login ;
header('location:home.php');
}else{
header('Location: index.php?error=1');
}
?>