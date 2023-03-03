<!DOCTYPE html>
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include('config_local.php');
$datetime = date("Y-m-d H:i:s"); 
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
		//echo $id;
   $_SESSION['id'] = $id;
	$_SESSION['username'] = $login;
	//echo $_SESSION['username']; echo $login ;
	$sql2=("INSERT INTO track_log_user(id_user,username,login_time) VALUES ('$id','$login','$datetime')");
	$res2 = mysql_query($sql2);
header('location:home.php');
}
	else{	
		
		
		header('Location: index.php?error=1');
		$sql3=("INSERT INTO track_log_user (id_user,username,logout_time) VALUES ('$id','$login','$datetime') where id_user='$login'  ");
		$res3 = mysql_query($sql3);
	
}

?>