<?php require_once('inc/top.php');?>
 <?php

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}


$session_username = $_SESSION['username'];

if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    if($_SESSION['role'] == 'admin'){
        $del_check_query = "SELECT * FROM posts WHERE id = $del_id";
        $del_check_run = mysqli_query($con, $del_check_query);
    }
    
    else if($_SESSION['role']){
        $del_check_query = "SELECT * FROM posts WHERE id = $del_id and author = '$session_username'";
        $del_check_run = mysqli_query($con, $del_check_query);
    }
    if(mysqli_num_rows($del_check_run) > 0){
        $del_query =  "DELETE FROM `posts` WHERE `posts`.`id` = $del_id";
        
        if(mysqli_query($con, $del_query)){
        $msg = "Post Has Been Deleted";
        }
        else {
            $error = "Post Has Not Been Deleted";
        
        }
    }
    else{
        header('location: index.php');
    }
}
if(isset($_POST['checkboxes'])){
    
  foreach($_POST['checkboxes'] as $user_id){
      
      $bulk_option = $_POST['bulk-options'];
      
      if($bulk_option == 'delet'){
          $bulk_del_query = "DELETE FROM posts WHERE `posts`.`id` = $user_id";
          mysqli_query($con, $bulk_del_query);
          
      }
      else if($bulk_option == 'publish'){
          $bulk_author_query = "UPDATE `posts` SET `status` = 'publish' WHERE `posts`.`id` = $user_id";
          mysqli_query($con, $bulk_author_query);
          
  }
      else if($bulk_option == 'draft'){
          $bulk_admin_query = "UPDATE `posts` SET `status` = 'draft' WHERE `posts`.`id` = $user_id";
          mysqli_query($con, $bulk_admin_query);
      }
  }
    
}



?>
  <body>
      
<div id="wrapper">

<?php require_once('inc/header.php');?>


<div class="container-fluid body-section">
    <div class="row">

       
<?php require_once('inc/sidebar.php');?>       
        
        <div class="col-md-9">
        <h1><i class="fa fa-file-text-o"></i> Posts <small>Views All Posts</small></h1>            
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-tachometer"></i>  Dashboard</a></li>
          <li class="active"><i class="fa fa-file-text-o"></i> All Posts</li>
        </ol>
        
        <?php
            if($_SESSION['role'] == 'admin'){
                $query = "SELECT * FROM posts ORDER BY id DESC";
                $run = mysqli_query($con, $query);
            }
            else if($_SESSION['role'] == 'author'){
                $query = "SELECT * FROM posts WHERE author = '$session_username' ORDER BY id DESC";
                $run = mysqli_query($con, $query);
            }
                
                
            if(mysqli_num_rows($run) > 0){
                
            
            ?>
<form action="" method="post">        
        <div class="row">
            <div class="col-sm-8">
                
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <select name="bulk-options" id="" class="form-control">
                                    <option value="delet"> Delet</option>
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <input type="submit" class="btn btn-primary" value="apply">
                            <a href="add-post.php" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                
            </div>
        </div>
        <?php
            if(isset($error)){
                echo "<span style='color:red;' class='pull-right'>$error</span>";
            }
                if(isset($msg)){
                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                }
            
            ?>
        <table class="table table-bordered table-striped table-hover" >
            <thead>
                <tr>
                   <td><input type="checkbox" id="selectallboxes"></td>
                    <th>Sr #</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Categories</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Del</th>
                </tr>
            </thead>
            <tbody>
               
               <?php
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $image = $row['image'];
                    $views = $row['views'];
                    $categories = $row['categories'];
                    $status = $row['status'];
                    $date = getdate($row['date']);
                    $day = $date['mday'];
                    $month = substr($date['month'],0,3);
                    $year = $date['year'];
                    
                
                
                
                ?>
                <tr>
                   <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>" ></td>
                    <td><?php echo $id;?></td>
                    <td><?php echo "$day $month $year";?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $author;?></td>
                    <td><img src="img/<?php echo $image;?>" width="50px"></td>
                    <td><?php echo $categories;?></td>
                    <td><?php echo $views;?></td>
                    <td>
                        <span style="color:<?php 
                            if($status == 'publish'){
                                echo 'green';
                            }
                            else if($status == 'draft'){
                                echo 'red';
                            }
                                     ?>">
                            <?php echo ucfirst($status);?></span>
                    </td>
                    <td><a href="edit-post.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="posts.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
                </tr>
                
              <?php
                }
                ?>
                
                
            </tbody>
        </table>
        
            <?php
            }
            else{
                echo "<center><h2>No Posts Available</center></h2>";
            }
            
            ?> 
           </form>
        </div>
    </div>
</div>




<?php require_once('inc/footer.php');?>