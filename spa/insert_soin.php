<?php
include('config_local.php');
?>
<?php
$nom=$_POST['name']; //echo $nom.'<br>' ;
$descri=$_POST['descri']; //echo $descri.'<br>' ;
//$cabine=$_POST['cabine']; echo $cabine.'<br>' ;
$type=$_POST['type']; //echo $type.'<br>';
$duree=$_POST['duree'];// echo $duree.'<br>' ;
$prix=$_POST['prix'];//echo $prix.'<br>';

$date=date('Y-m-d_H-i-s');
$valeurs="";
$idnum=0;
$idnum = mysql_num_rows(mysql_query('select id_soin from soins'));
$id = $idnum+1; //echo $id;
foreach ($_POST['cabine'] as $item)
   { 
	$valeurs= $valeurs.'/'.$item;
	$sql0=mysql_query("INSERT INTO aff_soin (id_soin,id_cabine) values ('$id','$item') ");
   }

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];


	$sql=mysql_query("INSERT INTO soins (id_soin,nom,description,id_cabine,type,duree,prix,date_ajout,auteur) VALUES
	('$id','$nom','$descri','$valeurs','$type','$duree','$prix','$date','$moi')");

?>
<script type="text/javascript">
    alert('Ajout Effectue avec Succes ! :)');
    document.location.href = 'soin_add.php';
</script>