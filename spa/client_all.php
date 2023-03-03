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
		<script>
function testa4(val)
{ var x=val;
 $.ajax({
 type: 'post',
 url: 'testa.php',
 data: {
  get_option:"m"+val
 },
 success: function (response) {
 //alert(x);
 sessionStorage.setItem("leid",x);
//alert(sessionStorage.getItem("leid"));
 // document.getElementById("lagentLoc").innerHTML=response; 
 }
 });
}
</script>
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
							  <script type="text/javascript" charset="utf8" src="js/vitesse.js"></script>
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
										<th>Genre</th>
                                        <th>Name</th>
                                        <th>Family Name</th>
                                        <th>Email</th>									                                     
                                        <th>Phone</th>
										<th>Room</th>
                                        <th>Type</th>										
                                        <th>Birth Date</th>                                     
                                        <th>Health</th>
                                        <th>Id Opera</th>                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                             
                                <tbody>
                                   
                                                   
       
                                </tbody>
                            </table>
							     	<script type="text/javascript">
					
$( document ).ready(function() {
$('#example23').DataTable({
	
				 "bProcessing": true,
         "serverSide": true,
		 "language": {
			  "processing": "Veuillez patienter...",
    "paginate": {
      "previous": "Précédant",
	  "next": "Suivant",
	  "first": "Début",
	  "last": "Fin",
    }
  	},  
	"aaSorting": [[0,'desc']],
         "ajax":{
            url :"response2.php", // json datasource
            type: "post",  // type of method  , by default would be get
			"aoColumnDefs" : [
				 {
				   'bSortable' : false,
				   'aTargets' : [3,4]
				 }],
			"dataSrc": function (jsonData) {
			  for ( var i=0, len=jsonData.data.length ; i<len ; i++ ) {
			    
				jsonData.data[i][1];
				jsonData.data[i][2] ;
				jsonData.data[i][3] ;				
				jsonData.data[i][8] ;
				jsonData.data[i][10] ;
				jsonData.data[i][11] = '<a href="client_modify.php?id='+jsonData.data[i][0]+' " data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>'+'<a href ><a href="client_delete.php?id='+jsonData.data[i][0]+' " data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a></a>'+ 
				'&nbsp&nbsp ' + '<a href ><a href="details_cl.php?id='+jsonData.data[i][0]+' " data-toggle="tooltip" data-original-title="eye"> <i class="fa fa-eye"></i> </a></a>' 	 
				  ;
				
				
				
			
			  }
			  
			  return jsonData.data;
			},
			 
            error: function(){  // error handling code
             // $(".employee-grid-error").html("");
              //$("#employee_grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#example23_processing").css("display","none");
            }
          } ,
	
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
});
</script>
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
   
</body>

</html>