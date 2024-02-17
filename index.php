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
        <h1><i class="fa fa-tachometer"></i> Dashboard <small>Statistics Overviews</small></h1>            
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-tachometer"></i>  Dashboard</li>
        </ol>
        
        <div class="row tag-boxes">
        
<!--comment--><div class="col-md-6 col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="text-right huge">11</div>
                            <div class="text-right">New Comments</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View All Comments </span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
        
<!--Post--><div class="col-md-6 col-lg-3">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="text-right huge">10</div>
                            <div class="text-right">All Posts</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View All Posts </span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
<!--Users--><div class="col-md-6 col-lg-3">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="text-right huge">1</div>
                            <div class="text-right">All Users</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View All Users </span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
            
<!--Category--><div class="col-md-6 col-lg-3">
                <div class="panel panel-purple">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa fa-folder-open fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="text-right huge">10</div>
                            <div class="text-right">Categories</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View All Categories </span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
            

            
        </div><hr>
        
        <h3>New Users</h3>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>1</td>
                    <td>23 Jan 2024</td>
                    <td>Vinod Kewat</td>
                    <td>Kewat123</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>23 Jan 2024</td>
                    <td>Vinod Kewat</td>
                    <td>Kewat123</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>23 Jan 2024</td>
                    <td>Vinod Kewat</td>
                    <td>Kewat123</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>23 Jan 2024</td>
                    <td>Vinod Kewat</td>
                    <td>Kewat123</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>23 Jan 2024</td>
                    <td>Vinod Kewat</td>
                    <td>Kewat123</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>23 Jan 2024</td>
                    <td>Vinod Kewat</td>
                    <td>Kewat123</td>
                    <td>Admin</td>
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary">View All Users</a>
        
        
        <h3>New Posts</h3>
        
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Date</th>
                    <th>Post Title</th>
                    <th>Category</th>
                    <th>Views</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>26 Jan 2024</td>
                    <td>Learn PHP Project Full Course in Hindi</td>
                    <td>Video Tutorial</td>
                    <td><i class="fa fa-eye"></i> 30</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>26 Jan 2024</td>
                    <td>Learn PHP Project Full Course in Hindi</td>
                    <td>Video Tutorial</td>
                    <td><i class="fa fa-eye"></i> 30</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>26 Jan 2024</td>
                    <td>Learn PHP Project Full Course in Hindi</td>
                    <td>Video Tutorial</td>
                    <td><i class="fa fa-eye"></i> 30</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>26 Jan 2024</td>
                    <td>Learn PHP Project Full Course in Hindi</td>
                    <td>Video Tutorial</td>
                    <td><i class="fa fa-eye"></i> 30</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>26 Jan 2024</td>
                    <td>Learn PHP Project Full Course in Hindi</td>
                    <td>Video Tutorial</td>
                    <td><i class="fa fa-eye"></i> 30</td>
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary">View All Posts</a>        
       
        </div>
    </div>
</div>
     

<?php require_once('inc/footer.php');?>    