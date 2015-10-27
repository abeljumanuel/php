<?php include 'inc/fnc/fnc_slc.php';
	$sql=sqli();
	//$sql->set_charset("utf8");
	$i = $_GET['i'];	
if ($_GET['a'] == 'delete'){
		$del = $sql-> query("DELETE FROM Facultad WHERE idFacultad='$i'");
		if (!$del) die('Invalid query: ' . mysql_error());
		echo '<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=facultad"; //will redirect to your Page
</script>';
 
 } 	
if ($_GET['a'] != 'edit' )
	{ 
  	$res = $sql-> query('SELECT * FROM Facultad ORDER BY NombreFacultad ASC');
	$row_cnt = $res->num_rows;
?>
    <h1>Facultades</h1>
    <small>En esta seccion puedes cargar los facultades de la Universidad.</small>
    <ol class="breadcrumb">
        <li class="active"><a href="?fm=facultad&a=edit&i=new"><i class="fa fa-fw fa-plus-square"></i>Nuevo</a></li>
        <li><i class="fa fa-dashboard"></i>Registros (<?= $row_cnt ?>)</a></li>
    </ol>
</section>
<section class="content">
<div class="table-responsive mailbox-messages">
    <table class="table table-hover table-striped" width="100%">
      <thead>
        <tr>
          <th  width="40%" class="mailbox-name" align="center">Nombre Facultad</th>
          <th  width="50%" class="mailbox-name" align="center">Descripcion Facultad</th>
		  <th  width="0%"  class="mailbox-star">&nbsp;</th>
          <th  width="0%"  class="mailbox-star">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
	<?php while($row = $res->fetch_assoc()) { ?>	 
        <tr>
            <td class="mailbox-name" title="<? echo $row[NombreFacultad] ?> "><? echo substr($row[NombreFacultad], 0, 25); ?></td>
            <td class="mailbox-name" title="<? echo $row[DescripcionFacultad] ?> "><? echo  substr($row[DescripcionFacultad], 0, 18); ?></td>
           	<td class="mailbox-star" title="Editar"><a href="?fm=facultad&a=edit&i=<? echo $row[idFacultad] ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
            <td class="mailbox-star" align="center" title="Eliminar"><a href="?fm=facultad&a=delete&i=<? echo $row[idFacultad] ?>&r=s"><i class="fa fa-fw fa-remove"></i></a></td>
        </tr>
    <?php } $res->free(); $sql->close(); ?> 
      </tbody> 
	</table><!-- /.table --> 
<? } else {
	if($i>0){
$res = $sql-> query('SELECT * FROM Facultad WHERE idFacultad='.$i);
$row = $res->fetch_array(MYSQLI_ASSOC);
	}
	 ?> 
            <h6> 
                <ol class="breadcrumb">
                    <li class="active"><a href="?fm=facultad"><i class="fa fa-fw fa-list-alt"></i>Regresar a Listado</a></li>
                </ol>
            </h6>
        </section>
        <section class="content">
  			<div class="box box-primary">
	            <div class="box-header">
                  <h3 class="box-title">Facultades</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="inc/prc/facultad.php" method="POST" >
                  <div class="box-body">
                  	<div class="form-group">
                      <input type="hidden" name="idFacultad" id="idFacultad" value="<?php if($i>0) { echo $row[idFacultad]; } ?>">
                      <label for="NombreFacultad">Nombre Facultad</label>
                      <input type="text" class="form-control" name="NombreFacultad" id="NombreFacultad" placeholder="Nombre Facultad" value="<?php if($i>0) { echo $row[NombreFacultad]; } ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="DescripcionFacultad">Descripción Facultad</label>
                      <input type="text" class="form-control" name="DescripcionFacultad" id="DescripcionFacultad" placeholder="DescripcionFacultad" value="<?php if($i>0) { echo $row[DescripcionFacultad]; } ?>" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>
<? } ?>