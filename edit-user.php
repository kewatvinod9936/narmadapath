<?php require_once('inc/top.php');

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
    header('Location: index.php');
}

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM users WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
        $e_first_name = $edit_row['first_name'];
        $e_last_name = $edit_row['last_name'];
        $e_role = $edit_row['role'];
        $e_image = $edit_row['image'];
        $e_mob = $edit_row['mob'];
        $e_details = $edit_row['details'];
        
}
    
    
else{
    header('location: index.php');
}
}
else{
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
        <h1><i class="fa fa-user-plus"></i> Edit User <small>NP Group Member</small></h1>            
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-tachometer"></i>  Dashboard</a></li>
          <li class="active"><i class="fa fa-users"></i> Edit User Details </li>
        </ol>
 
       
            <?php
            if(isset($_POST['submit'])){
                
                $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
                $details = mysqli_real_escape_string($con, $_POST['details']);
                
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $role = $_POST['role'];
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $mob = $_POST['mob'];
                
                if(empty($image)){
                    $image = $e_image;
                }
                
                
                $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                $salt_run = mysqli_query($con, $salt_query);
                $salt_row = mysqli_fetch_array($salt_run);
                $salt = $salt_row['salt'];
                
                $insert_password = crypt($password, $salt);
                
                if(empty($first_name) or empty($last_name) or empty($image)){
                    $error = "All (*) fields are Required";
                }
                else{
                    $update_query = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `image` = '$image', `role` = '$role', `details` = '$details', `mob` = '$mob'";
                    
                    if(isset($password)){
                        $update_query .= ", `password` = '$insert_password'";
                    }
                    $update_query .= "WHERE `users`.`id` = $edit_id";
                    if(mysqli_query($con, $update_query)){
                        $msg = "User Has Been updated";
                        header("refresh:0; url=edit-user.php?edit=$edit_id");
                        if(!empty($image)){
                            move_uploaded_file($image_tmp, "img/$image");
                        }
                    }
                    else{
                        $error = "User Has Not Been updated";
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
                        <input type="text" value="<?php echo $e_first_name;?>" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                    </div>
                
                
                
                    <div class="form-group">
                        <label for="last_name">Last Name : * </label>
                        <input type="text" value="<?php echo $e_last_name;?>" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="mob">Mobile Number : * </label>
                        <input type="text" value="<?php echo $e_mob;?>" id="mob"  name="mob" class="form-control" placeholder="Mobile Number">
                    </div>
                    
                    <div class="form-group">
                        <label for="details">Address : * </label>
                        <textarea name="details" id="details" cols="30" rows="10" class="form-control"><?php echo $e_details;?></textarea>
                        
                    </div>
                
   
                
                
                    <div class="form-group">
                        <label for="password">Password : * </label>
                        <input type="text" id="password" name="password" class="form-control" placeholder="password">
                    </div>
                
                
                
                    <div class="form-group">
                        <label for="role">Role : * </label>
                        <select name="role" class="form-control" id="role">
                            <option value="author" <?php if($e_role == 'author'){"selected";}?>>Reporter</option>
                            <option value="Admin" <?php if($e_role == 'author'){"selected";}?>>Editor</option>
                        </select>
                    </div>
                
                
                    <div class="form-group">
                        <label for="image">Profile Picture : * </label>
                        <input type="file" id="image" name="image">
                    </div>
                
                
                
                
                <input type="submit" value="Udate User" name="submit" class="btn btn-primary">
                </form>    
            </div>
            
            
            <div class="col-md-4">
                <?php
                
                    echo "<img src='img/$e_image' width = '100%'>";
                
                
                ?>
            </div>
        </div>       

        
    
       
        </div>
    </div>
</div>




<?php require_once('inc/footer.php');?>