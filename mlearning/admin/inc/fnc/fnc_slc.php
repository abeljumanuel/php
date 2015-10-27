<?php

function sqli(){
	$host = "localhost";
	$db = "mlearnin_classmate";
	$us = "mlearnin_user";
	$psw = "Z56e^KSRsDO.";
/*
	$host = 'mysql5.000webhost.com';
	$us = 'a8884644_user';
	$psw = 'S0p0rte2015';
	$db = 'a8884644_learn';
*/
	$query = new mysqli($host, $us, $psw, $db);
	return $query;
	}

function slcEdificio($label='NULL', $field='NULL', $id='NULL'){
	$sql = sqli();
	$results = $sql-> query('SELECT * FROM Edificio');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idEdificio])
		{ echo '<option value="'.$row[idEdificio].'" selected>'.$row[NombreEdificio].'</option>'; 
		} else {
		echo '<option value="'.$row[idEdificio].'">'.$row[NombreEdificio].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }

function slcSede($label='NULL', $field='NULL', $id='NULL'){
	$sql = sqli();
	$results = $sql-> query('SELECT * FROM Sede');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idSede])
		{ echo '<option value="'.$row[idSede].'" selected>'.$row[NombreSede].'</option>'; 
		} else {
		echo '<option value="'.$row[idSede].'">'.$row[NombreSede].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
function slcTipoDoc($label='NULL', $field='NULL', $id='NULL'){
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	if ($id == 'Cedula de Ciudadania') { echo '<option value="Cedula de Ciudadania" selected >Cedula de Ciudadania</option>'; } else { echo '<option value="Cedula de Ciudadania">Cedula de Ciudadania</option>';}
	if ($id == 'Cedula de Extranjeria') { echo '<option value="Cedula de Extranjeria" selected >Cedula de Extranjeria</option>';} else { echo '<option value="Cedula de Extranjeria">Cedula de Extranjeria</option>';} 
	if ($id == 'Tarjeta de Identidad') { echo '<option value="Tarjeta de Identidad" seleted >Tarjeta de Identidad</option>';} else { echo '<option value="Tarjeta de Identidad" >Tarjeta de Identidad</option>';} 
	echo '</select>';
  }

function slcEstMatricula($label='NULL', $field='NULL', $data='NULL'){
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	echo '<option value="Pagado" '; if ($data=='Pagado') { echo 'selected'; } echo ' >Pagado</option>';
	echo '<option value="Sin Pagar" '; if ($data=='Sin Pagar') { echo 'selected'; } echo ' >Sin Pagar</option>';
	echo '</select>';
	
  }

function slcPerAcademico($label='NULL', $field='NULL', $data='NULL'){
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	echo '<option value="Primer Periodo" '; if ($data=='Primer Periodo') { echo 'selected'; } echo ' >Primer Periodo</option>';
	echo '<option value="Segundo Periodo" '; if ($data=='Segundo Periodo') { echo 'selected'; } echo ' >Segundo Periodo</option>';
	echo '</select>';
  }
 
function slcCiudad($label='NULL', $field='NULL', $id='NULL'){
	$sql = sqli();
	$results = $sql-> query('SELECT * FROM Ciudad');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idCiudad])
		{echo '<option value="'.$row[idCiudad].'" selected>'.$row[NombreCiudad].'</option>';
		} else {
		echo '<option value="'.$row[idCiudad].'">'.$row[NombreCiudad].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }

  function slcFacultad($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Facultad');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idFacultad])
		{echo '<option value="'.$row[idFacultad].'" selected>'.$row[NombreFacultad].'</option>';
		} else {
		echo '<option value="'.$row[idFacultad].'">'.$row[NombreFacultad].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcPrograma($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Programa');
	echo '<select  class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		
		if ($id == $row[idPrograma]){
		echo '<option value="'.$row[idPrograma].'" selected>'.$row[NombrePrograma].'</option>';
		} else {
		echo '<option value="'.$row[idPrograma].'">'.$row[NombrePrograma].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
    function slcFacProg($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM FacultadPrograma
							LEFT JOIN Programa ON FacultadPrograma.IdPrograma=Programa.idPrograma
							LEFT JOIN Facultad ON FacultadPrograma.IdFacultad=Facultad.idFacultad
							ORDER BY NombreFacultad ASC, NombrePrograma ASC');
	echo '<select id="'.$field.'" name="'.$field.'" class="cs-select cs-skin-slide" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		echo '<option value="'.$row[idFacultadPrograma].'" data-class="icon-camera">'.$row[NombrePrograma].' ('.$row[NombreFacultad].')</option>';
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
	
  function slcAsignatura($label='NULL', $field='NULL', $id='NULL',$required='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Asignatura');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" '; if($required=='no'){ echo 'required ><option value="" disabled selected>'.$label.'</option>'; } echo '><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idAsignatura])
		{echo '<option value="'.$row[idAsignatura].'" selected>'.$row[NombreAsignatura].'</option>';
		} else {
		echo '<option value="'.$row[idAsignatura].'">'.$row[NombreAsignatura].'</option>';
		}
	}
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcDocente($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Persona WHERE IdPerfil=1');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idPersona])
		{echo '<option value="'.$row[idPersona].'" selected>'.$row[NombresPersona].' '.$row[ApellidosPersona].'</option>';
		} else {
		echo '<option value="'.$row[idPersona].'">'.$row[NombresPersona].' '.$row[ApellidosPersona].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcEstudiante($label='NULL', $field='NULL', $id='NULL'){
	  
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Persona WHERE IdPerfil=2');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idPersona])
		{echo '<option value="'.$row[idPersona].'" selected>'.$row[NombresPersona].' '.$row[ApellidosPersona].'</option>';
		} else {
		echo '<option value="'.$row[idPersona].'">'.$row[NombresPersona].' '.$row[ApellidosPersona].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcSalon($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Edificio LEFT JOIN Salon
							ON Edificio.idEdificio=Salon.IdEdificio
							ORDER BY NombreEdificio ASC, PisoSalon ASC, NombreSalon ASC');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idPersona])
		{echo '<option value="'.$row[idSalon].'" selected>'.$row[NombreEdificio].' Piso '.$row[PisoSalon].' Salon '.$row[NombreSalon].'</option>';
		} else {
		echo '<option value="'.$row[idSalon].'">'.$row[NombreEdificio].' Piso '.$row[PisoSalon].' Salon '.$row[NombreSalon].'</option>';
		}
	}  
	echo '</select>';
	$results->free;
	$sql->close();
  }
  
  function slcCargaAcademica($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM CargaAcademica 
							LEFT JOIN Persona ON CargaAcademica.IdPersona=Persona.idPersona
							LEFT JOIN Asignatura ON CargaAcademica.IdAsignatura=Asignatura.idAsignatura
							ORDER BY 	NombresPersona ASC, NombreAsignatura ASC');
	echo '<select  class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idPersona])
		{echo '<option value="'.$row[idCargaAcademica].'" selected>'.$row[NombresPersona].' '.$row[ApellidosPersona].' ('.$row[NombreAsignatura].')</option>';
		} else {
		echo '<option value="'.$row[idCargaAcademica].'">'.$row[NombresPersona].' '.$row[ApellidosPersona].' ('.$row[NombreAsignatura].')</option>';
		}
		
		
		
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcMatriculaAsignatura($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM MatriculaAsignatura 
							LEFT JOIN Persona ON MatriculaAsignatura.IdPersona=Persona.idPersona
							LEFT JOIN Asignatura ON MatriculaAsignatura.IdAsignatura=Asignatura.idAsignatura
							ORDER BY 	NombresPersona ASC, NombreAsignatura ASC');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		echo '<option value="'.$row[idMatriculaAsignatura].'" data-class="icon-camera">'.$row[NombresPersona].' '.$row[ApellidosPersona].' ('.$row[NombreAsignatura].')</option>';
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcEstudianteMatriculado($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Matricula
							LEFT JOIN Persona ON Matricula.IdPersona=Persona.idPersona
							ORDER BY NombresPersona ASC, ApellidosPersona ASC');
	echo '<select class="form-control" id="'.$field.'" name="'.$field.'" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		if ($id == $row[idPersona])
		{echo '<option value="'.$row[idMatricula].'" selected>'.$row[NombresPersona].' '.$row[ApellidosPersona].'</option>';
		} else {
		echo '<option value="'.$row[idMatricula].'">'.$row[NombresPersona].' '.$row[ApellidosPersona].'</option>';
		}
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcSesion($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Horario ORDER BY TemasSesion ASC');
	echo '<select id="'.$field.'" name="'.$field.'" class="cs-select cs-skin-slide" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		echo '<option value="'.$row[idHorario].'" data-class="icon-camera">'.$row[TemasSesion].')</option>';
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function slcEstudianteAsignatura($label='NULL', $field='NULL', $id='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * 
		FROM MatriculaAsignatura
			LEFT JOIN Matricula ON MatriculaAsignatura.IdMatricula = Matricula.idMatricula
			LEFT JOIN Persona ON Matricula.IdPersona = Persona.idPersona
			LEFT JOIN Asignatura ON MatriculaAsignatura.IdAsignatura = Asignatura.idAsignatura
		ORDER BY NombresPersona ASC , ApellidosPersona ASC');
	echo '<select id="'.$field.'" name="'.$field.'" class="cs-select cs-skin-slide" placeholder="'.$label.'" required><option value="" disabled selected>'.$label.'</option>';
	while($row = $results->fetch_assoc()) {
		echo '<option value="'.$row[idMatriculaAsignatura].'" data-class="icon-camera">'.$row[NombresPersona].' '.$row[ApellidosPersona].' ('.$row[NombreAsignatura].')</option>';
	}  
	echo '</select>';
	$results->free();
	$sql->close();
  }
  
  function SaludoEstudiante($Saludo='NULL', $idMatricula='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM Matricula 
						LEFT JOIN Persona ON Matricula.IdPersona = Persona.idPersona
							WHERE idMatricula='.$idMatricula);
	while($row = $results->fetch_assoc()) {
		echo $Saludo.', '.$row[NombresPersona];
	}  
	$results->free;
	$sql->close();
  }
  
    function SaludoDocente($Saludo='NULL', $idCargaAcademica='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT * FROM CargaAcademica 
						LEFT JOIN Persona ON CargaAcademica.IdPersona = Persona.idPersona
							WHERE idCargaAcademica='.$idCargaAcademica);
	while($row = $results->fetch_assoc()) {
		echo $Saludo.', '.$row[NombresPersona];
	}  
	$results->free;
	$sql->close();
  }
  
  function TraePersona($idPersona='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT NombresPersona, ApellidosPersona FROM Persona WHERE idPersona='.$idPersona);
	while($row = $results->fetch_assoc()) {
		echo $row[NombresPersona].' '.$row[ApellidosPersona];
	}  
	$results->free;
	$sql->close();
  }
  
  function TraeIdMatricula($idPersona='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT idMatricula FROM Matricula 
				WHERE IdPersona='.$idPersona.' GROUP BY IdPersona');
	while($row = $results->fetch_assoc()) {
		echo $row[idMatricula];
	}  
	$results->free;
	$sql->close();
  }
  
  function TraeIdE_SA($idMatricula='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT IdPersona FROM Matricula 
				WHERE idMatricula='.$idMatricula);
	while($row = $results->fetch_assoc()) {
		return $row[IdPersona];
	}  
	$results->free;
	$sql->close();
  }
  
  function ValCargaAca($IdPersona='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT idCargaAcademica FROM CargaAcademica WHERE IdPersona='.$IdPersona); 
	$row_cnt = $results->num_rows;
	$results->free;
	$sql->close();
	return $row_cnt;
  }
  
  function ValSesDoc($IdPersona='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT idHorario FROM Horario 
						LEFT JOIN CargaAcademica ON Horario.IdCargaAcedmica = CargaAcademica.idCargaAcademica 
							WHERE CargaAcademica.IdPersona='.$IdPersona); 
	$row_cnt = $results->num_rows;
	$results->free;
	$sql->close();
	return $row_cnt;
  }
  
  function ValMat($IdPersona='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT idMatricula FROM Matricula WHERE IdPersona='.$IdPersona); 
	$row_cnt = $results->num_rows;
	$results->free;
	$sql->close();
	return $row_cnt;
  }
  
  function ValAsigMat($IdPersona='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT idMatriculaAsignatura FROM MatriculaAsignatura 
						LEFT JOIN Matricula ON MatriculaAsignatura.IdMatricula = Matricula.idMatricula 
							WHERE Matricula.IdPersona='.$IdPersona); 
	$row_cnt = $results->num_rows;
	$results->free;
	$sql->close();
	return $row_cnt;
  }
  
  function AsignaCargaAca($IdCargaAcademica='NULL'){
	$sql=sqli();
	$results = $sql-> query('SELECT IdAsignatura FROM CargaAcademica 
				WHERE IdCargaAcademica = '.$IdCargaAcademica);
	while($row = $results->fetch_assoc()) {
		return $row[IdAsignatura];
	}  
	$results->free;
	$sql->close();
	  
  }
?>