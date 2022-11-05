<?php

require_once 'includes/header.php';
require_once '../includes/conexion.php';

$idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM profesor as p INNER JOIN profesor_materia as pm ON 
p.profesor_id = pm.profesor_id INNER JOIN horario_materia as hm ON pm.pm_id = hm.pm_id INNER JOIN periodo_hora 
as ph ON hm.hora_periodo = ph.hora_periodo INNER JOIN dias as d ON hm.dia_id = d.dia_id INNER JOIN materias as m ON pm.materia_id =m.materia_id WHERE p.profesor_id = $idProfesor 
ORDER BY d.dia_id, ph.hora";
$query = $pdo->prepare($sql);
$query->execute();
$row =$query->rowCount();
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
                  <thead>
                    <tr>
               
                      <th>MATERIA</th>
                      <th>CURSO</th>
                      <th>DIA</th>
                      <th>HORA</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($row > 0) {
                     while($data = $query->fetch()){
              
                    ?> 
                        <tr>
                        <td><?= $data['nombre_materia']?></td>
                           <td><?= $data['pm_id']?></td>
                           <td><?= $data['dia_nombre']?></td>
                           <td><?= $data['hora']?></td>
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