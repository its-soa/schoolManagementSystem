<?php
session_start();

include("db/config.php");

if (!isset($_SESSION['teacher_id']) && !isset($_SESSION['teacher_name'])) {
    
    header("location:teacher_login.php?err_msg=Please Login First");
    
    if (isset($_GET['err_msg']) && isset($_GET['msg'])){
    
    $err_msg = $_GET['err_msg'];
        
    $msg = $_GET['msg'];
    
    echo $err_msg;
        
    echo $msg;
}
    
}

$teacher_id = $_SESSION['teacher_id'];

$teacher_name = $_SESSION['teacher_name'];


?>


<!DOCTYPE html>
<html>
<head>
	<title>HALL MARK| TEACHER HOME </title>
    
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
            width: 800px;
            margin-left: 280px;
            background-color: snow;
        }
    
    
    </style>
</head>
<body>
    <br>
    <h1> HALL MARK UNIVERSITY</h1> <br>
    
        <h2> Welcome Back Instructor !  </h2>
    
   <?php echo "<h3> You are Instructor with ID ".$teacher_id."And Name of ".$teacher_name."</h3>" ?>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3>
    
                 <br> 
    
    <div class="links">
    
    
   
    <a href="view_students.php"> View Students |</a>
    <a href="add_news.php"> Add Newsletter |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="tea_logout.php"> Logout |</a>
    
    </div>
    
    
    <br> <br> <br>

<center>
<h3>For the staff</h3>

<p><strong><i>The school is made up of four Administrators,19 instructional support staff members,25 non-instructional support staff members,and 35 certified teachers.These are the people who work together to provide students with positive and ussful educational experience.success depends on consistent participation and the co'ordination of all the'educators' in the lives of our students,parents,grandparents,aunts,uncles,,brothers,sisters,teachers,associates,administrators and the who community makes up the forces that educate our children.in order to accomplish our goals,we commit to working together.The staff encourages the commitment of every educator in the lives of our students.</i></strong></p>

<p>

</center> <br> <br>
    
    <h4> Do you want to go <a href="teacher_home.php"> Home?</a> </h4> 
    
        <h4> Do you want to <a href="tea_logout.php"> Logout?</a> </h4> <br>
    
</body>
</html>