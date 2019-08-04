<?php include 'header.php';?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Manage Programs
                <small>Welcome to programming world</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    
                    <li class="breadcrumb-item active">Manage Programs</li>
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
											<th>Student Id #</th>
											<th>Program Name</th>
											<th>Language</th>
											<th>Code</th>
											<th>Input</th>
											<th>Output</th>
											<th>KeyStroke</th>
											<th>Created Date</th>
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
				"autoWidth":true,
		        "ajax": {
		            "url": "server-json-data.php",
		            "type": "POST",
		            "dataSrc": "records"
		        },
		        "columns": [
		            { "data": "s_no" },
		            { "data": "name" },
		            { "data": "language" },
					{ "data": "code" },
					{ "data": "input" },
					{ "data": "output" },
					{ "data": "keystroke" },
					{ "data": "created_date" },
					{ "data": "actions" },
					
				
		        ],
				"columnDefs": [
		        	{
		      		 	"targets": 8,
		                "render": function ( data, type, row ) {
		                    //return row["city"] +', ' + row["country"] +', '+data;
							 return '<a class="btn btn-primary btn-round" href="code.php?id='+row['id']+'">Run</a>';
						
						},
		              
		            },
		        ]
		    });
		});
	</script>