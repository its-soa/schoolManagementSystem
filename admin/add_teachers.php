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
<title> Admin | Add Teachers </title>  
    <style> 
        label{
            float: left;
            width: 130px;
        }
        
        #leg{
            text-align: center;
        }
        
        fieldset{
            width: 470px;
            height: 540px;
            padding-top: 20px
        }
        
            body{
            background-image: url(school/1.jpg); 
            text-align: center;
            color: snow;
        }

        .form p{
            margin-bottom: 20px;
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
           <h1> HALL MARK SCHOOLS </h1>
        
         <?php echo "<h3> You are admin with ID "." ".$admin_id."And Name of ".$admin_name."</h3>" ?>
    
    <h3> <marquee> Please Proceed and Perform Your Administrative Duties. Good Luck ! ! ! </marquee> </h3> <br>
     
       <div class="links">
    
    
       <a href="admin_home.php"> Home Page |</a>
      <a href="view_teachers.php"> View Teachers |</a>
    <a href="add_students.php"> Add a Student |</a>
     <a href="view_students.php"> View Students |</a>
     <a href="view_news.php"> View News Letters |</a>
    <a href="adm_logout.php"> Logout |</a>
    
    </div>
    
    
    
    

    <br> <br> 
     
     <?php
    // NOW WE START OUR VALITADTION 
    
    if(array_key_exists('register', $_POST)){
        
        $error = array();
        
        if(empty($_POST['fname'])) {
            
            $error[] = "Please Input Your First Name";
        } else{
            $firstname = mysqli_real_escape_string($db, $_POST['fname']);
        }
        
        if(empty($_POST['lname'])) {
            
            $error[] = "Please input your Last Name";
        }else {
            $lastname = mysqli_real_escape_string($db, $_POST['lname']);
        }
        
        if(empty($_POST['gender'])){
            $error[] = "Please Indicate Your Gender";
        } else{
            $gender = mysqli_real_escape_string($db, $_POST['gender']);
        }
        
        if(empty($_POST['email'])){
            $error[] = "Please Input Your Email Address";
        }else{
            $email = mysqli_real_escape_string($db, $_POST['email']);
        }
    
        if(empty($_POST['birth'])) {
            $error[] = "Please Indicate Your Date of Birth";
        }else{
            $birth = mysqli_real_escape_string($db, $_POST['birth']);
        }
        
        if(empty($_POST['phone'])) {
            $error[] = "Please Type In Your Phone Number";
        } else{
            $phone = mysqli_real_escape_string($db, $_POST['phone']);
        }
        
        if(empty($_POST['add'])) {
            $error[] = "Please Type in Your Home Address";
        }else {
            $address = mysqli_real_escape_string($db, $_POST['add']);
        } 
        
        if(empty($_POST['p_word'])) {
            $error[] = "Please Type Your Desired Password";
        } else{
            $password = md5(mysqli_real_escape_string($db, $_POST['p_word']));
        }
    
        if(empty($error)){

        $insert = mysqli_query($db, "INSERT INTO teachers
                                    VALUES(
                                    NULL,
                                    
                                    '".$firstname."',
                                    
                                    '".$lastname."',
                                    
                                    '".$gender."',
                                    
                                    '".$email."',
                                    
                                    '".$birth."',
                                    
                                    '".$phone."',
                                    
                                    '".$address."',
                                    
                                    '".$password."',
                                    
                                    '".$admin_id."'
                              
                                        )

                                        ") or die(mysqli_error($db));
            
                header("location:add_teachers.php");
    
        } else {
            
            foreach($error as $error) { 
                
            echo "<p style = 'color:red'>"." * ".$error."</p>";
        }
    }
    
    }
    
    
    ?>
        
     <div class="form"> 
     <form action="" method="post">
<fieldset>
         
     <p id="leg"> Input Teacher Details. </p>  
    
    <p>
    <label for="fname"> First Name : </label>
    <input type="text" name="fname" id="fname" size="30px" />
    </p>
    
     <p>
    <label for="lname"> Last Name : </label>
    <input type="text" name="lname" id="lname" size="30px" />
    </p>
    
        <p>
    <label for="gender">Gender : </label>
    Male <input type="radio" name="gender" id="gender" value="Male" />
    Female <input type="radio" name="gender" id="gender" value="Female"/>
    </p>
    
     <p>
    <label for="email"> Email Address : </label>
    <input type="email" name="email" id="email" size="30px" />
    </p>
    
        <p>
    <label for="birth"> Date of Birth : </label>
    <input type="date" name="birth" id="birth" size="30px" />
    </p>
    
      <p>
    <label for="phone"> Phone Number : </label>
    <input type="number" name="phone" id="phone" size="30px" />
    </p>
    
    <p>
    <label for="home"> Home Address : </label>
    <textarea rows="7" cols="25" name="add"></textarea>
    </p>
    
    <p>
    <label for="p_word"> Password :  </label>
    <input type="password" name="p_word" id="p_word" size="30px" />
    </p>
    <br>
    <p>
    <input type="submit" name="register" value="Register Now" />
    </p>     
         
         
         
</fieldset>     

         
     </form>
     
     </div> <br> <br>
      
         <h3> Would You Like To Go Home <a href="admin_home.php"> Click Here </a> </h3> <br>
     
    <h3> Would You Like To <a href="adm_logout.php"> Logout? </a> </h3>
    
    </body>
    

</html>