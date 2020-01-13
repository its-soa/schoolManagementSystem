
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
<title> Admin | View Students </title>  
    <style> 
    
    
        
    label{
            float: left;
            width: 150px;
        }
        
        #leg{
            text-align: center;
        }
        
        fieldset{
            width: 470px;
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
        
          
  
           <h1> HALL MARK SCHOOLS </h1>
        
     <?php echo "<h3> You are admin with ID ".$admin_id."And Name of ".$admin_name."</h3>" ?>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3>
        
          <div class="links">
    
       <a href="admin_home.php"> Home Page |</a>
    <a href="add_teachers.php"> Add a Teacher |</a>
      <a href="view_teachers.php"> View Teachers |</a>
    <a href="add_students.php"> Add a Student |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="adm_logout.php"> Logout |</a>
    
    </div>
    
    <br> 


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
        
            <h3> Would You Like To Go <a href="admin_home.php"> Home? </a> </h3>
        
    <h3> Would You Like To <a href="adm_logout.php"> Logout? </a> </h3>
        
            </body>


</html>