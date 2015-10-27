<?php include 'inc/fnc/fnc_slc.php';?>
	<h1>
    	Contenidos de Sesion
  	</h1>
  <small>En esta seccion puedes adicionar contenidos a la Sesion.</small>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Registros (10)</a></li>
    <li class="active">
    
    </li>
  </ol>
  
</section>
<section class="content">
	<form action="inc/prc/horariocontent.php" method="POST" enctype="multipart/form-data">
    	<?php slcSesion('Seleccione Sesion','IdHorario'); ?>
		<input type="file" name="ArchivoHorarioContent" id="ArchivoHorarioContent" />
		<input type="text" name="NombreHorarioContent" id="NombreHorarioContent" placeholder="Nombre Archivo"/>
		<textarea id="DescripcionHorarioContent" name="DescripcionHorarioContent" placeholder="Descripcion"></textarea>
        
        
		
   <p>Al presionar Clic en Registrar,tu aceptas nuestros <a href="#">terminos y condiciones</a>.</p>
   <input type="submit" class="button" value="Registrar" />
	<!--<a href="#" class="button">Registrar</a>-->
    
  </form>