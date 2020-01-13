<?php
session_start();

include("db/config.php");

if (!isset($_SESSION['ad_id']) && !isset($_SESSION['ad_name'])) {
    
    header("location:admin_login.php?err_msg=Please Login First");
    
    if (isset($_GET['err_msg']) && isset($_GET['msg'])){
    
    $err_msg = $_GET['err_msg'];
        
    $msg = $_GET['msg'];
    
    echo $err_msg;
        
    echo $msg;
}
    
}

$admin_id = $_SESSION['ad_id'];

$admin_name = $_SESSION['ad_name'];


?>

<html>
<head>
<title> Admin | View Teachers </title>
    
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
        
    }
    

        
    
</style>
    
</head>
    
<body>
    
                <br> 

      <h1> HALL MARK UNIVERSITY</h1> <br>
  
   
    
   <?php echo "<h3> You are admin with ID ".$admin_id." And Name of ".$admin_name."</h3>" ?> <br>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3> <br>
    
    <div class="links">
    
       <a href="admin_home.php"> Home Page |</a>
    <a href="add_teachers.php"> Add a Teacher |</a>
    <a href="add_students.php"> Add a Student |</a>
     <a href="view_students.php"> View Students |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="adm_logout.php"> Logout |</a>
    
    </div>
    
    <br> 
    
    <?php
        
        $select = mysqli_query($db,"SELECT * FROM teachers 
        
                        ") or die(mysqli_error($db));
        
        ?>
        
        <div class="table">
        
       
        <table border="1" class="table">
        
        <tr> 
            
        <th> TEACHER ID</th>
        <th> FIRST NAME </th>
        <th> LAST NAME</th>
        <th> GENDER</th>
        <th> EMAIL ADDRESS </th>
         <th> DATE OF BIRTH</th>
        <th> PHONE NUMBER </th>
        <th> HOME ADDRESS</th>
        <th> ADMIN ID </th>    
            
        </tr>
            
            
        <tr>  <?php  while($result = mysqli_fetch_array($select))  { ?>
            
        <td> <?php echo $result['teacher_id'] ?> </td>
        <td> <?php echo $result['firstname'] ?> </td>
        <td> <?php echo $result['lastname'] ?> </td>
        <td> <?php echo $result['gender'] ?> </td>
        <td> <?php echo $result['email'] ?> </td>
        <td> <?php echo $result['birth'] ?> </td>
        <td> <?php echo $result['phone'] ?> </td>
        <td> <?php echo $result['address'] ?> </td>
        <td> <?php echo $result['admin_id'] ?> </td>
            
        </tr>
        
             <?php
    
            }
            
        ?>
            
        </table>
        
         </div>
        
    
    
    <br> <br>
    
        <h3> Do You Wish To Go Home ? Click <a href="admin_home.php"> Here ! </a> </h3>
    
    <h3> Do You Want To Logout ? Click <a href="adm_logout.php"> Here ! </a> </h3>
    
</body>

</html>