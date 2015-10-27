<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idAsignatura= $_POST['idAsignatura'];
$NombreAsignatura = $_POST['NombreAsignatura'];

if ($idAsignatura==''){ // INSERT
	$insert_row = $mysqli->query("INSERT INTO Asignatura (idAsignatura, NombreAsignatura) VALUES (NULL, '$NombreAsignatura')");
	echo insert_row;
	if($insert_row){
		print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
} elseif ($idAsignatura>0) { // UPDATE
	$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Asignatura SET NombreAsignatura='$NombreAsignatura' WHERE idAsignatura='$idAsignatura'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=asignatura"; //will redirect to your Page
</script>
