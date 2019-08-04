<?php
/* Database connection start */
include 'db_cls_connect.php';
session_start();
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0=> 'S.No',
	1 => 'name',
	2 => 'language',
	3 => 'code',
	4 => 'input',
	5 => 'output',
	6 => 'created_date'
);

// getting total number records without any search
$sql = "SELECT * ";  //intensionaly * to fetch all columns
$sql.=" FROM programs where student_id='$_SESSION[userid]' order by id DESC";
$query=mysqli_query($conn, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



$sql = "SELECT * ";
$sql.=" FROM programs WHERE student_id='$_SESSION[userid]'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	
	//$searchDataArray = array();
	//$searchDataArray = explode(",",$requestData['search']['value'];
	
	$sql.=" AND ( student_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR language LIKE '".$requestData['search']['value']."%' )";

}
$query=mysqli_query($conn, $sql);
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql);

$i=1;
$data = array();
while( $row=mysqli_fetch_assoc($query) ) {  // preparing an array
	$nestedData=array(); 


	foreach($row as $index=>$value) {
	    $nestedData['s_no'] = $i;
		$nestedData[$index] = $value;
	}



/*	$nestedData[] = $row["order_product_name"];
	$nestedData[] = $row["order_product_salary"];
	$nestedData[] = $row["order_product_age"];
*/	
	$data[] = $nestedData;
	$i++;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"records"            => $data   // total data array
			);
//print_r($data);

echo json_encode($json_data);  // send data as json format

?>
