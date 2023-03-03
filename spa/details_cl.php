<!DOCTYPE html>  
<html lang="en">
<?php
include('config_local.php'); 
include('config_opera.php');	
session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
}
?>
			<script>
function testa4(val)
{ var x=val;
 $.ajax({
 type: 'post',
 url: 'testa.php',
 data: {
  get_option:"m"+val
 },
 success: function (response) {
 //alert(x);
 sessionStorage.setItem("leid",x);
//alert(sessionStorage.getItem("leid"));
 // document.getElementById("lagentLoc").innerHTML=response; 
 }
 });
}
</script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Client details</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 	<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
   
}
  function myFunction2() {
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
   
}
		
	</script>
</head>

	
<?php
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Details page</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Détail</a>
                    <?php echo breadcrumbs(); ?>
                </div>
            </div>
            <!-- /.row -->
				   <?php
								if(!isset ($_GET['id']))
										{ $idc =1 ;
	
												}
												else{
											$idc =$_GET['id']; 
		
}
											//echo $date_cal;
										?>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box printableArea">
						                                <?php
		         $sql = "SELECT *  FROM client where id_client=$idc   "; 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_client'];		 
								 	    $name = $data['name'];
								 	    $last = $data['last'];
							 			$birth= $data['birth'];
							 			$phone= $data['phone'];
							 			$email= $data['email'];
							 			$inscrit= $data['date_ajout'];
							        							            							         
?>
                        <h3><b><?php echo strtoupper( $name.' '.$last)  ;?></b> <span class="pull-right">#ID-GUEST : <?php echo $id  ;?></span></h3>
                        <hr>				
						 
                          <?php    				
						 } 
                                       
?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left"> 
				  <address>
                  <h4> &nbsp;<b class="text-danger">N°Phone : <?php echo $phone ?></b></h4>
                  <h4 class="font-bold">E-mail: <?php echo $email ?></h4>
					<h4><b>Birthdate :</b> <i class="fa fa-calendar"></i> <?php $birthd=date("d-m-Y", strtotime($birth));echo $birthd ?> </h4>
                  </address>
								</div>
								
                                <div class="pull-right text-right">
				<address>
                 <p><b>Date Inscrit :</b> <i class="fa fa-calendar"></i> <?php $dinscrit=date("d-m-Y", strtotime($inscrit)); echo $dinscrit ?></p>
                  
					
				 <?php
		         $sql2 = "SELECT * FROM reservation  WHERE id_client ='$id'  ORDER BY id_res DESC LIMIT 1   "; 			
 						$req2= mysql_query ($sql2) ;
						
						 while($data= mysql_fetch_array($req2)) 
 								 {
							 $lastvisit=$data ['date'];
								 	
							        							            							         
					?>	<p><b>Last Reservation :</b> <i class="fa fa-calendar"> <?php echo $lastvisit ?> </i> </p>				
						 
                          <?php    				
						 } 
                                       
?>
			 <?php
		         $sql3 = "SELECT * FROM reservation  WHERE id_client ='$id' and status='confirmer'    "; 			
 						$req3= mysql_query ($sql3) ;
						$nbr=mysql_num_rows($req3);
						 
								 	
				
		         $sql4 = "SELECT * FROM reservation  WHERE id_client ='$id' and status='annuler'    "; 			
 						$req4= mysql_query ($sql4) ;
						$ann=mysql_num_rows($req4);							 	
							        							            							         
					?>	        							            							         
			
					<a href="#"  onclick="myFunction()"  ><p><b>Nombre d'annulation :</b> <i class="fa fa-times"> <?php echo $ann ?> </i></a>
					<a href="#"  onclick="myFunction2()"  >	<p><b>Nombre Soins Confirmer :</b> <i class="fa fa-check"> <?php echo $nbr ?> </i> </a>				
					
                  </address> </div>
                            </div>
                            <div class="col-md-12">
								
		
                           <div id="myDIV">     
							   <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table color-bordered-table red-bordered-table" id="prinTable" >
					
                                        <thead>			
				
                                            <tr>
                                                <th class="text-center">#ID RESV</th>
                                                <th class="text-center">Soin</th>
                                                <th class="text-center">Prix</th>
                                                <th class="text-right">Date Resvation</th>
                                                <th class="text-right">Date Annulation</th>
                                                <th class="text-right">Status</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
						        							            							         
					
                                            <tr>			
												<?php
		         $sql40 = "SELECT * FROM reservation  WHERE id_client ='$id' and status='annuler'    "; 			
 						$req40= mysql_query ($sql40) ;
						$ann=mysql_num_rows($req40);
					while($data= mysql_fetch_array($req40)) 
 								 {		
								 		$id_res = $data['id_res'];								 						   				 
								 		$soin = $data['id_soin'];
								 		$daterev = $data['date'];
								 		$datean = $data['date_modif'];						
								 		$status = $data['status'];						
				?>
                                                <td class="text-center"><?php echo $id_res ?></td>
                                                <td>
													 <?php                             
							 	$sql11 = "SELECT * FROM soins s,reservation r where  r.id_client ='$id' and r.status='annuler' and r.id_soin=s.id_soin and r.id_soin=$soin  "; 							
 										$req11= mysql_query ($sql11) ;
											$number11=mysql_num_rows($req11);
											while($data1= mysql_fetch_array($req11))
 								     {		
								 		$id1 = $data1['id_soin']; 								 		
							            $nom_soin = $data1['nom'];
							            $prix = $data1['prix'];
										 ?>							  	  
										  <?php }
							                 if ($nom_soin=="")
											 { echo "pas de soin";}
							 				else
											{echo ucfirst($nom_soin) ;}
											
											?>
												</td>
												<td class="text-center"><?php echo $prix ?> </td>
                                                <td class="text-right"><?php   $date_resv=date("d-m-Y", strtotime($daterev));echo $date_resv ?> </td>
                                                <td class="text-right"> <?php   $date_ann=date("d-m-Y", strtotime($datean));echo $date_ann ?></td>
                                                <td class="text-right"> <?php echo $status ?></td>
                                                
                                            </tr>
                                       <?php  } ?>
                                        </tbody>
                                    </table>
								   
							   </div> 
								
								
								 
								</div>
								<div id="myDIV2">  
							  <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table color-bordered-table success-bordered-table" id="prinTable" >
					
                                        <thead>			
				
                                            <tr>
                                                <th class="text-center">#ID RESV</th>
                                                <th class="text-center">Soin</th>
                                                <th class="text-center">Prix</th>
                                                <th class="text-right">Date Soins</th>
                                                <th class="text-right">Date Reservation</th>
                                                <th class="text-right">Status</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
						        							            							         
					
                                            <tr>			
												<?php
		         $sql40 = "SELECT * FROM reservation  WHERE id_client ='$id' and status='confirmer'    "; 			
 						$req40= mysql_query ($sql40) ;
						$ann=mysql_num_rows($req40);
					while($data= mysql_fetch_array($req40)) 
 								 {		
								 		$id_res = $data['id_res'];								 						   				 
								 		$soin = $data['id_soin'];
								 		$daterev = $data['date'];
								 		$datean = $data['date_modif'];						
								 		$status = $data['status'];						
				?>
                                                <td class="text-center"><?php echo $id_res ?></td>
                                                <td>
													 <?php                             
							 	$sql11 = "SELECT * FROM soins s,reservation r where  r.id_client ='$id' and r.status='confirmer' and r.id_soin=s.id_soin and r.id_soin=$soin  "; 							
 										$req11= mysql_query ($sql11) ;
											$number11=mysql_num_rows($req11);
											$nom_soin=""; $prix=0;
											while($data1= mysql_fetch_array($req11))
 								     {		
								 		$id1 = $data1['id_soin']; 								 		
							            $nom_soin = $data1['nom'];
							            $prix = $data1['prix'];
										 ?>							  	  
										  <?php }
							                 if ($nom_soin=="")
											 { echo "pas de soin";}
							 				else
											{echo ucfirst($nom_soin) ;}
											
											?>
												</td>
												<td class="text-center"><?php echo $prix ?> </td>
                                                <td class="text-right"><?php   $date_resv=date("d-m-Y", strtotime($daterev));echo $date_resv ?> </td>
                                                <td class="text-right"> <?php   $date_ann=date("d-m-Y", strtotime($datean));echo $date_ann ?></td>
                                                <td class="text-right"> <?php echo $status ?></td>
                                                
                                            </tr>
                                       <?php  } ?>
                                        </tbody>
                                    </table>
								   
							   </div> 
								
								
								</div>
									
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right m-t-30 text-right">
                                  
                                    
                                    <hr>
								<?php	
									 $sql5 = "  
	SELECT      r.id_client,  COUNT(r.id_client) AS nbre ,c.name,c.last , sum(s.prix) AS px
    FROM     reservation r ,client c , soins s  where c.id_client=r.id_client and s.id_soin=r.id_soin and r.status='confirmer' and r.id_client ='$id' GROUP BY r.id_client     ORDER BY nbre DESC   "; 	
							
 						$req5= mysql_query ($sql5) ;
									
									while($data= mysql_fetch_array($req5)) 
 								 {
							 $px=$data ['px'];
									
							
							?>
									 <h3><b> CA. Confirmé  :</b> <?php echo $px ?></h3>
								
								
									  <?php    				
						 } 
							?>
									<?php	
									 $sql5 = "  
	SELECT      r.id_client,  COUNT(r.id_client) AS nbre ,c.name,c.last , sum(s.prix) AS px
    FROM     reservation r ,client c , soins s  where c.id_client=r.id_client and s.id_soin=r.id_soin and r.status='annuler' and r.id_client ='$id' GROUP BY r.id_client     ORDER BY nbre DESC   "; 	
							
 						$req5= mysql_query ($sql5) ;
									
									while($data= mysql_fetch_array($req5)) 
 								 {
							 $px=$data ['px'];
									
							
							?>
									 <h3><b> CA. Annulation  :</b> <?php echo $px ?></h3>
								
								
									  <?php    				
						 } 
							?>
								</div>	
                                   
                                <div class="clearfix"></div>
                                <hr>
                                <div class="text-right">
                                    
                                    <button id="print" class="btn btn-danger" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <!-- /.row -->
            <?php include 'php/right-sidebar.php';?>
        </div>
        <!-- /.container-fluid -->
        <?php include 'php/footer.php';?>
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function(){
        $("#print").click(function(){
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.printableArea").printArea( options );
			
			
        });
    });
		
    </script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>