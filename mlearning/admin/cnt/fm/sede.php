<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Sede WHERE idSede='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=sede"; //will redirect to your Page
</script>';
 
 } 	
if ($_GET['a'] != 'edit' )
	{ 
  	$res = $sql-> query('SELECT * FROM Sede LEFT JOIN Ciudad ON Sede.IdCiudad = Ciudad.idCiudad ORDER BY NombreSede ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Sede</h1>
    <small>En esta seccion puedes crear todas las sedes en el sistema.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=sede&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="30%" class="mailbox-name" align="center">Sede</th>
          <th  width="60%" class="mailbox-name" align="center">Descripción</th>
          <th  width="10%" class="mailbox-name" align="center">Ciudad</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreSede] ?> "><? echo $row[NombreSede] ?></td>
            <td class="mailbox-name" align="left" title="<? echo $row[DescripcionSede] ?>"><? echo substr($row[DescripcionSede], 0, 14); ?></td>
            <td class="mailbox-name" align="left"><? echo $row[NombreCiudad] ?></td>
           	<td class="mailbox-star" align="center" title="Editar"><a href="?fm=sede&a=edit&i=<? echo $row[idSede] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=sede&a=delete&i=<? echo $row[idSede] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Sede WHERE idSede='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=sede"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Sede</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="f_ciudad" role="form" action="inc/prc/sede.php" method="POST" >
                  <div class="box-body">
                    <div class="form-group">
                      <input type="hidden" name="idSede" id="idSede" value="<?php if($i>0) { echo $row[idSede]; } ?>">
                      <label for="NombreSede">Nombre Sede</label>
                      <input type="text" class="form-control" name="NombreSede" id="NombreSede" placeholder="Nombre Sede" value="<?php if($i>0) { echo $row[NombreSede]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="DescripcionSede">Descripcion Sede</label>
                      <input type="text" class="form-control" name="DescripcionSede" id="DescripcionSede" placeholder="Descripcion Sede" value="<?php if($i>0) { echo $row[DescripcionSede]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="Ciudad">Ciudad</label>
                       <? slcCiudad('Ciudad','IdCiudad', $row[IdCiudad] ) ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>