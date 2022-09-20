<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) 
{
    if (empty($_POST['nombre']) ) {
       $respuesta = array('status' => true,'msg'=> 'Todos los campos deben ser llenados');
    }else{
        $idactividad = $_POST['idactividad'];
        $nombre = $_POST['nombre'];
        $estado=$_POST['listEstado'];


        $sql= 'SELECT * FROM actividad WHERE nombre_actividad = ? AND actividad_id != ? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre,$idactividad));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status'=>false,'msg'=>'La actividad ya existe');
        }else{
            if ($idactividad == "") {
                $sqlInsert = 'INSERT INTO actividad (nombre_actividad,estado) VALUES (?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre,$estado));
                $accion = 1;
            }else{
       
                $sqlUpdate = 'UPDATE actividad SET nombre_actividad = ?,estado = ? WHERE actividad_id = ?';
                $queryUpdate = $pdo->prepare($sqlUpdate);
                $request = $queryUpdate->execute(array($nombre,$estado,$idactividad));
                $accion = 2;
          
            }
           
            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status'=>true,'msg'=>'La actividad fue creado exitosamente');
                }else{
                    $respuesta = array('status'=>true,'msg'=>'La actividad fue actualizado exitosamente');
                }  
            }
        }
    }
   echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}