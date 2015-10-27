<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$idPersona = $_POST['idPersona'];
$NombresPersona = $_POST['NombresPersona'];
$ApellidosPersona = $_POST['ApellidosPersona'];
$Email = $_POST['Email'];
$pass = $_POST['pass'];
$ImagenPersona = $_FILES['ImagenPersona']['name'];
$TipoDocumentoPersona = $_POST['TipoDocumentoPersona'];
$NumeroDocumentoPersona = $_POST['NumeroDocumentoPersona'];
$CodigoInterno = $_POST['CodigoInterno'];
$IdPerfil = $_POST['IdPerfil'];
$IdSede = $_POST['IdSede'];


if ($_FILES["ImagenPersona"]["error"] > 0){
	echo "ha ocurrido un error, Quiza no seleccionaste una imagen";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 1000kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 3000;

	if (in_array($_FILES['ImagenPersona']['type'], $permitidos) && $_FILES['ImagenPersona']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerda que debe existir un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subirnoticia.php
		$rutanoti_img = "user_image/" .$_FILES['ImagenPersona']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		//if (!file_exists($rutanoti_img)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado_noti_img = @move_uploaded_file($_FILES["ImagenPersona"]["tmp_name"], $rutanoti_img);
			if ($resultado_noti_img){
				
					if ($idPersona=='') {
						$insert_row = $mysqli->query("INSERT INTO Persona (IdPersona, NombresPersona, ApellidosPersona, Email, ImagenPersona, TipoDocumentoPersona, NumeroDocumentoPersona, CodigoInterno, IdPerfil, IdSede, username, pass) VALUES (NULL, '$NombresPersona', '$ApellidosPersona', '$Email', '$ImagenPersona', '$TipoDocumentoPersona', '$NumeroDocumentoPersona', '$CodigoInterno', '$IdPerfil', '$IdSede', NULL, '$pass')");
						echo insert_row;
						if($insert_row){
							print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
							?>
                            <script type="text/javascript">
									window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=persona"; //will redirect to your Page
							</script>
                            <? 
						}else{
							die('Error : ('. $mysqli->errno .') '. $mysqli->error);
							}
					} elseif ($idPersona>0) {
						$sqlupdate=sqli();
								//MySqli Update Query
								$update = $sqlupdate->query("UPDATE Persona SET 
												NombresPersona='$NombresPersona', 
												ApellidosPersona='$ApellidosPersona', 
												Email='$Email',
												ImagenPersona='$ImagenPersona',
												TipoDocumentoPersona='$TipoDocumentoPersona',
												NumeroDocumentoPersona='$NumeroDocumentoPersona',
												CodigoInterno='$CodigoInterno',
												IdPerfil='$IdPerfil',
												IdSede='$IdSede',
												pass='$pass' 
											WHERE idPersona='$idPersona'");
								if($update){
									print 'Success! record updated'; 
									?>
									<script type="text/javascript">
                                            window.location.href = "http://mlearningcolombia.info/admin/index.php?fm=persona"; //will redirect to your Page
                                    </script>
                                    <?
								}else{
									print 'Error : ('. $sqlupdate->errno .') '. $sqlupdate->error;
									
								}
							$update->free;
							$sqlupdate->close();
					}
				
				
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
	} else {
		echo "Archivo no permitido, es tipo de archivo es prohibido o excede el tamano de $limite_kb Kilobytes";
	}
};
?>