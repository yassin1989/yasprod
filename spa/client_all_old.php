<!DOCTYPE html>  
<html lang="en">
<?php
include('config_local.php');
	
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
                        <!-- Tabstyle start -->
                        <h3 class="box-title m-b-0">Add Client Informations </h3>
                                          <section>
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        
                                        <li><a href="#" class="sticon ti-id-badge"><span>Affichage</span></a></li>
										<li><a href="client_add.php" class="sticon ti-user"><span>Add New Client</span></a></li>					
                                       </ul>
                                </nav>
                                <div class="content-wrap">
                                <div class="panel-body">
                                        	
								<?php $error='';if(isset($_GET['error1']))$error=$_GET['error1'];
										if($error=='3'){ ?>
                            <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Modification,est faite,Merci! 
								</div>      
										<?php } ?>                 
                 
                          <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Genre</th>
                                        <th>Name</th>
                                        <th>Family Name</th>
										<th>Room</th>
                                        <th>E-Mail</th>
                                        <th>Type</th>
										<th>Phone</th>
                                        <th>Birth Date</th>										
                                        <th>Health</th>                                     
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                             
                                <tbody>
                                     <tr>
                                      <?php

		$sql = "SELECT id_client,genre,name,last,email,type,phone,birth,room,health,note FROM client  ";
 			
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
							         							            							         
?>
										<td><?php echo $id ;?></td>
										<td><?php echo ucfirst($genre) ;?></td>
										<td><?php echo ucfirst($name) ;?></td>
										<td><?php echo ucfirst($last) ;?></td>
										<td><?php echo ucfirst($room) ;?></td>
										<td><?php echo ucfirst($email) ;?></td>
										<td><?php echo ucfirst($type) ;?></td>
										<td><?php echo ucfirst($phone) ;?></td>
										<td><?php echo ucfirst($birth) ;?></td>										
										<td><?php echo ucfirst($health) ;?></td>
										<td><?php echo ucfirst($note) ;?></td>
											<td> 											
									 <div class="btn-group dropup m-r-10" >												
                                    <button btn btn-primary hidden-print aria-expanded="false" data-toggle="dropdown" class="btn btn-danger btn-sm dropdown-toggle waves-effect waves-light" type="button">Options <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="#"  class="sticon ti-eye">Details</a></li>
                                        <li><a href="client_modify.php?id=<?php echo $id ;?>" class="sticon ti-pencil">Modifier </a></li>
                                        <li><a href="client_delete.php?id=<?php echo $id ;?>" class="sticon ti-trash">Supprimer</a></li>
                                 
                                    </ul>
                                </div>
										</td>
																				
                                    </tr>
                                  
                        <?php    				
						 } 
                                       
?>                                                   
       
                                </tbody>
                            </table>
                        </div>
                    
                                </div>
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
		,"order": [[0, "desc" ]]	
        });
    </script>
</body>

</html>