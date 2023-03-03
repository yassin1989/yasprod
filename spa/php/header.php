
<?php
include('config_local.php'); 

//$id_resv=$_GET['id']; //echo $id_resv.'<br>' ;	
?>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"> <a class="logo" href="index.php"><b><!--This is dark logo icon--><img src="../plugins/images/eliteadmin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="../plugins/images/eliteadmin-logo-dark.jpg" alt="home" class="light-logo" /></b><span class="hidden-xs"><!--This is dark logo text--><img src="../plugins/images/eliteadmin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="../plugins/images/eliteadmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="hidden" placeholder="Search..." class="form-control" class="fa fa-search"></i> <a href=""></a> </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
						<i class="icon-user"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Client en cours</div>
                            </li>
							                               <?php 
							 //$datenow="2018-12-18 17:55:30" ;
							  $datenow=date('Y-m-d H:i:s') ; // echo $datenow;
							// test therapeute agent
							$sql5 ="select * from reservation WHERE (start_time <= '$datenow' and endtime >= '$datenow') ";
							$req= mysql_query ($sql5) ;
										while($data= mysql_fetch_array($req)) 
							{		
								 		$id = $data['id_res'];	//echo $id ; 
								 		$idc = $data['id_client'];	//echo $id ; 
											
							?>
							<?php
							$sql0 = "SELECT * FROM client  where id_client=$idc  ";
 							
 										$req0= mysql_query ($sql0) ;
											$number0=mysql_num_rows($req0);
											while($data0= mysql_fetch_array($req0))
 								     {		
								 		 								 		
							            $name = $data0['name'];
							            $last = $data0['last'];							           
										 ?>							  	  
										  <?php }
									?>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="../plugins/images/users/spa.PNG" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5> <?php echo ucfirst($name.' '.$last) ; ?> </h5> <span class="mail-desc">
											</span> <span class="time"><?php echo $idc ; ?></span> 
										</div>
                                    </a>
                                    
                                </div>
                            </li>
									<?php	}						
							?>
                            <li>
                                <a class="text-center" href="reservation_all.php"> <strong>See all reservations</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->							 <?php
//$usz=$_SESSION['id'];
$date_courante = date('Y-m-d');
$sqlmz="SELECT * FROM abonnee where DATEDIFF(end,'$date_courante')<6 group by id_abonne ";

$reqmz= mysql_query ($sqlmz) ;
$cvb = mysql_num_rows($reqmz);

?>
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note">
						&nbsp;<?php echo $cvb; ?></i>
          <div class="notify">
			  <span class="heartbit"></span>
			  <span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
							

				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-calendar-minus-o icon-lg"></span>
                    <span class="badge badge-danger badge-above right"><?php echo $cvb; ?></span>
					
                  </span>
                  <span class="visible-xs-block">
                    <span class="icon icon-calendar-minus-o icon-lg icon-fw"></span>
                    <span class="badge badge-danger pull-right"><?php echo $cvb; ?></span>
             Abonnements bientôt finis
                  </span>
                </a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                  <div class="dropdown-header">
                    
                    <h5 class="dropdown-heading">Abonnements qui finissent bientôt</h5>
                  </div>
				  <?php if($cvb>0){ ?>
                  <div class="dropdown-body">
                    <div class="list-group list-group-divided custom-scrollbar">
											  			  <?php
$sqlme="SELECT * FROM abonnee where DATEDIFF(end,'$date_courante')<6 group by id_abonne order by end DESC ";
$reqme= mysql_query ($sqlme) ;
while($datame= mysql_fetch_array($reqme)) 
{
$ab=$datame['id_abonne'];
$df=$datame['end'];
 $df=date("d-m-Y", strtotime($df));
$sqlmz="SELECT * FROM abonnee where id_abonne='$ab'";
$reqmz= mysql_query ($sqlmz) ;
$dataze= mysql_fetch_array($reqmz);


 $noma = $dataze['name'];

?>
						
						          <a class="list-group-item" href="abonnee_all.php?id=<?php echo $ab;?>">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="rounded" width="40" height="40" src="img/dat.png" alt="">
                          </div>
                          <div class="notification-content">
                      
			
                            <h5 class="notification-heading">
				<?php echo $noma; ?>
							</h5>
                            <p class="notification-text">
                              <small class="truncate">Date de fin: <font color="red"> <?php echo $df; ?></font></small>
                            </p>
                          </div>
                        </div>
                      </a>
<?php } ?>
                    </div>
                  </div>
			<?php }else{ ?>
                    <div class="dropdown-footer">
                    <a class="dropdown-btn" href="#">Aucun abonnement proche de sa fin</a>
                  </div>
				  <?php } ?>
                </div>
		
              </li>


<div class="list-group list-group-divided custom-scrollbar">
											  			  <?php
$sqlme="SELECT * FROM abonnee where DATEDIFF(end,'$date_courante')<6 group by id_abonne order by end DESC ";
$reqme= mysql_query ($sqlme) ;
while($datame= mysql_fetch_array($reqme)) 
{
$ab=$datame['id_abonne'];
$df=$datame['end'];
 $df=date("d-m-Y", strtotime($df));
$sqlmz="SELECT * FROM abonnee where id_abonne='$ab'";
$reqmz= mysql_query ($sqlmz) ;
$dataze= mysql_fetch_array($reqmz);


 $noma = $dataze['name'];



?>
                      <a class="list-group-item" href="abonnee_all.php?id=<?php echo $ab;?>">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="rounded" width="40" height="40" src="img/dat.png" alt="">
                          </div>
                          <div class="notification-content">
                      
			
                            <h5 class="notification-heading">
				<?php echo $noma; ?>
							</h5>
                            <p class="notification-text">
                              <small class="truncate">Date de fin: <font color="red"> <?php echo $df; ?></font></small>
                            </p>
                          </div>
                        </div>
                      </a>
<?php } ?>
                    </div>
                                                  <li class="divider"></li>
                          
                           
                            <li>
                                <a class="text-center" href="abonnee_all.php"> <strong>See All Abonnée</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-tasks -->
                    </li>
	
                    <!-- /.dropdown -->
                    <!-- .Megamenu -->
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Options</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Soins En cours</li>
                                    <li><a href="form-basic.php">Cabine 1</a></li>
                                    <li><a href="form-layout.php">Cabine 2</a></li>
                                    <li><a href="form-advanced.php">Cabine 3</a></li>
                                    <li><a href="form-material-elements.php">Cabine 4</a></li>
                             
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Agent Disponible Heure Actuel</li>
                                    <li><a href="form-dropzone.php">Agent 1</a></li>
                                    <li><a href="form-pickers.php">Agent 2</a></li>
                                    <li><a href="icheck-control.html">Agent 3</a></li>
                                    <li><a href="form-wizard.php">Agent 4</a></li>
                              
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Next Client</li>
                                    <li><a href="basic-table.php">Basic Tables</a></li>
                                    <li><a href="table-layouts.php">Table Layouts</a></li>
                                    <li><a href="data-table.php">Data Table</a></li>
                                    <li class="hidden"><a href="crud-table.php">Crud Table</a></li>
                            
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Client En cours</li>
                                    <li> <a href="flot.php">Flot Charts</a> </li>
                                    <li><a href="morris-chart.php">Morris Chart</a></li>
                                    <li><a href="chart-js.php">Chart-js</a></li>
                                    <li><a href="peity-chart.php">Peity Charts</a></li>
                         
                                </ul>
                            </li>
                        
                        </ul>
                    </li>
                    <!-- /.Megamenu -->
                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>