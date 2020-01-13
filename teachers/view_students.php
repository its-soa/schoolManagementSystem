
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

if (isset($_GET['stu_id']) && isset($_GET['stu_name'])) {
    
    $stu_id = $_GET['stu_id'];
    
    $stu_name = $_GET['stu_name'];
    
}

$teacher_id = $_SESSION['teacher_id'];

$teacher_name = $_SESSION['teacher_name'];


?>

<html>
<head>
<title> Teacher | View Students</title> 
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
         .table{
            text-align: left;
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
    
    
    <a href="teacher_home.php"> Home Page |</a>
    
    <a href="view_students.php"> View Students |</a>
    <a href="add_news.php"> Add Newsletter |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="tea_logout.php"> Logout |</a>
    
    </div> <br> <br> 
    
<?php
        
        $select = mysqli_query($db,"SELECT * FROM students 
        
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
         <th> ADD RESULT</th> 
         <th> VIEW RESULT</th> 
            
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
            
        <td>  <?php  echo '<a href=add_result.php?stu_id='.$result['student_id'].'&stu_name='.$result['first_name'].'> Add Result </a>';  ?> </td>
            
          <td>  <?php  echo '<a href=view_results.php?stu_id='.$result['student_id'].'&stu_name='.$result['first_name'].'> View Result </a>';  ?> </td>
            
        </tr>
        
             <?php
    
            }
            
        ?>
            
        </table>
        
         </div>
    
    </body>

</html>