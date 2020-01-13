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
<title> Admin | Add Student </title>  
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
        .form{
            text-align: left;
        }
    
    
    
    </style>
    
</head>
    
    <body>
        <br>
        
        <h1> HALL MARK SCHOOLS </h1>
        
     <?php echo "<h3> You are admin with ID ".$admin_id."And Name of ".$admin_name."</h3>" ?>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3>
        
          <div class="links">
    
       <a href="admin_home.php"> Home Page |</a>
    <a href="add_teachers.php"> Add a Teacher |</a>
      <a href="view_teachers.php"> View Teachers |</a>
     <a href="view_students.php"> View Students |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="adm_logout.php"> Logout |</a>
    
    </div>
    
    <br>
        
        <?php
     if(array_key_exists('register', $_POST)){
		 $error=array();
		 
	if(empty($_POST['fname'])){
		$error[] = "please input your firstname";
	}else{
	$firstname = (mysqli_real_escape_string($db, $_POST['fname']));
	}
	
	
	if(empty($_POST['lname'])){
		$error[] = "please input your lastname";
	}else{
	$lastname= (mysqli_real_escape_string($db, $_POST['lname']));
	}
	
	
	if(empty($_POST['sex'])){
		$error[] = "please input your gender";
	}else{
	$gender= (mysqli_real_escape_string($db, $_POST['sex']));
	}
         
    if(empty($_POST['email'])){
		$error[] = "please input your email";
	}else{
	$email= (mysqli_real_escape_string($db, $_POST['email']));
	}
         
   /* if(empty($_POST['matric'])){
		$error[] = "please input your matric_no";
	}else{
	$matric_no = (mysqli_real_escape_string($db, $_POST['matric']));
	} */
         
    	
	if(empty($_POST['kin'])){
		$error[] = "please input your next of kin";
	}else{
	$kin = (mysqli_real_escape_string($db, $_POST['kin']));
	}
	
    if(empty($_POST['address'])){
		$error[] = "please input your address";
	}else{
	$address = (mysqli_real_escape_string($db, $_POST['address']));
	}  
         
	if(empty($_POST['D_O_B'])){
		$error[] = "please input youR date of birth";
	}else{
	$birth = (mysqli_real_escape_string($db, $_POST['D_O_B']));
	}
    
    if(empty($_POST['origin'])){
		$error[] = "please select your state of origin";
	}else{
	$origin = (mysqli_real_escape_string($db, $_POST['origin']));
	}
         
    if(empty($_POST['dept'])){
		$error[] = "please select your department";
	}else{
	$department= (mysqli_real_escape_string($db, $_POST['dept']));
	}

	if(empty($_POST['reg'])){
		$error[] = "please input your year of registration";
	}else{
	$yr_of_reg = (mysqli_real_escape_string($db, $_POST['reg']));
	}
	
	if(empty($_POST['status'])){
		$error[] = "please input your marital status";
	}else{
	$marrital = (mysqli_real_escape_string($db, $_POST['status']));
	}
         
         
	if(empty($error)){
        
        $insert = mysqli_query($db, "INSERT INTO students VALUES(
                                    
                                        NULL,
                                        
                                        '".$firstname."',
                                        
                                        '".$lastname."',
                                        
                                        '".$gender."',
                                        
                                        '".$email."',
                                        
                                         '".rand(1000000000,9999999999)."',
                                        
                                        '".$kin."',
                                        
                                        '".$address."',
                                        
                                        '".$birth."',
                                        
                                         '".$origin."',
                                        
                                        '".$department."',
                                        
                                        '".$yr_of_reg."',
                                        
                                        '".$marrital."',
                                        
                                         '".$admin_id."'
        
        )
        
        ") or die(mysqli_error($db));
        
        header("location:add_students.php");
        
    } else{
        
        foreach($error as $error){
            
            echo "<p style = 'color:red'>"." * ".$error."</p>";
        }
    }
           
         
	 }
?> 
        
         <h1>ADD STUDENT</h1>
       
       <h3>Please fill the fields below</h3>
       
       <div class="form"> 
       
       <form action="" method="POST"/>
       <h3>Firstname : <input type="text"name="fname" /></h3>
       <h3>Lastname  : <input type="text"name="lname"/></h3>
       <h3>Gender : FEMALE <input type="radio"name="sex"value="F"/>
              MALE <input type="radio"name="sex"value="M"/></h3>
       <h3> Department : <select name="dept">
                 <option></option>
                  <option value="masscom">masscom</option>
                  <option value="computer science">computer science</option>
                  <option value="int relation">international relation</option>
                  <option value="Human resource">Human resource</option>
                  <option value="business admin">business admin</option>
                  <option value="accounting">accounting</option>
                  <option value="enginering">enginering</option>
                  <option value="agriculture">agriculture</option>
                  <option value="french">french</option>
                  <option values="food tech">food tech</option>
                  </select></h3>
        <h3>Date of birth : <input type="date" name="D_O_B"/></h3>
        <h3>Email : <input type="text"name="email"/></h3>
       <h3> State of origin : <select name="origin">
                  <option></option>
                  <option value="ondo">ondo</option>
                  <option value="akure">akure</option>
                  <option value="jigawa">jigawa</option>
                  <option value="dutse">dutse</option>
                  <option value="lagos">lagos</option>
                  <option value="anambra">anambra</option>
                  <option value="imo">imo</option>
                  <option value="ogun">ogun</option>
                  <option value="edo">edo</option>
                  <option value="benin">benin</option>
                  </select></h3>
         <h3> Address : <input type="text"name="address"/></h3>
     <!--    <h3> Matric_no <input type="text"name="matric"/></h3> -->
         <h3> Next of kin : <input type="text" name="kin"/></h3>
        <h3>Year of registration : <input type="date" name="reg"/> </h3>
         <h3> Marital status : single <input type="radio" name="status" value="S"/>
             Married <input type="radio" name="status" value="M"/> </h3>
        
        
             <h3><input type="submit"name="register"value="Add student"/></h3>        
        
       </div> <br> <br> 
        
      <h3> Would You Like To Go Home <a href="admin_home.php"> Click Here </a> </h3> <br>
    
    <h3> Would You Like To <a href="adm_logout.php"> Logout? </a> </h3>
    
             </body>
             
             </html>