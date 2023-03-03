<!DOCTYPE html> 
<?php
include('config_local.php'); 
include('config_opera.php');	
session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
}
$id_resv=$_GET['id']; //echo $id_resv.'<br>' ;	
?>
<html lang="en">

<head>
	
	<script>
		function fetch_bcadd2(str) {

    if (str == "") {
  var element = document.getElementById('dof');
			element.style.display = 'none'; 
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			var element = document.getElementById('dof');
			element.style.display = 'block'; 
                document.getElementById("dof").innerHTML = this.responseText;
				// document.getElementById("demo-select2-2").innerHTML='<option value="" disabled="disabled" selected="selected">S&eacute;l&eacute;ctionner bien *</option>';
				 document.getElementById("dof").innerHTML=response;

            }
        };
        xmlhttp.open("GET","fetch_bcadd2.php?q="+str,true);
        xmlhttp.send();
		
    }
}
		
	</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.jpg">
    <title>Reservation</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	 <!-- Bootstrap Core CSS -->
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
	 <!-- Page plugins css -->
    <link href="../plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="../plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="../plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- animation CSS -->
	
    <link href="css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
  
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
                    <h4 class="page-title">Reservation</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <!-- Tabstyle start -->
                        <h3 class="box-title m-b-0">Reservation clients  </h3>
                                          
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
										<li><a href="#" class="sticon ti-user"><span>Modification</span></a></li>
                                        <li><a href="reservation.php" class="sticon ti-user"><span>Reservation</span></a></li>
                                        <li><a href="reservation_all.php" class="sticon ti-id-badge"><span>Affichage</span></a></li>
								                                       
                                    </ul>
                                </nav>
                                <div class="content-wrap" >
								<div class="panel-body">
								<?php $error='';if(isset($_GET['success']))$error=$_GET['success'];
										if($error=='1'){ ?>
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Réservation ajoutée avec succès!
								</div>      
										<?php } ?>
								<?php $error='';if(isset($_GET['error1']))$error=$_GET['error1'];
										if($error=='2'){ ?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Cette date est indisponible, Choisir une date differente,Merci! 
								</div>      
										<?php } ?>
								<?php $error='';if(isset($_GET['error2']))$error=$_GET['error2'];
										if($error=='3'){ ?>
                            <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Therapeute et/ou cabine indisponible dans cette date ! 
								</div>      
										<?php } ?>
                                <form method="post" name="f1" action="update_resv.php">
									<input type="hidden" value="<?php echo $id_resv ?>" name="leid">
                                    <div class="form-body">
										<div class="row">						
									
									<div class="col-md-3">
                                                <div class="Box" style="display:none">
                                                    <label class="control-label">Client From Opera</label>
                                                    <select class="form-control" name="client_opera"  onchange="fetch_bcadd2(this.value);" >
														 <option value="">Séléctionner le client</option>
                                                      <?php
$stid = oci_parse($c,'select GUEST_NAME_ID,ROOM,SFIRST_GUEST_NAME,SGUEST_NAME,ARRIVAL,DEPARTURE,ADULTS from OPERA.REP_RESERVATION_FIN_ALL where RESV_STATUS = :dd  AND ROOM<2000   
   AND RATE_CODE NOT IN (:cc) order by ROOM ASC') ;											

$kk="CHECKED IN";
$aa="PM/PI";
oci_bind_by_name($stid,":dd",$kk);
oci_bind_by_name($stid,":cc",$aa);

oci_execute($stid);
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    // Use the uppercase column names for the associative array indices
	$idgues= $row[0];
	$room= isset ($row[1]) ? $row [1] :"" ;
	$first= $row[2];
	$last= $row[3];
	$val5= $row[4];
	$arr= date("d/m/Y",strtotime($val5));	
	$val6= $row[5];
	$dep= date("d/m/Y",strtotime($val6));
	$adults= $row[6];

?>
     <option value="<?php echo $idgues ;?>"><?php echo ucfirst($first.' '.$last) ;?></option>
																
<?php	 

  }      									     
oci_free_statement($stid);
oci_close($c);
?> 						
                                                                                                             
                                                    </select>
												
										</div>
                                   </div>
											<div class="Box" style="display:none">
											 <div id="dof">
																								 
											</div>
											</div>
										</div>
										<div class="row">
											   <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label">Mme - Mrs</label>
                                                    <select class="form-control" name="genre">
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Mme">Mme</option>                                                 
                                                                                                              
                                                    </select>
													<span class="help-block"></span> </div>
                                            </div>
																					<?php
		         $sql00 = "SELECT distinct * FROM reservation r, client c where r.id_client= c.id_client and r.id_res='$id_resv'   "; 			
 						$req0= mysql_query ($sql00) ;
						$number=mysql_num_rows($req0);
						 while($data= mysql_fetch_array($req0)) 
 								 {		
								 		$idcl = $data['id_client'];		 
								 	    $name = $data['name'];
								 	    $last = $data['last'];
								 	    $ids = $data['id_soin'];
								 	    $ida = $data['id_agent'];
								 	    $idcab = $data['id_cabine'];
								 	    $date = $data['date'];
								 	    $start = $data['start_time'];
								 	    $end = $data['endtime'];
								 	    $status = $data['status'];
								 }
								 	  
							        							            							         
?>
										  <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Client Spa</label>
                      <select class="form-control" name="client_externe">
                                <?php
		         $sql = "SELECT distinct * FROM  client   "; 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$idc = $data['id_client'];		 
								 	    $name = $data['name'];
								 	    $last = $data['last'];
								
								 	  
							        							            							         
?>
                             <option value='<?php echo $idc?>' <?php if($idc== $idcl){?> selected <?php } ?>><?php echo $name .' '.$last ;?>							
						  </option>
                          <?php    				
						 } 
                                       
?>	
                               
                                                    </select> 																							  
											  </div>
                                            </div>
											<div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Type de Soin</label>
                                                    <select class="form-control" name="types">
                                                        <option value="Soin à la carte" selected>Soin à la carte</option>                 <option value="Detox">Detox</option>
                                                        <option value="Pause relax a deux">Pause relax a deux</option>
                                                        <option value="Mise en Beauté" >Mise en Beauté</option>
                                                        <option value="Spa Evasion" >Spa Evasion</option>
                                                        <option value="Cérimonie Privilige" >Cérimonie Privilige</option>
                                                        <option value="Cérimonie Imperiale" >Cérimonie Imperiale</option>
                                                        <option value="Cure detente 3j" >Cure detente 3 jours</option>
                                                        <option value="Cure detente 4j" >Cure detente 4 jours</option>
                                                        <option value="Cure detente 6j" >Cure detente 6 jours</option>
                                                        <option value="Cure Bien-etre 2j" >Cure Bien-etre 2 jours</option>
                                                        <option value="Cure Bien-etre 3j" >Cure Bien-etre 3 jours</option>
                                                        <option value="Cure Bien-etre 4j" >Cure Bien-etre 4 jours</option>
                                                        <option value="Cure Bien-etre 6j" >Cure Bien-etre 6 jours</option>
                                                        <option value="Cure Minceur 4j" >Cure Minceuer 4 jours</option>
                                                        <option value="Cure Minceur 6j" >Cure Minceuer 6 jours</option>
                                                        
                                                    </select>
													<span class="help-block"></span> </div>
                                            </div>
	
											  <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Nom de Soin</label>
                         <select class="form-control" name="soin">
                                <?php
		         $sql = "SELECT id_soin,nom FROM soins  ";
 			 		$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_soin']; 
								 	    $name = $data['nom'];
							        							            							         
?>
                             <option value='<?php echo $id?>' <?php if($id== $ids){?> selected <?php } ?>><?php echo $name?> 
                          <?php    				
						 } 
                                       
?>	
                                   </select> 																							  
											  </div>
                                            </div>
											   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Demande Speciale</label>
                                                    <select class="form-control" name="demande">
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>                                                                                                      
                                                    </select>
													<span class="help-block"></span> </div>
                                            </div>
											   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Health Problem</label>
                                                    <select class="form-control" name="health">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>                                                  
                                                                                                              
                                                    </select>
													<span class="help-block"></span> </div>
                                            </div>
										</div>
										
                                        <div class="row">
										  <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Therapeute</label>
                                                    <select class="form-control" name="agent">
                                <?php
		$sql = "SELECT id_agent,nom,specialty,niveau,conge,phone,score FROM agent  ";
 			 			$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_agent'];									 
							            $nom = $data['nom'];
							            $spec = $data['specialty'];
							        							            							         
?>
                             <option value='<?php echo $id?>' <?php if($id== $ida){?> selected <?php } ?>><?php echo $nom?>
                          <?php    				
						 } 
                                       
?>	
                                                       
                                                    </select> 									
											  
											  </div>
                                            </div>
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Cabine Name & Type</label>
                      <select class="form-control" name="cabine">
                                   <?php
	         	$sql = "SELECT id_cabine,name,type,status,special FROM cabine  ";
 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_cabine'];								 						   				 
							            $nom = $data['name'];
							            $type = $data['type'];
							           
?>                      <option value='<?php echo $id?>' <?php if($id== $idcab){?> selected <?php } ?>><?php echo ($nom).'--> '.($type)?>
                        
                          <?php    				
						 } 
                                       
?>	
                              						
                                  					 </select> 
													
												 </div>
                                            </div>
                                            <!--/span-->
                                        
									<div class="col-md-3">                        
                               			 <div class="example">
                                            <label class="control-label">Date</label>
                                            	<div class="input-group">
                           <input type="text" name="date" class="form-control" id="datepicker-autoclose" value="<?php echo $date; ?>">
											<span class="input-group-addon"><i class="icon-calender"></i></span> 
									  		</div>
                                </div>
											</div>
										   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Start Time </label>
                                     <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" name="time" value="<?php echo date('H:i',strtotime($start)) ?>"> 
										<span class="input-group-addon"> 
											<span class="glyphicon glyphicon-time"></span> 
										</span>
                                </div>
									  </div>
                                            </div>
											   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">End Time </label>
                                     <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" name="end" value="<?php echo date('H:i',strtotime($end)) ?>"> 
										<span class="input-group-addon"> 
											<span class="glyphicon glyphicon-time"></span> 
										</span>
                                </div>
									  </div>
                                            </div>
										
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Statuts de la réservation</label>
                                                    <select class="form-control" name="status">                           		
														<option value="confirmer">Confirmer</option>
                                                        <option value="en attente">En attente</option>
                                                        <option value="Annuler">Annuler</option>
												</select>
													<span class="help-block">Status de la réservation </span> </div>
                                            </div>
                                             <div class="col-md-2">
                                                <div class="form-group">
                                                  <label class="control-label">Payement</label>
                                                    <select class="form-control" name="paye" >
														<option value="non-payer" selected>Non Payer</option> 
                                                        <option value="payer">Payer</option>
                                                        <option value="offer">Offer</option>                                                                                                      
                                                     </select> 
										 </div>
                                          </div>
                                    		 <div class="col-md-3">
										     <div class="form-group">
												                                 <?php
		         $sql = "SELECT * FROM reservation  where  id_res='$id_resv'  "; 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 								
								 	    $note = $data['note'];
						 }
							        							            							         
?>
												 <label class="control-label">Note</label>
												<textarea name="note" class="form-control form-control-line" rows="5" style="margin-top: 0px; margin-bottom: 0px; height: 120px;"> <?php echo $note ?></textarea>
											</div>
											</div>                                   
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>                                 
                                 
                                </div>
                                <!-- /content -->
                            </div>
                            <!-- /tabs -->
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
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
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/cbpFWTabs.js"></script>
    <script type="text/javascript">
        (function () {
                [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                    }
          ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    </script>
	<script >
											$('input[type="radio"]').click(function(){
                                               if($(this).attr("value")=="externe"){
                                                      $(".Box").hide('slow');
                                                             }
                                                   if($(this).attr("value")=="interne"){
                                                   $(".Box").show('slow');

                                                                  }        
                                                                             });
                                            $('input[type="radio"]').trigger('click');
											</script>
<!-- Clock Plugin JavaScript -->
    <script src="../plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="../plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom'
            , align: 'left'
            , autoclose: true
            , 'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done'
        , }).find('input').change(function () {
            console.log(this.value);
        });
        $('#check-minutes').click(function (e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
        // Colorpicker
        $(".colorpicker").asColorPicker();
        $(".complex-colorpicker").asColorPicker({
            mode: 'complex'
        });
        $(".gradient-colorpicker").asColorPicker({
            mode: 'gradient'
        });
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true
            , todayHighlight: true
			 ,timePicker: true
            , format: 'yyyy-mm-dd'
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true
            , format: 'YYYY/DD/MM h:mm A'
            , timePickerIncrement: 30
            , timePicker12Hour: true
            , timePickerSeconds: false
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'YYYY/DD/MM'
            , minDate: '06/01/2015'
            , maxDate: '06/30/2015'
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
            , dateLimit: {
                days: 6
            }
        });
    </script>   
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>