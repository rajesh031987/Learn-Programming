<?php

  $path = $_SERVER['PHP_SELF']; // will return http://xyz.com/two.php for our example

     $page1 = basename($path); // will return two.php

    $page1 = basename($path, '.php'); //will return the string 'two'

	 $class ='class=active';


?>

<div class="navbar-inverse sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

            

                        <li>

                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

                        </li>

					
					<li>

                            <a href="#"><i class="fa fa-user"></i>Settings<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                              <li <?php  if($page1=='settings'){ echo $class; } ?>>

								    <a href="settings.php">Settings</a>

									</li>
							
                                <li <?php  if($page1=='change_password'){ echo $class; } ?>>

								    <a href="change_password.php">Change password</a>

									</li>

						
                                <li>

								    <a href="logout.php">Logout</a>

									</li>
	  

                                </li>

						
                                </li>		 

					
                            </ul>

				
						</li>
									
				
						</li>
									 <li>

                            <a href="#"><i class="fa fa-user"></i>Manage student <span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

		   
									
		   <li <?php  if($page1=='manage-student'){ echo $class; } ?>>

								    <a href="manage-student.php">Student list</a>

									</li>
									   <li <?php  if($page1=='manage-student'){ echo $class; } ?>>

								    <a href="manage-student.php?keywords=&status=Active&Search=Search">Active Students</a>

									</li>
									   <li <?php  if($page1=='manage-student'){ echo $class; } ?>>

								    <a href="manage-student.php?keywords=&status=Blocked&Search=Search">Blocked Students</a>

									</li>
									
									 <li <?php  if($page1=='manage-student'){ echo $class; } ?>>

								    <a href="manage-student.php?keywords=&status=Trash&Search=Search">Deleted Students</a>

									</li>
						
   </ul>
   </li>
   <li>
    <a href="#"><i class="fa fa-user"></i>Manage Programs <span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

		   
									
		   <li <?php  if($page1=='manage-program'){ echo $class; } ?>>

								    <a href="manage-program.php">Program list</a>

									</li>
									   
						
   </ul>
   
   
    </li>
						
		 	
				      			<li>

                            <a href="#"><i class="fa fa-user"></i>Manage country <span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

					   <li <?php  if($page1=='country'){ echo $class; } ?>>

								    <a href="country.php">Add country</a>

									</li>
		   <li <?php  if($page1=='country-list'){ echo $class; } ?>>

								    <a href="country-list.php">Country list</a>

									</li>
									 <!--<li <?php  if($page1=='add-state'){ echo $class; } ?>>

								    <a href="add-state.php">Add state</a>

									</li>
		   <li <?php  if($page1=='state-list'){ echo $class; } ?>>

								    <a href="state-list.php">State list</a>

									</li>
													 <li <?php  if($page1=='add-state'){ echo $class; } ?>>

								    <a href="add-city.php">Add city</a>

									</li>-->
		   <li <?php  if($page1=='city-list'){ echo $class; } ?>>

								    <a href="city-list.php">City list</a>

									</li>
						
   </ul>
    </li>
							




			

	

	
						 	
						
                      
                </div>

                <!-- /.sidebar-collapse -->

            </div>