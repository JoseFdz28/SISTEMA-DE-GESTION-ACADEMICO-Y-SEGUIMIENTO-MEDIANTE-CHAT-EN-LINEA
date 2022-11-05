 <?php
require_once '../includes/conexion.php';

$idalumno = $_SESSION['alumno_id'];
$sql ="SELECT * FROM alumno_profesor as ap INNER JOIN alumnos as al ON ap.alumno_id = al.alumno_id INNER JOIN profesor_materia as pm
ON ap.pm_id = pm.pm_id INNER JOIN grados as g ON pm.grado_id = g.grado_id INNER JOIN aulas as a ON pm.aula_id = a.aula_id 
INNER JOIN profesor as p ON pm.profesor_id = p.profesor_id INNER JOIN  materias as m ON pm.materia_id = m.materia_id
WHERE al.alumno_id = $idalumno";
$query = $pdo->prepare($sql);
$query->execute();
$row = $query->rowCount();

$sqln ="SELECT * FROM  alumnos as al INNER JOIN alumno_profesor as ap ON al.alumno_id = ap.alumno_id 
INNER JOIN profesor_materia  as pm ON ap.pm_id = pm.pm_id INNER JOIN grados as g ON pm.grado_id = g.grado_id INNER JOIN aulas as a
ON pm.aula_id = a.aula_id INNER JOIN profesor as p ON pm.profesor_id = p.profesor_id INNER JOIN materias as m ON pm.materia_id = m.materia_id 
WHERE pm.estadopm != 0 AND al.alumno_id = $idalumno";
$queryn = $pdo->prepare($sqln);
$queryn->execute();
$rown = $queryn->rowCount();

 ?>
 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/user.png" alt="User Image">
        <div>
          <p class="app-sidebar__user"><?=  $_SESSION['nombre'] ?></p>
          <p class="app-sidebar__user-designation">Alumno</p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="index.php">
          <i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Inicio</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Mis Cursos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

          <?php if ($row > 0) {
            while($data = $query->fetch()){
              ?>
   <li><a class="app-menu__item" href="contenido.php?curso=<?= $data['pm_id']?>">
          <i class="app-menu__icon fa fa-users"></i><?= $data['nombre_materia'];?>-<?=$data['nombre_grado'];?>-
          <?= $data['nombre_aula'];?></a></li>
            <?php }} ?>

       
        </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Calificaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

          <?php if ($rown > 0) {
            while($datan = $queryn->fetch()){
              ?>
  <li><a class="app-menu__item" href="notas.php?curso=<?= $datan['pm_id']?>">
          <i class="app-menu__icon fa fa-users"></i><?= $datan['nombre_materia'];?>-<?=$datan['nombre_grado'];?>-
          <?= $datan['nombre_aula'];?></a></li>
            <?php }} ?>

       
        </ul>
        </li>


        <li><a class="app-menu__item" href="horario.php">
          <i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Ver Horario</span></a></li>
       
          <li><a class="app-menu__item" href="biblioteca.php">
          <i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Biblioteca</span></a></li>
    
          <li><a class="app-menu__item" href="boletin.php">
          <i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Boletin</span></a></li>
    
        </ul>
    </aside>