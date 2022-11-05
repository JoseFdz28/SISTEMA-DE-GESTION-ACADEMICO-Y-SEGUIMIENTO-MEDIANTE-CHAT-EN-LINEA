<?php

require_once 'includes/header.php';
require_once '../includes/conexion.php';

$idAlumno = $_SESSION['alumno_id'];
$gestion = "2021";
$sql = "SELECT * FROM boletin as b INNER JOIN alumno_profesor as ap ON b.ap_id = ap.ap_id INNER JOIN profesor_materia as pm ON 
ap.pm_id = pm.pm_id INNER JOIN alumnos as a ON ap.alumno_id = a.alumno_id INNER JOIN periodos as p ON
pm.periodo_id = p.periodo_id INNER JOIN materias as m ON pm.materia_id = m.materia_id WHERE p.nombre_periodo = $gestion AND a.alumno_id = $idalumno ";
$query = $pdo->prepare($sql);
$query->execute();
$row =$query->rowCount();
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Lista de alumnos</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de alumnos</a></li>
        </ul>
      </div>
      <div class="row">
             
        <div class="col-md-12">
          <div class="tile">

          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablealumnos">
                  <thead>
                    <tr>
                    <th>AP</th>
                    <th>MATERIA</th>
                      <th>PRIMER TRIMESTRE</th>
                      <th>SEGUNDO TRIMESTRE</th>
                      <th>TERCER TRIMESTRE</th>
                      <th>PROMEDIO</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($row > 0) {
                     while($data = $query->fetch()){
              
                    ?> 
                        <tr>
                        <td><?= $ap_id = $data['ap_id']?></td>
                         <td><?= $data['nombre_materia']?></td>
                           <td><?= $data['primerTrimestre']?></td>
                           <td><?= $data['segundoTrimestre']?></td>
                           <td><?= $data['tercerTrimestre']?></td>
                           <td><?= $data['promedio']?></td>
                          </tr>

                    <?php } } ?>
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