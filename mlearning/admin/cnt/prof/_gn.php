<?php
if ($_GET['prof'] == 'prof')
{ include 'cnt/prof/prof.php';
} elseif ($_GET['prof'] == 'sesion')
{ include 'cnt/prof/sesion.php';
}elseif ($_GET['prof'] == 'lista')
{ include 'cnt/prof/lista.php';
}
?>