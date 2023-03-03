<?php
include('config_local.php');
include('config_opera.php');

$idres=$_POST['leid']; echo $idres.'<br>';
$genre=$_POST['genre']; //echo $genre.'<br>';
$type_soin=$_POST['types']; //echo $type.'<br>';
$date_res=$_POST['date']; //echo $date_res.'<br>';
$start_time=$_POST['time'];//echo $start_time.'<br>';
$paye=$_POST['paye'];//echo $time_res.'<br>';
$soin=$_POST['soin'];//echo $soin.'<br>';
$cabine=$_POST['cabine'];//echo $cabine.'<br>';
$agent=$_POST['agent'];//echo $agent.'<br>';
$status=$_POST['status'];//echo $status.'<br>';
$health=$_POST['health'];//echo $health.'<br>';
$note=$_POST['note'];//echo $note.'<br>';
$client_ext=$_POST['client_externe'];//echo $client_ext.'<br>';

$datenow=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];
//ajouter client opera from room in house
if (isset($_POST['opera'])) {
	$opera=$_POST['opera'];//  echo $opera.'<br>';	
	$name=$_POST['name'];// echo $name.'<br>' ;
	$last=$_POST['last'];// echo $last.'<br>' ;
	$room=$_POST['room']; //echo $room.'<br>';
	$email=$_POST['email'];//echo $email.'<br>' ;
	$phone=$_POST['phone'];//echo $phone.'<br>';	
	//tester le resident existe deja
	$cl=0;
  $sql00="select * from client where id_opera= $opera ";
	//echo $sql00;
	$req00= mysql_query ($sql00) ;
	while ($data00= mysql_fetch_array($req00))
	{
		$cl=$data00['id_client'];
		$leclient=$data00['id_client'];
		//echo "cc: ".$leclient;
	}
	//echo $cl ;
		//tester disponibilité
	if($cl==0)
	{

$sql=mysql_query("UPDATE client SET genre='$genre',health='$health',date_modif='$datenow',auteur='$moi' where id_client='$client_ext'");
 //echo $sql ;
$sql2="SELECT * FROM client  ORDER BY id_client DESC LIMIT 1";
$req2= mysql_query ($sql2) ;
while($data2= mysql_fetch_array($req2)) 
{
 $leclient= $data2['id_client'];
}
	}

}  else{                        

$leclient=$client_ext;
}
//echo "vv: ".$leclient;
//calcul temps fin 
		$sql3 = "SELECT * FROM soins where id_soin=$soin  "; 							
 										$req3= mysql_query ($sql3) ;
											$number3=mysql_num_rows($req3);
											while($data3= mysql_fetch_array($req3)) 
 								{		
								 		$id = $data3['id_soin'];
								 		$duree = $data3['duree'];
											
								}	

		              //	echo $duree .'---' ;
				    $commence=date("Y-m-d H:i:s", strtotime($date_res.' '.$start_time));				
					 //echo 'start:'.$commence.'<br>';
					$minutes_to_add = $duree;
					$time = new DateTime($commence);
					$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
					$fini = $time->format('Y-m-d H:i:s');
					//echo 'end:'.$fini.'<br>' ;

//test wa9t
//start_time: 2018-12-17 10:00:00
//endtime:    2018-12-17 10:20:00
//commence:   2018-12-17 10:15:00
//fini:       2018-12-17 10:35:00

//$sql4 ="select * from reservation WHERE (start_time Between '$commence' and '$fini') and (endtime Between '$commence' and '$fini') ";

// test therapeute agent / cabine
$sql5 ="select * from reservation WHERE ((start_time between '$commence' and '$fini') or (endtime between '$commence' and '$fini')) and (id_agent ='$agent' or  id_cabine='$cabine') and id_res != $idres and status not like 'Annuler'";
$req5= mysql_query ($sql5) ;
//echo $sql5.'<br>';
$count5=mysql_num_rows($req5);	
	if($count5 >0) 
	{ echo $count5;
		echo "Agent Indisponible  !";
	header('location:reservation.php?error2=3&rev='.$leclient.'&f='.$fini.'');exit;
	}else{
		echo " Agent Disponible  ok!!!";
	}

// changer status cabine 

//ajout reservation
$sql=mysql_query("UPDATE reservation SET date='$date_res',start_time='$commence',endtime='$fini',status='$status',note='$note',paye='$paye',id_cabine='$cabine',type_soin='$type_soin',id_soin='$soin',id_agent='$agent',date_modif='$datenow',auteur='$moi',id_client='$client_ext' where id_res =$idres ");

					if($sql==true)
					{echo 'ok updated';
					 $sql6=mysql_query("UPDATE cabine SET status='$status' WHERE id_cabine = '$cabine' ");
					 header('location:reservation_all.php?success=1&rev='.$leclient.'&f='.$fini.'');exit;
					}
	
?>

