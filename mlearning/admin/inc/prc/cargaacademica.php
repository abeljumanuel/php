<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$IdPersona = $_POST['IdPersona'];
$IdAsignatura = $_POST['IdAsignatura'];

$insert_row = $mysqli->query("INSERT INTO CargaAcademica (idCargaAcademica, IdPersona, IdAsignatura) VALUES (NULL,'$IdPersona', '$IdAsignatura')");
echo insert_row;
if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
$insert_row->free;$mysqli->close;
?>
<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=cargaacademica&id=<?=$IdPersona?>"; //will redirect to your Page
</script>';