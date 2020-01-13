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

<html>
<head>
<title> Student | View Newsletter </title>  
    <style> 
    
    
            .table{
            
            text-align: left;
        }
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
    
    
    </style>
    
</head>
    
    <body>
        
                 <br>
        <h1> HALL MARK UNIVERSITY</h1> <br>
      
    
    <div class="links"> 
        
      <a href="student_home.php">HOME |</a>
      <a href="profile.php"> PROFILE |</a>
      <a href="add_electives.php"> ADD ELECTIVES |</a>
      <a href="view_electives.php"> VIEW ELECTIVES |</a>
       <a href="view_results.php">VIEW RESULTS |</a>
      <a href="view_news.php">VIEW NEWS LETTER</a>
    
</div> <br>  <br>
        
        
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
        
<br> <br>
        
        
    <h3> Would You Like To <a href="stu_logout.php"> Logout? </a> </h3>
    
    </body>


</html>