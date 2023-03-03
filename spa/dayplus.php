<?php
include('config_local.php'); 

$date_c='2020-01-01' ;
$date_f='2020-03-31';
$agent='16' ;
$cabine='1' ;
$start='11:00';
$end='19:05';
while($date_c != $date_f)
{
$sql=mysql_query("INSERT INTO affectation (id_agent,id_cabine,date,start_time,end_time,couple,status) VALUES
	('$agent','$cabine','$date_c','$start','$end','No','Oui')");
$date_c= date('Y-m-d',strtotime($date_c . '+1 day'));
	echo $agent.'<br>'; 
	echo $date_c.'<br>'; 
}

?> 