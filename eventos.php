<?php 
include_once('includes/load.php');
/*$pdo = new PDO("mysql:dbname=coordinacion;host localhost","root","");
$sql =  $pdo->prepare(" SELECT * FROM troop ");
$sql->execute();
$result =$sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);*/

global $db;
$sql = " SELECT * FROM troop";
$result = $db->query($sql);
echo json_encode(($db->fetch_assoc($result))
);
?>
