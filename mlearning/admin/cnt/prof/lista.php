<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
  	$res = $sql-> query('SELECT *, COUNT(CargaAcademica.IdCargaAcademica) AsigDocen FROM CargaAcademica 
				LEFT JOIN Persona ON CargaAcademica.IdPersona = Persona.idPersona 
					GROUP BY Persona.idPersona ASC');
	$row_cnt = $res->num_rows;
?>
<h1>Docentes</h1>
  <small>En esta area el Administrador puede simular el Login de cualquier docente para identificar su experiencia como usuario de la plataforma.</small>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Registros (<?php echo $row_cnt ?>)</a></li>
    <li class="active">
    
    </li>
  </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="90%" class="mailbox-name" align="center">Nombres</th>
          <th  width="10%" class="mailbox-name" align="center">Carga Academica</th>
        </tr>
      </thead>
      <tbody>
<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombresPersona].' '.$row[ApellidosPersona]; ?> "><a href="?prof=prof&idCarAc=<? echo $row[idCargaAcademica]?>"><? echo $row[NombresPersona].' '.$row[ApellidosPersona] ?></td>
            <td class="mailbox-name" align="center"><? echo '('.$row[AsigDocen].')'; ?></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
</div><!-- /.mail-box-messages -->