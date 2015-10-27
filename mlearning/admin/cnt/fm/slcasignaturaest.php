<?php include 'inc/fnc/fnc_slc.php';

$ie = $_GET['ie'];
if ($_GET['a'] == 'delete'){
		$sql= sqli();
		$sa = $_GET['sa'];
		$del = $sql-> query('DELETE FROM MatriculaAsignatura WHERE idMatriculaAsignatura='.$sa);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=slcasignaturaest&ie='.$ie.'"; //will redirect to your Page
</script>';
 
 } 
?>

	<h1>Matricula tus Asignaturas</h1>
    <small>En esta seccion puedes seleccionar las asignaturas que desea tomar <?php if($ie > 0){ TraePersona($ie); }else{ echo 'un estudiante de la lista';}?></small>
    <h6> 
        <ol class="breadcrumb">
            <li class="active"><a href="?fm=persona"><i class="fa fa-fw fa-list-alt"></i>Regresar a lista Personas</a></li>
        </ol>
    </h6>
</section>
<section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Seleccion de Asignaturas</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="f_ciudad" role="form" action="inc/prc/slcasignaturaest.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
						<?php if($ie > 0){?>
                      	<input type="hidden" name="IdMatricula" id="IdMatricula" value="<?php TraeIdMatricula($ie); ?>">
                        <? }else{ ?>
                        <?php slcEstudianteMatriculado('Estudiante','IdMatricula'); ?>
                        <? }?>
                      	<label for="IdAsignatura">Seleccione Asignatura</label>
                        <?php slcAsignatura('Seleccione Asignatura','IdAsignatura','','no'); ?> 
                    </div>
                  <p>Al presionar Clic en Matricular,tu aceptas nuestros <a href="#">terminos y condiciones</a>.</p>  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Matricula o Consulta</button>
                  </div>
                </form>
              </div>
<? 
if ($ie>0 && $sa==''){
	$sql=sqli();
	$res= $sql-> query('SELECT * FROM Asignatura 
			LEFT JOIN MatriculaAsignatura ON MatriculaAsignatura.IdAsignatura = Asignatura.idAsignatura
			LEFT JOIN Matricula ON MatriculaAsignatura.IdMatricula = Matricula.idMatricula
				WHERE Matricula.IdPersona = '.$ie.' ORDER BY NombreAsignatura ASC');
	$row_cnt = $res->num_rows;

?>
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i>Asignaturas a Seleccionadas (<?= $row_cnt ?>)</a></li>
    </ol>
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="90%" class="mailbox-name" style="text-align=center">Asignaturas</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreAsignatura] ?> "><? echo $row[NombreAsignatura] ?></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=slcasignaturaest&a=delete&sa=<? echo $row[idMatriculaAsignatura] ?>&ie=<?=$ie?>"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
</div>
<? } ?>