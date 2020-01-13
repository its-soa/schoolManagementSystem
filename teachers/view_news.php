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

<html>
<head>
<title> Teacher | View Newsletter </title>  
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
    
    
   <?php echo "<h3> You are Instructor with ID ".$teacher_id."And Name of ".$teacher_name."</h3>" ?>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3>
    
                 <br> 
    
    <div class="links">
    
    
    <a href="teacher_home.php"> Home Page |</a>
    
    <a href="view_students.php"> View Students |</a>
    <a href="add_news.php"> Add Newsletter |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="tea_logout.php"> Logout |</a>
    
    </div> <br>
        
<?php
       
        $query = mysqli_query($db, "SELECT * FROM news ") or die(mysqli_error($db));
        
?>
        <table border="1">
        
        <tr>
        <th> POST CONTENT </th>
            
        <th> POST DATE </th>
            
        </tr>
            
        <tr> <?php while($result = mysqli_fetch_array($query)) {  ?>  </tr>
        
        <td> <?php  echo $result['post_content'] ?> </td>
        
        <td> <?php  echo $result['post_date'] ?> </td> 
            
<?php
}
?>
            
        </table>
        
<br> <br> <br> 
        
    <h3> Would You Like To <a href="tea_logout.php"> Logout? </a> </h3> <br>
    
    </body>


</html>