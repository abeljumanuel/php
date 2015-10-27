<?php
include '../fnc/fnc_slc.php';
$mysqli = sqli();
$IdHorario = $_POST['IdHorario'];
$ArchivoHorarioContent = $_FILES['ArchivoHorarioContent']['name'];
$NombreHorarioContent = $_POST['NombreHorarioContent'];
$DescripcionHorarioContent = $_POST['DescripcionHorarioContent'];

if ($_FILES["ArchivoHorarioContent"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 1000kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png",  "application/pdf", "application/msword", "application/vnd.ms-excel");
	$limite_kb = 4000;

	if (in_array($_FILES['ArchivoHorarioContent']['type'], $permitidos) && $_FILES['ArchivoHorarioContent']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerda que debe existir un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subirnoticia.php
		$rutanoti_img = "files/" . $_FILES['ArchivoHorarioContent']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		//if (!file_exists($rutanoti_img)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado_noti_img = @move_uploaded_file($_FILES["ArchivoHorarioContent"]["tmp_name"], $rutanoti_img);
			if ($resultado_noti_img){
				
				if ($id > 0) {
                                print 'Contenido subido y Actualizado!';
							}
							else {
								$insert_row = $mysqli->query("INSERT INTO HorarioContent (idHorarioContent, IdHorario, NombreHorarioContent, ArchivoHorarioContent, DescripcionHorarioContent) VALUES (NULL,'$IdHorario', '$NombreHorarioContent', '$ArchivoHorarioContent', '$DescripcionHorarioContent')");
								echo insert_row;
								if($insert_row){
									print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
									?>
									<script type="text/javascript">
											window.location.href = "http://mlearningcolombia.info/admin/index.php?prof=sesion&idHora=<?=$IdHorario?>"; //will redirect to your Page
									</script>';
								<?	 
								}else{
									die('Error : ('. $mysqli->errno .') '. $mysqli->error);
								}
								$insert_row->free;$mysqli->close;
								print 'Contenido subido y Guardado!';
							}
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
	} else {
		echo "Archivo no permitido, es tipo de archivo es prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}
;
?>