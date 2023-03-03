
<?php
session_start();
	//$_GET['ladate']= $date;
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;


		
	//define index of column
	$columns = array( 
		0 =>'id_res',
		1 =>'id_client', 
		2 =>'type_soin',
		3 =>'id_soin',
		4 =>'id_agent',
		5 =>'id_cabine',
		6 =>'date',	
		7 => 'stat_time',
		8 =>'endtime',
		9 =>'paye',		
		10 =>'status',		
		11 =>'date_ajout',
		12 =>'note',
		
		
		
	
		
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( id_res LIKE '".$params['search']['value']."%' ";    
		$where .=" OR id_client LIKE '".$params['search']['value']."%' ";
		$where .=" OR type_soin LIKE '".$params['search']['value']."%' ";
		$where .=" OR id_soin LIKE '".$params['search']['value']."%' ";
		$where .=" OR id_agent LIKE '".$params['search']['value']."%' ";
		$where .=" OR id_cabine LIKE '".$params['search']['value']."%'  ";
		$where .=" OR date LIKE '".$params['search']['value']."%' ) ";
		$where .=" OR start_time LIKE '".$params['search']['value']."%'  ";
		$where .=" OR endtime LIKE '".$params['search']['value']."%'  ";
		$where .=" OR date_ajout LIKE '".$params['search']['value']."%' ) ";

	}

	// getting total number records without any search
	$sql = "SELECT r.id_res,c.name,c.last,s.type,s.nom,a.nom,b.name,r.date, r.start_time,r.endtime,c.room,r.paye,r.status,r.date_ajout,r.note 
	FROM reservation r,client c ,soins s , agent a, cabine b where 
	r.id_client=c.id_client and r.id_soin=s.id_soin and r.id_agent=a.id_agent and r.id_cabine=b.id_cabine  ";

	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("erreur en affichant les clients");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	