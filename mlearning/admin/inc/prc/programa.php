<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idPrograma= $_POST['idPrograma'];
$NombrePrograma = $_POST['NombrePrograma'];
$CodigoSNIES = $_POST['CodigoSNIES'];
$IdFacultad = $_POST['IdFacultad'];

if ($idPrograma==''){ // INSERT
	$insert_row = $mysqli->query("INSERT INTO Programa (idPrograma, NombrePrograma, CodigoSNIES, IdFacultad) VALUES (NULL, '$NombrePrograma', '$CodigoSNIES', '$IdFacultad')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idPrograma>0) { // UPDATE
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Programa SET NombrePrograma='$NombrePrograma', CodigoSNIES=$CodigoSNIES, IdFacultad='$IdFacultad' WHERE idPrograma='$idPrograma'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=programa"; //will redirect to your Page
</script>