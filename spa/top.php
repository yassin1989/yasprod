<?php
include('config_local.php'); 

	 $sql = "  
	SELECT      r.id_client,  COUNT(r.id_client) AS nbre ,c.name,c.last
    FROM     reservation r ,client c   where c.id_client=r.id_client  GROUP BY r.id_client     ORDER BY nbre DESC     LIMIT    15; "; 			
 						$req= mysql_query ($sql) ;
					
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_client'];		 
								 		$name = $data['name'];		 
								 		$last = $data['last'];		 
								 		$nbre = $data['nbre'];		 
								 	    
							 	echo 'ID: '. $id .' name : ' .$name.' '.$last .' Nbre soins: '. $nbre. '<br>'; 
							 
							
							 
						 }
							        							            							         

?>
		  