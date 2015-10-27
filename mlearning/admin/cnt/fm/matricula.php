<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$ie = $_GET['ie'];
	if ($_GET['a'] == 'edit' && $ie>0){ 
  	$res = $sql-> query('SELECT * FROM Matricula LEFT JOIN Persona ON Matricula.IdPersona = Persona.idPersona WHERE Persona.idPersona='.$ie );
	$row = $res->fetch_array(MYSQLI_ASSOC);
	} elseif ($_GET['a'] == 'new' && $ie>0 ) {	
	$res = $sql-> query('SELECT NombresPersona, ApellidosPersona, IdPersona FROM Persona WHERE Persona.idPersona='.$ie );
	$row = $res->fetch_array(MYSQLI_ASSOC);
	}
?>
	<h1>Matricula</h1>
    <small>En esta seccion puedes Matricular <?php if($ie > 0){ echo ' a '.$row[NombresPersona].' '.$row[ApellidosPersona]; }else{ echo 'un estudiante de la lista';}?></small>
    <h6> 
        <ol class="breadcrumb">
            <li class="active"><a href="?fm=persona"><i class="fa fa-fw fa-list-alt"></i>Regresar a lista Personas</a></li>
        </ol>
    </h6>
</section>
<section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Matricula</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="f_ciudad" role="form" action="inc/prc/matricula.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
						<?php if($ie > 0){?>
                        <?php if ($_GET['a'] == 'edit' && $ie>0){ ?>
                        <input type="hidden" name="idMatricula" id="idMatricula" value="<?php echo $row[idMatricula]; ?>">
						<?php } ?>
                      	<input type="hidden" name="IdPersona" id="IdPersona" value="<?php echo $row[IdPersona]; ?>">
                        <? }else{ ?>
                        <?php slcEstudiante('Seleccione Estudiante', 'IdPersona'); ?>
                        <? }?>
                      	<label for="IdPrograma">Programa</label>
                      	<?php slcPrograma('Seleccione Programa','IdPrograma',$row[IdPrograma]); ?>
                    </div>
                    <div class="form-group">
                      <label for="SemestreMatricula">Semestre Matricula</label>
                      <input type="number" class="form-control" id="SemestreMatricula" name="SemestreMatricula" min="1" max="10" placeholder="Semestre Matricula" value="<?php echo $row[SemestreMatricula] ?>" required />
                      </div>
                    <div class="form-group">
                      <label for="EstadoMatricula">Estado Matricula</label>
                      <?php slcEstMatricula('Estado Matricula','EstadoMatricula', $row[EstadoMatricula]); ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="PeriodoMatricula">Periodo</label>
                     <?php slcPerAcademico('Periodo', 'PeriodoAcademicoMatricula', $row[PeriodoAcademicoMatricula]); ?>
                    </div>
                  <p>Al presionar Clic en Matricular,tu aceptas nuestros <a href="#">terminos y condiciones</a>.</p>  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Matricula</button>
                  </div>
                </form>
              </div>