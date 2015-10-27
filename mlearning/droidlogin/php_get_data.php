<?php
header("content-type:text/javascript;charset=utf-8");  
$con=mysql_connect('localhost','mlearnin_user','Z56e^KSRsDO.')or die(mysql_error());  
mysql_select_db('mlearnin_classmate')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="SELECT * FROM Agenda ";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res)){
	$output[]=$row;
}
print(json_encode($output));
mysql_close();
?>