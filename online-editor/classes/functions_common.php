<?php 

    class main

    { 

     
		
		//function to add mysql real escape strin for array
		function MysqlRealEscapeString_array($array) {
		   foreach($array as $key=>$value) {
			  if(is_array($value)) { MysqlRealEscapeString_array($value); }
			  else { $array[$key] = mysql_real_escape_string($value); }
		   }
		   return $array;
		} 
		
		// GET CITY
function getcity($id) {
		global $default_con;
		$query =  mysql_query("select * from cities where id='$id' ");
		$result=mysql_fetch_array($query);
		return $result;
		} 
		// GET COUNTRY
		function getcountry($id) {
		global $conn;
		$query =  "select * from countries where id='$id' ";
		$result =  mysqli_query($conn,$query);
		return $result;
		} 
		
		// get product details
		function getCategoryLists($start=0, $perpage=0, $searchparam){
		global $conn;
				
		if($searchparam['Search']=='Search'){
		$search_sql = array();
		$andor = $searchparam['search_type'];
		
		if($searchparam['category']!=''){
			$cat = trim($searchparam['category']);
		$search_sql[]= " category  like '%".$cat."%' ";
		}
		if($searchparam['orderby']!='' && $searchparam['order']!=''){
		$orderby=$_GET['orderby'].' '.$_GET['order'];
		}		
	 
		
		if(!empty($search_sql)){
		$search_sql_query =' AND ( ';
		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);
		$search_sql_query .= " ) ";
		}
		
		//echo $search_sql_query ;die;
		}
		
		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching
	
		
		 $query = "select * from tbl_category where 1 $search_sql_query order by category asc";
		
		if($perpage!=0){
		 $query .=" limit ".$start.",".$perpage;
		}
		$result=mysqli_query($conn,$query);
		return $result;
		}
		// add category
		function add_Category(){ 
		global $default_con;
		$query = "insert into tbl_category set parent_cat='$this->parent_id', name='$this->name', status='$this->status',category ='$this->des',name_ar='$this->namear',category_ar ='$this->desar'";
	//	echo $query;
		
		$result=mysql_query($query, $default_con) or die(mysql_error());
		return mysql_insert_id();
		}
			// edit category
		function edit_Category(){ 
		global $default_con;
		$query = "update tbl_category set parent_cat='$this->parent_id', name='$this->name', status='$this->status',category ='$this->des',name_ar='$this->namear',category_ar ='$this->desar' where id='$this->catid'";
	     echo $query;
		
		$result=mysql_query($query, $default_con) or die(mysql_error());
		return mysql_insert_id();
		}

				
		// delete category
		function deletecategory(){
			global $conn;
		$this->id = mysql_real_escape_string($this->id);

		 echo $query = "delete from tbl_category where id='".$this->id."'";
		 die;
		$result = mysqli_query($conn,$query) or die(mysqli_error());

		if($result){
		return true;
		}else{
		return false;
		}

		}
		
		// active category
		function activecategory(){
			global $conn;
		
		$this->id = mysqli_real_escape_string($this->id);

		 $query = "update tbl_category set status='active' where id='".$this->id."'";
		$result = mysqli_query($conn,$query) or die(mysqli_error());
		if($result){
		return true;
		}else{
		return false;
		}
		}
			// inactive category
		function inactivecategory(){
		global $conn;
		$this->id = mysqli_real_escape_string($this->id);

		 $query = "update tbl_category set status='inactive' where id='".$this->id."'";
		$result = mysqli_query($conn,$query) or die(mysqli_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
		

		
		// get user

		function getuserLists($start=0, $perpage=0, $searchparam){

		global $conn;

				

		if($searchparam['Search']=='Search'){

		$search_sql = array();
		/*
if($_GET['fromdate']!='' && $_GET['todate']!=''){
		$andor = 'AND';
}
	else{
			$andor = 'OR';
			echo "sdfsfsfs";
	}
*/	
$andor = $searchparam['andor'];

		if($searchparam['category']!=''){

		$search_sql[]= " name like '%".$searchparam['category']."%' ";

		}
			if($searchparam['id']!=''){
        $id = $searchparam['id'];
		$search_sql[]= " id = '$id'";

		}

		if($searchparam['orderby']!='' && $searchparam['order']!=''){

		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];

		}	

		if($searchparam['keywords']!=''){
  	//$search_sql[]= " user_fullname like '%".trim($searchparam['keywords'])."%' ";

				$search_sql[]= " user_email like '%".trim($searchparam['keywords'])."%' ";

			    //$search_sql[]= " user_status like '%".trim($searchparam['keywords'])."%' ";
				//$search_sql[]= " area_zip like '%".trim($searchparam['keywords'])."%' ";

		}	

		
			if($searchparam['zip_code']!=''){
             $area_zip = $searchparam['zip_code'];
		   

				$search_sql[]= " area_zip = '$area_zip' ";

	

		}	
			if($searchparam['status']!=''){
		$search_sql[]= " user_status = '".$searchparam['status']."' ";
		}
	if($searchparam['fromdate']!=''){
		$search_sql[]= " user_reg_date >= '".$searchparam['fromdate']."' ";
		}
		
		if($searchparam['todate']!=''){
		$search_sql[]= " user_reg_date <= '".$searchparam['todate']."' ";
		}
		

		if(!empty($search_sql)){

		$search_sql_query =' AND ( ';

		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);

		$search_sql_query .= " ) ";

		}

	



		//echo $search_sql_query ;die;

		}

		

		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching

		if($searchparam['order']){

		 $query = "select * from tbl_register where 1  $search_sql_query order by $orderby";

		 }

		 else{

		 $query = "select * from tbl_register where 1   $search_sql_query order by user_reg_date asc";

		 }

//echo $query;

		if($perpage!=0){

		 $query .=" limit ".$start.",".$perpage;

		}

		$result=mysqli_query($conn,$query);

		return $result;

		}

		
	
		
		// get cms list
		function getCmsLists(){
		global $conn;
	
		$query = "select * from cms where 1 order by page_name ASC";
		$result=mysqli_query($conn,$query) or die(mysqli_error());
		return $result;
		}
		
		// active cms
		function activecms(){
		global $conn;
		$this->id = mysql_real_escape_string($this->id);

		 $query = "update cms set status='active' where cms_id='".$this->id."'";
		$result = mysqli_query($conn,$query) or die(mysqli_error());
		if($result){
		return true;
		}else{
		return false;
		}
		}
		
		// inactive cms
		function inactivecms(){
		global $conn;
		$this->id = mysql_real_escape_string($this->id);

		echo $query = "update cms set status='inactive' where cms_id='".$this->id."'";
		$result = mysqli_query($conn,$query) or die(mysqli_error());
		if($result){
		return true;
		}else{
		return false;
		}
		}
			// delete cms
		function deletecms(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "delete from cms where cms_id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
			function edit_cms(){ 
		global $conn;
		$query = "update cms set page_name='$this->page_name', descp='$this->descp',status='$this->active', meta_title ='$this->meta_title', meta_description='$this->meta_description',meta_keywords= '$this->meta_keywords' where cms_id='$this->cms_id'";
		//echo $query;die;
		$result=mysqli_query($conn,$query) or die(mysqli_error());
		if($result)
		return true;
		else
		return false;
		
		}
// delete users
		function deleteuser(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "delete from tbl_register where id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
		
		
			// get country list
		function getcountryLists($start=0, $perpage=0, $searchparam){
		global $conn;
				
		if($searchparam['Search']=='Search'){
		$search_sql = array();
		$andor = 'OR';
		
		if($searchparam['category']!=''){
		$search_sql[]= " name like '%".$searchparam['category']."%' ";
		}
		if($searchparam['orderby']!='' && $searchparam['order']!=''){
		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];
		}	
	

		if($searchparam['keywords']!=''){
		
				$search_sql[]= " name like '%".trim($searchparam['keywords'])."%' ";
				
		}	
			if($searchparam['status']!=''){
		
				$search_sql[]= " available = '".$searchparam['status']."' ";
				
		}	
	
		if(!empty($search_sql)){
		$search_sql_query =' AND ( ';
		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);
		$search_sql_query .= " ) ";
		}
	
		//echo $search_sql_query ;die;
		}
		
		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching
	if($_GET['order']){
		 $query = "select * from countries where 1 $search_sql_query order by $orderby $order ";
		 }
		 else{
		 $query = "select * from countries where 1  $search_sql_query order by name asc";
		 }
	
		
		if($perpage!=0){
		 $query .=" limit ".$start.",".$perpage;
		}
		$result=mysqli_query($conn,$query);
		return $result;
		}
		
			// delete country
		function deletecountry(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "delete from countries where id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
		
		
		
		
		
		
		
			// get state list
		function getstateLists($start=0, $perpage=0, $searchparam){
		global $conn;
				
		if($searchparam['Search']=='Search'){
		$search_sql = array();
		$andor = 'OR';
		
		if($searchparam['category']!=''){
		$search_sql[]= " name like '%".$searchparam['category']."%' ";
		}
		if($searchparam['orderby']!='' && $searchparam['order']!=''){
		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];
		}	
	

		if($searchparam['keywords']!=''){
		
				$search_sql[]= " name like '%".trim($searchparam['keywords'])."%' ";
				
		}	
	
		if(!empty($search_sql)){
		$search_sql_query =' AND ( ';
		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);
		$search_sql_query .= " ) ";
		}
	
		//echo $search_sql_query ;die;
		}
		
		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching
		if($searchparam['order']){
		 $query = "select * from states where 1  $search_sql_query order by $orderby";
		 }
		 else{
		 $query = "select * from states where 1  $search_sql_query order by id DESC";
		 }
		
		if($perpage!=0){
		 $query .=" limit ".$start.",".$perpage;
		}
		$result=mysqli_query($conn,$query);
		return $result;
		}
		
		
		
		// delete states
		function deletestate(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "delete from states where id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
	
			// get state list
		function getcityLists($start=0, $perpage=0, $searchparam){
		global $conn;
				
		if($searchparam['Search']=='Search'){
		$search_sql = array();
		$andor = 'OR';
		
		if($searchparam['category']!=''){
		$search_sql[]= " name like '%".$searchparam['category']."%' ";
		}
		if($searchparam['orderby']!='' && $searchparam['order']!=''){
		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];
		}	
	

		if($searchparam['keywords']!=''){
			$cty = trim($searchparam['keywords']);
		
				$search_sql[]= " name = '$cty' ";
				
		}	
	
		if(!empty($search_sql)){
		$search_sql_query =' AND ( ';
		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);
		$search_sql_query .= " ) ";
		}
	
		//echo $search_sql_query ;die;
		}
		
		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching
		if($searchparam['order']){
		 $query = "select * from cities where 1  $search_sql_query order by $orderby";
		 }
		 else{
		 $query = "select * from cities where 1  $search_sql_query order by id DESC";
		 }
		
		if($perpage!=0){
		 $query .=" limit ".$start.",".$perpage;
		}
		$result=mysqli_query($conn,$query);
		return $result;
		}
			
		
		
		
		
					
		// delete category
		function deletecity(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "delete from cities where id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
	

	
		
				// active country
		function activecountry(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "update countries set available=1 where id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}
		}
				// inactive country
		function inactivecountry(){
		
		$this->id = mysql_real_escape_string($this->id);

		 $query = "update countries set available=0 where id='".$this->id."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}
		}

		
		
			
				// redirect 
			function redirect($redirect){
		echo "<script>document.location.href='$redirect'</script>";	
		header("Location: $redirect");
		}
		

			
					
					// Posted by
			function posteddate($date){
		$result = date('d-M-Y',strtotime($date));
		
		return $result;
		}

	

// Select main category
		function maincategory(){
		$query=mysql_query("select * from tbl_category where parent_cat ='0' AND status='active' ORDER BY category ASC");
		
		return $query;
		}
			


					// generate dynamic id
		function generateid($num){
		 for ($i=0; $i<$num; $i++)

	{ 

		$d=rand(1,30)%2; 

		$d=$d ? chr(rand(65,90)) : chr(rand(48,57));

		$uid=$uid.$d;
		return $uid;

	}

		}
		

				//category name
		function getcategory($id){
		$query=mysql_query("select * from tbl_category where id='$id'");
		$fetch = mysql_fetch_array($query);
		$category = $fetch['category'];
		return $category;
		}
			
	
	
		


		// delete single records
		function delete_single_record($tbl,$where){
	global $conn;
	

	       $query = "delete from $tbl $where";
	  
		$result = mysqli_query($conn,$query) or die(mysqli_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}	
				//get list records with condition
		function get_list_record($tbl,$id){
			global $conn;
			$q =  "select * from $tbl $id";
		$query = mysqli_query($conn,$q) or die(mysqli_error());
	    while($data_s = mysqli_fetch_array($query)){
		$fetch[] = $data_s;
		}
		return $fetch;
		}

			//single record
		function get_single_record($tbl,$id){
			global $conn;
		//echo "select * from $tbl $id";
		 $query=mysqli_query($conn,"select * from $tbl $id");
	  $data_s = mysqli_fetch_array($query);
		$fetch = $data_s;
		
		return $fetch;
		}
				// Count number of records in table
		function get_count_record($tbl,$id){
				global $conn;
		// echo "select * from $tbl $id";
		$query=mysqli_query($conn,"select * from $tbl $id");
	  $data_s = mysqli_num_rows($query);
		$fetch = $data_s;
		
		return $fetch;
		}
// insert data
		
		    function insert_data($data,$tbl){
					global $conn;
		 $query = "insert into $tbl set $data ";
			$result = mysqli_query($conn,$query);
			return result;
			}
				// update data
		
		    function update_data($data,$tbl,$where){
					global $conn;
		  $query = "update $tbl set $data  $where ";
			$result = mysqli_query($conn,$query);
			return result;
			}
			// destinations

		
	

		// get subcateogy
		function getsubCategoryLists($start=0, $perpage=0, $searchparam){
		global $conn;
				
		if($searchparam['Search']=='Search'){
		$search_sql = array();
		$andor = $searchparam['search_type'];
		
		if($searchparam['category']!=''){
			$cat = trim($searchparam['category']);
		$search_sql[]= " subcatname  like '%".$cat."%' ";
		}
		if($searchparam['orderby']!='' && $searchparam['order']!=''){
		$orderby=$_GET['orderby'].' '.$_GET['order'];
		}		
	 
		
		if(!empty($search_sql)){
		$search_sql_query =' AND ( ';
		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);
		$search_sql_query .= " ) ";
		}
		
		//echo $search_sql_query ;die;
		}
		
		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching
	
		
		 $query = "select * from tbl_subcategory where 1 $search_sql_query order by subcatname asc";
		
		if($perpage!=0){
		 $query .=" limit ".$start.",".$perpage;
		}
		$result=mysqli_query($conn,$query);
		return $result;
		}
	
	
// get store list

		function getstudentLists($start=0, $perpage=0, $searchparam){

		global $conn;

				

		if($searchparam['Search']=='Search'){

		$search_sql = array();
		/*
if($_GET['fromdate']!='' && $_GET['todate']!=''){
		$andor = 'AND';
}
	else{
			$andor = 'OR';
			echo "sdfsfsfs";
	}
*/	
$andor = 'AND';

	
			if($searchparam['id']!=''){
        $id = $searchparam['id'];
		$search_sql[]= " id = '$id'";

		}

		if($searchparam['orderby']!='' && $searchparam['order']!=''){

		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];

		}	

		if($searchparam['keywords']!=''){
  	//$search_sql[]= " user_fullname like '%".trim($searchparam['keywords'])."%' ";

				//$search_sql[]= "user_name like '%".trim($searchparam['keywords'])."%' ";

			    $search_sql[]= "email like '%".trim($searchparam['keywords'])."%' OR user_name like '%".trim($searchparam['keywords'])."%' OR student_id like '%".trim($searchparam['keywords'])."%'";
				//$search_sql[]= " area_zip like '%".trim($searchparam['keywords'])."%' ";

		}
		
		

			
			if($searchparam['status']!=''){
		$search_sql[]= " status = '".$searchparam['status']."' ";
		}

	
		

		if(!empty($search_sql)){

		$search_sql_query =' AND ( ';

		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);

		$search_sql_query .= " ) ";

		}

		//echo $search_sql_query ;die;

		}

		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching

		if($searchparam['order']){

		  $query = "select * from tbl_student where 1  $search_sql_query order by $orderby";

		 }

		 else{

		 $query = "select * from tbl_student where 1 $search_sql_query order by created_date DESC";

		 }

//echo $query;

		if($perpage!=0){

		 $query .=" limit ".$start.",".$perpage;

		}

		$result=mysqli_query($conn,$query);

		return $result;

		}

		// get store list

		function getemployeeLists($start=0, $perpage=0, $searchparam){

		global $conn;

				

		if($searchparam['Search']=='Search'){

		$search_sql = array();
		/*
if($_GET['fromdate']!='' && $_GET['todate']!=''){
		$andor = 'AND';
}
	else{
			$andor = 'OR';
			echo "sdfsfsfs";
	}
*/	
$andor = 'AND';

		if($searchparam['category']!=''){

		$search_sql[]= " name like '%".$searchparam['category']."%' ";

		}
			if($searchparam['id']!=''){
        $id = $searchparam['id'];
		$search_sql[]= " id = '$id'";

		}

		if($searchparam['orderby']!='' && $searchparam['order']!=''){

		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];

		}	

		if($searchparam['keywords']!=''){
  	//$search_sql[]= " user_fullname like '%".trim($searchparam['keywords'])."%' ";

				$search_sql[]= " emp_id  = '$searchparam[keywords]' ";

			    //$search_sql[]= " user_status like '%".trim($searchparam['keywords'])."%' ";
				//$search_sql[]= " area_zip like '%".trim($searchparam['keywords'])."%' ";

		}	

				if($searchparam['store_id']!=''){
             $store_id = $searchparam['store_id'];
		   

				$search_sql[]= " store_id = '$store_id' ";
		}	
			if($searchparam['status']!=''){
		$search_sql[]= " status = '".$searchparam['status']."' ";
		}
	if($searchparam['fromdate']!=''){
		$search_sql[]= " user_reg_date >= '".$searchparam['fromdate']."' ";
		}
		
		if($searchparam['todate']!=''){
		$search_sql[]= " user_reg_date <= '".$searchparam['todate']."' ";
		}
		

		if(!empty($search_sql)){

		$search_sql_query =' AND ( ';

		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);

		$search_sql_query .= " ) ";

		}

		//echo $search_sql_query ;die;

		}

		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching

		if($searchparam['order']){

		 $query = "select * from tbl_employee where 1  $search_sql_query order by $orderby";

		 }

		 else{

		 $query = "select * from tbl_employee where 1   $search_sql_query order by created_date DESC";

		 }

//echo $query;

		if($perpage!=0){

		 $query .=" limit ".$start.",".$perpage;

		}

		$result=mysqli_query($conn,$query);

		return $result;

		}
			// get store list

		function getorderLists($start=0, $perpage=0, $searchparam){

		global $conn;

				

		if($searchparam['Search']=='Search'){

		$search_sql = array();
		/*
if($_GET['fromdate']!='' && $_GET['todate']!=''){
		$andor = 'AND';
}
	else{
			$andor = 'OR';
			echo "sdfsfsfs";
	}
*/	
$andor = 'AND';

		if($searchparam['category']!=''){

		$search_sql[]= " name like '%".$searchparam['category']."%' ";

		}
			if($searchparam['order_id']!=''){
        $order_id = $searchparam['order_id'];
		$search_sql[]= " order_id = '$order_id'";

		}
if($searchparam['emp_id']!=''){
        $emp_id = $searchparam['emp_id'];
		$search_sql[]= " emp_id = '$emp_id'";

		}
		if($searchparam['orderby']!='' && $searchparam['order']!=''){

		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];

		}	

		if($searchparam['keywords']!=''){
  	//$search_sql[]= " user_fullname like '%".trim($searchparam['keywords'])."%' ";

				$search_sql[]= " emp_id  = '$searchparam[keywords]' ";

			    //$search_sql[]= " user_status like '%".trim($searchparam['keywords'])."%' ";
				//$search_sql[]= " area_zip like '%".trim($searchparam['keywords'])."%' ";

		}	

				if($searchparam['store_id']!=''){
             $store_id = $searchparam['store_id'];
		   

				$search_sql[]= " store_id = '$store_id' ";
		}	
			if($searchparam['status']!=''){
		$search_sql[]= " status = '".$searchparam['status']."' ";
		}
	if($searchparam['fromdate']!=''){
		$search_sql[]= " user_reg_date >= '".$searchparam['fromdate']."' ";
		}
		
		if($searchparam['todate']!=''){
		$search_sql[]= " user_reg_date <= '".$searchparam['todate']."' ";
		}
		

		if(!empty($search_sql)){

		$search_sql_query =' AND ( ';

		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);

		$search_sql_query .= " ) ";

		}

		//echo $search_sql_query ;die;

		}

		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching

		if($searchparam['order']){

		 $query = "select * from tbl_order where 1  $search_sql_query order by $orderby";

		 }

		 else{

		 $query = "select * from tbl_order where 1   $search_sql_query order by created_date DESC";

		 }

//echo $query;

		if($perpage!=0){

		 $query .=" limit ".$start.",".$perpage;

		}

		$result=mysqli_query($conn,$query);

		return $result;

		}
		
		
		// get store list

		function getprogramLists($start=0, $perpage=0, $searchparam){

		global $conn;

				

		if($searchparam['Search']=='Search'){

		$search_sql = array();
		
$andor = 'AND';

	
			if($searchparam['id']!=''){
        $id = $searchparam['id'];
		$search_sql[]= " id = '$id'";

		}


		if($searchparam['orderby']!='' && $searchparam['order']!=''){

		$orderby=' '.$searchparam['orderby'].' '.$searchparam['order'];

		}	

		if($searchparam['keywords']!=''){
  	//$search_sql[]= " user_fullname like '%".trim($searchparam['keywords'])."%' ";

				//$search_sql[]= "user_name like '%".trim($searchparam['keywords'])."%' ";

			    $search_sql[]= "name like '%".trim($searchparam['keywords'])."%' ";
				//$search_sql[]= " area_zip like '%".trim($searchparam['keywords'])."%' ";

		}	
        if($searchparam['student_id']!=''){
           $search_sql[]= "student_id =".$searchparam['student_id']; 
        }
			
			if($searchparam['status']!=''){
		$search_sql[]= " status = '".$searchparam['status']."' ";
		}

	
		

		if(!empty($search_sql)){

		$search_sql_query =' AND ( ';

		$search_sql_query = $search_sql_query." ".implode($andor,$search_sql);

		$search_sql_query .= " ) ";

		}

		//echo $search_sql_query ;die;

		}

		//$query = "select * from registration where product_type='".$website."' and isvendor='0' order by id desc"; // old without searching

		if($searchparam['order']){

		 $query = "select * from programs where student_id='$_SESSION[userid]'  $search_sql_query order by $orderby";

		 }

		 else{

		 $query = "select * from programs where student_id='$_SESSION[userid]'   $search_sql_query order by id DESC";

		 }

echo $query;


		if($perpage!=0){

		 $query .=" limit ".$start.",".$perpage;

		}

		$result=mysqli_query($conn,$query);

		return $result;

		}
    } /* settings */

?>