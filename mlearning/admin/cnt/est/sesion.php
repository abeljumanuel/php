<?php include 'inc/fnc/fnc_slc.php';
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
<div class="testbox">
  	<h1>Sesion <?php echo $row[NombreAsignatura].' ('.$row[TemasSesion].')';?></h1>
    <div class="agenda">
        <ul>
        	<li>Docente :  <? echo $row[NombresPersona].' '.$row[ApellidosPersona]?> </li>
            <li>Objetivos :  <? echo $row[ObjetivosSesion]?></li> 
            <li>Fecha y Hora:  <? echo $row[FechaHorario].' ('.$row[HoraInicioHorario].'-'.$row[HoraFinHorario].')'?> </li>
            <li>Lugar: <? echo $row[NombreEdificio].' Piso'.$row[PisoSalon].' Salon'.$row[NombreSalon] ?></li>
        </ul>
		<?php } $res->free(); $sql->close(); ?>
        <div class="content">
		<?php
		$sqlcontent=sqli();
		$sqlcontent->set_charset("utf8");
		$content = $sqlcontent-> query('SELECT * FROM HorarioContent 
				LEFT JOIN Horario ON HorarioContent.IdHorario = Horario.idHorario
       			LEFT JOIN Agenda ON Agenda.IdHorario = Horario.idHorario
        WHERE Horario.IdHorario='.$idHora.' AND Agenda.Asistencia=1 GROUP BY idHorarioContent ASC');
		$row_cnt = $content->num_rows;
 		if ($row_cnt>0){ 
		?>
			<table>
            	<thead>
                	<caption align="top"> Contenidos de Sesion </caption>
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
                    	<td><?php echo  $rowcont[idHorarioContent] ?></td>
						<td><?php echo  $rowcont[NombreHorarioContent] ?></td>
                        <td><a href="<?php echo  'http://mlearningcolombia.info/admin/inc/prc/files/'.$rowcont[ArchivoHorarioContent] ?>" target="_blank"><?php echo $rowcont[ArchivoHorarioContent] ?></a></td>
                        <td><?php echo  $rowcont[DescripcionHorarioContent] ?></td>
                    </tr>
                    
             <?php 
			 $idAgenda = $rowcont[idAgenda];
			  }  $content->free(); $sqlcontent->close(); ?>
                </tbody>
            </table>
		</div>
        
        <div class="obs">
        	<h3>Observaciones de Sesion</h3>
        	<form action="inc/prc/obsest.php" method="POST">
                <input type="hidden" name="IdAgenda" id="IdAgenda" value="<?php echo $idAgenda ?>">
                <textarea rows="4" cols="50" name="ObservacionObsEst" id="ObservacionObsEst" placeholder="Observaciones de Sesion"> </textarea>
              	<input type="submit" name="button" id="button" value="Enviar Observaciones">
            </form>
        </div>
        <?php  } ?>
	</div>
</div>