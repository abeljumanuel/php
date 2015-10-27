<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idMatricula = $_POST['idMatricula'];
$IdPersona = $_POST['IdPersona'];
$IdPrograma = $_POST['IdPrograma'];
$SemestreMatricula = $_POST['SemestreMatricula'];
$EstadoMatricula = $_POST['EstadoMatricula'];
$PeriodoAcademicoMatricula =$_POST['PeriodoAcademicoMatricula'];

if ($idMatricula==''){
$insert_row = $mysqli->query("INSERT INTO Matricula (idMatricula, IdPersona, IdPrograma, SemestreMatricula, EstadoMatricula, PeriodoAcademicoMatricula) VALUES (NULL,'$IdPersona', '$IdPrograma', '$SemestreMatricula', '$EstadoMatricula', '$PeriodoAcademicoMatricula')");
echo insert_row;
			if($insert_row){
				print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
			}else{
				die('Error : ('. $mysqli->errno .') '. $mysqli->error);
			}
		$insert_row->free;
		$mysqli->close;
} elseif ($idMatricula>0) {
	
$sqlupdate=sqli();
			//MySqli Update Query
			$update = $sqlupdate->query("UPDATE Matricula SET IdPersona='$IdPersona', IdPrograma='$IdPrograma', SemestreMatricula='$SemestreMatricula', EstadoMatricula='$EstadoMatricula', PeriodoAcademicoMatricula='$PeriodoAcademicoMatricula' WHERE idMatricula='$idMatricula'");
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
		window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=persona"; //will redirect to your Page
</script>