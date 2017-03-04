<?php
 include './config.php';

    if(!empty($_REQUEST["email"])){
        if(!filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)){

            echo "<span class='status-not-available'> Invalid email format.</span>";
        }
        else {
            $check_email =mysqli_query($link,"SELECT COUNT(*) FROM userlogin
                            WHERE email ='".$_REQUEST["email"]."'");


            if($check_email != 1){
                echo "<span class='status-available'> Email Available.</span>";
            }
            else {
                echo "<span class='status-not-available'> Email Not Available.</span>";
            }
        }
    }

?>