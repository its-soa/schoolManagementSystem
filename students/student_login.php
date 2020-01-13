
<?php

session_start();

include("db/config.php");
?>

    <?php
    
  /*  $info = mysqli_query($db, "SELECT * FROM students WHERE first_name = '".$username."'  
                                       
                                       ") or die(mysqli_error($db));
          
          
              if (mysqli_num_rows($info) == 1) {
            
        
            
            $pick = mysqli_fetch_array($info); 
            
                $matric = $pick['matric_number']; */
    
    
    ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HALL MARK | STUDENT LOGIN </title>
<style> 
          fieldset{
        width: 50%;
        height: 50%;
        background-color: rebeccapurple;
      border: 1px solid rebeccapurple;
      
    }   
    
    p{
        color: white;
        text-align: center;
      
    }
    
    fieldset label{
        float: left;
        width: 90px;
    }
    
    body{
            background-image: url(school/5.jpg); 
            text-align: center;
            color: snow;
        }
    
    .form{
        
          padding-top: 180px;
        padding-left: 430px;
    }
				  

</style>
</head>
<body>
    

    
<?php
      if(array_key_exists('submit', $_POST)){
          
		  $error = array();
		  
	if(empty($_POST['uname'])){
	 $error[] = "please enter username";
        
	}else{
		$username = (mysqli_real_escape_string($db, $_POST['uname']));
	}
	
	  if(empty($_POST['matric'])){
	 $error[]= "please enter password";
          
	}else{
		$matric = (mysqli_real_escape_string($db, $_POST['matric']));
	}

		if(empty($error)) { 
          // THIS WASNT MDS BECAUSE THERE WAS NO INPUT PASSWORD FORM.
          
          $query = mysqli_query($db, "SELECT * FROM students WHERE first_name = '".$username."'      AND  matric_number = '".$matric."'  
                                       
                                       ") or die(mysqli_error($db));
          
          
              if (mysqli_num_rows($query) == 1) {
            
        
            
            $fetch = mysqli_fetch_array($query);
            
            $_SESSION['student_name'] = $fetch['first_name'];
            
            $_SESSION['student_matric'] = $fetch['matric_number'];
                  
                  $student_name = $_SESSION['student_name'];
                  
                  $matric = $_SESSION['student_matric'];
                  
                  $sucess = "Your Login Was Successful.";   
            
            header("location:student_home.php?msg=$sucess");
                
        } else{
                  
         
            
            $msg = "Invalid. Please Try Again";
            
            header("location:student_login.php?err=$msg"); }
            
        } else {
            foreach ($error as $error) {
                
                echo "<p style = 'color:red'>"." * ".$error."</p>";
            }
            
        }
	  
    }
	
?>   
     <br>
  
      <h1>STUDENT LOGIN FORM</h1> <br>
    
    
          <div class="form">  
          
      <form action=""method="post">
          
          <fieldset>
              
               <h4>please login below</h4>
              
      <p>
         <label for="i"> First name : </label> 
          <input type="text"name="uname" placeholder="username" id="i"/>
        </p>
          
       <p>
           <label for="l"> Matric : </label> 
           <input type="password"name="matric" placeholder="matric" id="l"/>
        </p>
          
      
          
          <input type="submit"name="submit"value="LOGIN"/>
          
              
      </fieldset>
              
       </form>
              
              </div>
          
      
</body>
</html>