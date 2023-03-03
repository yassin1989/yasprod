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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Client Opera</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	 <!-- Bootstrap Core CSS -->
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  
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
                    <h4 class="page-title">Tabs</h4> </div>
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
                        <h3 class="box-title m-b-0">Add Client Informations </h3>
                                          <section>
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        <li><a href="#section-bar-1" class="sticon ti-user"><span>Client From Opera</span></a></li>                                       
                                        <li><a href="#section-bar-2" class="sticon ti-stats-up"><span>Analytics</span></a></li>
                                       
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section id="section-bar-1">
                                           <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Room</th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
										<th>Adults</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Coms</th>
                                      
                                    </tr>
                                </thead>
                                <tfoot>
                                   <tr>
                                        <th>ID</th>
                                        <th>Room</th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
										<th>Adults</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Coms</th>
                                     
                                </tfoot>
                                <tbody>
					
									<?php

$stid = oci_parse($c,'select GUEST_NAME_ID,ROOM,SFIRST_GUEST_NAME,SGUEST_NAME,ARRIVAL,DEPARTURE,ADULTS,COMMENTS from OPERA.REP_RESERVATION_FIN_ALL where RESV_STATUS = :dd  AND ROOM<2000   
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
	$first= isset ($row[2]) ? $row [2] :"" ;
	$last= $row[3];
	$val5= $row[4];
	$arr= date("d/m/Y",strtotime($val5));	
	$val6= $row[5];
	$dep= date("d/m/Y",strtotime($val6));
	$adults= $row[6];
	$coms= isset ($row[7]) ? $row [7] :"";

?>
                                     <tr>
										<td><?php echo ucfirst($idgues) ;?></td>
										<td><?php echo ucfirst($room) ;?></td>
										<td><?php echo ucfirst($first) ;?></td>
										<td class="text-center"><?php echo ucfirst($last) ;?></td>
										<td><?php echo ucfirst($arr) ;?></td>
										<td><?php echo ucfirst($dep) ;?></td>
										<td><?php echo ucfirst($adults) ;?></td>
										<td><?php 
				$stid1 = oci_parse($c,'select PHONE_NUMBER  from OPERA.NAME_PHONE WHERE NAME_ID = :id AND PHONE_ROLE= :mob ');
				$stid2 = oci_parse($c,'select PHONE_NUMBER  from OPERA.NAME_PHONE WHERE NAME_ID = :id AND PHONE_ROLE= :email ');
				$mob="PHONE";
				$em="EMAIL";
				oci_bind_by_name($stid2,":email",$em);
				oci_bind_by_name($stid1,":mob",$mob);
				oci_bind_by_name($stid2,":id",$idgues);
				oci_bind_by_name($stid1,":id",$idgues);
				oci_execute($stid1);
				oci_execute($stid2);
 				$row2 = oci_fetch_array($stid1, OCI_BOTH)  ;				
 				$row20 = oci_fetch_array($stid2, OCI_BOTH); 
				echo isset ($row2[0]) ? $row2 [0] :"Not Found !!" ;						
											?>
										 </td>
										<td><?php echo isset ($row20[0]) ? $row20 [0] :"No E-mail !!" ;?></td>
										<td><?php echo isset ($row[7]) ? $row[7] :"vide !!" ;?></td>
									</tr>
									
<?php	 

  }      									     
oci_free_statement($stid);
oci_close($c);

?>                                                   
                                
                                    
                                </tbody>
                            </table>
                        </div>
                                    </section>
                  
                                    <section id="section-bar-2">
                                        <h2>Statistics</h2>
									</section>
                                   
                                </div>
                                <!-- /content -->
                            </div>
                            <!-- /tabs -->
                        </section>
                        
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
          {
                extend: 'pdf',
			  orientation: 'landscape',
			  			filename: 'client_opera',
				title: 'liste clients opera',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9 ]
                },
			    customize : function(doc) {
     doc.styles['td:nth-child(8)'] = { 
       width: '100%',
       'max-width': '100%'
     }
  }
            },
				 {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
                }
            },
					 {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9 ]
                }
            },
					 {
                extend: 'print',		
						 
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,9 ],					
					
					autoPrint: true,
					orientation: 'landscape',
                }
            },
				
        ]
			
        });
    </script>
</body>

</html>