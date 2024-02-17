<?php require_once('inc/top.php');?>
  <?php

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
    header('Location: index.php');
}
?>
  <body>
      
<div id="wrapper">

<?php require_once('inc/header.php');?>


<div class="container-fluid body-section">
    <div class="row">

       
<?php require_once('inc/sidebar.php');?>       
        
        <div class="col-md-9">
        <h1><i class="fa fa-user-plus"></i> Add New User <small>NP Group Member</small></h1>            
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-tachometer"></i>  Dashboard</a></li>
          <li class="active"><i class="fa fa-users"></i> User Details Add</li>
        </ol>
 
       
            <?php
            if(isset($_POST['submit'])){
                $date = time();
                $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
                $details = mysqli_real_escape_string($con, $_POST['details']);
                $username = mysqli_real_escape_string($con,strtolower($_POST['username']));
                $username_trim = preg_replace('/\s+/', '', $username);
                $email = mysqli_real_escape_string($con,strtolower($_POST['email']));
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $role = $_POST['role'];
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $mob = $_POST['mob'];
                
                $check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
                $check_run = mysqli_query($con, $check_query);
                
                $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                $salt_run = mysqli_query($con, $salt_query);
                $salt_row = mysqli_fetch_array($salt_run);
                $salt = $salt_row['salt'];
                
                $password = crypt($password, $salt);
                
                if(empty($first_name) or empty($last_name) or empty($username) or empty($password) or empty($image)){
                    $error = "All (*) fields are Required";
                }
                else if($username != $username_trim){
                    $error = "Don't Use Spaces in Username";
                }
                else if(mysqli_num_rows($check_run) > 0){
                    $error = "Username or Email Already Exist";
                }
                else{
                    $insert_query = "INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`, `details`, `mob`) VALUES (NULL, '$date', '$first_name', '$last_name', '$username', '$email', '$image', '$password', '$role', '$details', '$mob')";
                    
                    if(mysqli_query($con, $insert_query)){
                        $msg = "User Has Been Added";
                        move_uploaded_file($image_tmp, "img/$image");
                        $image_check = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                        $image_run = mysqli_query($con, $image_check);
                        $image_row = mysqli_fetch_array($image_run);
                        $check_image = $image_row['image'];
                        
                        $first_name = "";
                        $last_name = "";
                        $mob = "";
                        $details = "";
                        $username = "";
                        $email = "";
                        
                        
                    }
                    else{
                        $error = "User Has Not Been Add";
                    }
                }
                
            }
            ?>       
        <div class="row">
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="first_name">First Name : * </label>
                        <?php
                        if(isset($error)){
                            echo "<span class='pull-right' style='color:red;'>$error</span>";
                        }
                        else if(isset($msg)){
                            echo "<span class='pull-right' style='color:green;'>$msg</span>";
                        }
                        
                        ?>
                        <input type="text" value="<?php if(isset($first_name)){echo $first_name;}?>" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                    </div>
                
                
                
                    <div class="form-group">
                        <label for="last_name">Last Name : * </label>
                        <input type="text" value="<?php if(isset($last_name)){echo $last_name;}?>" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="mob">Mobile Number : * </label>
                        <input type="text" value="<?php if(isset($mob)){echo $mob;}?>" id="mob"  name="mob" class="form-control" placeholder="Mobile Number">
                    </div>
                    
                    <div class="form-group">
                        <label for="details">Address : * </label>
                        <textarea name="details" id="details" class="form-control" cols="30" rows="10"><?php $details;?></textarea>
                    </div>
                
                                
                    <div class="form-group">
                        <label for="username">Username : * </label>
                        <input type="text" value="<?php if(isset($username)){echo $username;}?>" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                
                
                
                    <div class="form-group">
                        <label for="email">Email Id :  </label>
                        <input type="text" value="<?php if(isset($email)){echo $email;}?>" id="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                
                
                
                    <div class="form-group">
                        <label for="password">Password : * </label>
                        <input type="text" id="password" name="password" class="form-control" placeholder="password">
                    </div>
                
                
                
                    <div class="form-group">
                        <label for="role">Role : * </label>
                        <select name="role" class="form-control" id="role">
                            <option value="author">Reporter</option>
                            <option value="Admin">Editor</option>
                        </select>
                    </div>
                
                
                    <div class="form-group">
                        <label for="image">Profile Picture : * </label>
                        <input type="file" id="image" name="image">
                    </div>
                
                
                
                
                <input type="submit" value="Add User" name="submit" class="btn btn-primary">
                </form>    
            </div>
            
            
            <div class="col-md-4">
                <?php
                if(isset($check_image)) {
                    echo "<img src='img/$check_image' width = '100%'>";
                }
                
                ?>
            </div>
        </div>       

        
    
       
        </div>
    </div>
</div>




<?php require_once('inc/footer.php');?>