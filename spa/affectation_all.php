<!DOCTYPE html> 
<?php  include('config_local.php'); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.jpg">
    <title>Affectation Affichage</title> 
	 <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
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
                    <h4 class="page-title">Affectation</h4> </div>
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
                        <h3 class="box-title m-b-0">Affectation de planning Journaliere Cabine To Therapeute </h3>
                                          <br>
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        <li><a href="affectation.php" class="sticon ti-user"><span>Affectation</span></a></li>
                                        <li><a href="affectation_all.php" class="sticon ti-id-badge"><span>Affichage</span></a></li>
										<li><a href="#" class="sticon ti-notepad"><span>Update</span></a></li>               
                                    </ul>
                                </nav>
                                <div class="content-wrap"><br>
									<?php $error='';if(isset($_GET['error1']))$error=$_GET['error1'];
										if($error=='2'){ ?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								La Suppression,est faite,Merci! 
								</div>      
										<?php } ?>
							<?php $error='';if(isset($_GET['error1']))$error=$_GET['error1'];
										if($error=='3'){ ?>
                            <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Modification,est faite,Merci! 
								</div>      
										<?php } ?>
								<?php $error='';if(isset($_GET['error1']))$error=$_GET['error1'];
										if($error=='1'){ 
									
									?>
									
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Probléme de suppression,Vérifier de les reservations,Merci! 
								</div>      
										<?php } ?>
									<form name="f2" method="get" action="affectation_all.php" >
										<div class="row">
								<div class="col-md-3">                        
                               <div class="example">
								<?php	
								if(!isset ($_GET['date']))
										{ $date_cal = date('Y-m-d' );
	
												}
												else{
											$date_cal = $_GET['date']; 
		
}
											//echo $date_cal;
										?>
                                 <label class="control-label">Choose The Date</label>
                                 <div class="input-group">
  <input type="text" name="date" class="form-control" id="datepicker-autoclose" value="<?php echo date('Y-m-d',strtotime($date_cal)) ?>">
								<span class="input-group-addon"><i class="icon-calender"></i></span>
									   <button  type="submit" class="btn btn-success">
											<i class="fa fa-check">	</i>Find</button>
								</div>
                                </div>
							</div>
								<br><br><br><br>									
									</div>
									</form>
					
                                      <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Therapeute</th>
                                        <th>Cabine Name</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Disponibilité</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
									 <tbody>
                                   <tr>
                                  <?php

		$sql = "SELECT * FROM affectation where date='$date_cal'  ";
 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_affectation'];							 						   				 
							            $agent = $data['id_agent'];
							            $cabine = $data['id_cabine'];
							            $date = $data['date'];
							            $start = $data['start_time'];
							            $end = $data['end_time'];
							            $status = $data['status'];
							            $note = $data['note'];
							         							            							         
?>
										<td><?php echo ucfirst($id) ;?></td>
										<td>                     
										<?php                             
						$sql2 = "SELECT a.id_agent,a.nom ,r.id_agent FROM agent a,affectation r where r.id_agent=a.id_agent and a.id_agent=$agent  ";
 							
 										$req2= mysql_query ($sql2) ;
											$number2=mysql_num_rows($req2);
											while($data2= mysql_fetch_array($req2))
 								     {		
								 		$id2 = $data2['id_agent']; 								 		
							            $nom_agent = $data2['nom'];
							            
										 ?>							  	  
										  <?php } 
											echo ucfirst($nom_agent) ;
											?>
									   </td>
										<td>
											<?php
	$sql3 = "SELECT * FROM cabine a,affectation r where r.id_cabine=a.id_cabine and a.id_cabine=$cabine  ";
 							
 										$req3= mysql_query ($sql3) ;
											
											while($data2= mysql_fetch_array($req3))
 								     {		
								 		$idca = $data2['id_cabine']; 								 		
							            $nom_cabine = $data2['name'];
							            
										 							  	  
										 } 
											echo ucfirst($nom_cabine) ;
											?>
									   </td>
									   </td>
									    <td>											
										<?php echo ucfirst($date) ;?></td>
										<td class="text-center"><i class="fa fa-clock-o"> <?php echo ucfirst($start) ;?></td>
										<td> <i class="fa fa-clock-o"> <?php echo ucfirst($end) ;?></td>
									    <?php if ($status=="Oui") {
										 echo '<td><div class="label label-table label-success">'.ucfirst($status).'</div></td>';							 }
							             else { echo '<td><div class="label label-table label-danger">'.ucfirst($status).'</div></td>';}
							 
							                                                        ?>
										<td><?php echo ucfirst($note) ;?></td>
										<td> 
					<a href="affectation_modify.php?id=<?php echo $id;?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
               <a href="affectation_delete.php?id=<?php echo $id;?>&date=<?php echo $date_cal;?>&agent=<?php echo $agent ?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
								</td>										
                                    </tr>
                                  
                        <?php    				
						 } 
                                       
?>                          </tbody>
                            </table>
                        </div>             
                               
                                </div>
                                <!-- /content -->
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
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>