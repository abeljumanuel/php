<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$IdFacultad = $_POST['IdFacultad'];
$IdPrograma = $_POST['IdPrograma'];

$insert_row = $mysqli->query("INSERT INTO FacultadPrograma (idFacultadPrograma, IdFacultad, IdPrograma) VALUES (NULL, '$IdFacultad', '$IdPrograma')");
echo insert_row;
if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
?>