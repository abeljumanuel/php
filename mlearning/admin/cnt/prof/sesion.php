<?php include 'inc/fnc/fnc_slc.php';
if (isset($_GET['asist'])){
	$Agenda = $_GET['Agenda'];
	$asist = $_GET['asist'];
		$sqlupdate=sqli();
		if ($asist==1){
			//MySqli Update Query
			$update = $sqlupdate->query('UPDATE Agenda SET Asistencia=0 WHERE idAgenda='.$Agenda);
			if($update){
				print 'Success! record updated'; 
			}else{
				print 'Error : ('. $sqlupdate->errno .') '. $sqlupdate->error;
			}
		}elseif($asist==0){
			$update = $sqlupdate->query('UPDATE Agenda SET Asistencia=1 WHERE idAgenda='.$Agenda);
			if($update){
				print 'Success! record updated'; 
			}else{
				print 'Error : ('. $sqlupdate->errno .') '. $sqlupdate->error;
			}
		}
		$update->free;
		$sqlupdate->close();
	
	}

	$idHora = $_GET['idHora'];
	$sql=sqli();
	$res = $sql-> query('SELECT * FROM Horario
			LEFT JOIN CargaAcademica ON Horario.IdCargaAcademica= CargaAcademica.idCargaAcademica
			LEFT JOIN Persona ON CargaAcademica.IdPersona= Persona.idPersona
			LEFT JOIN Asignatura ON CargaAcademica.IdAsignatura = Asignatura.idAsignatura
			LEFT JOIN Salon ON Horario.IdSalon = Salon.idSalon
			LEFT JOIN Edificio ON Salon.IdEdificio = Edificio.idEdificio
		WHERE Persona.IdPerfil = 1 AND Horario.idHorario='.$idHora);
		while($row = $res->fetch_assoc()) {
		?>
<h1><?php echo $row[TemasSesion] ?>
    <small>Sesion <?php echo $row[NombreAsignatura] ?></small>
    <h6> 
        <ol class="breadcrumb">
            <li class="active"><a href="?fm=persona"><i class="fa fa-fw fa-list-alt"></i>Regresar a lista Personas</a></li>
        </ol>
    </h6>
</section>
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
        <ul>
            <li>Docente :  <? echo $row[NombresPersona].' '.$row[ApellidosPersona]?> </li>
            <li>Objetivos :  <? echo $row[ObjetivosSesion]?></li> 
            <li>Fecha y Hora:  <? echo $row[FechaHorario].' ('.$row[HoraInicioHorario].'-'.$row[HoraFinHorario].')'?> </li>
            <li>Lugar: <? echo $row[NombreEdificio].' Piso'.$row[PisoSalon].' Salon'.$row[NombreSalon] ?></li>
        </ul>
        </div><!-- /.box-header -->
    </div>
<?php } $res->free(); $sql->close(); ?>

		<?php
		$sqlcontent=sqli();
		$content = $sqlcontent-> query('SELECT * FROM HorarioContent 
				LEFT JOIN Horario ON HorarioContent.IdHorario = Horario.idHorario
        WHERE Horario.idHorario='.$idHora);
		$row_cnt = $content->num_rows;
 		if ($row_cnt>0){ 
		?>
        
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Contenidos de Sesion (<?php echo $row_cnt; ?>)</li>
        </ol>
		<div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                	<th  width="0%"  class="mailbox-star">ID</th>
                    <th width="20%" class="mailbox-name">Titulo</th>
                    <th width="30%" class="mailbox-name">Archivo</th>
                    <th width="40%" class="mailbox-name">Descripcion</th>
                </tr>
              </thead>
              <tbody>
              <?php while($rowcont = $content->fetch_assoc()) { ?>	 
                <tr>
                    <td class="mailbox-star"><?php echo  $rowcont[idHorarioContent] ?></td>
                    <td class="mailbox-name" title="<?php echo  $rowcont[NombreHorarioContent] ?>"><?php echo  $rowcont[NombreHorarioContent] ?></td>
                    <td class="mailbox-name"><a href="<?php echo  'http://mlearningcolombia.info/admin/inc/prc/files/'.$rowcont[ArchivoHorarioContent] ?>" target="_blank"><?php echo $rowcont[ArchivoHorarioContent] ?></a></td>
                    <td class="mailbox-name" ><?php echo  $rowcont[DescripcionHorarioContent] ?></td>
                </tr>
            <?php  
			 $idAsistencia = $rowcont[idAsistencia];
			 } $content->free(); $sqlcontent->close(); ?>
                </tbody>
            </table>
        </div>
        <? } else { echo '<center>No se han cargado Contenidos a esta Sesion</center>';}?>
        
 		<?php
			$sqlcurso=sqli();
			$curso = $sqlcurso-> query('SELECT CodigoInterno, ImagenPersona, NombresPersona, ApellidosPersona, NombrePrograma, Asistencia, idAgenda FROM Agenda 
					LEFT JOIN MatriculaAsignatura ON Agenda.IdMatriculaAsignatura = MatriculaAsignatura.idMatriculaAsignatura
					LEFT JOIN Matricula ON MatriculaAsignatura.IdMatricula = Matricula.idMatricula
					LEFT JOIN Persona ON Matricula.IdPersona = Persona.idPersona
					LEFT JOIN Programa ON Matricula.IdPrograma = Programa.idPrograma
			WHERE Agenda.IdHorario='.$idHora);
			$cant = $curso->num_rows;
			if ($cant>0){ 
			?>
            
            <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Asistencia (<?php echo $cant; ?>) Estudiantes</li>
        </ol>
		<div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                	<th width="10" class="mailbox-star">&nbsp;</th>
                    <th width="10%"  class="mailbox-star">Codigo</th>
                    <th width="30%" class="mailbox-name">Nombres</th>
                    <th width="40%" class="mailbox-name">Programa</th>
                    <th width="0%" class="mailbox-name">Asist</th>
                </tr>
              </thead>
              <tbody>
              <?php while($estudiante = $curso->fetch_assoc()) { ?>	 
                <tr <? if ($estudiante[Asistencia]==1){echo 'style="background-color:#94BD94; border-radius: 19px 19px 19px 19px;
-moz-border-radius: 19px 19px 19px 19px;
-webkit-border-radius: 19px 19px 19px 19px;
border: 0px none #000000; overflow: hidden;"';} else { echo 'style="background:#CD888A; border-radius: 19px 19px 19px 19px;
-moz-border-radius: 19px 19px 19px 19px;
-webkit-border-radius: 19px 19px 19px 19px;
border: 0px none #000000; overflow: hidden;"';}?> >
                	<td><div class="pull-left image">
              <img src="http://mlearningcolombia.info/admin/inc/prc/user_image/<?=$estudiante[ImagenPersona]?>" class="img-circle" alt="User Image" style="height:50px; width:50px">
            </div></td>
                    <td class="mailbox-star"><?php echo  $estudiante[CodigoInterno] ?></td>
                    <td class="mailbox-name" title="<?php echo  $estudiante[NombresPersona].' '.$estudiante[ApellidosPersona] ;?>"><?php echo  $estudiante[NombresPersona].' '.$estudiante[ApellidosPersona] ;?></td>
                    <td class="mailbox-name" ><?php echo  $estudiante[NombrePrograma] ?></td>
                    <td class="mailbox-star" ><a href="?prof=sesion&asist=<?php echo $estudiante[Asistencia] ?>&Agenda=<?php echo $estudiante[idAgenda] ?>&prof=sesion&idHora=<? echo $idHora?>"><?php if ($estudiante[Asistencia]==1){echo '<i class="fa fa-fw fa-check-square"></i>';}else{echo '<i class="fa fa-fw fa-minus-square"></i>';}?></a></td>
                </tr>
            <?php } $curso->free(); $sqlcurso->close(); ?>
                </tbody>
            </table>
            
			<?php
			} else { echo '<center>Esta sesion no tiene estudiantes previamente asignados</center>';}
			?>
        </div> 