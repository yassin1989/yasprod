<?php
include('config_local.php');
?>
<?php
$id_client=$_GET['id']; //echo $nom.'<br>' ;

$sql=mysql_query("DELETE FROM client  WHERE id_client = $id_client	");
?>
<script type="text/javascript">
    alert('Suppression Effectue avec Succes ! :)');
    document.location.href = 'client_all.php';
</script>