<?php
include('config_local.php');

$id_soin=$_POST['id_soin']; //echo $id_soin.'<br>' ;
$nom=$_POST['name']; //echo $nom.'<br>' ;
$descri=$_POST['descri']; //echo $nom.'<br>' ;
$cabine=$_POST['cabine']; //echo $nom.'<br>' ;
$type=$_POST['type']; //echo $niveau.'<br>';
$duree=$_POST['duree'];// echo $conge.'<br>' ;
$prix=$_POST['prix'];//echo $phone.'<br>';

$date=date('Y-m-d_H-i-s');
$idnum = mysql_num_rows(mysql_query('select * from aff_soin '));
$idas = $idnum+1; //echo $idas.'---<br>';

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];

//vider la table
$sql="DELETE from aff_soin WHERE id_soin='$id_soin' ";
mysql_query($sql);

//ajout des actes
foreach ($_POST['cabine'] as $item)
   { //echo $item.'<br>';
	   //echo $id_soin;
   		$sqlz = "INSERT INTO aff_soin(id_soin,id_cabine) VALUES ('$id_soin','$item')";
	    //echo $sqlz;
		$resz = mysql_query($sqlz);
   }

$sql2=mysql_query("UPDATE soins SET nom='$nom',description='$descri',type='$type',duree='$duree',prix='$prix',date_modif='$date',auteur='$moi' where id_soin='$id_soin' ");

?>
<script type="text/javascript">
    alert('Modification Effectue avec Succes ! :)');
    document.location.href = 'soin_all.php';
</script>