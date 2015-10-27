<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$IdAgenda = $_POST['IdAgenda'];
$ObservacionObsEst = $_POST['ObservacionObsEst'];

$insert_row = $mysqli->query("INSERT INTO ObservacionEstudiante (idCiudad, IdAgenda, ObservacionObsEst) VALUES (NULL, '$IdAgenda', '$ObservacionObsEst')");
echo insert_row;
if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}