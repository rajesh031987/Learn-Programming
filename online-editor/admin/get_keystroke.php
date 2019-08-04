<?php
include('include.php');
$id = $_POST['id'];
$i=1;
$result = mysqli_query($conn,"select * from tbl_keystroke where program_id='$id'");
echo '<table id="classTable" class="table table-bordered">
          <thead>
		   <th>
		  Sr.No.
		  </th>
		  <th>
		  Keystroke
		  </th>
		  <th>
		  Date & Time
		  </th>
          </thead>
          <tbody>';
while($row = mysqli_fetch_array($result)){
$keystroke = $row['count_keystroke'];
$date = $row['created_at'];
            echo '<tr>
				<td>'.$i.'</td>
              <td>'.$keystroke.'</td>
              <td>'.$date.'</td>
              
            </tr>';
  $i++;    
}
echo '</tbody>
        </table>';



