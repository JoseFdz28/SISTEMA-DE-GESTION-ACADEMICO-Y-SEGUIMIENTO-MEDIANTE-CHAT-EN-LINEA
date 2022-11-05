<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (trim($_POST['nota1']) > 100 || trim($_POST['nota2']) > 100 || trim($_POST['nota1']) > 100){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
    $boid = $_POST['idbo'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    

    $sql= 'SELECT * FROM boletin WHERE bo_id = ?';
    $query = $pdo->prepare($sql);
    $query->execute(array($boid));
    $result = $query->fetch(PDO::FETCH_ASSOC);


    if ($result > 0) {
   
        $prom = ($nota1+$nota2+$nota3)/3;
            $sqlUpdate = 'UPDATE boletin SET primerTrimestre = ?,segundoTrimestre = ?,tercerTrimestre = ?,promedio = ? WHERE bo_id = ?';
            $queryUpdate = $pdo->prepare($sqlUpdate);
            $request = $queryUpdate->execute(array($nota1,$nota2,$nota3,$prom,$boid));
            $accion = 3;
       
       
            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status'=>true,'msg'=>'El profesorfue creado exitosamente');
                }else{
                    $respuesta = array('status'=>true,'msg'=>'El profesor fue actualizado exitosamente');
                }  
            }
    }
}
echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}