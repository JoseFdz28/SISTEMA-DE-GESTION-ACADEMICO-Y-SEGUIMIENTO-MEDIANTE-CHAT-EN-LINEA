<?php
require_once '../../../includes/conexion.php';
$sql = 'SELECT * FROM biblioteca ';
$query = $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);