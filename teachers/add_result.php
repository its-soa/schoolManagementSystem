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
<title> Teacher | Add Results </title>  
    <style> 
    
        h1{
            text-align: center;
        }
         body{
            background-image: url(school/1.jpg); 
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
        
        h3{
            text-align: center;
        }
    
    
    
    
    </style>
    
</head>
    
    <body>
        <br>
        
         <br>
    <h1> HALL MARK UNIVERSITY</h1> <br>
            
    <div class="links">
    
    
    <a href="teacher_home.php"> Home Page |</a>
    <a href="view_students.php"> View Students |</a>
  <!--   <a href="view_results.php"> View a Result |</a> -->
    <a href="add_news.php"> Add Newsletter |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="tea_logout.php"> Logout |</a>
    
    </div>
    
    
        
        <br>
        
    <?php echo "<h3> You Are About To Input The Results Of $stu_name </h3";  ?> <br> <br>
        
        
        <?php
        
  if(array_key_exists('add', $_POST))  {
      
  $gst101 = mysqli_real_escape_string($db, $_POST['gst101']);  
      
  $gst102 = mysqli_real_escape_string($db, $_POST['gst102']);  
      
  $gst105 = mysqli_real_escape_string($db, $_POST['gst105']);  
      
  $mus168 = mysqli_real_escape_string($db, $_POST['mus168']);  
      
  $cra120 = mysqli_real_escape_string($db, $_POST['cra120']);  
      
  $eng151 = mysqli_real_escape_string($db, $_POST['eng151']);  
  
  
   
        
          $insert = mysqli_query($db, "INSERT INTO results
                                VALUES(
                                NULL,
                                
                                '".$gst101."',
                                
                                '".$gst102."',
                                
                                '".$gst105."',
                                
                                '".$mus168."',
                                
                                '".$cra120."',
                                
                                '".$eng151."',
                                
                                '".$stu_name."',
                                
                                '".$teacher_name."'
                                
                                )
                                
                                ") or die(mysqli_error($db));
      
      header("location:view_students.php?stu_id=$stu_id&stu_name=$stu_name");
            
        
    
  }

?>
        
        
        
<form method="post">
<fieldset>
    
   <?php  echo "<p> Welcome Mr/Mrs ".$teacher_name." . Add Your Results Carefully. </p>";  ?>
    
<p>
 GST 101 :  <br>  <br> 
    
A <input type="radio" name="gst101" value="A"/>   <br> 
B <input type="radio" name="gst101" value="B"/>   <br> 
C <input type="radio" name="gst101" value="C"/>   <br> 
D <input type="radio" name="gst101" value="D"/>   <br> 
E <input type="radio" name="gst101" value="E"/>   <br> 
F <input type="radio" name="gst101" value="F"/>   <br> 
   
</p>
    
    
<p>
 GST 102 : <br> <br>  
    
A <input type="radio" name="gst102" value="A"/>   <br> 
B <input type="radio" name="gst102" value="B"/>   <br> 
C <input type="radio" name="gst102" value="C"/>   <br> 
D <input type="radio" name="gst102" value="D"/>   <br> 
E <input type="radio" name="gst102" value="E"/>   <br> 
F <input type="radio" name="gst102" value="F"/>   <br> 
   
</p>
    
<p>
 GST 105 :  <br> <br> 
    
A <input type="radio" name="gst105" value="A"/>   <br> 
B <input type="radio" name="gst105" value="B"/>   <br> 
C <input type="radio" name="gst105" value="C"/>   <br> 
D <input type="radio" name="gst105" value="D"/>   <br> 
E <input type="radio" name="gst105" value="E"/>   <br> 
F <input type="radio" name="gst105" value="F"/>   <br> 
   
</p>
    
<p>
 MUS 168 : <br>  <br> 
    
A <input type="radio" name="mus168" value="A"/>   <br> 
B <input type="radio" name="mus168" value="B"/>   <br> 
C <input type="radio" name="mus168" value="C"/>   <br> 
D <input type="radio" name="mus168" value="D"/>   <br> 
E <input type="radio" name="mus168" value="E"/>   <br> 
F <input type="radio" name="mus168" value="F"/>   <br> 
   
</p>
    
<p>
 CRA 120: <br>  <br> 
    
A <input type="radio" name="cra120" value="A"/>   <br> 
B <input type="radio" name="cra120" value="B"/>   <br> 
C <input type="radio" name="cra120" value="C"/>   <br> 
D <input type="radio" name="cra120" value="D"/>   <br> 
E <input type="radio" name="cra120" value="E"/>   <br> 
F <input type="radio" name="cra120" value="F"/>   <br> 
   
</p>
    
<p>
 ENG 151 : <br> <br> 
    
A <input type="radio" name="eng151" value="A"/>   <br> 
B <input type="radio" name="eng151" value="B"/>   <br> 
C <input type="radio" name="eng151" value="C"/>   <br> 
D <input type="radio" name="eng151" value="D"/>   <br> 
E <input type="radio" name="eng151" value="E"/>   <br> 
F <input type="radio" name="eng151" value="F"/>   <br> 
   
</p>

    
 <br> <br> <br> <br>
    
<input type="submit" name="add" value="ADD NOW"/>
    
    
    
    
    
    
    
    
    
</fieldset>        
        
</form>        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    <h3> Would You Like To <a href="tea_logout.php"> Logout? </a> </h3>
    
    </body>


</html>