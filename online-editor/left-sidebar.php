<?php 
    $path = $_SERVER['PHP_SELF']; // will return http://xyz.com/two.php for our example
	$page1 = basename($path); // will return two.php
	$page1 = basename($path, '.php'); //will return the string 'two'
?>
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active"  href="my_program.php"><i class="zmdi zmdi-home m-r-5"></i>Learn Programming</a></li>
        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">Student</a></li>-->
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="profile.php"><img src="profile_image/<?php echo $student['image']; ?>"alt="User"></a></div>
                            <div class="detail">
                                <h4><?php echo ucfirst($store['store_name']);?></h4>
                                               
                            </div>
                        </div>
                    </li>
                    <li class="header">MAIN</li>
                    <li><a href="profile.php"><i class="zmdi zmdi-home"></i><span>Profile</span></a></li>            
                   
                    <li class="<?php if($page1 == 'code'){echo 'active open';} ?>"><a href="javascript:void(0);" class="menu-toggle <?php if($page1 == 'code'){echo 'toggled';} ?> waves-effect waves-block"><i class="zmdi zmdi-home"></i><span>Editors</span> </a>
                        <ul class="ml-menu" style="display: none;">
                            <li><a href="code.php?language=python2.7" class=" waves-effect waves-block">Python Editor</a></li>
							 <li><a href="code.php?language=c" class=" waves-effect waves-block">C Editor</a></li>
                            
                        </ul>
                    </li>
					<li class="<?php if($page1 == 'my_program'){echo 'active open';} ?>"><a href="my_program.php"><i class="zmdi zmdi-home"></i><span>My Program</span> </a>
                    </li>
					<!--<li class="<?php if($page1 == 'add-order'){echo 'active open';} ?>"><a href="javascript:void(0);" class="menu-toggle <?php if($page1 == 'add-order'){echo 'toggled';} ?> waves-effect waves-block"><i class="zmdi zmdi-shopping-cart"></i><span>Orders</span> </a>
                        <ul class="ml-menu" style="display: none;">
                            <li><a href="add-order.php" class=" waves-effect waves-block">Add Order</a></li>
                            
                        </ul>
                    </li>-->
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.php"><img src="profile_image/super-market.jpg" alt="Employee"></a></div>
                            <div class="detail">
                                <h4><?php echo ucfirst($student['user_name']);?></h4>
                             </div>
							
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Student Id: </small>
                        <p><?php echo $student['student_id'];?></p> 
                        <hr>
                        
                        <small class="text-muted">Location: </small>
                        <p><?php echo $student['address'];?>, <?php echo $city['name'];?>, <?php echo $states['name'];?>, <?php echo $countries['name'];?></p>
                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p><?php echo $student['email'];?></p> 
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ <?php echo $student['phone'];?></p>
                        <hr>
                        <small class="text-muted">University: </small>
                        <p><?php echo $student['city'];?> </p>
                        <hr>
                                            
                    </li>                    
                </ul>
            </div>
        </div>
    </div>    
</aside>