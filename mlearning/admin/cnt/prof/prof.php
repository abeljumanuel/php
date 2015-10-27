<?php include 'inc/fnc/fnc_slc.php';
$idCarAc = $_GET['idCarAc'];
?>
	<small><?php SaludoDocente('Bienvenido',$idCarAc); ?></small>
	<h1>Agenda - Docente</h1>
<?php
	$sql=sqli();
	$res = $sql-> query('SELECT * FROM Horario
			LEFT JOIN CargaAcademica ON Horario.IdCargaAcademica = CargaAcademica.idCargaAcademica
			LEFT JOIN Asignatura ON CargaAcademica.IdAsignatura = Asignatura.idAsignatura
		WHERE CargaAcademica.idCargaAcademica = '.$idCarAc.'
		ORDER BY FechaHorario ASC');
?>  
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Registros (10)</a></li>
    <li class="active">
    
    </li>
  </ol>
  
</section>
<section class="content">
    
        <table>
            <tr>
                <th>Asignatura</th>
                <th>TemaSesion</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        <?php while($row = $res->fetch_assoc()) { ?>
            <tr>
                <td><? echo $row[NombreAsignatura]?></td>
                <td><a href="?prof=sesion&idHora=<? echo $row[idHorario]?>"><? echo $row[TemasSesion]?></a></td>
                <td><? echo $row[FechaHorario]?></td>
                <td><? echo $row[HoraInicioHorario]?></td>
            </tr>
        <?php }
		$res->free();
		$sql->close();
         ?>
        </table>