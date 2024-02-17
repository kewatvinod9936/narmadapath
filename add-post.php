<?php require_once('inc/top.php');
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

?>
  </head>
  <body>
      


            
<div id="wrapper">

<?php require_once('inc/header.php');?>

<div class="container-fluid body-section">
    <div class="row">
        
        
<?php require_once('inc/sidebar.php');?>               
        
        <div class="col-md-9">
        <h1><i class="fa fa-plus-square"></i> Add Post <small>Add New Post</small></h1>            
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-tachometer"></i>  Dashboard</a></li>
          <li class="active"><i class="fa fa-plus-square"></i>  Add Post</li>
        </ol>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Type Post Title Here" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <a href="media.php" class="btn btn-primary"> Add Media</a>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="post-data" id="summernote" rows="10" class="form-control"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="file">Post Image </label>
                                <input type="file" name="image">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                <select name="categories" class="form-control" id="categories">
                                    <?php
                                    $cat_query = "SELECT * FROM categories ORDER BY id DESC";
                                    $cat_run = mysqli_query($con, $cat_query);
                                    if(mysqli_num_rows($cat_run) > 0){
                                        while($cat_row = mysqli_fetch_array($cat_run)){
                                            $cat_name = $cat_row['category'];
                                            echo "<option value='".$cat_name."'>".$cat_name."</option>";
                                        }
                                    }
                                    else{
                                        echo "<center><h6>No Category Available</h6></center>";
                                    }
                                    ?>
                                    
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tags">Tags </label>
                                <input type="text" name="tags" placeholder="Your Tags Here" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Add Post" class="btn btn-primary" name="submit">
                </form>
            </div>
        </div>
        
              
        </div>
    </div>
</div>
     

<?php require_once('inc/footer.php');?>    