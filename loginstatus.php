<?php
    $corr_username = "jan";
    $corr_password = "ty6ty6ty6";

    if($corr_username &&  $_POST['username'] || $corr_password && $_POST['password'] ) {
        
        header("Location: http://localhost/Module_8/Databases%20&%20PHP/database.php");
        
    } else {

        header("Location: http://localhost/Module_8/Databases%20&%20PHP/login.php");
    
}
