<?php

session_start();

include("db/config.php");

    
if (isset($_GET['err_msg'])){
    
    $err_msg = $_GET['err_msg'];
    
    echo "<p style = 'color: red'> * ".$err_msg."</p>";
}

?>

<html>
<head>
<title> Hallmark Sch | Admin Login</title>
    
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
    // HERE, I AM VALIDATING THE FORM
    
    if (array_key_exists('login', $_POST)) {
        
        $error = array();
        
        if (empty($_POST['user_n'])){
            
            $error[] = "Please Input Your Username !";
        } else {
            $username = mysqli_real_escape_string($db, $_POST['user_n']);
        }
        
        if (empty($_POST['p_word'])) {
            $error[] = "Please type in your password !";
        } else {
            
            $password = md5(mysqli_real_escape_string($db, $_POST['p_word']));
        }
        
        if (empty($error)) {
            
            $query = mysqli_query($db, "SELECT * FROM admin WHERE admin_name = '".$username."' && secured_password = '".$password."' 
            
                        ") or die(mysqli_error($db));
            
            if (mysqli_num_rows($query) == 1){
                
                $result = mysqli_fetch_array($query);
                
                $_SESSION['ad_id'] = $result['admin_id'];
                $_SESSION['ad_name'] = $result['admin_name'];
                
                $admin_id = $_SESSION['ad_id'];

                $admin_name = $_SESSION['ad_name'];
                
                
                 header("location:admin_home.php?msg=login Successful");
            
            } else {
                
                $err_msg = "Invalid Username / Password. ";
                    
                header("location:admin_login.php?err_msg=$err_msg"); }
            
        } else {
                foreach($error as $error){
                    
                    echo "<p style = 'color: red' > * ".$error."</p>";
                }
                
            } 
          
    }
    
    
    ?>
    
    <div class="form"> 
<form action="" method="post">
    
<fieldset> 
    <p> Welcome Admin ! </p>  <br>
<p>
<label for="user_n"> Username : </label>    
<input type="text" name="user_n" id="user_n" />
</p>
    
<p>
<label for="p_word"> Password : </label>    
<input type="password" name="p_word" id="p_word" />
</p>
    <br>  <br> <br> 
  <p>  <input type="submit" name="login" value="Login" /> </p> 
    
</fieldset> 
    
</form>
    
    </div>
    
</body>
    
</html>