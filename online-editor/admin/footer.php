
	<style>

.kt { 

			-webkit-box-shadow: 0px 2px 29px 0px rgba(0,0,0,0.75);

-moz-box-shadow: 0px 2px 29px 0px rgba(0,0,0,0.75);

box-shadow: 0px 2px 29px 0px rgba(0,0,0,0.75);



border-radius: 7px;

border: 6px solid #1672B9 !important;



		}

		td{
			vertical-align:middle!important;
		}
		
	</style>	
	 	
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="dist/js/sb-admin-2.js"></script>
  <script>
		$(function(){
			$(document).on('click', '#selectall', function(){
				if($(this).is(':checked')){
					$('.checkboxes').prop('checked', true);
				}
				else {
					$('.checkboxes').prop('checked', false);
				}
			});
		$(document).on('click', '#loginform2', function(){
			alert();
				});
		});
	</script>
	<?php/*
	<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
	<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   true,
        "ordering": false,
        "info":     false
    } );
} );
</script>
*/?>
</body>

</html>