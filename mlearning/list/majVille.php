<?php  
	mysql_connect("mysql.hostinger.co","u832587111_class","09ExG2T0|veEGU");
	mysql_select_db("u832587111_learn");
	 
   $mode  =$_REQUEST ['mode'] ; 
   switch(  $mode )  
	{
		case "afficher":  
				 
				  
				$sql=mysql_query("SELECT * FROM ville");
				while($row=mysql_fetch_assoc($sql))
					$output[]=$row;
				print(json_encode($output));
				break;

		case "modif": // si $var vaut 2
			 
			 
				$nomVille=$_REQUEST ['nom'] ;
				$etat=$_REQUEST ['etat'] ;

			 
				$requete = "UPDATE    ville  SET etat= $etat WHERE  nom='$nomVille'"; 
			//	print ($requete );




 
				mysql_query($requete); 
					// mettre ici  
				break;

		 

		default: // dans tous les autres cas
			 
} 
   
   
	  mysql_close();   
?>