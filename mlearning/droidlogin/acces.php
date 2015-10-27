
<?php

/*LOGIN
$ftp_server = "mlearningcolombia.info";
$ftp_user = "mlearning";
$ftp_pass = "%pWpNkhS=^P4";

// establecer una conexión o finalizarla
$conn_id = ftp_connect($ftp_server) or die("No se pudo conectar a $ftp_server"); 

// intentar iniciar sesión
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    echo "Conectado como $ftp_user@$ftp_server\n";
} else {
    echo "No se pudo conectar como $ftp_user\n";
}
*/


$usuario = $_POST['usuario'];
$pass = $_POST['password'];

require_once 'funciones_bd.php';
$db = new funciones_BD();

	if($db->login($usuario,$pass)){

	$resultado[]=array("logstatus"=>"0");
	}else{
	$resultado[]=array("logstatus"=>"1");
	}

echo json_encode($resultado);




?>
