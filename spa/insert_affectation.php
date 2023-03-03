<?php
include('config_local.php');

$agent=$_POST['agent']; //echo $nom.'<br>' ;
$cabine=$_POST['cabine']; //echo $nom.'<br>' ;
$date=$_POST['date'];// echo $date.'<br>';
$start=$_POST['start'];// echo $conge.'<br>' ;
$end=$_POST['end'];// echo $conge.'<br>' ;
$couple=$_POST['couple'];// echo $conge.'<br>' ;
$status=$_POST['status'];// echo $conge.'<br>' ;
$note=$_POST['note'];// echo $conge.'<br>' ;

$sql0=" SELECT * from affectation where date like '$date' and id_agent=$agent ";
$req0= mysql_query ($sql0) ;
$count=mysql_num_rows($req0);	
	if($count >0) 
	{ echo $count;
	 //echo " Agent déja affecter !!!" ;exit();
		header('location:affectation.php?error1=2&rev='.$agent.'&date='.$date.'');exit;
	} 
	
else {
	
}
$sql=mysql_query("INSERT INTO affectation (id_agent,id_cabine,date,start_time,end_time,couple,status,note) VALUES
	('$agent','$cabine','$date','$start','$end','$couple','$status','$note')");
	if($sql==true) {
 		header('location:affectation.php?success=1&date='.$date.' ');exit;
	}

?>
