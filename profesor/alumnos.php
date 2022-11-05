<?php
if (!empty($_GET['curso'])) {
    $curso = $_GET['curso'];
}else{
    header("Location: profesor/");
}
require_once 'includes/header.php';
require_once '../includes/conexion.php';


$idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM alumno_profesor as ap INNER JOIN profesor_materia as pm ON 
ap.pm_id = pm.pm_id INNER JOIN alumnos as a ON ap.alumno_id = a.alumno_id WHERE pm.pm_id = $curso";
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
                      <th>ALUMNO</th>
                      <th>CEDULA</th>
                      <th>ULTIMO ACCESO</th>
                      <th>ASIGNAR NOTA</th>
                      <th>KARDEX</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($row > 0) {
                     while($data = $query->fetch()){
                        $codAlumno = $data['alumno_id'];
                        $sql_acceso= "SELECT u_acceso FROM alumnos WHERE alumno_id =$codAlumno";
                        $query_acceso = $pdo->prepare($sql_acceso);
                        $query_acceso->execute();
                        $res_acceso = $query_acceso->fetch();
                    ?> 
                        <tr>
                           <td><?= $data['nombre_alumno']?></td>
                           <td><?= $data['cedula']?></td>
                           <td><?php
                                if ($res_acceso['u_acceso'] == null) {
                                    echo '<kbd class="badge badge-danger">NUNCA</kbd>';
                                }else{
                                    echo $res_acceso['u_acceso'];
                                }
                           ?></td>
                                     <td><a href="boletin.php?alumno=<?= $data['alumno_id'] ?>&curso=<?= $data
                        ['pm_id'] ?>">
                    <i class="fa fa-list"></i>    
                    </a></td>
                    <td><a href="kardex.php?alumno=<?= $data['alumno_id'] ?>&curso=<?= $data
                        ['pm_id'] ?>&ap=<?= $data
                        ['ap_id'] ?>">
                    <i class="fa fa-list"></i>    
                    </a></td>
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