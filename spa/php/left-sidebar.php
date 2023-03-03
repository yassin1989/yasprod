<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin La Badira <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="login.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                <!-- /input-group -->
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li> <a href="home.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> </span></a>
              
            </li>
          
            <li> <a href="#" class="waves-effect"><i data-icon="/" class="icon-people icon-people "></i> <span class="hide-menu">Therapeute<span class="fa arrow"></span> <span class="label label-rouded label-info pull-right">13</span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="agent_add.php">Gestion Thrapeute</a></li>                   				                    
                    <li><a href="agent_history.php">History</a></li>                   				                    
                    <li><a href="agent_caf.php">CA Agent</a></li>                   				                    
                </ul>
            </li>
            <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon icon-user-following fa-fw"></i> <span class="hide-menu">Clients<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="client_add.php">Gestion Client</a></li>
                    <li><a href="client_opera.php">Client Opera</a></li>                
                    <li><a href="client_all.php">Client Affichage</a></li>                
                    <li><a href="client_abonne.php">Abonnée SPA</a></li>                
                    <li><a href="client_history.php">History RDV</a></li>                
                    <li><a href="client_history_fact.php">Facturation</a></li>                
                </ul>
            </li>
           
            <li> <a href="#" class="waves-effect"><i data-icon="&#xe008;" class="fa fa-bus fa-fw"></i> <span class="hide-menu">Cabines<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right">24</span></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="cabine_add.php">Gestion Cabine</a></li>                 
                  <li><a href="cabine_status.php">Cabine Status</a></li>                 
                </ul>
            </li>
            <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class=" icon-star  icon-star fa-fw"></i> <span class="hide-menu">Soins<span class="fa arrow"></span></span></a>
               <ul class="nav nav-second-level">
                    <li><a href="soin_add.php">Gestion Soin</a></li>                   
                    <li><a href="soin_all.php">Soin All</a></li>                   
                    <li><a href="pack.php">Gestion Package</a></li>                   
                    
                </ul>
            </li>
            <li> <a href="tables.php" class="waves-effect"><i data-icon="O" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Reservation<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">
				<?php
												$now=date("Y-m-d");
												$sql="select * from reservation where date='$now' and id_client!= 47 ";
												$req= mysql_query ($sql) ;
												$number=mysql_num_rows($req);
												echo $number ;
												?></span></span></a>
                <ul class="nav nav-second-level"> 
					<li><a href="reservation.php">Reservation Client</a></li>                   
					<li><a href="pack_opera.php">Package</a></li>                   
					<li><a href="reservation_all.php">Affichage Resv</a></li>                   
                    <li><a href="affectation.php">Affectation Planning</a></li>
                    
                </ul>
            </li>
                      
            <li><a href="#" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Reports<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">New</span></span></a>
				 <ul class="nav nav-second-level"> 
					 <li><a href="agent_rapport.php">Rapport Agent</a></li>
					 <li><a href="user_rapport.php">Rapport Users</a></li>
					 <li><a href="annule_rapport.php">Rapport Annulation</a></li>
					 <li><a href="produit_rapport.php">Rapport Produit</a></li>
					 <li><a href="histo.php">Log Historique</a></li>
				</ul>
			</li>
				
         <li><a href="history.php" class="waves-effect"><i data-icon="d" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">History<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right"></span></span></a></li>
        
            <li><a href="login.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
           
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->