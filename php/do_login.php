<meta charset="utf-8">
<?php
	session_start();
include "config.php";

if($sql = "SELECT * FROM student
						WHERE username='".$_REQUEST['username']."'
							AND passwd='".$_REQUEST['passwd']."'")
	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);

		$_SESSION['login'] = true;
		$_SESSION['username'] = $row['username'];
        $_SESSION['sid'] = $row['sid'];
        $_SESSION['tid'] = $row['tid'];
        $_SESSION['fn_st'] = $row['fn_st'];
        $_SESSION['ln_st'] = $row['ln_st'];
        $_SESSION['number_id'] = $row['number_id'];
        $_SESSION['status'] =$row['status'];

       echo "<script type='text/javascript'>window.location='../pages/profile_student.php'</script>";

	}
	elseif($sql = "SELECT * FROM teacher
						WHERE username='".$_REQUEST['username']."'
							AND passwd='".$_REQUEST['passwd']."'") {
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['fn_te'] = $row['fn_te'];
            $_SESSION['ln_te'] = $row['ln_te'];
            $_SESSION['tid'] = $row['tid'];


            echo "<script type='text/javascript'>window.location='../pages/profile_teacher.php'</script>";

        }
        elseif ($sql = "SELECT * FROM company
						WHERE username='" . $_REQUEST['username'] . "'
							AND passwd='" . $_REQUEST['passwd'] . "'") {
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);

                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['c_name'] = $row['c_name'];
                $_SESSION['cid'] = $row['cid'];



                echo "<script type='text/javascript'>window.location='../pages/profile_company.php'</script>";

            } elseif ($sql = "SELECT * FROM admin
						WHERE username='" . $_REQUEST['username'] . "'
							AND passwd='" . $_REQUEST['passwd'] . "'") {
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);

                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $row['username'];


                    echo  "<script type='text/javascript'>window.location='../pages/profile_admin.php'</script>";
                } else {

                    echo "<script type='text/javascript'>window.location='../pages/login.html'</script> ";
                    }
                }
            }
    }
?>