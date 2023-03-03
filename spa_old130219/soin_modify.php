<!DOCTYPE html>  
<?php  include('config_local.php'); 
session_start();
if(!isset($_SESSION['id'])){
header( 'Location: index.php' ) ;
}
$id_soin=$_GET['id']; //echo $id_soin.'<br>' ;
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.jpg">
    <title>Modify - Soin</title>
    <!-- Bootstrap Core CSS -->
	<link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="../plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	<link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
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
                    <h4 class="page-title">Modify Soin</h4> </div>
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
                        <h3 class="box-title m-b-0">Soins Informations </h3>
                                          <section>
                            <div class="sttabs tabs-style-bar">
                                <nav>
                                    <ul>
                                        <li><a href="#" class="sticon ti-hand-open"><span>Add Soins</span></a></li>
                                        <li><a href="soin_all.php" class="sticon ti-id-badge"><span>Affichage</span></a></li>
                                                                              
                                    </ul>
                                </nav>                            
								<div class="content-wrap">                   
                            
                            <div class="panel-body">
                                 <form method="post" name="f1" action="soin_update.php">
                                    <div class="form-body">
                                        <h3 class="box-title">Soins Info & Affectation to Cabine</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
							 <?php
							$sql = "SELECT * FROM soins  where id_soin='$id_soin'  ";
 							
 										$req= mysql_query ($sql) ;
											$number=mysql_num_rows($req);
											while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_soin'];			 
								 						   				 
							            $nom = $data['nom'];
							            $desc = $data['description'];
							           // $cabine = $data['name'];
							            $type = $data['type'];
							            $duree = $data['duree'];
							            $prix = $data['prix'];	
								 }
?>
                  <label class="control-label">Name de Soin</label>
                 <input type="text" value="<?php echo $nom ?>" required name="name" id="Name" class="form-control" placeholder="Name"> <span class="help-block"> Add New Product </span> </div>
												<input type="hidden" name="id_soin" value="<?php echo $id_soin ?>">
                                            </div>
											<div class="col-md-4">
                                    <div class="form-group">
                                                    <label class="control-label">Affecter Cabine</label>
                       <select  class="select2 m-b-10 select2-multiple" multiple data-style="form-control" name="cabine[]">
                                   <?php			
							$sql = "SELECT * FROM cabine  "; 			
 							$req= mysql_query ($sql) ;
						
						 while($data= mysql_fetch_array($req)) 
 								 {		
								 		$id = $data['id_cabine'];								 						   				 
							            $nom = $data['name'];
							            $type = $data['type'];
							            $status = $data['status'];
							            $special = $data['special'];
							 	$sql2 = "SELECT * FROM aff_soin where id_soin='$id_soin' and id_cabine='$id'   ";
 			 						$req2= mysql_query ($sql2) ;
									$number=mysql_num_rows($req2);	
							         							            							         
?>          
	    <option value="<?php echo $id ?>" <?php if($number >0){?> selected <?php } ?>><?php echo $nom.'-->'.$type?> <?php if($number >0){   } ?>
			 </option>
                 
                          <?php    				
						 } 
                                       
?>	
                              									
                                  					 </select> 
													
													<span class="help-block"> Cabine Name & Type </span>													
													<input type="hidden" name="id" value="<?php echo $id?>"/> 
												</div>
                                            </div>
											    <div class="col-md-3">                                                  
                                            
                                                         <div class="form-group">
                                                    <label class="control-label">Description</label>
                           <textarea class="form-control form-control-line" rows="5" name="descri" value=""><?php echo $desc ?></textarea>
													<span class="help-block"> Add Description Of products </span>
												</div>
                                            </div>
                                          
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Type de soin</label>
                                                    <select class="form-control" name="type" required>
                                                       
                                                        <option value="Soin Hydro">Soin Hydro</option>
														<option value="Soin Corp">Soin Corp</option>
														<option value="Soin Visage">Soin Visage</option>                                                       
                                                        <option value="Massage">Massage</option>
														<option value="Massage clarins">Massage Clarins  </option>
                                                                                                              
                                                        <option value="Epilation">Epilation</option>
														<option value="Coiffure / Esthetique">Coiffure / Esthetique</option>
                                                                                                             
                                                    </select>
													<span class="help-block"> Type de soin  </span>
												</div>
                                            </div>
											  <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Prix</label>
                                                    <input type="text" id="prix" name="prix" value="<?php echo $prix ?>" class="form-control" placeholder="">
													<span class="help-block"> Prix </span> </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Durée</label>
                                                         <select class="form-control" name="duree">
                                                        <option value="15">15 min</option>
                                                        <option value="20">20 min</option>
                                                        <option value="25">25 min</option>
                                                        <option value="30">30 min</option>
                                                        <option value="35">35 min</option>
                                                        <option value="40">40 min</option>
                                                        <option value="45">45 min</option>
                                                        <option value="50">50 min</option>
                                                        <option value="55">55 min</option>
                                                        <option value="60">60 min</option>
                                                        <option value="80">80 min</option>
                                                        <option value="90">90 min</option>
                                                        <option value="120">120 min</option>                                             <option value="150">150 min</option>    
                                                        <option value="180">180 min</option>                                                   
                                                        <option value="840">840 min</option>                                                    
                                                    </select>
													<span class="help-block"> Durée</span> 
												</div>
                                            </div>
     						
										</div>
                                     
                                     
                                   </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>                        
                       
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
</body>

</html>