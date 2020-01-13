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
<title> Admin | View Newsletter </title>  
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
        

        
          
  <br>
           <h1> HALL MARK SCHOOLS </h1> <br>
        
     <?php echo "<h3> You are admin with ID ".$admin_id."And Name of ".$admin_name."</h3>" ?> <br>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3> <br> 
        
          <div class="links">
    
       <a href="admin_home.php"> Home Page |</a>
    <a href="add_teachers.php"> Add a Teacher |</a>
      <a href="view_teachers.php"> View Teachers |</a>
    <a href="add_students.php"> Add a Student |</a>
     <a href="view_students.php"> View Students |</a>
    <a href="adm_logout.php"> Logout |</a>
    
    </div>
    
    <br> 
        
<?php
       
        $query = mysqli_query($db, "SELECT * FROM news ") or die(mysqli_error($db));
        
?>
        <table border="1" class="table">
        
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
    <h3> Would You Like To <a href="adm_logout.php"> Logout? </a> </h3>
    
    </body>


</html>