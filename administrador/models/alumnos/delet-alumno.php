<?php

require_once '../../../includes/conexion.php';

if ($_POST) {
$idprofesor = $_POST['idalumno'];

$sql = "UPDATE alumnos SET estado = 0 WHERE alumno_id = ?";
$query = $pdo->prepare($sql);
$result = $query->execute(array($idprofesor));


if ($result) {
   $respuesta = array('status' => true,'msg' => 'Alumno eliminado correctamente');
}else{
    $respuesta = array('status' => false,'msg' => 'Error al eliminar el Alumno');
}
echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}