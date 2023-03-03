<?php
include('config_local.php');
?>
<?php
$nom=$_POST['name']; //echo $nom.'<br>' ;
$type=$_POST['type']; //echo $nom.'<br>' ;
$status=$_POST['status']; //echo $niveau.'<br>';
$special=$_POST['special'];// echo $conge.'<br>' ;
$date=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];
$idnum=0;
$idnum = mysql_num_rows(mysql_query('select id_cabine from cabine'));
$id = $idnum+1; //echo $id;
	$sql=mysql_query("INSERT INTO cabine (id_cabine,name,type,status,special,date_ajout,auteur) VALUES
	('$id','$nom','$type','$status','$special','$date','$moi')");

?>
<script type="text/javascript">
    alert('Ajout Effectue avec Succes ! :)');
    document.location.href = 'cabine_all.php';
</script>