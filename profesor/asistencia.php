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
<form action="" id="form_insert">
<?php if ($row > 0) {
                     while($data = $query->fetch()){
                  
                    ?> 
        <input type="hidden" name="idap[]"  value="<?= $data['ap_id']?>">      
         <label for="">Nombre:</label>
         <label for="" name="nombre[]"><?= $data['nombre_alumno']?></label><br>
         <div class="fl-3">
            <label for="">Estado</label>
            <select required name="estado[]">
                <option value="v1">Presente</option>
                <option value="v2">Atrasado</option>
                <option value="v3">Justificado</option>
            </select>
         </div>

<?php } } ?>
    



</form>


              
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