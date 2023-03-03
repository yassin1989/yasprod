<?php
include('config_local.php');

$id_cabine=$_GET['id']; //echo $nom.'<br>' ;

$sql=mysql_query("DELETE FROM cabine WHERE id_cabine = $id_cabine	");
?>
<script type="text/javascript">
    alert('Suppression Effectue avec Succes ! :)');
    document.location.href = 'cabine_all.php';
</script>