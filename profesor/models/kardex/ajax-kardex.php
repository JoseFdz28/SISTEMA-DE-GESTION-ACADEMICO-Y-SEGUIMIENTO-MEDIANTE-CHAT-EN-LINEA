<?php

require_once '../../../includes/conexion.php';
include('../../../twi.php');
if (!empty($_POST)) {
    if (trim($_POST['observacion']) =='' || trim($_POST['fecha']) == ''){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
    $kaid = $_POST['idka'];
    $idap = $_POST['idap'];
    $observacion = $_POST['observacion'];
    $fecha = $_POST['fecha'];
$alumno = $_POST['alumno'];
$sql = "SELECT * FROM  alumnos  WHERE alumno_id = $alumno";
$query = $pdo->prepare($sql);
$query->execute();
$row =$query->rowCount();

if ($row > 0) {
    while($data = $query->fetch()){
     $celular=$data['telefono'];  
} }
    if ($kaid == "") {
        $sqlInsert = 'INSERT INTO kardex (ap_id,observacion,fecha) VALUES (?,?,?)';
        $queryInsert = $pdo->prepare($sqlInsert);
        $request = $queryInsert->execute(array($idap,$observacion,$fecha));
        $accion = 1;
       enviar($celular,$observacion);
    }else{
        $sqlUpdate = 'UPDATE kardex SET observacion = ?,fecha = ? WHERE kardex_id = ?';
        $queryUpdate = $pdo->prepare($sqlUpdate);
        $request = $queryUpdate->execute(array($observacion,$fecha,$kaid));
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

    
