<?php
require_once '../../../includes/conexion.php';
if (!empty($_GET)) {
  $idcitacion = $_GET['idcitacion'];

  $sql = "SELECT * FROM citaciones WHERE citacion_id = ?";
  $query=$pdo->prepare($sql);
  $query->execute(array($idcitacion));
  $result= $query->fetch(PDO::FETCH_ASSOC);

  if (empty($result)) {
  $respuesta = array('status' => false,'msg'=> 'Todos los campos deben ser llenados');
  }else{
    $respuesta = array('status' => true,'data' => $result);
  }
  echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
