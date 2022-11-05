<?php
if (!empty($_GET['curso'])) {
    $curso = $_GET['curso'];
    $alumno = $_GET['alumno'];
}else{
    header("Location: profesor/");
}
require_once 'includes/header.php';
require_once '../includes/conexion.php';
require_once 'includes/modals/modal-boletin.php';

$idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM boletin as b INNER JOIN alumno_profesor as ap ON b.ap_id = ap.ap_id INNER JOIN profesor_materia as pm ON 
ap.pm_id = pm.pm_id INNER JOIN alumnos as a ON ap.alumno_id = a.alumno_id WHERE pm.pm_id = $curso AND a.alumno_id = $alumno";
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
                      <th>ALUMNO</th>
                      <th>CEDULA</th>
                      <th>PRIMER TRIMESTRE</th>
                      <th>SEGUNDO TRIMESTRE</th>
                      <th>TERCER TRIMESTRE</th>
                      <th>PROMEDIO</th>
                      <th>ASIGNAR NOTAS</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($row > 0) {
                     while($data = $query->fetch()){
              
                    ?> 
                        <tr>
                        <td><?= $ap_id = $data['ap_id']?></td>
                           <td><?= $data['nombre_alumno']?></td>
                           <td><?= $data['cedula']?></td>
                           <td><?= $data['primerTrimestre']?></td>
                           <td><?= $data['segundoTrimestre']?></td>
                           <td><?= $data['tercerTrimestre']?></td>
                           <td><?= $data['promedio']?></td>
                           <td> <button class="btn btn-danger " title="Eliminar" onclick="insertarNota(<?= $data['bo_id']?>)">Asignar</button></td>
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