  <?php
session_start();
require 'connection.php';

if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];


  $stmt=$conn->prepare("select count('id') from 'registration' where 'username'='$username' and 'password'='$password'");

  $stmt->execute();
  $count=$stmt->fetchColumn();

  if ($count=="1"){

    $_SESSION['username']=$username;

    header('location:profile.php');

    }

  else 
    echo"Username or password problem";

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">


<title>Library Management System</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mystyle.css" rel="stylesheet">


</head>
<body> 
<div class="container">
  <header class="header">
    <nav class="navbar navbar-default">
      <div class="container-fluid"> 
     
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#">LIBRARY</a> </div>
        
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">History</a></li>
            <li><a href="booklist.php">Book List</a></li>         
            
          </ul>
        </div>
        
      </div>
      
    </nav>
  </header>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 slider"> <img class="img-responsive" src="images/Lib.jpg "/> </div>
    </div>
  </div> 
  <div class="content_area">
    <div class="container">
      <div class="row">
        <div class="col-md-4">

          <form class="form-horizontal" role="form" action="newlog.php" method="POST">
          
                <div class="form-group">
                  <label class="control-label col-sm-4" for="dept">Select Login Role</label>
                  <div class="col-sm-8"> 
                  <select class="form-control" id="dept" name="userrole">
                    <option value="select">Select Your Role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="webadmin">Admin</option>
                  </select>
                   </div>
                </div>
                
                
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">User Name:</label>
                  <div class="col-sm-8">
                    <input type="username" class="form-control" id="username" name="username" placeholder="User Name">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="pwd">Password:</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"><br/>
                    <button type="submit" class="btn btn-default" name="login">Login</button> <span> New User? <a href="registration.php">Register</a>
                  </div>
                  
                </div> 

              </form>


        </div>
        <div class="col-md-8">
          <article>
            <p class="welcome" style="font-size:18px;">Notices</p>
            <?php
               require 'newcon.php';   //include connection
                $data = mysqli_query($link,"Select * from notice ORDER BY id DESC limit 5;");  //mysql query for data            
                     if($data === FALSE) { 
                  die(mysqli_error()); // TODO: better error handling
                }
               while($row = mysqli_fetch_array($data)) {?>
              
               <div style="background:#777777;padding:10px;"><h3>Title: <?php echo $row['title'];?></h3>
                Notice:  <?PHP echo $row['notice']; ?></p>
              <p style="color:#4863A0;">Date of Publish:  <?PHP echo $row['date_of_publish'];?></p>
              <hr/>
              </div>
                                
             
              <?php } ?>
            </article>  

                      

        </div>
      </div>
    </div>
  </div>
 <?php include('footer.php');?>
