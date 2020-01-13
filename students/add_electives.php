<?php
include("db/config.php");

session_start();

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
<title> Student | Electives </title>  
    <style> 
    
     .table{
            
            text-align: left;
        }
        h1, h3{
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
        
  if(array_key_exists('add', $_POST))  {
      
  $gst101 = mysqli_real_escape_string($db, $_POST['gst101']);  
      
  $gst102 = mysqli_real_escape_string($db, $_POST['gst102']);  
      
  $gst105 = mysqli_real_escape_string($db, $_POST['gst105']);  
      
  $mus168 = mysqli_real_escape_string($db, $_POST['mus168']);  
      
  $cra120 = mysqli_real_escape_string($db, $_POST['cra120']);  
      
  $eng151 = mysqli_real_escape_string($db, $_POST['eng151']);  
  
  
   
        
          $insert = mysqli_query($db, "INSERT INTO electives
                                VALUES(
                                NULL,
                                
                                '".$gst101."',
                                
                                '".$gst102."',
                                
                                '".$gst105."',
                                
                                '".$mus168."',
                                
                                '".$cra120."',
                                
                                '".$eng151."',
                                
                                '".$student_name."'
                                
                                )
                                
                                ") or die(mysqli_error($db));
      
      header("location:student_home.php");
            
        
    
  }

?>
        
        
 <form action="" method="post">
        
 <fieldset>
            
    <p>
    <label for="results"> Choose Your Desired Electives :</label> <br> <br>
     
    GST_101<input type="checkbox" name="gst101" value="GST_101"/> <br> <br>
        
     GST_102 <input type="checkbox" name="gst102" value="GST_102" /> <br> <br>
        
    GST_105 <input type="checkbox" name="gst105" value="GST_105" /> <br> <br>
        
    MUS_168  <input type="checkbox" name="mus168" value="MUS_168" /> <br> <br>
        
    CRA_120 <input type="checkbox" name="cra120" value="CRA_120" /> <br> <br>
        
     ENG_151    <input type="checkbox" name="eng151" value="ENG_151" /> <br> <br>
        
        
        
    </p>   <br> <br>
     
     <input type="submit" name="add" value="ADD NOW"/>
            
            

            

            
            
            
            
            
            
            
</fieldset>
        
</form>
    
        
        <br> <br> <br> <br> 
    <h3> Would You Like To <a href="stu_logout.php"> Logout? </a> </h3>
    
    </body>


</html>