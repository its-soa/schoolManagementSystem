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
<title> Student | Profile </title>  
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
        
        $select = mysqli_query($db,"SELECT * FROM students WHERE first_name = '".$student_name."'
        
                        ") or die(mysqli_error($db));
        
        ?>
        
        <div class="table">
        
       
        <table border="1" class="table">
        
        <tr> 
            
        <th> STUDENT ID</th>
        <th> FIRST NAME </th>
        <th> LAST NAME</th>
        <th> GENDER</th>
        <th> EMAIL ADDRESS </th>
        <th> MATRIC NUMBER </th>
        <th> NEXT OF KIN </th>
        <th> HOME ADDRESS</th>
        <th> DATE OF BIRTH</th>
        <th> STATE OF ORIGIN </th>
        <th> DEPARTMENT</th>
        <th> YEAR OF REGISTRATION</th>
        <th> MARRITAL STATUS</th>
        <th> ADMIN ID </th>    
            
        </tr>
            
            
        <tr>  <?php  while($result = mysqli_fetch_array($select))  { ?>
            
        <td> <?php echo $result['student_id'] ?> </td>
        <td> <?php echo $result['first_name'] ?> </td>
        <td> <?php echo $result['last_name'] ?> </td>
        <td> <?php echo $result['gender'] ?> </td>
        <td> <?php echo $result['email'] ?> </td>
        <td> <?php echo $result['matric_number'] ?> </td>
        <td> <?php echo $result['next_of_kin'] ?> </td>
        <td> <?php echo $result['home_address'] ?> </td>
        <td> <?php echo $result['birth'] ?> </td>
        <td> <?php echo $result['origin'] ?> </td>
        <td> <?php echo $result['department'] ?> </td>
        <td> <?php echo $result['yr_of_reg'] ?> </td>
        <td> <?php echo $result['marrital_status'] ?> </td>
        <td> <?php echo $result['admin_id'] ?> </td>
            
        </tr>
        
             <?php
    
            }
            
        ?>
            
        </table>
        
         </div> <br> <br>
        
         <div class="footer"> 
        
      <p><br>Need some help?please call 09097977418 <br>or <br>
          <span>contact us at hallmarkscholls@yahoo.com</span></p> <br>
          
      <h4><marquee>we are always at your service</marquee></h4> <br>  
        
   
        
    <h3> Would You Like To <a href="stu_logout.php"> logout? </a> </h3>
        
        <br>   <br>
        
         <h5> Copyright 2018 </h5>
             
              </div>
    
    </body>


</html>