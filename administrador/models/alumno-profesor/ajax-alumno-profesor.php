<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) 
{
    if (empty($_POST['listAlumno']) || empty($_POST['listaProfesor']) || empty($_POST['listPeriodo']) ) {
       $respuesta = array('status' => true,'msg'=> 'Todos los campos deben ser llenados');
    }else{
        $idalumnoprofesor = $_POST['idalumnoprofesor'];
        $profesor = $_POST['listaProfesor'];
        $alumno = $_POST['listAlumno'];
        $periodo = $_POST['listPeriodo'];
        $estado=$_POST['listEstado'];

        $sql= 'SELECT * FROM alumno_profesor WHERE ap_id != ?  AND alumno_id = ? AND pm_id = ?  AND estadop !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idalumnoprofesor,$alumno,$profesor));
        $result = $query->fetch(PDO::FETCH_ASSOC);



        if ($result > 0) {
            $respuesta = array('status'=>false,'msg'=>'El profesor ya existe');
        }else{
            if ($idalumnoprofesor == "") {
                $sqlInsert = 'INSERT INTO alumno_profesor (alumno_id,pm_id,periodo_id,
                estadop) VALUES (?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($alumno,$profesor,$periodo,$estado));
                $accion = 1;
            }else{
                $sqlUpdate = 'UPDATE alumno_profesor SET alumno_id = ?,pm_id = ?,periodo_id = ?,estadop = ? 
                WHERE ap_id = ?';
                $queryUpdate = $pdo->prepare($sqlUpdate);
                $request = $queryUpdate->execute(array($alumno,$profesor,$periodo,$estado,$idalumnoprofesor));
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
