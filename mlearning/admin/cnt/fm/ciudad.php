<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Ciudad WHERE idCiudad='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=ciudad"; //will redirect to your Golosina Page
</script>';
 
 } 	
if ($_GET['a'] != 'edit' )
	{ 
  	$res = $sql-> query('SELECT * FROM Ciudad ORDER BY NombreCiudad ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Ciudad</h1>
    <small>En esta seccion puedes alimentar el sistema con las Ciudades existentes.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=ciudad&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="90%" class="mailbox-name" align="center">Ciudad</th>
          <th  width="10%" class="mailbox-name" align="center">DANE</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreCiudad] ?> "><? echo $row[NombreCiudad] ?></td>
            <td class="mailbox-name" align="center"><? echo $row[CodigoCiudad] ?></td>
           	<td class="mailbox-star" align="center" title="Editar"><a href="?fm=ciudad&a=edit&i=<? echo $row[idCiudad] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=ciudad&a=delete&i=<? echo $row[idCiudad] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
</div>
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Ciudad WHERE idCiudad='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=ciudad"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Ciudad</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="f_ciudad" role="form" action="inc/prc/ciudad.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
                      <input type="hidden" name="idCiudad" id="idCiudad" value="<?php if($i>0) { echo $row[idCiudad]; } ?>">
                      <label for="exampleInputEmail1">Nombre ciudad</label>
                      <input type="text" class="form-control" name="NombreCiudad" id="NombreCiudad" placeholder="Nombre ciudad" value="<?php if($i>0) { echo $row[NombreCiudad]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Codigo Ciudad</label>
                      <input type="number" class="form-control" name="CodigoCiudad" id="CodigoCiudad" min="5001" max="99773" placeholder="Codigo Ciudad" value="<?php if($i>0) { echo $row[CodigoCiudad]; } ?>" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>