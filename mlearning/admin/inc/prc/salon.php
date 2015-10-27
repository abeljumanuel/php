<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idSalon = $_POST['idSalon'];
$NombreSalon = $_POST['NombreSalon'];
$PisoSalon = $_POST['PisoSalon'];
$IdEdificio = $_POST['IdEdificio'];

if ($idSalon==''){ // INSERT
	$insert_row = $mysqli->query("INSERT INTO Salon (idSalon, NombreSalon, PisoSalon, IdEdificio) VALUES (NULL, '$NombreSalon', '$PisoSalon', '$IdEdificio')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idSalon>0) { // UPDATE
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Salon SET NombreSalon='$NombreSalon', PisoSalon='$PisoSalon', IdEdificio='$IdEdificio'  WHERE idSalon='$idSalon'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=salon"; //will redirect to your Page
</script>