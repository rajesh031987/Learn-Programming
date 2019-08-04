function AllowNumbersOnly(e)

{

var unicode=e.charCode?e.charCode:e.keyCode;

if(unicode!=8&&unicode!=9){

	if(unicode<48||unicode>57){

		return false;

		}

		}

return true;

}



function getSubcategory(selected){

        var dataString = 'cat_id='+selected;

      

        	$.ajax({

        		type: "POST",

				dataType: "text",

        		url: "get_subcategory.php",

        		data: dataString,

        		beforeSend: function() {

        			//$('alert, .alert-success, alert-dismissable, #break').remove();

        			

        		},

        		success: function(data){ 

				$("#subcategory").html(data);



            }

        	});

}

	



function validate_topicform(){

	

		if( $("#title").val() ==''){

		alert("Please enter title.");

		$("#title").focus();

		return false;

		}

	  $("#doaction").val('AddCategory');

	document.user_form.submit();

	}	


function validate_subtopicform(){

	

		if( $("#course").val() ==''){

		alert("Please select course");

		$("#course").focus();

		return false;

		}

		if( $("#topic").val() ==''){

		alert("Please select topic");

		$("#topic").focus();

		return false;

		}
		
			if( $("#subtopic").val() ==''){

		alert("Please select sub topic");

		$("#subtopic").focus();

		return false;

		}
		
	  $("#doaction").val('AddCategory');

	document.user_form.submit();

	}






function delete_products(){

	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure? wana delete record.')){

		$("#doaction").val('Delete');

		document.product_form.submit();

		}		

		}else{

			alert("Please select at least one produt.");

		}



}





function validate_project(){

		

		if( $("#project_name").val() ==''){

		alert("Please enter product name.");

		$("#project_name").focus();

		return false;

		}

		

		if( $("#category").val() ==''){

		alert("Please select a category.");

		$("#category").focus();

		return false;

		}

		

	

		if( $("#short_description").val() ==''){

		alert("Please enter short description");

		$("#short_description").focus();

		return false;

		}

		

		var description = tinyMCE.get('description').getContent();

		if( description == ''){

		alert("Please enter description");

		$("#description").focus();

		return false;

		}

		

		if( $("#meta_title").val() ==''){

		alert("Please enter meta title");

		$("#meta_title").focus();

		return false;

		}

		

		if( $("#meta_keywords").val() ==''){

		alert("Please enter meta keywords.");

		$("#meta_keywords").focus();

		return false;

		}

		

		if( $("#meta_desc").val() ==''){

		alert("Please enter meta description");

		$("#meta_desc").focus();

		return false;

		}

		

	

		if( $("#price").val() ==''){

		alert("Please enter project price.");

		$("#price").focus();

		return false;

		}

		

		if( $("#pimage").val() ==''){

		alert("Please enter project image.");

		$("#pimage").focus();

		return false;

		}

				

		$("#doaction").val('AddProject');

		$("#category_name").val($("#category :selected").text());

	

	document.product_form.submit();

	

	}

	

	

function validate_project_edit(){

	

		if( $("#project_name").val() ==''){

		alert("Please enter product name.");

		$("#project_name").focus();

		return false;

		}

		

		if( $("#category").val() ==''){

		alert("Please select a category.");

		$("#category").focus();

		return false;

		}

		

	

		if( $("#short_description").val() ==''){

		alert("Please enter short description");

		$("#short_description").focus();

		return false;

		}

		

		var description = tinyMCE.get('description').getContent();

		if( description == ''){

		alert("Please enter description");

		$("#description").focus();

		return false;

		}

		

		

		var meterial_name_total = 0;

		$("input[name='meterial_name[]']").each(function(){

		  if(($(this).val()== '') || ($(this).val()== '0')){

		  meterial_name_total = meterial_name_total+1;

		  }

		});

		

		if(meterial_name_total>0){

			    alert('Please enter meterial name.');

			   return false;

			

		}

		

		var vendor_total = 0;

		$("input[name='vendor[]']").each(function(){

		  if(($(this).val()== '') || ($(this).val()== '0')){

		  vendor_total = vendor_total+1;

		  }

		});

		

		if(vendor_total>0){

			    alert('Please enter vendor name.');

			   return false;

			

		}

		

		var price_lists_total = 0;

		$("input[name='price_lists[]']").each(function(){

		  if(($(this).val()== '') || ($(this).val()== '0')){

		  price_lists_total = price_lists_total+1;

		  }

		});

		

		if(vendor_total>0){

			    alert('Please enter price.');

			   return false;

			

		}

		

		var quantity_lists_total = 0;

		$("input[name='quantity_lists[]']").each(function(){

		  if(($(this).val()== '') || ($(this).val()== '0')){

		  quantity_lists_total = quantity_lists_total+1;

		  }

		});

		

		if(quantity_lists_total>0){

			    alert('Please enter meterial quantity.');

			   return false;

			

		}

		

		

		

		if( $("#meta_title").val() ==''){

		alert("Please enter meta title");

		$("#meta_title").focus();

		return false;

		}

		

		if( $("#meta_keywords").val() ==''){

		alert("Please enter meta keywords.");

		$("#meta_keywords").focus();

		return false;

		}

		

		if( $("#meta_desc").val() ==''){

		alert("Please enter meta description");

		$("#meta_desc").focus();

		return false;

		}

		

	

		if( $("#price").val() ==''){

		alert("Please enter project price.");

		$("#price").focus();

		return false;

		}

		

	/*	if( $("#pimage").val() ==''){

		alert("Please enter project image.");

		$("#pimage").focus();

		return false;

		}*/

				

		$("#doaction").val('EditProject');

		$("#category_name").val($("#category :selected").text());

	

	document.product_form.submit();

	

	

	}

	

	

function validate_cmsform(){

	

		if( $("#title").val() ==''){

		alert("Please page name.");

		$("#title").focus();

		return false;

		}

		

		

     $("#doaction").val('AddCms');

	document.user_form.submit();

	}		

	

	

function validate_edicmsform(){

	

		if( $("#title").val() ==''){

		alert("Please page name.");

		$("#title").focus();

		return false;

		}

		

		

     $("#doaction").val('EditCms');

	document.user_form.submit();

	}

	

	

	

function validate_categoryform(){

	

		if( $("#title").val() ==''){

		alert("Please enter title.");

		$("#title").focus();

		return false;

		}

	

		if( $("#meta_title").val() ==''){

		alert("Please enter meta title");

		$("#meta_title").focus();

		return false;

		}

		

		if( $("#meta_keywords").val() ==''){

		alert("Please enter meta keywords.");

		$("#meta_keywords").focus();

		return false;

		}

		

		if( $("#meta_desc").val() ==''){

		alert("Please enter meta description");

		$("#meta_desc").focus();

		return false;

		}

     $("#doaction").val('AddCategory');

	document.user_form.submit();

	}	

	

function validate_editcategoryform(){

	

		if( $("#title").val() ==''){

		alert("Please enter title.");

		$("#title").focus();

		return false;

		}

	

		if( $("#meta_title").val() ==''){

		alert("Please enter meta title");

		$("#meta_title").focus();

		return false;

		}

		

		if( $("#meta_keywords").val() ==''){

		alert("Please enter meta keywords.");

		$("#meta_keywords").focus();

		return false;

		}

		

		if( $("#meta_desc").val() ==''){

		alert("Please enter meta description");

		$("#meta_desc").focus();

		return false;

		}

     $("#doaction").val('EditCategory');

	document.user_form.submit();

}	

	

	

function validate_userform(){

		

		

		

		if( $("#fname").val() ==''){

		alert("Please enter first name.");

		$("#fname").focus();

		return false;

		}

		

		if( $("#lname").val() ==''){

		alert("Please enter last name.");

		$("#lname").focus();

		return false;

		}

		

		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val())) {



    	}else{

		alert("Please enter a valid email.");

		$("#email").focus();

		return false;

		}
		
		if( $("#password").val() ==''){

		alert("Please enter password.");

		$("#password").focus();

		return false;

		}

		

		if( $("#cpassword").val() ==''){

		alert("Please enter confirm password.");

		$("#cpassword").focus();

		return false;

		}

		

		if( $("#password").val() != $("#cpassword").val()){

		alert("Confirm password is not matching");

		$("#cpassword").focus();

		return false;

		}

	
	

		

	

		

		

		

		$("#doaction").val('AddUser');

		$("#country_name").val($("#country :selected").text());

	

	document.user_form.submit();

	

	}

	

			

function validate_edituserform(){

		



		

		

	

		$("#doaction").val('EditUser');

	

	

	document.user_form.submit();

	

	}

	

function delete_cms(){

	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure? wana delete record.')){

		$("#doaction").val('Delete');

		document.product_form.submit();

		}		

		}else{

			alert("Please select at least one page.");

		}



}





function delete_projects(){

	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure? wana delete record.')){

		$("#doaction").val('Delete');

		document.product_form.submit();

		}		

		}else{

			alert("Please select at least one record.");

		}



}





function delete_category(){

	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure? wana delete record.')){

		$("#doaction").val('Delete');

		document.product_form.submit();

		}		

		}else{

			alert("Please select at least one record.");

		}



}



	function delete_orderss(){

	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure? wana delete record.')){

		$("#doaction").val('Delete');

		document.product_form.submit();

		}		

		}else{

			alert("Please select at least one order.");

		}



}





function delete_users(){

	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure? wana delete record.')){

		$("#doaction").val('Delete');

		document.product_form.submit();

		}		

		}else{

			alert("Please select at least one user.");

		}



}





//autofil search for vendors

function removethis(removethis){

	$( "#vendror_"+removethis ).remove();

	}

	

function selectVendor(vendor){

var dataString = 'searchCallingPlan=true&iso='+vendor.id;

$("#suggestme").html("").show("fast");

var selectedtext = '<span id="vendror_'+vendor.id+'" class="vendor-span">'+vendor.text+'<a onclick="removethis('+vendor.id+')" href="javascript:void(0);">&nbsp;&nbsp;X</a><input type="hidden" name="vendor_lists[]" value="'+vendor.id+'"></span>';

$("#selectedVendors").html($("#selectedVendors").html() + selectedtext);

$( "#vendor").val('');

}



function selectVendor1(vendor){

var dataString = 'searchCallingPlan=true&iso='+vendor.id;

$("#suggestme").html("").show("fast");

$( "#vendor_name").val(vendor.text);

$( "#vendor_ID").val(vendor.id);

}





function searchVendor(txtval){

txtval = txtval.toLowerCase();

var results='';





if(txtval!=''){

	var dataString = 'searchVendor=true&searchtxt='+txtval;

	$.ajax({

		type: "POST",

		dataType: "text",

		url: "search_vendor.php",

		async : false,

		data: dataString,

		beforeSend: function() {

			$("#searchresult").html("<div style='width:480px; margin-bottom:20px; margin-top:20px; text-align:center;'><img src='Images/loader.gif' ></div>").show("fast");

			},

		success: function(result){

		$("#suggestme").html(result);

		$("#searchresult").html('');



		}

	});

	}



}





function searchVendor1(txtval){

txtval = txtval.toLowerCase();

var results='';





if(txtval!=''){

	var dataString = 'searchVendor=true&searchtxt='+txtval;

	$.ajax({

		type: "POST",

		dataType: "text",

		url: "search_vendor1.php",

		async : false,

		data: dataString,

		beforeSend: function() {

			$("#searchresult").html("<div style='width:480px; margin-bottom:20px; margin-top:20px; text-align:center;'><img src='Images/loader.gif' ></div>").show("fast");

			},

		success: function(result){

		$("#suggestme").html(result);

		$("#searchresult").html('');



		}

	});

	}



}



function check_available_products(quantity,productId){

var results='';





if(productId!=''){

	var dataString = 'GetAvailableProduct=true&productId='+productId;

	$.ajax({

		type: "POST",

		dataType: "text",

		url: "add_order.php",

		async : false,

		data: dataString,

		beforeSend: function() {

			$( "<div style='margin-bottom:20px; margin-top:20px; text-align:center;' id='loader_image'><img src='Images/loader.gif' height='80' width='80' ></div>"  ).insertAfter("#available_products");

			//$("#available_products").html("<div style='width:480px; margin-bottom:20px; margin-top:20px; text-align:center;' id='loader_image'><img src='Images/loader.gif' ></div>").show("fast");

			},

		success: function(result){

			$("#loader_image").remove();

			$("#available_products_hidden").val(result);

		if(parseInt(quantity) > parseInt(result)){

			alert('Quantity should be less than or equal to available products');

			$("#quantity").focus();

			return false;

			}



		}

	});

	}



}







function validate_order(){

	

	if( $("#product_id").val() ==''){

		alert("Please select a product.");

		$("#product_id").focus();

		return false;

	}



	if( $("#quantity").val() ==''){

		alert("Please enter product quantity.");

		$("#quantity").focus();

		return false;

	}

	

	if( parseInt($("#quantity").val()) >   parseInt($("#available_products_hidden").val())){

		alert('Quantity should be less than or equal to available products');

		$("#quantity").focus();

		return false;

	}

	

	if( $("#price").val() ==''){

		alert("Please enter product price.");

		$("#price").focus();

		return false;

	}

	

	if( $("#vendor_id").val() ==''){

		alert("Please select a vendor.");

		$("#vendor_id").focus();

		return false;

	}



	if( $("#user_id").val() ==''){

		alert("Please select a user.");

		$("#user_id").focus();

		return false;

	}

	

	$("#doaction").val('AddOrder');

	

	document.order_form.submit();

}





function validate_admin_form(){

	

	

	

	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val())) {



    	}else{

		alert("Please enter a valid email.");

		$("#email").focus();

		return false;

		}

		

		

	if( ($("#password").val() =='') || ($("#password").val().length <6 ) ){

		alert("Password length must be at least of 6 characters.");

		$("#password").focus();

		return false;

	}
	

	}

	

function DeleteProductGallery(product_id,imageName,id){

	

	confirmdelete =  confirm('Are you sure? wana delete this image.');

	

if(product_id!='' && confirmdelete==true){

	var dataString = 'op=delete&product_id='+product_id+'&name='+imageName;

	$.ajax({

		type: "POST",

		dataType: "text",

		url: "Upload/delete.php",

		async : false,

		data: dataString,

		beforeSend: function() {

			

			$("#gallery_"+id).append("<div style='margin-bottom:20px; margin-top:20px; text-align:center;' id='loader_image'><img src='Images/loader.gif' height='80' width='80' ></div>");

			},

		success: function(result){

			$("#gallery_"+id).remove();

			

			}

	});

	}

	

	}	

	

	

	

	

		function AddMore(){

		

		var add_string = '<tr><td><input type="text" name="meterial_name[]" id="meterial_name" placeholder="Meterial Name" value=""></td><td><input type="text" name="vendor[]" id="vendor"  placeholder="Vendor Name" value=""></td><td><input type="text" name="price_lists[]" placeholder="Price" value="" onkeypress="return AllowNumbersOnly(event);"></td>    <td><input type="text" name="quantity_lists[]" placeholder="Quanity" value="" onkeypress="return AllowNumbersOnly(event);"></td><td><a href="javascript:;" onclick="deletemeterial(this);" class="deletem">X</a></td></tr>';

		

		$("#meterial_required_table").append(add_string);

		}

		

		

		function deletemeterial(thisobj){

		$(thisobj).parent().parent().remove();

		

		}
		
	