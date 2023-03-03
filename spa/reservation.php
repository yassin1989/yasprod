<!DOCTYPE html> 
<?php
include('config_local.php'); 
include('config_opera.php');	
session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
}
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
		<script>
			
			function checkVar(frm){
			//alert(document.getElementsByName['cabine'].value);	
  if(typeof document.f1.cabine !== 'undefined') {
	  
    return true;
  }
  else {
	
    alert("Cliquer sur le Bouton Check SVP !!");
    return false;
  }
}
		function fetch_date(str) {

    if (str == "") {
  var element = document.getElementById('dof2');
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
			var element = document.getElementById('dof2');
			element.style.display = 'block'; 
                document.getElementById("dof2").innerHTML = this.responseText;
				// document.getElementById("demo-select2-2").innerHTML='<option value="" disabled="disabled" selected="selected">S&eacute;l&eacute;ctionner bien *</option>';
				 document.getElementById("dof2").innerHTML=response;
				
            }
        };
		var x = document.getElementById("datepicker-autoclose").value +" "+ document.getElementById("time").value;
                document.getElementById("dof2").innerHTML = x;		
		var y = document.getElementById("soin").value; 
		  document.getElementById("dof2").innerHTML = y;	
		
        xmlhttp.open("GET","fetch_date.php?q="+str,true);
        xmlhttp.open("GET","fetch_date.php?d="+x+"&s="+y,true);        
        //xmlhttp.open("GET","fetch_date.php?s="+y,true);        
        xmlhttp.send();
        xmlhttp.send("date="+x);
        xmlhttp.send("soin="+y); 
        
		
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
	   <link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
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
                                        <li><a href="#section-bar-1" class="sticon ti-user"><span>Reservation</span></a></li>
                                        <li><a href="reservation_all.php" class="sticon ti-id-badge"><span>Affichage</span></a></li>
								                                       
                                    </ul>
                                </nav>
								 <?php
									if(!isset ($_GET['rev']))
										{ $idcl =1 ;
	
												}
												else{
											$idcl =$_GET['rev']; 		
}
									if(!isset ($_GET['f']))
										{ $end = date('H:i' );
										  $day = date('Y-m-d' );	
												}
												else{
											$end = $_GET['f']; 
											$day=$_GET['f'];
}
											//echo $end;
										?>
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
                                <form method="post" name="f1" action="insert_resv.php" onSubmit="return checkVar(this)">
                                    <div class="form-body">
										<div class="row">
											
										<form name="f2" method="get" action="reservation.php" >
							<div class="col-md-3">                        
                               <div class="example">
                                 <label class="control-label">Date</label>
                                 <div class="input-group">
                <input type="text" name="date" class="form-control" id="datepicker-autoclose" value="<?php echo date('Y-m-d',strtotime($day)) ?>" required>
								<span class="input-group-addon"><i class="icon-calender"></i></span> 
								</div>
                                </div>
							</div>
											
								 <div class="col-md-3">											   
                                  <div class="form-group">
                                      <label class="control-label">Start Time </label>			
							
                                   <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
           <input type="text" class="form-control" id="time" name="time" value="<?php echo date('H:i',strtotime($end)) ?>" required > 
										    <span class="input-group-addon"> 
											   <span class="glyphicon glyphicon-time"></span> 
										    </span>
											  &nbsp;&nbsp;
											  </form>
											
										<button onclick="fetch_date(this.value);" value="find" type="button" class="btn waves-effect waves-light btn-success"  >Check disponibilty</button></a>
											
                                           </div>
									  </div>											   
                                    </div>	
										
									   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label"> Reservation Client From</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="radio" id="radio1" value="interne" checked>
                                                                <label for="radio1">Opera</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="radio" id="radio2" value="externe">
                                                                <label for="radio2">Externe</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
										
                                            </div>
									<div class="col-md-3">
										
                                                <div class="Box" style="display:none">
                                                    <label class="control-label">Client From Opera</label>
                                                    <select class="form-control select2 " name="client_opera"  onchange="fetch_bcadd2(this.value);" >
				 <option value="">Select Room</option>
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
     <option value="<?php echo $idgues ;?>"><?php echo $first.' '.$room ;?></option>
																
<?php	 

  }      									     
oci_free_statement($stid);
oci_close($c);
?> 						
                                                                                                             
                                                    </select>
												
										</div>
                                   </div>
										
											<div class="col-md-12 Box" style="display:none">
											 <div id="dof">
																								 
											</div>
											</div>
										</div>
										<div class="row">
										  <div class="col-md-3  Box2">
                                                <div class="form-group">
                                                    <label class="control-label ">Client SPA</label>
                      <select class="form-control select2" name="client_externe">
                                <?php
		         $sql = "SELECT id_client,name,last FROM client  "; 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_client'];		 
								 	    $name = $data['name'];
								 	    $last = $data['last'];
							        							            							         
?>       <option value='<?php echo $id?>' <?php if($id== $idcl){?> selected <?php } ?>><?php echo $name .' '.$last ;?>
                             
						  
						  </option>
                          <?php    				
						 } 
                                       
?>	                 </select>																				  
											  </div>
                                            </div>
											   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Type de Soin</label>
                                                    <select class="form-control" name="types">
                                                        <option value="Soin à la carte" selected>Soin à la carte</option>  
														<option value="Infiniment Detox">Infiniment Détox</option>
														<option value="Lumière de La Badira">Lumière de La Badira</option>
														<option value="Silhouette Exquise">Silhouette Exquise</option>
														<option value="Douceur Futur Maman">Douceur Futur Maman</option>
														<option value="Échappée Saveurs & Bien-être">Échappée Saveurs & Bien-être</option>
														<option value="Soin Signature Clarins à Hammamet">Soin Signature Clarins à Hammamet</option>
                                                        <option value="Pause relax a deux">Pause relax a deux</option>
                                                        <option value="Mise en Beauté" >Mise en Beauté</option>
                                                        <option value="Spa Evasion" >Spa Evasion</option>
														<option value="Signature Clarins" >Signature Clarins</option>
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
                         <select class="form-control select2" name="soin" id="soin">
                                <?php
		         $sql = "SELECT id_soin,nom FROM soins  ";
 			 		$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_soin']; 
								 	    $name = $data['nom'];
							        							            							         
?>
                             <option value="<?php echo $id ;?>"><?php echo ucfirst($name) ;?></option>
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
                                                        <option value="non" selected>Non</option>
                                                    </select>
													<span class="help-block"></span> </div>
                                            </div>
											   <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Health Problem</label>
                                                    <select class="form-control" name="health">
                                                        <option value="yes">Yes</option>
                                                        <option value="no" selected>No</option>                                                                                               
                                                    </select>
													<span class="help-block"></span> 
												   </div>
                                            </div>
										</div>
										
                                        <div class="row ">
											<div class="col-md-12">
												<div id="dof2">																					 
												</div>	
											

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Statuts de la réservation</label>
                                                    <select class="form-control" name="status">
                                                        <option value="confirmer">Confirmer</option>
                                                        <option value="en attente">En attente</option>
                                                    </select>
													<span class="help-block"></span> </div>
                                            </div>
                                             <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Payement</label>
                                                    <select class="form-control" name="paye" required>
														<option value="non-payer" selected>Non Payé</option> 
                                                        <option value="Payer">Payé</option>
                                                        <option value="Offer">Offer</option>                                                                                                      
                                                     </select> 
										 </div>
                                          </div>
                                    		 <div class="col-md-2">
										     <div class="form-group">
												 <label class="control-label">Note</label>
												<textarea id="textarea" name="note" class="form-control form-control-line" rows="5" style="margin-top: 0px; margin-bottom: 0px; height: 120px;"  ></textarea>
											</div>
											</div> 
												
									<div class="form-actions">
                                        <button name='save' type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                  
                                    </div>
                                    </div>
                                    
                                </form>                                
                                 </div>
                                                                  
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
                                                      $(".Box2").show('slow');
                                                      
                                                             }
                                                   if($(this).attr("value")=="interne"){
                                                   $(".Box").show('slow');
													  $(".Box2").hide('slow');
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
  <script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <!--Style Switcher -->
  <script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
    });
    </script>
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>