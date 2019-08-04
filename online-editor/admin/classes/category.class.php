<?php 

    class Category

    { 

        var $cat_id;
		var $added_date;
		
		function getDetailstopic($id){
		global $default_con;
		
		$id = mysql_real_escape_string($id);
		$query=mysql_query("select * from tbl_topic where id='".$id."'", $default_con) or die(mysql_error());
		$result=mysql_fetch_array($query);
		return $result;
		}
		
		
		
		// Add Topic
			function add_topic(){ 
		global $default_con;
		$query = "insert into tbl_topic set cat_id='$this->parent_id',topic='$this->name', active='$this->active'";
		$result=mysql_query($query, $default_con) or die(mysql_error());
		return mysql_insert_id();
		}	
		
			// Add Sub Typic
			function add_sub_topic(){ 
		global $default_con;
		$query = "insert into tbl_subtopic set cat_id='$this->course',topic_id='$this->topic',what_select='$this->select_what',shortdes='$this->shortdes',longdes='$this->shortdes',sub_topic='$this->subtopic',video_code='$this->video_code',file_name='$this->img', active='$this->active'";
		$result=mysql_query($query, $default_con) or die(mysql_error());
		return mysql_insert_id();
		}	
		
		
		// Topic List course wise
			function getCategorytopiclist(){
		global $default_con;
	
		$query = "select * from tbl_topic where cat_id='$this->cat_id'";
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
		
		
			// Sub Topic List Topic wise
			function getCategorysubtopiclist(){
		global $default_con;
	
		$query = "select * from tbl_subtopic where topic_id ='$this->cat_id'";
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
		
		
		// all topic list
			function getCategorytopic_list(){
		global $default_con;
	
		$query = "select * from tbl_topic";
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
		
		// subtopic list
		function getsubtopiclist(){
		global $default_con;
	
		$query = "select * from tbl_subtopic";
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
			// Edit Topic
		function edit_topic(){ 
		global $default_con;
	  $query = "update  tbl_topic set cat_id='$this->parent_id',topic='$this->name', active='$this->active' where id='$this->cat_id'";
		//echo $query;die;
		$result=mysql_query($query, $default_con) or die(mysql_error());
		if($result)
		return true;
		else
		return false;
		
		}
		
		
				// Edit Topic
		function edit_sub_topic(){ 
		global $default_con;
	
	
		
	 $query = "update tbl_subtopic set cat_id='$this->course',topic_id='$this->topic',what_select='$this->select_what',shortdes='$this->shortdes',longdes='$this->shortdes',sub_topic='$this->subtopic',video_code='$this->video_code',file_name='$this->img',active='$this->active' where id='$this->cat_id'";
		//echo $query;die;
		$result=mysql_query($query, $default_con) or die(mysql_error());
		if($result)
		return true;
		else
		return false;
		
		}
		
		
		
		// get cms details
		function getDetails($id){
		global $default_con;
		
		$id = mysql_real_escape_string($id);
		$query=mysql_query("select * from category where cat_id='".$id."'", $default_con) or die(mysql_error());
		$result=mysql_fetch_array($query);
		return $result;
		}
		
			
		
		function add_Category(){ 
		global $default_con;
		$query = "insert into category set cat_id='', parent_id='$this->parent_id', name='$this->name', active='$this->active', meta_title ='$this->meta_title', meta_description ='$this->meta_description',	meta_keywords= '$this->meta_keywords' , project_big_image='$this->project_big_image',project_image_thumb='$this->project_image_thumb' ,project_small_image='$this->project_small_image',price='$this->price',course_des='$this->longdes'";
		$result=mysql_query($query, $default_con) or die(mysql_error());
		return mysql_insert_id();
		}
		
		function edit_Category(){ 
		global $default_con;
		
		$img_sql='';
		if($this->project_big_image!=''){
		$img_sql = " , project_big_image='$this->project_big_image',project_image_thumb='$this->project_image_thumb' ,project_small_image='$this->project_small_image'   ";
		}
		
		$query = "update category set parent_id='$this->parent_id', name='$this->name', active='$this->active', meta_title ='$this->meta_title', meta_description ='$this->meta_description',	meta_keywords= '$this->meta_keywords',price='$this->price',course_des='$this->longdes' $img_sql where cat_id='$this->cat_id'";
		//echo $query;die;
		$result=mysql_query($query, $default_con) or die(mysql_error());
		if($result)
		return true;
		else
		return false;
		
		}
		
		
		
		
		
		// get category list
		function getCategoryLists(){
		global $default_con;
	
		$query = "select * from category where 1 and parent_id ='0' order by name ASC";
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
		
		// get category list
		function getSubCategoryLists(){
		global $default_con;
	
		$query = "select category.*,category2.name as subcategory from category, category as category2 where 1 AND category.parent_id = category2.cat_id AND category.parent_id !='0' AND category.parent_id='$this->cat_id' order by category.name ASC";
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
		
		
		function getSubcategoryByCategoryId($id){
		global $default_con;
		$id =  mysql_real_escape_string($id);
		$query = "select * from category where 1 and parent_id ='$id' order by name ASC";
		//echo $query;die;
		$result=mysql_query($query ,$default_con) or die(mysql_error());
		return $result;
		}
		
		// delete category 
		function deleteCategory(){
		global $default_con;
		$this->cat_id = mysql_real_escape_string($this->cat_id);
		$query = "delete from category where cat_id='".$this->cat_id."'";
		$result = mysql_query($query, $default_con) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
		
// edit topic
// delete category 
		function deletetopic(){
		global $default_con;
		$this->cat_id = mysql_real_escape_string($this->cat_id);
		$query = "delete from tbl_topic where id='".$this->cat_id."'";
		$result = mysql_query($query, $default_con) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}
		// delete sub topic
		function delete_subtopic(){
		global $default_con;
		$this->cat_id = mysql_real_escape_string($this->cat_id);
		$query = "delete from tbl_subtopic where id='".$this->cat_id."'";
		$result = mysql_query($query, $default_con) or die(mysql_error());
		if($result){
		return true;
		}else{
		return false;
		}

		}


    } //order class end

?>