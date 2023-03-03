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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.jpg">
    <title>Reservation Affichage</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	 <!-- Bootstrap Core CSS -->
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
	<link href="../plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
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
	    <!-- icheck -->
    <script src="../plugins/bower_components/icheck/icheck.min.js"></script>
    <script src="../plugins/bower_components/icheck/icheck.init.js"></script>
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
                        <h3 class="box-title m-b-0">Affichage des Reservations  </h3>
                                       
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
										<li><a href="#" class="sticon ti-id-badge"><span>Affichage</span></a></li>
                                        <li><a href="reservation.php" class="sticon ti-user"><span>Reservation</span></a></li>
                                      </ul>
                                </nav>
                                <div class="content-wrap">
									<div class="panel-body">
								<form name="f2" method="get" action="reservation_all.php" >
								<div class="row">
								<div class="col-md-3">                        
                               <div class="example">
                                 <label class="control-label">Choose The Date</label>
                                 <div class="input-group">
                     <input type="text" name="date" class="form-control" id="datepicker-autoclose" value="<?php echo date("Y-m-d") ?>">
								<span class="input-group-addon"><i class="icon-calender"></i></span>
									   <button  type="submit" class="btn btn-success">
											<i class="fa fa-check">	</i> Find</button>
								</div>
                                </div>
							</div>
								<br><br><br><br>									
									</div>	
										</form>
										<?php
	
								if(!isset ($_GET['date']))
										{ $date_cal = date('Y-m-d' );
	
												}
												else{
											$date_cal = $_GET['date']; 
		
}
											//echo $date_cal;
										?>
                     			     <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client</th>
                                        <th>Type</th>
                                        <th>Soin</th>
                                        <th>Therapeute</th>
                                        <th>Cabine </th>
                                        <th>Date</th>
                                        <th>Start </th>
                                        <th>End</th>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Payer</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
									 <tbody>
                                   <tr>
								   <?php
								  // $date_now=date("Y-m-d");
		$sql = "SELECT *  FROM reservation where date='$date_cal' and paye='non-payer'   ";
 			 		$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_res'];								 						   				 
								 		$client = $data['id_client'];							 						   				 
							            $agent = $data['id_agent'];
							            $cabine = $data['id_cabine'];							            
							            $soin = $data['id_soin'];
							            $type = $data['type_soin'];
							 			$date = $data['date'];
							            $start = $data['start_time'];
							            $end = $data['endtime'];
							          	$status = $data['status'];
							            $note = $data['note'];
							            $paye = $data['paye'];
							         							            							         
?>
										<td><?php echo $id ;?></td>
										<td><?php                             
						$sql0 = "SELECT c.id_client,c.name,c.room ,c.last ,r.id_client FROM client c,reservation r where r.id_client=c.id_client and r.id_client=$client  ";
 							
 										$req0= mysql_query ($sql0) ;
											$number0=mysql_num_rows($req0);
											while($data0= mysql_fetch_array($req0))
 								     {		
								 		$id0 = $data0['id_client']; 								 		
							            $name = $data0['name'];
							            $last = $data0['last'];
							            $room = $data0['room'];
										 ?>							  	  
										  <?php } 
											echo ucfirst($name.' '.$last) ;
											?>	</td>	
									   <td><?php echo ucfirst($type) ;?></td>
										<td>  
										 <?php                             
							 	$sql1 = "SELECT s.id_soin,s.nom ,r.id_soin FROM soins s,reservation r where r.id_soin=s.id_soin and r.id_soin=$soin  "; 							
 										$req1= mysql_query ($sql1) ;
											$number1=mysql_num_rows($req1);
											while($data1= mysql_fetch_array($req1))
 								     {		
								 		$id1 = $data1['id_soin']; 								 		
							            $nom_soin = $data1['nom'];
										 ?>							  	  
										  <?php } 
											echo ucfirst($nom_soin) ;
											?>	
										 </td>
																						
										<td><?php                             
						$sql2 = "SELECT a.id_agent,a.nom ,r.id_agent FROM agent a,reservation r where r.id_agent=a.id_agent and r.id_agent=$agent  ";
 							
 										$req2= mysql_query ($sql2) ;
											$number2=mysql_num_rows($req2);
											while($data2= mysql_fetch_array($req2))
 								     {		
								 		$id2 = $data2['id_agent']; 								 		
							            $nom_agent = $data2['nom'];
							            
										 ?>							  	  
										  <?php } 
											echo ucfirst($nom_agent) ;
											?></td>
										<td>
									   <?php                             
				$sql3 = "SELECT c.id_cabine,c.name ,r.id_cabine FROM cabine c,reservation r where r.id_cabine=c.id_cabine and r.id_cabine=$cabine  ";
 							
 										$req3= mysql_query ($sql3) ;
											$number3=mysql_num_rows($req3);
											while($data3= mysql_fetch_array($req3))
 								     {		
								 		$id2 = $data3['id_cabine']; 								 		
							            $nom_cabine = $data3['name'];
							            
										 ?>							  	  
										  <?php } 
											echo ucfirst($nom_cabine) ;
											?>
									   </td>
									    <td><?php echo ucfirst($date) ;?></td>
										<td class="text-center"><i class="fa fa-clock-o"><?php  $starth=date("H:i", strtotime($start)); echo $starth ;?></td>
										<td class="text-center"><i class="fa fa-clock-o"> 
											<?php  $endh=date("H:i", strtotime($end)); echo $endh ;?></td>
										<td> <?php echo $room ;?> </td>
									    <?php if ($status=="confirmer") {
									echo '<td><div class="label label-table label-success">'.ucfirst($status).'</div></td>';							 }
							    else if ($status=="en attente") { echo '<td><div class="label label-table label-info">'.ucfirst($status).'</div></td>';} 
							 else 
								  { echo '<td><div class="label label-table label-danger">'.ucfirst($status).'</div></td>'; }
							
							             ?>
									   <td>									  
									   
									   	<?php if ($paye=="non-payer") { ?>
						 <div class="label label-table label-danger "><?php echo ucfirst($paye);?></div>	
						  <a  href="update_paye.php?id=<?php echo $id;?>">
							<button type="button"  class="btn btn-sm btn-danger-outline" data-toggle="tooltip" data-original-title="Non-Payer">
							  <i class="ti-check-box" aria-hidden="true" disabled></i>
							  </button>
								 </a>
						 	
										   
							<?php } else 
							 
					 { ?> <div class="label label-table label-success "><?php echo ucfirst($paye);?></div> 
					<a  href="update_paye.php?id=<?php echo $id;?>"> <button type="button"  class="btn btn-sm btn-default disabled" data-toggle="tooltip" data-original-title=" Déja Payer"></a><i class="ti-check-box" aria-hidden="true"></i></button> 
										   
										   <?php } ?>
										   
					
						</td>
									   
									   </td>
																	
							                                                       
										<td><?php echo ucfirst($note) ;?></td>
									<td> 											
								 <div class="btn-group m-r-10 " >												
                                    <button btn btn-primary hidden-print aria-expanded="false" data-toggle="dropdown" class="btn btn-danger btn-sm dropdown-toggle waves-effect waves-light" type="button">Options <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="#"  class="sticon ti-eye">Details</a></li>
                                        <li><a href="reservation_modify.php?id=<?php echo $id ?>" class="sticon ti-pencil">Modifier </a></li>
                                        <li><a href="reservation_delete.php?id=<?php echo $id ?>" class="sticon ti-trash">Supprimer</a></li>
                                 <li><a href="annule_resv.php?id=<?php echo $id ?>" class="sticon ti-eraser">Annuler Resv</a></li>
                                    </ul>
                                </div>
										</td>
																				
                                    </tr>
                                  
                        <?php    				
						 } 
                                       
?>                          </tbody>
                            </table>
                        </div>                   
               
									</div>
                                   
                                </div>
                                <!-- /content -->
                            </div>
                            <!-- /tabs -->
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
                    if (currentOrder[0] === 2 && currentOrder[1] === 'desc') {
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
			,"order": [[0, "desc" ]]
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