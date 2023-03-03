<?php
 include('config_local.php'); 
 include('config_opera.php');	

session_start();

if(!isset ($_GET['d']))
		 { $lad = date('Y-m-d' );
	
		 }
else{
	$lad = $_GET['d']; 
		
}
$soin=$_GET['s']; //echo $soin.$lad;
?>
         				   <div class="col-md-2">
                                                <div class="form-group">
                      <label class="control-label">Therapeute </label>
                       <select class="form-control" name="agent" id="agent" required>
                                <?php					  
	   	$sql3 = "SELECT * FROM soins where id_soin=$soin  "; 							
 										$req3= mysql_query ($sql3) ;
											$number3=mysql_num_rows($req3);
											while($data3= mysql_fetch_array($req3)) 
 								{		
								 		$id = $data3['id_soin'];
								 		$duree = $data3['duree'];
											
								}	
		              //	echo $duree .'---' ;
				    $end_soin=date("Y-m-d H:i:s", strtotime($lad));				
				    $debut_res=date("Y-m-d H:i:s", strtotime($lad));				
				    $commence=date("Y-m-d", strtotime($lad)); //echo 'start:'.$commence.'<br>';			
					$minutes_to_add = $duree;
					$time = new DateTime($end_soin);
					$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));						   
					$fini = $time->format('Y-m-d H:i:s');						   
					$debut_time=date("H:i", strtotime($lad));
					$fin_time=date("H:i", strtotime($fini));										
						  
		 $sql2=" select distinct a.id_agent,a.nom from agent a, aff_agent b,soins c ,affectation f where a.id_agent=b.id_agent and a.id_agent=f.id_agent and b.id_agent=f.id_agent and b.id_soin='$soin' and a.id_agent not in (select id_agent from reservation where start_time <= '$debut_res' and endtime >= '$debut_res' and status not like 'Annuler')and f.date='$commence' and a.id_agent in (select id_agent from agent where f.start_time <= '$debut_time' and f.end_time >= '$fin_time')" ;
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
								<span></span>
											  	  </div>
                                            </div>											

                                             <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Cabine & Type  <?php echo $fin_time ;?>	</label>
                      <select class="form-control" name="cabine" id="cabine">						 
                                   <?php
		 $sql = "select distinct a.id_cabine,a.name,a.type from cabine a, aff_soin b where a.id_cabine=b.id_cabine and b.id_soin='$soin' and b.id_cabine not in (select id_cabine from reservation where start_time <= '$lad' and endtime >= '$lad' and status not like 'Annuler')";
			 			
 					$req4= mysql_query ($sql) ;
						$number4=mysql_num_rows($req4);
						 while($data= mysql_fetch_array($req4)) 
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
									<span></span>				
												 </div>
                                            </div>
			
<?php	
 exit;

?>