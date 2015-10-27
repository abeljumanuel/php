<?php
function Unidad ($unidad='NULL') {
switch ($unidad) {
		case 1:
			$valor= 'I';
			break;
		case 2:
			 $valor= 'II';
			break;
		case 3:
			 $valor= 'III';
			break;
		case 4:
			 $valor= 'IV';
			break;
		case 5:
			 $valor= 'V';
			break;
		case 6:
			 $valor= 'VI';
			break;
		case 7:
			 $valor= 'VII';
			break;
		case 8:
			 $valor= 'VIII';
			break;
		case 9:
			 $valor= 'IX';
			break;
	}
	return $valor;
}
function Decena($decena='NULL') {
switch ($decena) {
		case 1:
			$valor= 'X';
			break;
		case 2:
			 $valor= 'XX';
			break;
		case 3:
			 $valor= 'XXX';
			break;
		case 4:
			 $valor= 'XL';
			break;
		case 5:
			 $valor= 'L';
			break;
		case 6:
			 $valor= 'LX';
			break;
		case 7:
			 $valor= 'LXX';
			break;
		case 8:
			 $valor= 'LXXX';
			break;
		case 9:
			 $valor= 'XC';
			break;
	}
	return $valor;
}

function Centena($centena='NULL') {
switch ($centena) {
		case 1:
			$valor= 'C';
			break;
		case 2:
			 $valor= 'CC';
			break;
		case 3:
			 $valor= 'CCC';
			break;
		case 4:
			 $valor= 'CD';
			break;
		case 5:
			 $valor= 'D';
			break;
		case 6:
			 $valor= 'DC';
			break;
		case 7:
			 $valor= 'DCC';
			break;
		case 8:
			 $valor= 'DCCC';
			break;
		case 9:
			 $valor= 'CM';
			break;
	}
	return $valor;
}
function Miles($miles='NULL') {
switch ($miles) {
		case 1:
			$valor= 'M';
			break;
		case 2:
			 $valor= 'MM';
			break;
		case 3:
			 $valor= 'MMM';
			break;
	}
	return $valor;
}

function Orden($digitos='NULL', $array='NULL') {
switch ($digitos) {
		case 1:
			$resultado= Unidad($array[0]);
			break;
		case 2:
			$resultado= Decena($array[0]).Unidad($array[1]);
			break;
		case 3:
			$resultado= Centena($array[0]).Decena($array[1]).Unidad($array[2]);
			break;
		case 4:
			$resultado= Miles($array[0]).Centena($array[1]).Decena($array[2]).Unidad($array[3]);
			break;
	}
	return $resultado;
}
?>	