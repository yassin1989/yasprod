
<?php
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id_abonne',
		1 =>'genre', 
		2 =>'name',
		3 =>'last',
		4 =>'email',
		5 =>'start',
		6 =>'end',
		7 =>'phone',
		8 =>'birth',
		9 =>'note',		
		
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( id_abonnee LIKE '".$params['search']['value']."%' ";    
		$where .=" OR name LIKE '".$params['search']['value']."%' ";
		$where .=" OR last LIKE '".$params['search']['value']."%' ";
		$where .=" OR email LIKE '".$params['search']['value']."%' ";
		$where .=" OR start LIKE '".$params['search']['value']."%'  ";
		$where .=" OR end LIKE '".$params['search']['value']."%' ";
		$where .=" OR birth LIKE '".$params['search']['value']."%'  ";
		$where .=" OR email LIKE '".$params['search']['value']."%'  ";
		$where .=" OR datenow LIKE '".$params['search']['value']."%'  ";
		$where .=" OR note LIKE '".$params['search']['value']."%' ) ";

	}

	// getting total number records without any search
	$sql = "SELECT id_abonne,genre,name,last,email,start,end,phone,birth,note FROM abonnee ";
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

	$queryRecords = mysqli_query($conn, $sqlRec) or die("erreur en affichant les abonnées");

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
	