<?php
require_once '../../conexion.php';


$idap = $_POST['idap'];
$estado = $_POST['estado'];
$cadena = "INSERT INTO asistencia (ap_id, estado) VALUES ";
for ($i=0; $i < count($idap); $i++) { 
    $cadena = "('".$idap[$i]."', '".$estado[$i]."'),";
}

echo json_encode(array('cadena' => $cadena);)
?>