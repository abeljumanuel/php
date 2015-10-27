<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Programa WHERE idPrograma='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=programa"; //will redirect to your Page
</script>';
 
 } 	
if ($_GET['a'] != 'edit' )
	{ 
  	$res = $sql-> query('SELECT * FROM Asignatura ORDER BY NombreAsignatura ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Asignaturas</h1>
    <small>En esta seccion puedes crear Asignaturas para alimentar el sistema.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=asignatura&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped" width="100%">
      <thead>
        <tr>
          <th  width="100%" class="mailbox-name" style="text-align:center;">Asignatura</th>
		  <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" align="center" title="<? echo $row[NombreAsignatura] ?> "><? echo substr($row[NombreAsignatura], 0, 70); ?></td>
           	<td class="mailbox-star" title="Editar"><a href="?fm=asignatura&a=edit&i=<? echo $row[idAsignatura] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=asignatura&a=delete&i=<? echo $row[idAsignatura] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Asignatura WHERE idAsignatura='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=asignatura"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Asignaturas</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="inc/prc/asignatura.php" method="POST" >
                  <div class="box-body">
                  	<div class="form-group">
                      <input type="hidden" name="idAsignatura" id="idAsignatura" value="<?php if($i>0) { echo $row[idAsignatura]; } ?>">
                      <label for="NombreAsignatura">Nombre Asignatura</label>
                      <input type="text" class="form-control" name="NombreAsignatura" id="NombreAsignatura" placeholder="Nombre Asignatura" value="<?php if($i>0) { echo $row[NombreAsignatura]; } ?>" required>
                    </div>
				  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>