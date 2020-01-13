<?php
session_start();

include("db/config.php");

if (!isset($_SESSION['student_name']) && !isset($_SESSION['student_matric'])) {
    
    header("location:student_login.php?err_msg=Please Login First");
    
    if (isset($_GET['err_msg']) && isset($_GET['msg']) && isset($_GET['sucess'])){
    
    $err_msg = $_GET['err_msg'];
        
    $msg = $_GET['msg'];
        
    $sucess =  $_GET['sucess'];
    
    echo $err_msg;
        
    echo $msg;
        
    echo $sucess;
}
    
}
    $student_name = $_SESSION['student_name'];
                  
    $matric = $_SESSION['student_matric'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<title> HALLMARK | STUDENT HOME </title>
<style>
    
 
			
        body{
            background-image: url(school/1.jpg); 
            text-align: center;
            color: snow;
        }
    
        
        a{
            text-decoration: none;
            font-size: 20px;
            color: blue;
        
        }
        .links a:hover{color: snow;
               background-color: rebeccapurple;
               text-decoration: none;
               padding: 7px;
       }

    
        .links{
         /*   border: 1px solid white;*/
            padding-bottom: 15px;
               padding-left: 10px;
            padding-right: 20px;
            padding-top: 10px;
            text-align: center;
            width: 900px;
            margin-left: 280px;
            background-color: snow;
        }
        
          h3{
           padding-left: 100px; 
            padding-right: 100px;
            line-height: 24px;
            letter-spacing: 1px;
            
        }
    
    h5{
        color: black;
    }
    
    .footer{
        color: black;
    }
			     

</style>
</head>
    
<body>
    
    <br>
        <h1> HALL MARK UNIVERSITY</h1> <br>
      
    
    <div class="links"> 
        
 
      <a href="profile.php"> PROFILE |</a>
      <a href="add_electives.php"> ADD ELECTIVES |</a>
      <a href="view_electives.php"> VIEW ELECTIVES |</a>
       <a href="view_results.php"> RESULTS |</a>
      <a href="view_news.php">VIEW NEWSLETTER |</a>
           <a href="stu_logout.php">LOGOUT</a>
    
</div> <br> 
      
    
         <?php   echo "<h3> <marquee> WELCOME ".$student_name." !  ! ! </marquee> </h3";   ?>
  
    
     
    <div class="content">
    
 <br> <br>     
 <h3> 
     Hall mark University is a private Institution of Higher education whose objective is to train graduates with perfect and excellent practical understanding in all the disciplines of Business Administration, Communication, Computer Sciences; International Affairs and Politics
</h3> <br> 

 <h3> 
     Hall mark University  allows graduates to master the basic principles and techniques in the area of finance, Management and International Affairs. We provide graduates with the capacity to be directly marketable on both the national and international levels.
</h3> <br> 

<h3> <br>
    Hall mark University reinforces and develops the quantitative and qualitative thinking abilities of our students which we believe will go a long way to help them to take critical decisions expected of today's managers. Our goal is to become the benchmark point of bilingual higher education in Africa, with a globally relevant local content educational approach.
        
    </h3> 
        
    </div>

      <br> <br>
  
   <div class="footer"> 
        
      <p><br>Need some help?please call 09097977418 <br>or <br>
          <span>contact us at hallmarkscholls@yahoo.com</span></p> <br>
          
      <h4><marquee>we are always at your service</marquee></h4> <br> 
       
           Do You Wish To <a href="stu_logout.php"> Logout ?</a> <br> <br>
       
       <h5> Copyright 2018 </h5>
       
        </div>
      

    
</body>
          
          
</html>