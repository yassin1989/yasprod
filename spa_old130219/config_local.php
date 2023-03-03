<?php
error_reporting(E_ALL ^ E_DEPRECATED);
// Connexion au serveur mysql
$conn = mysql_connect("localhost", "root","") or die('Impossible de se connecter : ' . mysql_error());
// sélection de la base de données
mysql_select_db("spa_bd", $conn);
mysql_set_charset('utf8',$conn);

?>