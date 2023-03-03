<?php
include('config_local.php');
$id_aff=$_POST['id_aff']; echo $id_aff.'<br>';
$agent=$_POST['agent']; //echo $nom.'<br>' ;
$cabine=$_POST['cabine']; //echo $nom.'<br>' ;
$date=$_POST['date']; //echo $niveau.'<br>';
$start=$_POST['start'];// echo $conge.'<br>' ;
$end=$_POST['end'];// echo $conge.'<br>' ;
$couple=$_POST['couple'];// echo $conge.'<br>' ;
$status=$_POST['status'];// echo $conge.'<br>' ;
$note=$_POST['note'];// echo $conge.'<br>' ;

$sql=mysql_query("UPDATE affectation  SET id_agent='$agent',id_cabine='$cabine',date='$date',start_time='$start',end_time='$end',couple='$couple',status='$status',note='$note'  where id_affectation='$id_aff' ");
if($sql==true) {
 header('location:affectation_all.php?error1=3&date='.$date.'');exit;
		}
?>
<script type="text/javascript">
  // alert('Modification Effectue avec Succes ! :)');
  /// document.location.href = 'affectation_all.php';
</script>