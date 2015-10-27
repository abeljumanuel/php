<?php include 'inc/fnc/fnc_slc.php';

$id = $_GET['id'];
if ($_GET['a'] == 'delete'){
		$sql= sqli();
		$ca = $_GET['ca'];
		$del = $sql-> query('DELETE FROM CargaAcademica WHERE idCargaAcademica='.$ca);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=cargaacademica&id='.$id.'"; //will redirect to your Page
</script>';
 
 } 
?>
	<h1>CargaAcademica</h1>
    <small>En esta seccion puedes Asignar la carga Academica a <?php if($id > 0){ TraePersona($id); }else{ echo 'un docente de la lista';}?></small>
    <h6> 
        <ol class="breadcrumb">
            <li class="active"><a href="?fm=persona"><i class="fa fa-fw fa-list-alt"></i>Regresar a lista Personas</a></li>
        </ol>
    </h6>
</section>
<section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Carga Academica</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="f_ciudad" role="form" action="inc/prc/cargaacademica.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
						<?php if($id > 0){?>
                      	<input type="hidden" name="IdPersona" id="IdPersona" value="<?php echo $id; ?>">
                        <? }else{ ?>
                        <?php slcDocente('Seleccione Docente', 'IdPersona'); ?>
                        <? }?>
                      	<label for="IdAsignatura">Seleccione Asignatura</label>
                        <?php slcAsignatura('Seleccione Asignatura','IdAsignatura'); ?> 
                    </div>
                  <p>Al presionar Clic en Matricular,tu aceptas nuestros <a href="#">terminos y condiciones</a>.</p>  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Matricula</button>
                  </div>
                </form>
              </div>
<? 
if ($id>0 && $ca==''){
	$sql=sqli();
	$res= $sql-> query('SELECT * FROM Asignatura 
			LEFT JOIN CargaAcademica ON CargaAcademica.IdAsignatura = Asignatura.idAsignatura
				WHERE CargaAcademica.IdPersona = '.$id.' ORDER BY NombreAsignatura ASC');
	$row_cnt = $res->num_rows;

?>
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i>Asignaturas a Cargo (<?= $row_cnt ?>)</a></li>
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
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=cargaacademica&a=delete&ca=<? echo $row[idCargaAcademica] ?>&id=<?=$id?>"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
</div>
<? } ?>