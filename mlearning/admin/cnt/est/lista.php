<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
  	$res = $sql-> query('SELECT NombresPersona, ApellidosPersona, CodigoInterno, NombrePrograma, Matricula.idMatricula FROM Matricula 
				LEFT JOIN Persona ON Matricula.IdPersona = Persona.idPersona
				LEFT JOIN Programa ON Matricula.IdPrograma = Programa.idPrograma
					ORDER BY NombresPersona ASC , ApellidosPersona ASC');
		$row_est = $res->num_rows;			
?>
<h1>Estudiantes</h1>
  <small>En esta seccion el Administrador puede simular el Login de cualquier estudiante para identificar su experiencia como usuario de la plataforma.</small>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Registros (<?php echo $row_est ?>)</a></li>
    <li class="active">
    
    </li>
  </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="20%" class="mailbox-name">Codigo</th>
          <th  width="40%" class="mailbox-name">Nombres</th>
	      <th  width="40%" class="mailbox-name">Programa</th>
        </tr>
      </thead>
      <tbody>
<?php while($row = $res->fetch_assoc()) { ?>
        <tr>
          <td class="mailbox-name"><? echo $row[CodigoInterno] ?></td>
          <td class="mailbox-name" title="<? echo $row[NombresPersona].' '.$row[ApellidosPersona]; ?> "><a href="?est=est&idMat=<? echo $row[idMatricula]?>"><? echo substr($row[NombresPersona].' '.$row[ApellidosPersona], 0, 15).'...'; ?></a></td>
          <td class="mailbox-name" title="<? echo $row[NombrePrograma] ?>"><? echo substr($row[NombrePrograma], 0, 15).'...';?></td>
        </tr>
<?php } $res->free(); $sql->close(); ?>
	  </tbody> 
	</table><!-- /.table --> 
</div><!-- /.mail-box-messages -->
  
  
