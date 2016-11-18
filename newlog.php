<?php
session_start();
require 'connection.php';
if(isset($_POST['login'])){      
       
$username=$_POST['username'];   
$password=$_POST['password'];
$user_role=$_POST['userrole'];



if($user_role=='student'){
    
    $sth = $conn->prepare("SELECT count('id') FROM registration WHERE username = '$username' AND password = '$password'");
    $sth->execute();
    $count = $sth->fetchColumn(); 
    if($count==1){
        
            $_SESSION['username']=$username;
            header('location: profile.php'); 
        
    }
    else {
    	echo '<script language="javascript">';
        echo 'alert("Username and Password could be wrong or you are not a registered student")';
        echo '</script>';
        
        
    }

    
} 
else if($user_role=='teacher')    {
    
    $sth = $conn->prepare("SELECT count('id') FROM te_registration WHERE username = '$username' AND password = '$password'");
    $sth->execute();
    $count = $sth->fetchColumn();  
    
        if($count==1){
        
        $_SESSION['username']=$username;    
        header('location: teprofile.php');
        
        }
    else {
        
        echo '<script language="javascript">';
        echo 'alert("Username and Password could be wrong or you are not a registered teacher")';
        echo '</script>';
        }

    
}  

else if($user_role=='webadmin'){
              
    $sth = $conn->prepare("SELECT count('id') FROM admin_data WHERE username = '$username' AND password = '$password'");
    $sth->execute();
    $count = $sth->fetchColumn();  
          
          if($count==1){
        
            $_SESSION['username']=$username;
            header('location: adminarea.php');
        
            }
            
            else    {
        
             echo '<script language="javascript">';
             echo 'alert("Username and Password could be wrong or you are not a registered admin")';
             echo '</script>';
             
            }         
          

          
      }
      
      else{
             echo '<script language="javascript">';
             echo 'alert("Username and Password is wrong")';
             echo '</script>';
        
      }     
    
}         


    else 
    header('location: index.php');   

   
 ?>
         

