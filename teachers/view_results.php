<?php
include("db/config.php");

session_start();




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
<title> Teacher | View Results </title>  
    <style> 
    
    
    
       body{
            background-image: url(school/1.jpg); 
            text-align: center;
            color: snow;
        }
        
        .links{
            padding-left: 100px;
            padding-right: 30px;
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
        
            
    <div class="links">
    
    
    <a href="teacher_home.php"> Home Page |</a>
    <a href="view_students.php"> View Students |</a>
    <a href="add_news.php"> Add Newsletter |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="tea_logout.php"> Logout |</a>
    
    </div> <br>
        
     <br>   <?php echo "<h3> This is the recorded results for $stu_name </h3>"; ?>
        
        
<?php
     
        $select = mysqli_query($db, "SELECT * FROM results WHERE first_name = '".$stu_name."'
                            ") or die(mysqli_error($db));
        
    
        
?>
        
        <table border="1">
        
        <tr>
        <th> RESULT ID  </th> 
        <th> GST 101  </th>  
         <th> GST 102  </th> 
         <th> GST 105  </th> 
         <th> MUS 168  </th> 
         <th> CRA 120  </th> 
         <th>ENG 151  </th> 
        <th> STUDENT NAME </th>
            
        </tr> <br>
        
        <tr> <?php  while($result = mysqli_fetch_array($select)) { ?>
        
         <td> <?php echo $result['result_id'] ?> </td>
        <td> <?php echo $result['GST_101'] ?> </td> 
         <td> <?php echo $result['GST_102'] ?> </td>
         <td> <?php echo $result['GST_105'] ?> </td>
         <td> <?php echo $result['MUS_168'] ?> </td>
         <td> <?php echo $result['CRA_120'] ?> </td>
          <td> <?php echo $result['ENG_151'] ?> </td>
            
            <td> <?php echo $result['first_name'] ?> </td>
            
        </tr>
        
        
        <?php
            
            }
            
        ?>
        
        </table> 
        
        
        
        <br> <br> <br> 
        
        
    <h3> Would You Like To <a href="tea_logout.php"> Logout? </a> </h3>
    
    </body>


</html>