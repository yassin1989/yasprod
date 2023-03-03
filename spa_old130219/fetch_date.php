<?php
 include('config_local.php'); 
 //include('config_opera.php');	

session_start();

if(!isset ($_GET['d']))
		 { $lad = date('Y-m-d' );
	
		 }
else{
	$lad = $_GET['d']; 
		
}
$soin=$_GET['s']; //echo $soin.$lad;
?>
            <div class="col-md-6">
                                                <div class="form-group">
                      <label class="control-label">Therapeute</label>
                       <select class="form-control" name="agent" id="agent">
                                <?php					  
	     //$sql2 = "SELECT distinct agent.id_agent ,agent.nom  from agent,reservation where agent.nom not in( SELECT DISTINCT agent.nom from agent,reservation where reservation.id_agent=agent.id_agent and (reservation.start_time <='$lad' and reservation.endtime >='$lad'))";
		$sql2="select distinct a.id_agent,a.nom from agent a, aff_agent b,soins c where a.id_agent=b.id_agent and b.id_soin='$soin' and a.id_agent not in (select id_agent from reservation where start_time <= '$lad' and endtime >= '$lad')";
 			 			$req2= mysql_query ($sql2) ;
						$number=mysql_num_rows($req2);
						 while($data= mysql_fetch_array($req2)) 
 								 {		
								 		$ida = $data['id_agent'];									 
							            $nom = $data['nom'];							     
							        							            							         
?>
            <option value="<?php echo $ida ;?>"><?php echo ucfirst($nom) ;?></option>
                          <?php    				
						 } 
                                       
?>	
                                                       
                             </select> 									
											  	  </div>
                                            </div>											

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Cabine & Type</label>
                      <select class="form-control" name="cabine" id="cabine">						 
                                   <?php
		 $sql = "select distinct a.id_cabine,a.name,a.type from cabine a, aff_soin b where a.id_cabine=b.id_cabine and b.id_soin='$soin' and b.id_cabine not in (select id_cabine from reservation where start_time <= '$lad' and endtime >= '$lad')";
			 			
 						$req= mysql_query ($sql) ;
						$number2=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 						  {		
								 		$id = $data['id_cabine'];								 						   				 
							            $nomc = $data['name'];
							            $type = $data['type'];
							        
							
?>
           <option value="<?php echo $id ;?>" ><?php echo ucfirst($nomc).'--> '.($type) ;?></option>
                          <?php    				
						 
						 }  
                                       
?>	
                              						
                         </select> 
													
												 </div>
                                            </div>
			
<?php	
 exit;

?>