<?php

session_start();

include("db/config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> Teacher | Login </title>
    
    <style> 
    
     fieldset{
        width: 50%;
        height: 60%;
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
    
    if(array_key_exists("login", $_POST)) {
        
        $error = array();
        
        if(empty($_POST['u_name'])){
            $error[] = "Please input your user name";
        } else{
            $username = mysqli_real_escape_string($db, $_POST['u_name']);
        }
        
        if(empty($_POST['p_word'])) {
            $error[] = "Please type in your password";
        }else{
            $password = md5(mysqli_real_escape_string($db, $_POST['p_word']));
        }
        
        if(empty($error)) { 
        
        $query = mysqli_query($db, "SELECT * FROM teachers WHERE firstname = '".$username."' 
        AND password = '".$password."'
        
                    ") or die(mysqli_error($db));
        
        if (mysqli_num_rows($query) == 1) {
            
        
            
            $fetch = mysqli_fetch_array($query);
            
            $_SESSION['teacher_id'] = $fetch['teacher_id'];
            
            $_SESSION['teacher_name'] = $fetch['firstname'];
            
            header("location:teacher_home.php");
                
        } else{
            
            $msg = "Invalid. Please Try Again";
            
            header("location:teacher_login.php?err=$msg");
            
        }
            
        } else {
            foreach ($error as $error) {
                
                echo "<p style = 'color:red'>"." * ".$error."</p>";
            }
            
        }
            
        
                
    }
    
    ?>
    
    <div class="form"> 
    
 <form method="post">
   <fieldset>
    <p> Please Fill In Your Details </p>
    
<p>
<label for="username"> Username : </label>       
<input type="text" name="u_name" id="username" placeholder="username" />
</p>
    
<p>
<label for="password"> Password : </label>      
<input type="password" name="p_word" id="password" />
</p>
    
    <br> <br>
       
<input type="submit" name="login" value="Click to Login" placeholder="submit" />
    
    
    
    </fieldset> 

</div>
        
</body>
</html>