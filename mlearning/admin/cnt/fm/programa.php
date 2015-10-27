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
  	$res = $sql-> query('SELECT * FROM Programa LEFT JOIN Facultad ON Programa.IdFacultad = Facultad.idFacultad ORDER BY NombrePrograma ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Programas</h1>
    <small>En esta seccion puedes crear todos los programas en el sistema y adicionarlos a una Facultad</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=programa&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped" width="100%">
      <thead>
        <tr>
          <th  width="40%" class="mailbox-name" align="center">Facultad</th>
          <th  width="50%" class="mailbox-name" align="center">Programa</th>
		  <th  width="5%" class="mailbox-name" align="center">SNIES</th>
		  <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreFacultad] ?> "><? echo substr($row[NombreFacultad], 0, 25); ?></td>
            <td class="mailbox-name" title="<? echo $row[NombrePrograma] ?> "><? echo substr($row[NombrePrograma], 0, 25); ?></td>
            <td class="mailbox-name" title="<? echo $row[CodigoSNIES] ?> "><? echo  $row[CodigoSNIES]; ?></td>
           	<td class="mailbox-star" title="Editar"><a href="?fm=programa&a=edit&i=<? echo $row[idPrograma] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=programa&a=delete&i=<? echo $row[idPrograma] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Programa WHERE idPrograma='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=programa"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Programas</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="inc/prc/programa.php" method="POST" >
                  <div class="box-body">
                  	<div class="form-group">
                      <input type="hidden" name="idPrograma" id="idPrograma" value="<?php if($i>0) { echo $row[idPrograma]; } ?>">
                      <label for="NombrePrograma">Nombre Programa</label>
                      <input type="text" class="form-control" name="NombrePrograma" id="NombrePrograma" placeholder="Nombre Programa" value="<?php if($i>0) { echo $row[NombrePrograma]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="CodigoSNIES">Codigo SNIES</label>
                      <input type="text" class="form-control" name="CodigoSNIES" id="CodigoSNIES" placeholder="Codigo SNIES" value="<?php if($i>0) { echo $row[CodigoSNIES]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="Facultad">Facultad</label>
                       <?php slcFacultad('Facultad','IdFacultad', $row[IdFacultad] ); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>