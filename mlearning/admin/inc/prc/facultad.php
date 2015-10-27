<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idFacultad = $_POST['idFacultad'];
$NombreFacultad = $_POST['NombreFacultad'];
$DescripcionFacultad = $_POST['DescripcionFacultad'];

if ($idFacultad==''){ // INSERT
	$insert_row = $mysqli->query("INSERT INTO Facultad (idFacultad, NombreFacultad, DescripcionFacultad) VALUES (NULL, '$NombreFacultad', '$DescripcionFacultad')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idFacultad>0) { // UPDATE
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Facultad SET NombreFacultad='$NombreFacultad', DescripcionFacultad='$DescripcionFacultad' WHERE idFacultad='$idFacultad'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=facultad"; //will redirect to your Page
</script>