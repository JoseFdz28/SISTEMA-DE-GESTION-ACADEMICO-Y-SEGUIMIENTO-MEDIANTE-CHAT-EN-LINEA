<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) 
{
    if (empty($_POST['listProfesor']) || empty($_POST['listGrado']) || empty($_POST['listAula']) || 
    empty($_POST['listMateria']) || empty($_POST['listPeriodo']) ) {
       $respuesta = array('status' => true,'msg'=> 'Todos los campos deben ser llenados');
    }else{
        $idprofesormateria = $_POST['idprofesormateria'];
        $profesor = $_POST['listProfesor'];
        $grado = $_POST['listGrado'];
        $aula = $_POST['listAula'];
        $materia = $_POST['listMateria'];
        $periodo = $_POST['listPeriodo'];
        $estado=$_POST['listEstado'];

        $sql= 'SELECT * FROM profesor_materia WHERE pm_id != ?  AND grado_id = ? AND aula_id = ? AND profesor_id = ? AND
        materia_id = ? AND periodo_id = ? AND estadopm !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idprofesormateria,$grado,$aula,$profesor,$materia,$periodo));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status'=>false,'msg'=>'El profesor ya existe');
        }else{
            if ($idprofesormateria == "") {
                $sqlInsert = 'INSERT INTO profesor_materia (profesor_id,grado_id,aula_id,materia_id,periodo_id,
                estadopm) VALUES (?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($profesor,$grado,$aula,$materia,$periodo,$estado));
                $accion = 1;
            }else{
                $sqlUpdate = 'UPDATE profesor_materia SET profesor_id = ?,grado_id = ?,aula_id = ?,materia_id = ?
                ,periodo_id = ?,estadopm = ? WHERE pm_id = ?';
                $queryUpdate = $pdo->prepare($sqlUpdate);
                $request = $queryUpdate->execute(array($profesor,$grado,$aula,$materia,$periodo,$estado,$idprofesormateria));
                $accion = 2;
      
            }
           
            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status'=>true,'msg'=>'El proceso fue creado exitosamente');
                }else{
                    $respuesta = array('status'=>true,'msg'=>'El proceso fue actualizado exitosamente');
                }  
            }
        }
    }
   echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
