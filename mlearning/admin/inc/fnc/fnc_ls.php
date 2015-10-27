<?php
/*
function LsAsistencia($idAsignatura='NULL'){
	$sql=sqli();
  	$res = $sql-> query('SELECT NombresPersona, ApellidosPersona, CodigoInterno FROM Agenda
			LEFT JOIN MatriculaAsignatura ON Agenda.IdMatriculaAsignatura = MatriculaAsignatura.idMatriculaAsignatura
			LEFT JOIN Matricula ON MatriculaAsignatura.IdMatricula = Matricula.idMatricula
			LEFT JOIN Persona ON Matricula.IdPersona = Persona.idPersona
			LEFT JOIN Asignatura ON MatriculaAsignatura.IdAsignatura = Asignatura.idAsignatura
		WHERE Persona.idPersona = 2 AND Asignatura.idAsignatura = {$idAsignatura}
		ORDER BY NombresPersona ASC , ApellidosPersona ASC');
		echo '<table>
  	<tr>
    	<th>Nombres</th>
        <th>Codigo</th>
    </tr>';
		 while($row = $res->fetch_assoc()) {
		echo '<tr><td>'.$row[NombresPersona].' '.$row[ApellidosPersona].'</td><td>'.$row[CodigoInterno].'</td></tr>'; 
		 }
		 echo '</table>';
		$res->free();
		$sql->close();
	}
*/
?>