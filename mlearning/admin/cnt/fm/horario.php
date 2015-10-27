<?php include 'inc/fnc/fnc_slc.php'; ?>
	<h1>
    	Sesion
  	</h1>
  <small>En esta seccion puedes Crear las sesiones para </small>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Registros (10)</a></li>
    <li class="active">
    
    </li>
  </ol>
  
</section>
<section class="content">
			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Creacion de Sesiones</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="inc/prc/horario.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
						<label for="IdCargaAcademica">Seleccione Carga Academica</label>
                        <?php slcCargaAcademica('Seleccione Docente','IdCargaAcademica'); ?>
                    </div>
                    <div class="form-group">
                      <label for="TemasSesion">Temas Sesion</label>
                      <textarea class="form-control" name="TemasSesion" id="TemasSesion" placeholder="Temas Sesion"  required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="ObjetivosSesion">Objetivos Sesion</label>
                      <textarea class="form-control" name="ObjetivosSesion" id="ObjetivosSesion" placeholder="Objetivos Sesion"  required></textarea>
                    </div>
					<div class="form-group">
                      <label for="FechaHorario">Fecha</label>
                      <input type="date" class="form-control" name="FechaHorario" id="FechaHorario" placeholder="Fecha" required />
                    </div>
                    
                    <div class="form-group">
                      <label for="HoraInicioHorario">Hora Inicio</label>
                      <input type="time" class="form-control" name="HoraInicioHorario" id="HoraInicioHorario" placeholder="Hora Inicio" required />
                    </div>
                    <div class="form-group">
                      <label for="HoraFinHorario">Hora Fin</label>
                     <input type="time" class="form-control" name="HoraFinHorario" id="HoraFinHorario" placeholder="Hora Fin" required />
                    </div>
                    
                    <div class="form-group">
                      <label for="IdFacultadPrograma">Programa</label>
                     <?php slcPrograma('Programa','IdPrograma'); ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="IdSalon">Seleccione Salon</label>
                     <?php slcSalon('Seleccione Salon','IdSalon'); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Crear Sesion</button>
                  </div>
                </form>
              </div>