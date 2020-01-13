<?php

session_start();

include("db/config.php");

unset($_SESSION['teacher_id']);

unset($_SESSION['teacher_name']);




?>

<html>
<head>
<title> Teacher | Logout </title>  
    <style> 
    
    body{
            background-image: url(school/1.jpg); 
            text-align: center;
            color: snow;
        }
    
    
    </style>
    
</head>
    
    <body>
        
                          <br>
    <h1> HALL MARK UNIVERSITY</h1> <br>
        
        
    <h3> Would You Like To <a href="teacher_login.php"> Login? </a> </h3>
    
    </body>


</html>