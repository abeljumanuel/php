<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idCiudad = $_POST['idCiudad'];
$NombreCiudad = $_POST['NombreCiudad'];
$CodigoCiudad = $_POST['CodigoCiudad'];
if ($idCiudad==''){
	$insert_row = $mysqli->query("INSERT INTO Ciudad (idCiudad, NombreCiudad, CodigoCiudad) VALUES (NULL, '$NombreCiudad', '$CodigoCiudad')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idCiudad>0) {
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Ciudad SET NombreCiudad='$NombreCiudad', CodigoCiudad='$CodigoCiudad'  WHERE idCiudad='$idCiudad'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=ciudad"; //will redirect to your Golosina Page
</script>