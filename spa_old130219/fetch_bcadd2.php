<?php
 include('config_local.php'); 
include('config_opera.php');	

session_start();
if(isset($_GET['q']))
{$idgues = $_GET['q'];
$moi = $_SESSION['id'];
 
						
$stid = oci_parse($c,'select GUEST_NAME_ID,ROOM,SFIRST_GUEST_NAME,SGUEST_NAME,ARRIVAL,DEPARTURE,ADULTS from OPERA.REP_RESERVATION_FIN_ALL where RESV_STATUS = :dd  AND 
ROOM<2000   
           AND RATE_CODE NOT IN (:cc) and GUEST_NAME_ID= :id order by ROOM ASC') ;											

$kk="CHECKED IN";
$aa="PM/PI";
$id_client="$idgues";
oci_bind_by_name($stid,":dd",$kk);
oci_bind_by_name($stid,":cc",$aa);
oci_bind_by_name($stid,":id",$id_client);
oci_execute($stid);
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    // Use the uppercase column names for the associative array indices
	$idgues= $row[0];
	$room= isset ($row[1]) ? $row [1] :"" ;
	$first= $row[2];
	$last= $row[3];
	$val5= $row[4];
	$arr= date("d/m/Y",strtotime($val5));	
	$val6= $row[5];
	$dep= date("d/m/Y",strtotime($val6));
	$adults= $row[6];

 
				$stid1 = oci_parse($c,'select PHONE_NUMBER  from OPERA.NAME_PHONE WHERE NAME_ID = :id AND PHONE_ROLE= :mob ');
				$stid2 = oci_parse($c,'select PHONE_NUMBER  from OPERA.NAME_PHONE WHERE NAME_ID = :id AND PHONE_ROLE= :email ');
				$mob="PHONE";
				$em="EMAIL";
				oci_bind_by_name($stid2,":email",$em);
				oci_bind_by_name($stid1,":mob",$mob);
				oci_bind_by_name($stid2,":id",$idgues);
				oci_bind_by_name($stid1,":id",$idgues);
				oci_execute($stid1);
				oci_execute($stid2);
 				$phone = oci_fetch_array($stid1, OCI_BOTH)  ;				
 				$email = oci_fetch_array($stid2, OCI_BOTH); 
				//echo isset ($row20[0]) ? $row20 [0] :"Not Found !!" ;						
				
			
  }      									     
oci_free_statement($stid);
oci_close($c);

	?>		

	<div class="col-md-3">      
       <label class="control-label">Name & last Name </label>
        <input type="text" name="nameaff" id="name" class="form-control"  value="<?php echo $first.' '.$last; ?>" disabled >
		 <input type="hidden" name="name" id="name" class="form-control"  value="<?php echo $first ?>" > 
		 <input type="hidden" name="last" id="last" class="form-control"  value="<?php echo $last ?>" > 
		 <input type="hidden" name="opera" id="opera" class="form-control"  value="<?php echo $idgues ?>" > 
					  <span class="help-block"> Guest From Opera </span> 				
					
	</div>
    <div class="col-md-3">      
       <label class="control-label"> Guest Room </label>
                  <input type="text" name="room0" id="room" class="form-control"  value="<?php echo  $room  ?>" disabled > 
		          <input type="hidden" name="room" id="room" class="form-control"  value="<?php echo $room ?>"  > 
					  <span class="help-block"> Guest Room </span> 				
					
	</div>
  <div class="col-md-3">      
       <label class="control-label"> Guest E-mail </label>
            <input type="text" name="email0" id="email" class="form-control"  value="<?php echo isset ($email[0]) ? $email [0] :"Not Found !!" ;	 ?>" disabled >
	  <input type="hidden" name="email" id="email" class="form-control"  value="<?php echo isset ($email[0]) ? $email [0] :"Not Found !!" ;	 ?>"  > 
					  <span class="help-block"> Guest E-mail </span> 				
					
	</div>
 <div class="col-md-3">      
       <label class="control-label"> Guest Phone </label>
            <input type="text" name="phone0" id="phone" class="form-control"  value="<?php echo isset ($phone[0]) ? $phone [0] :"Not Found !!" ;	 ?>" disabled> 
	 <input type="hidden" name="phone" id="phone" class="form-control"  value="<?php echo isset ($phone[0]) ? $phone [0] :"Not Found !!" ;	 ?>"> 
					  <span class="help-block"> Guest Phone </span> 				
					
	</div>


			
<?php
 exit;
}
?>