<?php
include('config_local.php');
?>
<?php
$id_agent=$_GET['id']; //echo $nom.'<br>' ;

$sql=mysql_query("DELETE FROM agent  WHERE id_agent = $id_agent	");
$sql2=mysql_query("DELETE FROM aff_agent  WHERE id_agent = $id_agent	");
?>
<script type="text/javascript">
    alert('Suppression Effectue avec Succes ! :)');
    document.location.href = 'agent_all.php';
</script>