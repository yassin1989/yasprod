<?php
include('config_local.php');

$id_resv=$_GET['id']; //echo $nom.'<br>' ;

$sql=mysql_query("DELETE FROM reservation WHERE id_res = $id_resv	");
?>
<script type="text/javascript">
    alert('Suppression Effectue avec Succes ! :)');
    document.location.href = 'reservation_all.php';
</script>