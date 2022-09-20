<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) 
{
    if (empty($_POST['nombre']) ) {
       $respuesta = array('status' => true,'msg'=> 'Todos los campos deben ser llenados');
    }else{
        $idgrado = $_POST['idgrado'];
        $nombre = $_POST['nombre'];
        $estado=$_POST['listEstado'];


        $sql= 'SELECT * FROM grados WHERE nombre_grado = ? AND grado_id != ? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre,$idgrado));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status'=>false,'msg'=>'El grado ya existe');
        }else{
            if ($idgrado == "") {
                $sqlInsert = 'INSERT INTO grados (nombre_grado,estado) VALUES (?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre,$estado));
                $accion = 1;
            }else{
       
                $sqlUpdate = 'UPDATE grados SET nombre_grado = ?,estado = ? WHERE grado_id = ?';
                $queryUpdate = $pdo->prepare($sqlUpdate);
                $request = $queryUpdate->execute(array($nombre,$estado,$idgrado));
                $accion = 2;
          
            }
           
            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status'=>true,'msg'=>'El grado fue creado exitosamente');
                }else{
                    $respuesta = array('status'=>true,'msg'=>'El grado fue actualizado exitosamente');
                }  
            }
        }
    }
   echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}