<!DOCTYPE html>  
<html lang="en">
<?php
include('config_local.php');	
session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
}
$id_client=$_GET['id']; //echo $id_client.'<br>' ;	
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.jpg">
    <title>Add - Client</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	 <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
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
                    <h4 class="page-title">Clients</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
			<?php
		$sql = "SELECT * FROM client where id_client='$id_client'  ";
 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_client'];								 						   				 
							            $genre = $data['genre'];
							            $name = $data['name'];
							            $last = $data['last'];
							            $email = $data['email'];
							            $type = $data['type'];
							            $phone = $data['phone'];
							            $birth = $data['birth'];
							            $room = $data['room'];
							            $health = $data['health'];
							            $note = $data['note'];
						 }
							         							            							         
?>
                        <!-- Tabstyle start -->
                        <h3 class="box-title m-b-0">Add Client Informations </h3>
                                      
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        <li><a href="#" class="sticon ti-user"><span>Add New Client</span></a></li>
                                        <li><a href="client_all.php" class="sticon ti-id-badge"><span>Affichage</span></a></li>
									                                       
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                            <div class="panel-body">
                                                   
                                <form method="post" name="f1" action="client_update.php">
                                    <div class="form-body">
                                        <div class="row">
											  <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control" name="genre">
                                                        <option value="Mr">Homme</option>
                                                        <option value="Ms">Femme</option>
                                                       
                                                    </select> <span class="help-block">Gender </span> </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
													<input type="hidden" name="id_client" value="<?php echo $id_client ?>">
                                                    <input type="text" value="<?php echo $name ?>" name="name" id="Name" class="form-control" placeholder="Name"> <span class="help-block">Client Name </span> 
												</div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="last" value="<?php echo $last ?>" name="last" class="form-control" placeholder=""> <span class="help-block"> Specialty </span> </div>
                                            </div>
											<div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                    <input type="text" id="email" value="<?php echo $email ?>" name="email" class="form-control" placeholder=""> <span class="help-block">email </span> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Interne/Externe/Resident à L'hotel</label>
                                                    <select class="form-control" name="type">
                                                        <option value="interne">Interne</option>
                                                        <option value="externe">Externe</option>
                                                        <option value="resident">Resident</option>
                                                       
                                                    </select> <span class="help-block">Interne/Externe </span> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Phone Number</label>
                                                    <input type="text" id="Phone" value="<?php echo $phone ?>" name="phone"class="form-control" placeholder=""> <span class="help-block"> Phone Number</span> </div>
                                            </div>
											  <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Room</label>
                                                    <input type="text" id="room" value="<?php echo $room ?>" name="room"class="form-control" placeholder=""> <span class="help-block"> Room</span> </div>
                                            </div>
											<div class="col-md-2">
                                              <div class="form-group">
                                              <label class="control-label">Birth Date</label>
                                              <input type="date" id="date"  name="date"value="<?php echo $birth ?>" class="form-control" <?php echo date('Y-mm-dd'); ?>placeholder=""> <span class="help-block">Birth Date</span> </div>
                                            </div>
                                            <!--/span--
                                            <!--/span-->											
											   <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Health Problem</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="radio" id="radio1" value="no" checked>
                                                                <label for="radio1">NO</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="radio" id="radio2" value="yes">
                                                                <label for="radio2">YES</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-md-3">
												 <label class="control-label">Note</label>
												<textarea name="note" class="form-control form-control-line" rows="5" style="margin-top: 0px; margin-bottom: 0px; height: 120px;"><?php echo $note ?></textarea>
											</div>
                                        </div>                                    
                                        </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                         
                                </div>
                                <!-- /content -->
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
          {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10 ]
                }
            },
				 {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10 ]
                }
            },
					 {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10 ]
                }
            },
					 {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10 ]
                }
            },
				
        ]
			
        });
    </script>
</body>

</html>