<?php
include('config_local.php');
?>
<?php
$agent=$_POST['agent']; //echo $nom.'<br>' ;
$cabine=$_POST['cabine']; //echo $nom.'<br>' ;
$date=$_POST['date']; //echo $niveau.'<br>';
$start=$_POST['start'];// echo $conge.'<br>' ;
$end=$_POST['end'];// echo $conge.'<br>' ;
$couple=$_POST['couple'];// echo $conge.'<br>' ;
$status=$_POST['status'];// echo $conge.'<br>' ;
$note=$_POST['note'];// echo $conge.'<br>' ;

$idnum=0;
$idnum = mysql_num_rows(mysql_query('select id_affectation from affectation'));
$id = $idnum+1; //echo $id;
	$sql=mysql_query("INSERT INTO affectation (id_affectation,agent,cabine,date,start_time,end_time,couple,status,note) VALUES
	('$id','$agent','$cabine','$date','$start','$end','$couple','$status','$note')");

?>
<script type="text/javascript">
    alert('Ajout Effectue avec Succes ! :)');
    document.location.href = 'affectation.php';
</script>