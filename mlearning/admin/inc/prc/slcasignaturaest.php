<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$IdMatricula = $_POST['IdMatricula'];
$IdAsignatura = $_POST['IdAsignatura'];
$IdPersona = TraeIdE_SA($IdMatricula);
if ($IdAsignatura!=''){
$insert_row = $mysqli->query("INSERT INTO MatriculaAsignatura (idMatriculaAsignatura, IdMatricula, IdAsignatura) VALUES (NULL,'$IdMatricula', '$IdAsignatura')");
echo insert_row;
if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
$insert_row->free;$mysqli->close;

?>
<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=slcasignaturaest&ie=<?=$IdPersona?>"; //will redirect to your Page
</script>';
<?php }else { ?>
<script type="text/javascript">
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=slcasignaturaest&ie=<?=$IdPersona?>"; //will redirect to your Page
</script>';
<? } ?>