<?php

include("config.php");

function authentication() {
    
    if (!isset($_SESSION['admin_id']) && !isset($_SESSION['admin_name'])) {
        
        header("location:admin_login.php");
    }
    
}


?>