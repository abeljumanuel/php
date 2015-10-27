<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Persona WHERE idPersona='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		$del->free; $sql->close();
		
		echo '<script type="text/javascript">
				window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=persona"; //will redirect to your Page
		</script>';
 
 } 	
if ($_GET['a'] != 'edit' ){ 
  	$res = $sql-> query('SELECT * FROM Persona ORDER BY NombresPersona ASC, ApellidosPersona ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Persona</h1>
    <small>En esta seccion puedes crear perfiles de usuario dentro del sistema.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=persona&a=edit&i=new"><i class="fa fa-fw  fa-user-plus"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
			
  <div class="box"> <!-- /ojo -->
                <div class="box-header">
                  <h3 class="box-title">Usuarios Definidos en el Sistema</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 2px">#</th>
                      <th style="width: 70%">Persona</th>
                      <th style="width: 1%">&nbsp;</th>
                      <th style="width: 1%">&nbsp;</th>
                      <th style="width: 15%">Estado</th>
                      <th style="width: 10%">Perfil</th>
                    </tr>
                    <?php while($row = $res->fetch_assoc()) { ?>
                    <tr>
                      <td><? echo $row[idPersona] ?>.</td>
                      <td><? echo $row[NombresPersona].' '.$row[ApellidosPersona]; ?></td>
                      <td class="mailbox-star" align="center" title="Editar"><a href="?fm=persona&a=edit&i=<? echo $row[idPersona] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            		  <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=persona&a=delete&i=<? echo $row[idPersona] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
                      <? if ($row[IdPerfil]==1){ ?> 
							  <? if (ValCargaAca($row[idPersona]) > 0){ ?>
                                  <? if (ValSesDoc($row[idPersona]) > 0){ ?>
                                        <td title="Docente: Perfecto! ya estas habilitado en el sistema.">
                                            <div class="progress progress-xs progress-striped active">
                                              <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                                            </div>
                                        </td>
                                        <td title="Docente: Perfecto! ya estas habilitado en el sistema.">D&nbsp;<span class="badge bg-green">100%</span></td>
                                        	
                                  <? } else { ?>
                                        <td title="Docente: Asigne Carga Academica">
                                            <div class="progress progress-xs">
                                              <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td title="Docente: Crea una Sesion">D&nbsp;<span class="badge bg-yellow">70%</span></td>	
                                  <? } ?>
                              <? } else { ?>
                              <td title="Docente: Asigne Carga Academica">
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 30%"></div>
                                </div>
                              </td>
                              <td title="Docente: Asigne Carga Academica"><a href="?fm=cargaacademica&id=<?php echo $row[idPersona] ?>">D&nbsp;<span class="badge bg-red">30%</span></a></td>
                          <? } ?>
                      <? }elseif($row[IdPerfil]==2){ ?>
                      		<? if (ValMat($row[idPersona]) > 0){ ?>
                                  <? if (ValAsigMat($row[idPersona]) > 0){ ?>
                                        <td title="Estudiante: Perfecto! ya estas habilitado en el sistema.">
                                            <div class="progress progress-xs progress-striped active">
                                              <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                                            </div>
                                        </td>
                                        <td title="Estudiante: Perfecto! ya estas habilitado en el sistema.">E&nbsp;<span class="badge bg-green">100%</span></td>	
                                  <? } else { ?>
                                        <td title="Estudiante: Aun no has inscrito ninguna Asignatura">
                                            <div class="progress progress-xs">
                                              <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td title="Estudiante: Aun no has inscrito ninguna Asignatura"><a href="?fm=slcasignaturaest&ie=<?php echo $row[idPersona] ?>">E&nbsp;<span class="badge bg-yellow">70%</span></a></td>
                                  <? } ?>
                              <? } else { ?>
                              <td title="Estudiante: Aun no has sido Matriculado">
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 30%"></div>
                                </div>
                              </td>
                              <td title="Estudiante: Aun no has sido Matriculado"><a href="?fm=matricula&a=new&ie=<?php echo $row[idPersona] ?>">E&nbsp;<span class="badge bg-red">30%</span></a></td>
                              <? } ?>
                      <? } ?>
                    </tr>
    			<?php } ?> 
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box --> <!--Esta es -->
<? } else { 
	if($i>0){
		$res = $sql-> query('SELECT * FROM Persona WHERE idPersona='.$i);
		$row = $res->fetch_array(MYSQLI_ASSOC);
	}
?>
			<h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=persona"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Personas</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="inc/prc/persona.php" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                  
                  	<div class="form-group">
                      <input type="hidden" name="idPersona" id="idPersona" value="<?php if($i>0) { echo $row[idPersona]; } ?>">	
                      <label for="NombresPersona">Nombres</label>
                      <input type="text" class="form-control" name="NombresPersona" id="NombresPersona" placeholder="Nombres" value="<?php if($i>0) { echo $row[NombresPersona]; } ?>" required>
                      <label for="ApellidosPersona">Apellidos</label>
                      <input type="text" class="form-control" name="ApellidosPersona" id="ApellidosPersona" placeholder="Apellidos" value="<?php if($i>0) { echo $row[ApellidosPersona]; } ?>" required>
                    </div>
                    
                    <div class="form-group">
                    <label for="Email">eMail</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" name="Email" id="Email" placeholder="eMail" value="<?php if($i>0) { echo $row[Email]; } ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="pass">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                            <input type="text" class="form-control" name="pass" id="pass" placeholder="pass" value="<?php if($i>0) { echo $row[pass]; } ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="ImagenPersona">Imagen de Perfil</label>
                      <input type="file" id="ImagenPersona" name="ImagenPersona">
                      <p class="help-block">Selecciona la imagen de Perfil para el sistema.</p>
                    </div>
                    
                    <div class="form-group">
                      <label for="TipoDocumento">Tipo Documento</label>
                    <?php slcTipoDoc('Tipo de Documento','TipoDocumentoPersona',$row[TipoDocumentoPersona] ); ?>
                      <label for="NumeroDocumentoPersona">Numero Documento</label>
                      <input type="number" class="form-control" name="NumeroDocumentoPersona" id="NumeroDocumentoPersona" placeholder="Numero Documento" value="<?php if($i>0) { echo $row[NumeroDocumentoPersona]; } ?>" required>
                    </div>
                    
                    <div class="form-group">
                    	<label for="CodigoInterno">Codigo</label>
                    	<input type="text" class="form-control" name="CodigoInterno" id="CodigoInterno" placeholder="Codigo Universidad" value="<?php if($i>0) { echo $row[CodigoInterno]; } ?>" required/>
                    </div>
                    
                    <div class="form-group">
                    	<label for="Sede">Sede</label>
                        <?php slcSede('Sede','IdSede', $row[IdSede] ) ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="Perfil">Perfil</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="IdPerfil" id="IdPerfil" <?php if ($row[IdPerfil]==1) {echo 'value="1" checked=""';} else { echo 'value="1"';}?> >
                          Docente
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="IdPerfil" id="IdPerfil" <?php if ($row[IdPerfil]==2) {echo 'value="2" checked=""';} else { echo 'value="2"';}?> >
                          Estudiante
                        </label>
                      </div>
                    </div>
                    
                  </div> <!-- /.box-body -->
					<p>Al presionar Clic en Registrar,tu aceptas nuestros <a href="#">terminos y condiciones</a>.</p>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </form>
              </div>
<? } $res->free(); $sql->close();  ?>