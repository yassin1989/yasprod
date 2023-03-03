<?php
include('config_local.php');

$id_resv=$_GET['id']; //echo $nom.'<br>' ;

$datenow=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];


$sql0="select * from reservation WHERE id_res = '$id_resv' ";
$req= mysql_query ($sql0) ;
					
						 while($data= mysql_fetch_array($req)) 
 {		
								 		$id = $data['id_res'];								 						   				 
								 		$client = $data['id_client'];							 						   				 
							            $agent = $data['id_agent'];
							            $cabine = $data['id_cabine'];							            
							            $soin = $data['id_soin'];
							            $type = $data['type_soin'];
							 			$date = $data['date'];
							            $start = $data['start_time'];
							            $end = $data['endtime'];
							          	$status = $data['status'];
							            $note = $data['note'];
							            $paye = $data['paye'];
							            $date_ajout = $data['date_ajout'];
							            $date_modif = $data['date_modif'];
 }
//echo $id.'<br>';echo $client.'<br>';echo $agent.'<br>';
//ajout reservation
$sql1=mysql_query("INSERT INTO history
(id_res,date,start_time,endtime,status,note,paye,id_cabine,type_soin,id_soin,id_agent,id_client,date_ajout,date_modif,date_supp,auteur) VALUES	('$id','$date','$start','$end','$status','$note','$paye',$cabine,'$type','$soin','$agent','$client','$date_ajout','$date_modif','$datenow','$moi')");

$sql=mysql_query("DELETE FROM reservation WHERE id_res = $id_resv	");
	
?>
<script type="text/javascript">
    alert('Suppression Effectue avec Succes ! :)');
   document.location.href = 'reservation_all.php';
</script>