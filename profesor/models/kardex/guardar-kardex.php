<?php

require_once '../../../includes/conexion.php';

if ($_POST) {
$idap = $_POST['idap'];

$sqlInsert = 'INSERT INTO kardex (ap_id) VALUES (?)';
$queryInsert = $pdo->prepare($sqlInsert);
$result = $request = $queryInsert->execute(array($idap));
if ($result) {
   $respuesta = array('status' => true,'msg' => 'nota asignada');
}else{
    $respuesta = array('status' => false,'msg' => 'no se asigno');
}

echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
