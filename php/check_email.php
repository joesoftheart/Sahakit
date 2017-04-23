<?php
 include './config.php';

    if(!empty($_REQUEST["email"])){
        if(!filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)){

            echo "<span class='status-not-available'> รูปแบบไม่ถูกต้อง</span>";
        }
        else {
            $check_email =mysqli_query($link,"SELECT COUNT(*) FROM userlogin
                            WHERE email ='".$_REQUEST["email"]."'");


            if($check_email != 1){
                echo "<span class='status-available'> อีเมล์นี้ใช้งานได้</span>";
            }
            else {
                echo "<span class='status-not-available'> อีเมล์นี้ใช้ไม่ได้</span>";
            }
        }
    }

?>