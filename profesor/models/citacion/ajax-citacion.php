<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (trim($_POST['detalle']) =='' || trim($_POST['fecha']) == ''){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
    $idpm = $_POST['idpm'];
    $idcitacion = $_POST['idcitacion'];
    $detalle = $_POST['detalle'];
    $fecha = $_POST['fecha'];

    
    if ($idcitacion == "") {
        $sqlInsert = 'INSERT INTO citaciones (pm_id,detalle,fecha) VALUES (?,?,?)';
        $queryInsert = $pdo->prepare($sqlInsert);
        $request = $queryInsert->execute(array($idpm,$detalle,$fecha));
        $accion = 1;
    }else{
        $sqlUpdate = 'UPDATE citaciones SET detalle = ?,fecha = ? WHERE citacion_id = ?';
        $queryUpdate = $pdo->prepare($sqlUpdate);
        $request = $queryUpdate->execute(array($detalle,$fecha,$idcitacion));
        $accion = 2;   
    }
    if ($request > 0) {
        if ($accion == 1) {
            $respuesta = array('status'=> true, 'msg'=> ' creada correctamente');
        }else{
            $respuesta = array('status'=> true, 'msg'=> 'Evaluacion actualizada correctamente');
        }
    }       

}
echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}

    
