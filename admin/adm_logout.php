<?php
include("db/config.php");

session_start();

unset($_SESSION['ad_id']);

unset($_SESSION['ad_name']);




?>

<html>
<head>
<title> Admin | Logout </title>  
    <style> 
    
        body{
            background-image: url(school/5.jpg);
            text-align: center;
            color: snow
        }
        
        a{
            color: blue;
        }
       
    
    
    </style>
    
</head>
    
    <body> 
        <br>
        
        <h1> HALL MARK UNIVERSITY</h1> <br>
        
        <br> <br> <br> <br>
        
    <h3> Would You Like To <a href="admin_login.php"> Login? </a> </h3>
    
    </body>


</html>