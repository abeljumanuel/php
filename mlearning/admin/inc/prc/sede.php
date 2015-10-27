<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idSede = $_POST['idSede'];
$NombreSede = $_POST['NombreSede'];
$DescripcionSede = $_POST['DescripcionSede'];
$IdCiudad = $_POST['IdCiudad'];
if ($idSede==''){
	$insert_row = $mysqli->query("INSERT INTO Sede (idSede, NombreSede, DescripcionSede, IdCiudad) VALUES (NULL, '$NombreSede', '$DescripcionSede', '$IdCiudad')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idSede>0) {
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Sede SET NombreSede='$NombreSede', DescripcionSede='$DescripcionSede', IdCiudad='$IdCiudad'  WHERE idSede='$idSede'");
			if($update){
				print 'Success! record updated'; 
			}else{
				print 'Error : ('. $sqlupdate->errno .') '. $sqlupdate->error;
			}
		$update->free;
		$sqlupdate->close();
}
?>

<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=sede"; //will redirect to your Golosina Page
</script>