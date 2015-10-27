<?php
if ($_GET['fm'] == 'ciudad')
{ include 'cnt/fm/ciudad.php';
} elseif ($_GET['fm'] == 'sede')
{ include 'cnt/fm/sede.php';
}elseif ($_GET['fm'] == 'edificios')
{ include 'cnt/fm/edificios.php';
}elseif ($_GET['fm'] == 'salon')
{ include 'cnt/fm/salon.php';
}elseif ($_GET['fm'] == 'facultad')
{ include 'cnt/fm/facultad.php';
}elseif ($_GET['fm'] == 'programa')
{ include 'cnt/fm/programa.php';
}elseif ($_GET['fm'] == 'asignatura')
{ include 'cnt/fm/asignatura.php';
}elseif ($_GET['fm'] == 'persona')
{ include 'cnt/fm/persona.php';
}elseif ($_GET['fm'] == 'matricula')
{ include 'cnt/fm/matricula.php';
}elseif ($_GET['fm'] == 'slcasignaturaest')
{ include 'cnt/fm/slcasignaturaest.php';
}elseif ($_GET['fm'] == 'cargaacademica')
{ include 'cnt/fm/cargaacademica.php';
}elseif ($_GET['fm'] == 'sesion')
{ include 'cnt/fm/horario.php';
}elseif ($_GET['fm'] == 'content')
{ include 'cnt/fm/horariocontent.php';
}
?>