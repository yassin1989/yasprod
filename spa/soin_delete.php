<?php
include('config_local.php');

$id_soin=$_GET['id']; //echo $nom.'<br>' ;

$sql=mysql_query("DELETE FROM soins  WHERE id_soin = $id_soin	");
$sql2=mysql_query("DELETE FROM aff_soin  WHERE id_soin = $id_soin	");
?>
<script type="text/javascript">
    alert('Suppression Effectue avec Succes ! :)');
    document.location.href = 'soin_all.php';
</script>