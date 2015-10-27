    <?php
	header('Conect-type: aplication/JSON');
         $con = mysql_connect("mysql.hostinger.co","u832587111_class","09ExG2T0|veEGU");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("u832587111_learn", $con);

$v1=$_REQUEST['CodigoInterno'];
//$v1=20131321018;

if($v1==NULL)
   {
 

                $r["re"]="Enter the number!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());




    }



else

{








           
           
            
           
           
           $i=mysql_query("select * from Persona where CodigoInterno=$v1",$con);
           $check='';
          while($row = mysql_fetch_array($i))
            {
  
                  $r[]=$row;
                  $check=$row['CodigoInterno'];
                 
           

             }



          
         if($check==NULL)
           {            
                      $r["re"]="Record is not available";
                      print(json_encode($r));
                 
             }
            else
             {

                 

                 $r["re"]="success";
                 print(json_encode($r));
                


                
              } 



}

 mysql_close($con);
               
    ?> 
