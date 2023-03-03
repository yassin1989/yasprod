<!DOCTYPE html>  
<?php  include('config_local.php');

session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
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
    <title>Add - Therapeute</title>
    <!-- Bootstrap Core CSS -->
	<link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="../plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	
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
                    <h4 class="page-title">Therpeute </div>
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
                        <h3 class="box-title m-b-0">Add Therapeute Informations </h3>
                              <section>
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        <li><a href="agent_add.php" class="sticon ti-home"><span>Add Therapeute </span></a></li>
                                        <li><a href="#" class="sticon ti-notepad"><span>Affichage</span></a></li>
                                                                       
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <div class="panel-body">	
										<?php $error='';if(isset($_GET['success']))$error=$_GET['success'];
										if($error=='1'){ ?>
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Suppression Effectuée Avec succès!
								</div>      
										<?php } ?>
                                <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Speciality</th>
                                        <th class="text-center">Niveau</th>
                                        <th>Phone</th>
                                        <th>Conge</th>
                                        <th>Score</th>                                       
                                        <th>Action</th>                                       
                                    </tr>
                                </thead>
                                <tfoot>
                                   <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                        <th>Speciality</th>
                                        <th class="text-center">Niveau</th>
                                        <th>Phone</th>
                                        <th>Conge</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                </tfoot>
                                <tbody>
                                    <tr>
                                      <?php
										$sqls="select * from soins ";
										$req1= mysql_query ($sqls) ;
										$nums=mysql_num_rows($req1);
		$sql = "SELECT id_agent,nom,specialty,niveau,conge,phone,score FROM agent  ";
 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$idagent = $data['id_agent'];			 
								 						   				 
							            $nom = $data['nom'];
							            $spec = $data['specialty'];
							            $niveau = $data['niveau'];
							            $conge = $data['conge'];
							            $phone = $data['phone'];
							            $score = $data['score'];							            							         
?>
										<td><?php echo ucfirst($idagent) ;?></td>
										<td><?php echo ucfirst($nom) ;?></td>
										<td><?php 
		$sql2 = "SELECT distinct a.id_agent,a.id_soin,s.id_soin,s.nom FROM soins s ,aff_agent a  where  s.id_soin=a.id_soin and  a.id_agent='$idagent'   ";
 							
												//echo $sql2 ;
												$req2= mysql_query ($sql2) ;												
									     	$count=mysql_num_rows($req2);
											while($data2= mysql_fetch_array($req2)) 
											{		
								 					 				         
							                    $idc = $data2['id_agent'];					            
							                    $nom = $data2['nom'];				            
							                    $ids = $data2['id_soin'];				            
							      								
												echo '-'.$nom.'<br>' ; 
											}
											?></td>
										<td class="text-center"><?php 
							 				$per= round (($count/$nums)* 100 );							 
							 			echo " $per %"?>
										</td>
										<td><?php echo ucfirst($phone) ;?></td>
										<td><?php echo ucfirst($conge) ;?></td>
										<td><?php echo ucfirst($score) ;?></td>
										<td> 											
									 <div class="btn-group dropup m-r-10" >												
                                    <button btn btn-primary hidden-print aria-expanded="false" data-toggle="dropdown" class="btn btn-danger btn-sm dropdown-toggle waves-effect waves-light" type="button">Options <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="#"  class="sticon ti-eye">Détails</a></li>
									    <input type="hidden" name="id" value="<?php echo $idagent?>"/>											
									    <input type="hidden" name="ids" value="<?php echo $ids?>"/>											
                <li><a href="agent_modify.php?id=<?php echo $idagent;?>" class="sticon ti-pencil">Modifier </a></li>
                                        <li><a href="agent_delete.php?id=<?php echo $idagent;?>" class="sticon ti-trash">Supprimer</a></li>                                
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

    <!--Style Switcher -->
 <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/jasny-bootstrap.js"></script>
   <script src="js/custom.min.js"></script>
    <script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Style Switcher -->
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
                    columns: [ 0, 1, 2, 3,4,5,6 ]
                }
            },
				 {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6 ]
                }
            },
					 {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6 ]
                }
            },
					 {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6 ]
                }
            },
				
        ]
			
        });
    </script>
</body>

</html>
    