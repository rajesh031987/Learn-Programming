<?php include 'header.php';?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Manage Employee
                <small>Welcome to Barcode</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Employee</li>
                </ul>                
            </div>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row clearfix">
            
            <div class="col-md-12">
                <div class="card">
                  
                    <div class="tab-content">
                      <div class="tab-pane body active" id="Account">
					
						
                        <div class="row clearfix">
							
						
								<table id="datatable_demo" class="display mdl-data-table" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Employee Id #</th>
											<th>Email</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
							

						
                        </div>                        
                    </div>
                </div>
                          
            </div>
        </div>        
    </div>
</section>
<?php include 'footer.php';?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		    $('#datatable_demo').DataTable( {
				"processing": true,
				"serverSide": true,
		        "ajax": {
		            "url": "server-json-data.php",
		            "type": "POST",
		            "dataSrc": "records"
		        },
		        "columns": [
		            { "data": "emp_id" },
		            { "data": "email" },
		            { "data": "fullname" },
					{ "data": "contactnumber" },
					{ "data": "actions" },
					
				
		        ],
				"columnDefs": [
		        	{
		      		 	"targets": 4,
		                "render": function ( data, type, row ) {
		                    //return row["city"] +', ' + row["country"] +', '+data;
							 return '<a class="btn btn-primary btn-round" href="add-employee.php?eid='+row['id']+'">Edit</a><a href="javascript:void(0);" class="btn btn-primary btn-round" onclick="delete_emp_info('+row['id']+');"><span  class="icon-item-title">Delete</span></a>';
						
						},
		              
		            },
		        ]
		    });
		});
	</script>