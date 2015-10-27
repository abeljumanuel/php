<?php include 'inc/fnc/fnc_slc.php';
$idMat = $_GET['idMat'];
?>
  	<h1><?php SaludoEstudiante('Bienvenido',$idMat); ?></h1>
        <h2>Agenda</h2>
 <?php
$sqlasig=sqli();
$resasig = $sqlasig-> query('SELECT NombreAsignatura, Asignatura.idAsignatura, NombresPersona, ApellidosPersona FROM Asignatura
		LEFT JOIN CargaAcademica ON CargaAcademica.IdAsignatura = Asignatura.idAsignatura
		LEFT JOIN Persona ON CargaAcademica.IdPersona = Persona.idPersona
		LEFT JOIN MatriculaAsignatura ON MatriculaAsignatura.IdAsignatura = Asignatura.idAsignatura
	WHERE MatriculaAsignatura.IdMatricula = '.$idMat.'
	GROUP BY NombreAsignatura ASC');
	while($rowasig = $resasig->fetch_assoc()) { 
	$idAsig = $rowasig[idAsignatura];
	?>
<div class="box">
    <div class="box-header with-border">
    	<h3 class="box-title"><? echo $rowasig[NombreAsignatura] ?></h3> <span style="font-style:italic"><? echo $rowasig[NombresPersona].''.$rowasig[ApellidosPersona] ?></span>
        <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
   		<?php
        $sql=sqli();
		$res=$sql-> query('SELECT * FROM Agenda
                LEFT JOIN MatriculaAsignatura ON Agenda.IdMatriculaAsignatura = MatriculaAsignatura.idMatriculaAsignatura
				LEFT JOIN Asignatura ON MatriculaAsignatura.IdAsignatura = Asignatura.idAsignatura
				LEFT JOIN Matricula ON MatriculaAsignatura.IdMatricula = Matricula.idMatricula
                LEFT JOIN Horario ON Agenda.IdHorario = Horario.idHorario
            WHERE Matricula.idMatricula = '.$idMat.' AND Asignatura.idAsignatura = '.$idAsig.'
            ORDER BY FechaHorario ASC');
        ?>
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="10%" class="mailbox-name" align="center">Temas Sesion</th>
		  <th  width="10%" class="mailbox-name" align="center">Fecha</th>
		  <th  width="10%" class="mailbox-name" align="center">Hora</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $res->fetch_assoc()) { ?>
            <tr>
                <td class="mailbox-name" title="<? echo $row[TemasSesion]?>"><a href="?est=sesion&idHora=<? echo $row[idHorario]?>"><? echo $row[TemasSesion]?></td>
                <td class="mailbox-name"><? echo $row[FechaHorario]?></td>
                <td class="mailbox-name"><? echo $row[HoraInicioHorario]?></td>
            </tr>
        <?php }
		$res->free();
		$sql->close();
         ?>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
    Footer
    </div><!-- /.box-footer-->
</div>
	<?php } $resasig->free(); $sqlasig->close(); ?> 