<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$TemasSesion = $_POST['TemasSesion'];
$FechaHorario = $_POST['FechaHorario'];
$HoraInicioHorario = $_POST['HoraInicioHorario'];
$HoraFinHorario = $_POST['HoraFinHorario'];
$ObjetivosSesion = $_POST['ObjetivosSesion'];
$IdCargaAcademica = $_POST['IdCargaAcademica'];
$IdPrograma =$_POST['IdPrograma'];
$IdSalon = $_POST['IdSalon'];

$insert_row = $mysqli->query("INSERT INTO Horario (idHorario, TemasSesion, FechaHorario, HoraInicioHorario, HoraFinHorario, ObjetivosSesion, IdCargaAcademica, IdPrograma, IdSalon) VALUES (NULL,'$TemasSesion', '$FechaHorario', '$HoraInicioHorario', '$HoraFinHorario', '$ObjetivosSesion', '$IdCargaAcademica', '$IdPrograma', '$IdSalon')");
echo insert_row;
if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
	$idHorario = $mysqli->insert_id;
	$idAsignatura = AsignaCargaAca($IdCargaAcademica);
	$insert_row->free;$mysqli->close;

	$sql=sqli();
	$results = $sql-> query('SELECT idMatriculaAsignatura FROM MatriculaAsignatura WHERE IdAsignatura='.$idAsignatura);
	while($row = $results->fetch_assoc()) {
		$insert_agenda = $sql->query("INSERT INTO Agenda (idAgenda, IdMatriculaAsignatura, IdHorario, Asistencia) VALUES (NULL,'$row[idMatriculaAsignatura]', '$idHorario', '0')");
		if($insert_agenda){
    echo '.'.$sql->insert_id .'<br />';
		}
	}  
	$results->free(); $sql->close();
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	$insert_row->free;$mysqli->close;
}

?>