<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Salon WHERE idSalon='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=salon"; //will redirect to your Page
</script>';
 
 } 	
if ($_GET['a'] != 'edit' )
	{ 
  	$res = $sql-> query('SELECT * FROM Salon LEFT JOIN Edificio ON Salon.IdEdificio = Edificio.idEdificio ORDER BY NombreEdificio ASC, NombreSalon ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Salon</h1>
    <small>En esta seccion puedes cargar todos los salones de tu sede al sistema.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=salon&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th  width="40%" class="mailbox-name" align="center">NombreEdificio</th>
          <th  width="10%" class="mailbox-name" align="center">Piso</th>
          <th  width="30%" class="mailbox-name" align="center">Salon</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreEdificio] ?> "><? echo $row[NombreEdificio] ?></td>
            <td class="mailbox-name" ><? echo $row[PisoSalon] ?></td>
            <td class="mailbox-name" ><? echo $row[NombreSalon] ?></td>
           	<td class="mailbox-star" title="Editar"><a href="?fm=salon&a=edit&i=<? echo $row[idSalon] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=salon&a=delete&i=<? echo $row[idSalon] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
</div>
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Salon WHERE idSalon='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=salon"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Salones</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="inc/prc/salon.php" method="POST" >
                  <div class="box-body">
                  	<div class="form-group">
                      <label for="Edificio">Edificio</label>
                       <?php slcEdificio('Edificio','IdEdificio', $row[IdEdificio] ); ?>
                    </div>
                    <div class="form-group">
                      <label for="PisoSalon">Piso</label>
                      <input type="number" class="form-control" name="PisoSalon" id="PisoSalon" min="-1" max="4" placeholder="Piso" value="<?php if($i>0) { echo $row[PisoSalon]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="idSalon" id="idSalon" value="<?php if($i>0) { echo $row[idSalon]; } ?>">
                      <label for="NombreSalon">Nombre Salon</label>
                      <input type="text" class="form-control" name="NombreSalon" id="NombreSalon" placeholder="Nombre Salon" value="<?php if($i>0) { echo $row[NombreSalon]; } ?>" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>
