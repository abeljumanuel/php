<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idEdificio = $_POST['idEdificio'];
$NombreEdificio = $_POST['NombreEdificio'];
$UbicacionEdificio = $_POST['UbicacionEdificio'];
$IdSede = $_POST['IdSede'];

if ($idEdificio==''){
	$insert_row = $mysqli->query("INSERT INTO Edificio (idEdificio, NombreEdificio, UbicacionEdificio, IdSede) VALUES (NULL, '$NombreEdificio', '$UbicacionEdificio', '$IdSede')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idEdificio>0) {
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Edificio SET NombreEdificio='$NombreEdificio', UbicacionEdificio='$UbicacionEdificio', IdSede='$IdSede'  WHERE idEdificio='$idEdificio'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=edificios"; //will redirect to your Page
</script>