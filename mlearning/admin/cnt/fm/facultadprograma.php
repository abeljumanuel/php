<?php include 'inc/fnc/fnc_slc.php'; ?>
	<h1>
    	Agregar programas a facultad
  	</h1>
  <small>En esta seccion puedes asignar programas a las diferentes facultades.</small>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Registros (10)</a></li>
    <li class="active">
    
    </li>
  </ol>
  
</section>

<section class="content">
<form action="inc/prc/facultadprograma.php" method="POST">
    <?php slcPrograma('Seleccione Programa','IdPrograma'); ?>
    <?php slcFacultad('Seleccione Facultad','IdFacultad'); ?>
    <input type="submit" name="submit" id="submit" value="Enviar">
</form>