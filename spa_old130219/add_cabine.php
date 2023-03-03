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
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Add - Cabine</title>
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
                    <h4 class="page-title">Cabine</h4> </div>
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
                        <h3 class="box-title m-b-0">Add Cabine Informations </h3>
                                          <section>
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        <li><a href="#section-bar-1" class="sticon ti-home"><span>Add Cabine</span></a></li>
                                        <li><a href="#section-bar-2" class="sticon ti-id-badge"><span>Affichage</span></a></li>
                                        <li><a href="#section-bar-3" class="sticon ti-notepad"><span>Update</span></a></li>
                                        <li><a href="#section-bar-4" class="sticon ti-stats-up"><span>Analytics</span></a></li>
                                       
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section id="section-bar-1">
                                                   
                            <div class="panel-body">
                                  <form method="post" name="f1" action="insert_cabine.php">
                                    <div class="form-body">
                                        <h3 class="box-title">Cabine Info</h3>
                                           <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label"> Nom Cabine </label>
                                                    <input type="text" name="name" id="Name" class="form-control" placeholder="Name"> <span class="help-block"> Cabine Name </span> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Type de Cabine</label>
                                                      <select class="form-control" name="type">
                                                        <option value="Single">Single</option>
                                                        <option value="Couple">Couple</option>
                                                        <option value="Hammam">Hammam</option>
                                                        <option value="Hydro Flotarium ">Hydro Flotarium</option>
                                                        <option value="Privilége">Privilége</option>
                                                        <option value="Bain Hydro">Bain Hydromassant</option>
                                                        <option value="Esthétique">Esthétique</option>
                                                        <option value="Epilation">Epilation</option>
                                                        <option value="Floting bed">Floting bed</option>
                                                       
										<option value="Massage sous Infusion">Massage sous Infusion</option>
                                                      </select> 
													<span class="help-block">Soin Type </span> </div>
                                            </div>
                                            <!--/span-->
											 <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="Libre">Libre</option>
                                                        <option value="occupée">Occupée</option>
                                                        <option value="bloquer">Bloquer</option>
                                                        <option value="traveaux">Traveaux</option>
                                                     
                                                    </select> 
													<span class="help-block"> Status  </span> </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                        <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Special Pour</label>
                                                    <input type="text" id="Phone"  name="special"class="form-control" placeholder=""> <span class="help-block"> Special Pour</span> </div>
                                            </div>
                                            
                                        </div>
                                                                          
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                         
                       
                                    </section>
                                    <section id="section-bar-2">                                          
                 
                          <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type de Cabine</th>
                                        <th >Status</th>
                                        <th>Special Pour</th>
                                        <th>Action</th>
                                                                                                                       
                                    </tr>
                                </thead>
                                <tfoot>
                                   <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type de Cabine</th>
                                        <th>Status</th>
                                        <th>Special Pour</th>
                                        <th>Action</th>
                                </tfoot>
                                <tbody>
                                    <tr>
                                      <?php
		$sql = "SELECT id_cabine,name,type,status,special FROM cabine  ";
 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_cabine'];								 						   				 
							            $nom = $data['name'];
							            $type = $data['type'];
							            $status = $data['status'];
							            $special = $data['special'];
							         							            							         
?>
										<td><?php echo ucfirst($id) ;?></td>
										<td><?php echo ucfirst($nom) ;?></td>
										<td><?php echo ucfirst($type) ;?></td>
									
									
										
										 <?php 
							 $datenow="date('Y-m-d H:i:s')" ;  echo $datenow;
							// test therapeute agent
$sql5 ="select * from reservation WHERE (start_time <= '$datenow' and endtime >= '$datenow') and (  id_cabine='$id')";
$req5= mysql_query ($sql5) ;
//echo $sql5.'<br>';
$count5=mysql_num_rows($req5);	
	if($count5 >0) 
	{ echo $count5;
		 echo '<td><div class="label label-table label-danger">Occupée</div></td>';	

	}else{
		echo '<td><div class="label label-table label-success">Libre</div></td>';
	} 
							 
																							 
							               ?>
										
										<td><?php echo ucfirst($special) ;?></td>
									 <td> 											
									 <div class="btn-group dropup m-r-10" >				         				
         <button btn btn-primary hidden-print aria-expanded="false" data-toggle="dropdown" class="btn btn-danger dropdown-toggle btn-sm waves-effect waves-light" type="button">Options <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="#"  class="sticon ti-eye">Details</a></li>
                                        <li><a href="#" class="sticon ti-pencil">Modifier </a></li>
                                        <li><a href="#" class="sticon ti-trash">Supprimer</a></li>
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
									 <section id="section-bar-4">
                                                             
                            <div class="panel-body">
                                <form method="post" name="f1" action="insert_agent.php">
                                  
                                        <h3 class="box-title">Therapeute Update Info</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Nom Cabine</label>
                                                   <select class="form-control" name="nom">
                                   <?php

		$sql = "SELECT id_cabine,name,type,status,special FROM cabine  ";
 			
 						$req= mysql_query ($sql) ;
						$number=mysql_num_rows($req);
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_cabine'];								 						   				 
							            $nom = $data['name'];
							            $type = $data['type'];
							            $status = $data['status'];
							            $special = $data['special'];
							         							            							         
?>
                             							 <option value="1"><?php echo ucfirst($nom) ;?></option>
                          <?php    				
						 } 
                                       
?>	
                              									
                                  					 </select> 
													
													<span class="help-block"> Cabine Name </span> 
													<input type="hidden" name="id" value="<?php echo $id?>"/> 
												</div>
                                            </div>
                               <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Type de Cabine</label>
                                                      <select class="form-control" name="type">
                                                        <option value="Single">Single</option>
                                                        <option value="Couple">Couple</option>
                                                        <option value="Hammam">Hammam</option>
                                                        <option value="Hydro Flotarium ">Hydro Flotarium</option>
                                                        <option value="Privilége">Privilége</option>
                                                        <option value="Bain Hydro">Bain Hydromassant</option>
                                                        <option value="Esthétique">Esthétique</option>
                                                        <option value="Epilation">Epilation</option>
                                                        <option value="Floting bed">Floting bed</option>
                                                        <option value="Massage sous Infusion">Massage sous Infusion</option>
                                                      </select> 
													<span class="help-block">Soin Type </span> </div>
                                            </div>
                                            <!--/span-->
											 <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="Libre">Libre</option>
                                                        <option value="Occupée">Occupée</option>
                                                        <option value="Bloquer">Bloquer</option>
                                                        <option value="Traveaux">Traveaux</option>
                                                     
                                                    </select> 
													<span class="help-block"> Status  </span> </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                        <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Special Pour</label>
                                                    <input type="text" id="Phone"  name="special"class="form-control" placeholder=""> <span class="help-block"> Special Pour</span> </div>
                                            </div>
                                            
                                        </div>
                                     
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i>Update</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
									</section>

                                    <section id="section-bar-4">
                                        <h2>in progress</h2>
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
                    columns: [ 0, 1, 2, 3,4 ]
                }
            },
				 {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4 ]
                }
            },
					 {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4 ]
                }
            },
					 {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4 ]
                }
            },
				
        ]
			
        });
    </script>
</body>

</html>