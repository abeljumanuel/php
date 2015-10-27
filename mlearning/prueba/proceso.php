<?php
include 'fnc.php';
$numero = $_POST['numero'];
$array = str_split($numero);
$num_digits = strlen($numero);
echo 'Viene el numero: '.$numero;

$resultado= Orden($num_digits,$array);
echo '<br>El numero tiene '.$num_digits.' digitos';
echo '<br>El romano seria: '.$resultado;
?>


