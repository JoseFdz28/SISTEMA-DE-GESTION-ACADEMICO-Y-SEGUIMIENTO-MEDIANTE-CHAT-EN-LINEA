<?php

require_once 'includes/header.php';
require_once '../includes/conexion.php';

$idAlumno = $_SESSION['alumno_id'];

$sql = "SELECT * FROM alumnos as a INNER JOIN alumno_profesor as ap ON a.alumno_id = ap.alumno_id 
INNER JOIN profesor_materia as pm ON 
ap.pm_id = pm.pm_id INNER JOIN horario_materia as hm ON pm.pm_id = hm.pm_id INNER JOIN periodo_hora 
as ph ON hm.hora_periodo = ph.hora_periodo INNER JOIN dias as d ON hm.dia_id = d.dia_id INNER JOIN materias as m ON pm.materia_id =m.materia_id WHERE a.alumno_id = $idAlumno ORDER BY d.dia_id, ph.hora";
$query = $pdo->prepare($sql);
$query->execute();
$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Horario</h1>
    
        
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Horario</a></li>
        </ul>
      </div>
      <div class="row">
             
        <div class="col-md-12">
          <div class="tile">

          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablealumnos">
               <th>Gestion: 2022   </th>
               <th> Curso: 2 "B" </th>
                </table>
                <table class="table table-hover table-bordered" id="tablealumnos">
                  <thead>
                    <tr>
               <th>HORAS</th>
               <th>LUNES</th>
               <th>MARTES</th>
               <th>MIERCOLES</th>
               <th>JUEVES</th>    
               <th>VIERNES</th>
                   
                    </tr>
                    <tr>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $l1 = 'Vacio';
                  $m1 = 'Vacio';
                  $mi1 = 'Vacio';
                  $j1 = 'Vacio';
                  $v1 = 'Vacio';
                  $l2 = 'Vacio';
                  $m2 = 'Vacio';
                  $mi2 = 'Vacio';
                  $j2 = 'Vacio';
                  $v2 = 'Vacio';
                  $l3 = 'Vacio';
                  $m3 = 'Vacio';
                  $mi3 = 'Vacio';
                  $j3 = 'Vacio';
                  $v3 = 'Vacio';
                  for ($i=0; $i < count($consulta); $i++) {

                    
                 if ($consulta[$i]['hora'] == "07:30-09:00" ) {
                  if ($consulta[$i]['dia_nombre'] == "Lunes") {
                    $l1 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Martes") {
                    $m1 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Miercoles") {
                    $mi1 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Jueves") {
                    $j1 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Viernes") {
                    $v1 = $consulta[$i]['nombre_materia'];
                  }
                }
                if ($consulta[$i]['hora'] == "09:15-10:45" ) {
                  if ($consulta[$i]['dia_nombre'] == "Lunes") {
                    $l2 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Martes") {
                    $m2 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Miercoles") {
                    $mi2 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Jueves") {
                    $j2 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Viernes") {
                    $v2 = $consulta[$i]['nombre_materia'];
                  }
                }
                if ($consulta[$i]['hora'] == "11:00-12:30" ) {
                  if ($consulta[$i]['dia_nombre'] == "Lunes") {
                    $l3 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Martes") {
                    $m3 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Miercoles") {
                    $mi3 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Jueves") {
                    $j3 = $consulta[$i]['nombre_materia'];
                  }
                  if ($consulta[$i]['dia_nombre'] == "Viernes") {
                    $v3 = $consulta[$i]['nombre_materia'];
                  }
                }
                  }
?>
                    <tr>
                      <td>07:30-09:00</td>
                      <td>
                        <?= $l1;?>
                      </td>
                      <td>
                        <?= $m1;?>
                      </td>
                      <td>
                        <?= $mi1;?>
                      </td>
                      <td>
                        <?= $j1;?>
                      </td>
                      <td>
                        <?= $v1;?>
                      </td>
                    </tr>
                    <th colspan="6"><h4 ALIGN="center">R&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspC&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspR&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspO</h4></th>
                   
                    <tr>
                      <td>09:15-10:45</td>
                      <td>
                        <?= $l2;?>
                      </td>
                      <td>
                        <?= $m2;?>
                      </td>
                      <td>
                        <?= $mi2;?>
                      </td>
                      <td>
                        <?= $j2;?>
                      </td>
                      <td>
                        <?= $v2;?>
                      </td>
                    </tr>
                    <tr>
                      <td>11:00-12:30</td>
                      <td>
                        <?= $l3;?>
                      </td>
                      <td>
                        <?= $m3;?>
                      </td>
                      <td>
                        <?= $mi3;?>
                      </td>
                      <td>
                        <?= $j3;?>
                      </td>
                      <td>
                        <?= $v3;?>
                      </td>
                    </tr>
                    
  
       
                  </tbody>
                </table>
              </div>
            </div>

        </div>
      </div>
    
      </div>
      <div class="row">
<a href="index.php" class="btn btn-info">Volver Atras</a>
      </div>
    </main>
<?php
require_once 'includes/footer.php';
?>