<?php
		global $conn;
class Category {

	private $catArray = array();
	private $bc = array();
	private $parents = array();
	private $children = array();
	
	
	public function catName($catid){
		if($catid == 0){
			return '';
		}
		global $conn;

	$query = mysqli_query($conn,"select category from `tbl_category` where id = '$catid'") or die(mysqli_error());
		$cat = mysqli_fetch_assoc($query);
		
		return $cat['category'];
	}	
	public static function changeParent($current, $parent){
	  global $link;
	  $sql = "select * from `tbl_category` where id = '$parent' and parent_cat = '$current'";
	  $query = mysqli_query($conn,$sql) or die(mysql_error());
	  if(mysqli_num_rows($query) > 0){
	  	$sql_new = "update `tbl_category` set parent_cat = '0' where id = '$parent'";
		mysqli_query($conn,$sql_new) or die(mysqli_error());
	  }
	}
	
	public function getCategoryList($parent = 0, $dash = '', $selected){
		global $link;
		global $conn;
		$dash .= '&nbsp;&nbsp;';
		$query = mysqli_query($conn,"select id, parent_cat, category from tbl_category where status = 'active' and parent_cat = '$parent'") or die(mysqli_error());
		if(mysqli_num_rows($query) > 0) {
			while($data = mysqli_fetch_array($query)){
				$sel = $data['id'] == $selected ? 'selected':'';
				echo '<option '.$sel.' value="'.$data['id'].'">'.$dash.'--'.$data['category'].'</option>';
				$this->getCategoryList($data['id'], $dash, $selected);
			}
		}
	}
	
	public function categoryDropdown($selected, $name='parent_cat', $id = 'parentcategory', $class='catclass'){
		ob_start();
		echo $html = '<select id="'.$id.'" name="'.$name.'" class="'.$class.'">';
		echo $html = '<option value="0">--Select a Category</option>';
		$this->getCategoryList(0, '', $selected);
		echo $html = '</select>';
		ob_end_flush();
	}
	
	private function categoryBreadCrumbArray($parent = 0){
		global $link;
		$query = mysql_query("select id, cat_id, parent_cat, category from tbl_service_cat where status = 'active' and id = '$parent'") or die(mysql_error());
		if(mysql_num_rows($query) > 0) {
			while($data = mysql_fetch_array($query)){
				$this->bc[] = $data;
				$this->categoryBreadCrumbArray($data['parent_cat']);
			}
		}
	}
	
	
	
	private function getSubCategories($id){
		global $link;
		$query = mysql_query("select id, cat_id, parent_cat from tbl_service_cat where status = 'active' and parent_cat = '$id'") or die(mysql_error());
		if(mysql_num_rows($query) > 0) {
			while($data = mysql_fetch_array($query)){
				$this->children[] = "'".$data['cat_id']."'";
				$this->getSubCategories($data['id']);
			}
		}	
	}
	
	public function subCategories($id){
		$this->getSubCategories($id);
		return $this->children;
	}
	
	function getSubCategory($catID){
		global $link;
		$query = mysql_query("select id, cat_id, parent_cat, category from tbl_service_cat where parent_cat = '$catID' and status = 'active'") or die(mysql_error());
		while($data = mysql_fetch_array($query)){
			$array[] = $data;
		}
		return $array;
	}
	
	function hasChild($catID){
		global $link;
		$query = mysql_query("select * from tbl_service_cat where parent_cat = '$catID' and status = 'active'") or die(mysql_error());
		if(mysql_num_rows($query) > 0){
			return true;
		}
		return false;
	}
	
	public function uniqueCatID(){
		if (function_exists('com_create_guid') === true)
        return trim(com_create_guid(), '{}');
		$data = openssl_random_pseudo_bytes(16);
		$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
		$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
		return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}
	
	public function getID($uniqueid){
		global $link;
		$query = mysql_query("select id from tbl_service_cat where cat_id = '$uniqueid'") or die(mysql_error());
		$id = mysql_fetch_assoc($query);
		return $id['id'];
	}
	
	public function getUniqueCatID($id){
		global $link;
		$query = mysql_query("select cat_id from tbl_service_cat where id = '$id'") or die(mysql_error());
		$id = mysql_fetch_assoc($query);
		return $id['cat_id'];
	}
	
	public function breadCrumbs(){
		$html  = '<ul class="list-inline">';
		$html .= '<li><a href="index.php">Product Categories</a></li>';
		$cc    = $this->currentCategory();
		$bc    = $this->categoryBreadCrumbArray($cc['parent_cat']);		
		$array = array_reverse($this->bc);	
		foreach($array as $val){
			$html .= '<li><span>></span></li>';
			$html .= '<li><a href="category.php?id='.$val['cat_id'].'">'.ucwords($val['category']).'</a></li>';
		}
		$html .= '<li><span>></span></li>';
		$html .= '<li>'.ucwords($cc['category']).'</li>';
		$html .= '</ul>';
		return $html;
	}
	
	public function currentCategory(){
		$cat_id = $_GET['id'];
		global $link;
		$query = mysql_query("select * from tbl_service_cat where cat_id = '$cat_id'") or die(mysql_error());
		$cat = mysql_fetch_assoc($query);
		return $cat;
	}	
	public function getTest(){
		
	}
}

$__category = new Category();