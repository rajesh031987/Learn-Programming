

function delete_category(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure to delete?')){

		$("#doaction").val('Delete');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}

function active_category(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to active?')){

		$("#doaction").val('Active');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}
function inactive_category(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to inactive?')){

		$("#doaction").val('Inactive');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}

function block_category(value){
	
	
	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to blocked?')){

		$("#doaction").val('Blocked');

			document.product_form.submit();
		
		}		

		}else{

			alert("Please select at least one.");

		}



}



function active_cms(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to active?')){

		$("#doaction").val('Active');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}
function inactive_cms(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure yoy want to active?')){

		$("#doaction").val('Inactive');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}
function delete_cms(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to delete>')){

		$("#doaction").val('Delete');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}
function active_cnt(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to active?')){

		$("#doaction").val('Active');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}
function inactive_cnt(value){


	var total_checked =  $(".checkboxes:checked").length;

	if(total_checked>0){

		if(confirm('Are you sure you want to inactive?')){

		$("#doaction").val('Inactive');

			document.product_form.submit();

		}		

		}else{

			alert("Please select at least one.");

		}



}