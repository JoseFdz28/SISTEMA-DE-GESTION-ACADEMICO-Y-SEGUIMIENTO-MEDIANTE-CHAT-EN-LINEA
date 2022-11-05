<?php
require_once '../../../includes/conexion.php';
if (!empty($_GET)) {
  $idkardex = $_GET['idkardex'];

  $sql = "SELECT * FROM kardex WHERE kardex_id = ?";
  $query=$pdo->prepare($sql);
  $query->execute(array($idkardex));
  $result= $query->fetch(PDO::FETCH_ASSOC);

  if (empty($result)) {
  $respuesta = array('status' => false,'msg'=> 'Todos los campos deben ser llenados');
  }else{
    $respuesta = array('status' => true,'data' => $result);
  }
  echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
