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
    <title>Annulation Rapport</title>
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
		<!-- animation CSS -->
	   <link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet">
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
                    <h4 class="page-title">Annulation Report</h4> </div>
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
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
										<li><a href="#" class="sticon ti-id-badge"><span>Statistic Annulation</span></a></li>                                        
                                      </ul>
                                </nav>
                                <div class="content-wrap">
									<div class="panel-body"><br>
								<form name="f2" method="get" action="annule_rapport.php" >
								<div class="row">
											<?php
	
								if(!isset ($_GET['start']))
										{ $st = date('Y-m-d' );
										 $ed = date('Y-m-d' );
	
												}
												else{
											$st = $_GET['start']; 
											$ed = $_GET['end']; 
		
}
											//echo $date_cal;
										?>
								<br><br><br>
									<div class="col-md-4">                        
                               <div class="example">
                                 <label class="control-label">Date Range</label>
								   <br><br>
                                 <div class="input-group">
                      	<div class="input-daterange input-group" id="date-range">
                           <input type="text" class="form-control" name="start" value="<?php echo $st  ?>" /> 
							<span class="input-group-addon bg-info b-0 text-white">To</span>
							<input type="text" class="form-control" name="end" value="<?php echo $ed ?> " /> </div>
								<button  type="submit" class="btn btn-success">
									<i class="fa fa-check">	</i>Find</button>
								</div>
                                </div>
							</div>
								<br><br><br><br><br>
									
									</div>	
										</form>								
                     			     <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
									
                                    <tr>
                                        <th>Nombre d'annulation</th>
                                        <th>C.A d'annulation</th>
                                        <th>Total Réservation</th>                                       
                                        <th>Pourcentage</th>                                     
                                                                             
                                    </tr>
                                </thead>
									 <tbody>
										 
                                   <tr>
		
										
 										
										<td><?php 

$sql2 = "select count(s.prix) as prixt from reservation r , soins s where  r.id_soin=s.id_soin and status ='annuler' and date >= '$st' and date <= '$ed'  ";
 							
												//echo $sql2 ;
												$req2= mysql_query ($sql2) ;												
									     	//$count=mysql_num_rows($req2);
											while($data2= mysql_fetch_array($req2)) 
											{		
								 					 				         
							                    $total_ann = $data2['prixt'];					            
							              						
												echo $total_ann ; 
											}
 
											?>
									   
									   </td>
										<td>
											<?php                             
	
$sql3 = "select Sum(s.prix) as prixt from reservation r , soins s where  r.id_soin=s.id_soin and status ='annuler' and date >= '$st' and date <= '$ed'  ";
 							
											 $req3= mysql_query ($sql3) ;												
									     	//$count=mysql_num_rows($req2);
											while($data= mysql_fetch_array($req3)) 
											{		
								 					 				         
							                    $sum_ann = $data['prixt']; 		            
							              						
												echo $sum_ann ; 
											}
											?>	
									    </td>	
									    <td>
											<?php 
$sql4 = "select * from reservation  where  date >= '$st' and date <= '$ed'  ";
 							
											 $req4= mysql_query ($sql4) ;												
									     	$count=mysql_num_rows($req4);
											while($data= mysql_fetch_array($req4)) 
											{		
								 					 				         
							                    $sum_ann = $data['id_res']; 		            
							              						
												//echo $sum_ann ; 
											}
											echo $count ;
											?>
											
									   
									   </td>									   
									    <td><?php 
											$pers=0;
											if ($total_ann > 0 && $count > 0){ 
											$pers=($total_ann/$count)*100;
											
											echo  number_format ($pers,2) ,'%' ; 
											  } else
												echo "Pas d'annulation";
											?>
									  
											
									   </td>						   
									  						
                                    </tr>
										 

                                  
                          </tbody>
		
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
            , format: 'Y-m-d'
        });
        jQuery('#date-range').datepicker({		
			format: 'yyyy-mm-d',
            toggleActive: true
			
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
			format: 'Y-m-d'
           , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true
            , format: 'Y-m-d h:mm A'
            , timePickerIncrement: 30
            , timePicker12Hour: true
            , timePickerSeconds: false
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'Y-m-d'
            , minDate: '06-01-2015'
            , maxDate: '06-30-2015'
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
    