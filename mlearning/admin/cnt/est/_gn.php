<?php
if ($_GET['est'] == 'est')
{ include 'cnt/est/est.php';
} elseif ($_GET['est'] == 'sesion')
{ include 'cnt/est/sesion.php';
}elseif ($_GET['est'] == 'lista')
{ include 'cnt/est/lista.php';
}
?>