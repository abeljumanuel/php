<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Edificio WHERE idEdificio='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=edificios"; //will redirect to your Page
</script>';
 
 } 	
if ($_GET['a'] != 'edit' )
	{ 
  	$res = $sql-> query('SELECT * FROM Edificio LEFT JOIN Sede ON Edificio.IdSede = Sede.idSede ORDER BY NombreEdificio ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Edificios</h1>
    <small>En esta seccion puedes cargar todos los edificios de tu sede al sistema.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=edificios&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="30%" class="mailbox-name" align="center">NombreEdificio</th>
          <th  width="60%" class="mailbox-name" align="center">UbicacionEdificio</th>
          <th  width="10%" class="mailbox-name" align="center">Sede</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreEdificio] ?> "><? echo $row[NombreEdificio] ?></td>
            <td class="mailbox-name" align="left" title="<? echo $row[UbicacionEdificio] ?>"><? echo substr($row[UbicacionEdificio], 0, 14); ?></td>
            <td class="mailbox-name" align="left"><? echo $row[NombreSede] ?></td>
           	<td class="mailbox-star" align="center" title="Editar"><a href="?fm=edificios&a=edit&i=<? echo $row[idEdificio] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=edificios&a=delete&i=<? echo $row[idEdificio] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Edificio WHERE idEdificio='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=edificios"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Edificios</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="f_ciudad" role="form" action="inc/prc/edificios.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
                      <input type="hidden" name="idEdificio" id="idEdificio" value="<?php if($i>0) { echo $row[idEdificio]; } ?>">
                      <label for="NombreEdificio">Nombre Edificio</label>
                      <input type="text" class="form-control" name="NombreEdificio" id="NombreEdificio" placeholder="Nombre Edificio" value="<?php if($i>0) { echo $row[NombreEdificio]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="UbicacionEdificio">Ubicacion Edificio</label>
                      <input type="text" class="form-control" name="UbicacionEdificio" id="UbicacionEdificio" placeholder="Ubicación Edificio" value="<?php if($i>0) { echo $row[UbicacionEdificio]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="Sede">Sede</label>
                       <?php slcSede('Sede','IdSede', $row[IdSede] ); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>