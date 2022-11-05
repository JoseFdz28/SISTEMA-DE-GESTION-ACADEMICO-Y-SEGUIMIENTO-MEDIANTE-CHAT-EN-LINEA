<?php
require_once 'includes/header.php';
require_once '../includes/conexion.php';




$idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM horarios as h INNER JOIN profesor as p ON h.profesor_id = p.profesor_id INNER JOIN periodos
as pe ON h.periodo_id = pe.periodo_id WHERE p.profesor_id = $idProfesor";
$query = $pdo->prepare($sql);
$query->execute();
$row =$query->rowCount();
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Horarios</h1>
    
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Horarios</a></li>
        </ul>
      </div>
      <div class="row">
        <?php if ($row > 0) {
            while($data = $query->fetch()){
        ?>        
        <div class="col-md-12">
          <div class="tile">
      <div class="tile">
            <div class="title-title-w-btn">
                <h3 class="title">Nombre: <?= $data['nombre']; ?></h3>
      
            </div>
            <div class="tile-body">
        
                <b>Periodo: <?= $data['nombre_periodo']; ?></b>   
            </div>
            <div class="title-footer mt-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="fa fa-download"></i></div>
                    </div>
                    <a class="btn btn-primary" href="BASE_URL<?= $data['horario']; ?>" target="_blank">Horario de descarga</a>
                </div>

            </div>
      </div>

        </div>
      </div>
      <?php } } ?>
      </div>
      <div class="row">
<a href="index.php" class="btn btn-info">Volver Atras</a>
      </div>
    </main>
<?php
require_once 'includes/footer.php';
?>