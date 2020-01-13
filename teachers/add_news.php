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
<title> Teacher | Add Newsletter </title>  
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
        
if(array_key_exists('upload', $_POST)){
        $error = array();
    
    if (empty($_POST['news'])){
        
        $error[] = "PLEASE WRITE A POST FIRST";
    } else{
        $post_content = mysqli_real_escape_string($db, $_POST['news']);
    }
    
    if (empty($error)){
   
   $insert = mysqli_query($db, "INSERT INTO news
                        VALUES(
                        
                        NULL,
                        
                        '".$post_content."',
                        
                        NOW(),
                        
                        '".$teacher_name."'

                        )
                        
                        ") or die(mysqli_error($db));
        
        header("location:add_news.php");
        
} else{
        foreach ($error as $error){
        
        echo "<p style= 'color:red' >".$error."</p>";
            
        }
    }
    
}
        
?>
        
        
        
        <form method="post">
        
        <fieldset>
            
        <p> UPLOAD A NEWS LETTER </p>    
            
        <textarea rows="20" cols="40" name="news"> </textarea>
            
        <br> <br> <br> 
            
            
        <input type="submit" name="upload" value="Upload Now"/>
            
        </fieldset>
        
        </form>
        
        
<br> <br>
        
    <h3> Would You Like To <a href="tea_logout.php"> Logout? </a> </h3>
    
    </body>


</html>