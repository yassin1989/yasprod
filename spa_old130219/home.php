<!DOCTYPE html>  
<?php
include('config_local.php'); 
//include('config_opera.php');	
session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
}
 if(!isset ($_GET['date']))
		 {$lad = date('Y-m-d' );
	
		 }
else{
	$lad = $_GET['date'];
	
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.jpg">
    <title>Spa - Home</title>
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
	
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
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
                    <h4 class="page-title">Spa Home</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<form method="get" name="f1" action="home.php">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="n" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Total Réservation</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php
												$now=date("Y-m-d");
												$sql="select * from reservation where date='$now' ";
												$req= mysql_query ($sql) ;
												$number=mysql_num_rows($req);
												echo $number ;
												?>
                                            </h3> 
                                            </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="d"></i>
                                            <h5 class="text-muted vb">Client en cours</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
											<h3 class="counter text-right m-t-15 text-danger">
                                          <?php 
							 //$datenow="2018-12-18 17:55:30" ;
							  $datenow=date('Y-m-d H:i:s') ; // echo $datenow;
							// test therapeute agent
$sql5 ="select * from reservation WHERE (start_time <= '$datenow' and endtime >= '$datenow') ";
$req5= mysql_query ($sql5) ;
//echo $sql5.'<br>';
$count5=mysql_num_rows($req5);	
		echo $count5;
												?>
											</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="I"></i>
                                            <h5 class="text-muted vb">Non Payé</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary">
						<?php 
			$np="non-payer"	;			 
$sql6 ="select * from reservation WHERE paye='$np' ";
$req6= mysql_query ($sql6) ;
//echo $sql5.'<br>';
$nbre_np=mysql_num_rows($req6);	
		echo $nbre_np;
												?>
											</h3>
										</div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">All PROJECTS</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success">0</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
		   <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                            	<div class="col-md-4">                        
                               	 <label class="control-label">Date Choose </label>
                                   <div class="input-group">
                    <input type="text" name="date" class="form-control" id="datepicker-autoclose" value="<?php echo date("Y-m-d") ?>">
								     <span class="input-group-addon"><i class="icon-calender small" ></i></span> 
									   &nbsp;
                   <button type="submit" class="btn btn-success" ><i class="fa fa-check"></i>Go Find</button>
                                                    
								</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>

                                </form>
			
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var container = document.getElementById('example5.3');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Room' });
    dataTable.addColumn({ type: 'string', id: 'Name'});
	dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });

    dataTable.addRows([
			  		<?php
		$sql = "SELECT * FROM agent  "; 			
 						$req= mysql_query ($sql) ;
						
						 while($data= mysql_fetch_array($req)) 
							 
 								 {		
								 		$id = $data['id_agent'];								 						   				 
							            $nom = $data['nom'];
							 
$sql1 ="select * from reservation WHERE ( Month(start_time) like Month('$lad') and Year(start_time) like Year('$lad') and Day(start_time) like Day('$lad')) and id_agent= $id  and status='confirmer'";

 			 		$req1= mysql_query ($sql1) ;
					
						 while($data1= mysql_fetch_array($req1)) 
 								 {		
								 		$id = $data1['id_res'];								 						   				 
								 		$client = $data1['id_client'];							 						   				 
							            $agent = $data1['id_agent'];				            
							            $cabine = $data1['id_cabine'];				            
							            $soin = $data1['id_soin'];
							            $start = $data1['start_time'];
							            $end = $data1['endtime'];
							            $paye = $data1['paye'];
							            $type = $data1['type_soin'];
							            $note = $data1['note'];
							 
							 $heuredeb= date('H',strtotime ($start)); 
							 $minutedeb=date('i',strtotime ($start));
							 $heurefin=date('H',strtotime ($end));
							 $minutefin=date('i',strtotime ($end));
							 
		$sql0 = "SELECT * FROM client where id_client= '$client'  ";
 		$req0= mysql_query ($sql0) ;
		$data0= mysql_fetch_array($req0);
								 		
							            $name = $data0['name'];
							            $last = $data0['last'];
							            $room = $data0['room'];
		$sql0 = "SELECT * FROM soins where id_soin= '$soin'  ";
 		$req0= mysql_query ($sql0) ;
		$data0= mysql_fetch_array($req0);
		$lesoin = $data0['nom'];
							 
		$sql2 = "SELECT * FROM agent where id_agent= '$agent'  ";
 		$req2= mysql_query ($sql2) ;
		$data2= mysql_fetch_array($req2);
		$lagent = $data2['nom'];
							 
		$sql3 = "SELECT * FROM cabine where id_cabine= '$cabine'  ";
 		$req3= mysql_query ($sql3) ;
		$data2= mysql_fetch_array($req3);
		$lacabine = $data2['name'];
						         							            							         
?>
      [ '<?php  echo $nom ;?>',
	   '<?php echo ($name.' '.$last.'('.$room.')').' | ' ; ?>
	   <?php echo $lesoin .' | '; ?> <?php echo $lacabine.' | '.$paye.' | '.$type.' | '.$note ;  ?> ',
	   new Date(0,0,0,<?php echo $heuredeb; ?>,<?php echo $minutedeb; ?>,0), new Date(0,0,0,<?php echo $heurefin; ?>,<?php echo $minutefin; ?>,0) ],	 
	 
				 <?php    				
					 } }
                  
					?>	]			 
				 
					 );
	  

    var options = {
      timeline: { colorByRowLabel: true },
      backgroundColor: '#ffd',
		  
                     'width':1200,
                     'height':900,
		tooltip: {isHtml: true},
		'p': {'html': true},
		
	
    };	  

    chart.draw(dataTable, options);
	  
	  
  }  
	
</script>

<div id="example5.3" style="height: 100%; width: 100% "></div>
                    </div>
                  
                </div>
                <!--row -->
          
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
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.toast({
                heading: 'Welcome to La badira Spa Plannnifier'
                , text: 'This your plan for today! enjoy!.'
                , position: 'top-right'
                , loaderBg: '#ff6849'
                , icon: 'info'
                , hideAfter: 3000
                , stack: 6
            })
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
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>