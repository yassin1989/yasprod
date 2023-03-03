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
    <title>Client History</title>
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
                    <h4 class="page-title">Client History</h4> </div>
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
										<li><a href="#" class="sticon ti-id-badge"><span>Guest History</span></a></li>                                        
                                      </ul>
                                </nav>
                                <div class="content-wrap">
									<div class="panel-body"><br>
								<form name="f2" method="get" action="client_history_fact.php" >
								<div class="row">
								<div class="col-md-3">                        
                               <div class="example">
                                 <label class="control-label">Choose Guest</label>
                                 <div class="input-group">
                         <select class="form-control select2" name="guest" id="guest">
                                <?php
		         $sql = "SELECT id_client,name,last FROM client  "; 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_client'];		 
								 	    $name = $data['name'];
								 	    $last = $data['last'];
							        							            							         
?>
                             <option value="<?php echo $id ;?>"><?php echo ucfirst($name.' '.$last) ;?>							
						  </option>
                          <?php    				
						 } 
                                       
?>	
                               
                                                    </select>			
									 
								</div>
                                </div>
							</div>						<?php
	
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
								<br><br><br><br>
									<div class="col-md-4">                        
                               <div class="example">
                                 <label class="control-label">Date Range</label>
                                 <div class="input-group">
                      	<div class="input-daterange input-group" id="date-range">
                           <input type="text" class="form-control" name="start" value="<?php echo $st  ?>" /> 
							<span class="input-group-addon bg-info b-0 text-white">to</span>
							<input type="text" class="form-control" name="end" value="<?php echo $ed ?> " /> </div>
								<button  type="submit" class="btn btn-success">
									<i class="fa fa-check">	</i> Find</button>
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
                                        <th>Client</th>
                                        <th>Type</th>
                                        <th>Soin</th>
                                        <th>Prix</th>
                                        <th>Therapeute</th>
                                        <th>Cabine </th>
                                        <th>Date</th>
                                        <th>Start </th>
                                        <th>End</th>
                                        <th>Room</th>                                       
                                        <th>Payer</th>
                                        <th>Note</th>
                                     
                                    </tr>
                                </thead>
									 <tbody>
                                   <tr>
								   <?php
								if(!isset ($_GET['guest']))
										{ $idc =1 ;
	
												}
												else{
											$idc =$_GET['guest']; 
		
}
											//echo $date_cal;
										?>
									   <?php
								// $idc=$_GET['guest']; 
		$sql = "SELECT *  FROM reservation where id_client='$idc' and status='confirmer' and date >='$st' and date <= '$ed'  ";
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
							 	$sql1 = "SELECT * FROM soins s,reservation r where r.id_soin=s.id_soin and r.id_soin=$soin  "; 							
 										$req1= mysql_query ($sql1) ;
											$number1=mysql_num_rows($req1);
											while($data1= mysql_fetch_array($req1))
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
										<td><?php echo $prix ;?> </td>												
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
									
									   <td>									  
												<?php echo ucfirst($paye);?></div> 
									 </td>
									   										                                         
										<td><?php echo ucfirst($note) ;?></td>
																			
                                    </tr>
                                  
                        <?php    				
						 } 
                                       
?>                          </tbody>
									 <tfoot>
            <tr>
                <td colspan="4" style="text-align:right">Total:</td>
                <th></th>
            </tr>
        </tfoot>
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
            
				{ extend: 'copy', footer: true },
				{ extend: 'excel', footer: true },
				{ extend: 'pdf', footer:  true ,
				title: ' Historique Facturation',
					exportOptions: {
                    columns: [ 0,1,2,3,7,8,9,4],					
					
                } },
				
				{ extend: 'print',footer: true ,
				title: ' Historique Facturation',
					exportOptions: {
                    columns: [ 0,1,2,3,7,8,9,4],					
					
                } 
				},
				  {
                extend: 'print',footer: true ,
				title: ' Historique Facturation',
                text: 'Print all',
                exportOptions: {
					columns: [ 0,1,2,3,7,8,9,4],
                    modifier: {
                        selected: null,
						
                    }
                }
            },
				                         
				
        ] ,
			select: true
			,"order": [[0, "desc" ]],
			
			
			      "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                'DT '+pageTotal +' ( '+ total  +' DT Total all Reservation)'
            );
        }
        });
    </script>
<script>

</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
  <script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
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