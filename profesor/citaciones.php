<?php
if (!empty($_GET['curso'])) {
    $curso = $_GET['curso'];
}else{
    header("Location: profesor/");
}
require_once 'includes/header.php';
require_once '../includes/conexion.php';
require_once 'includes/modals/modal-citacion.php';

$idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM citaciones as c INNER JOIN profesor_materia as pm ON 
c.pm_id = pm.pm_id WHERE pm.pm_id = $curso";
$query = $pdo->prepare($sql);
$query->execute();
$row =$query->rowCount();
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Citaciones</h1>
    
          <button class="btn btn-danger " title="Eliminar" onclick="openModalCitacion()">Registrar</button>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Citaciones</a></li>
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
               
                      <th>CURSO</th>
                      <th>DETALLE</th>
                      <th>FECHA</th>
                      <th>EDITAR</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($row > 0) {
                     while($data = $query->fetch()){
              
                    ?> 
                        <tr>
                        <td><?= $data['profesor_id']?></td>
                           <td><?= $data['detalle']?></td>
                           <td><?= $data['fecha']?></td>
                           <td> <button class="btn btn-danger " title="Eliminar" onclick="insertarCitacion(<?= $data['citacion_id']?>)">Editar</button></td>
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