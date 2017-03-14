<?php

include 'config.php';


$id = $_REQUEST['id'];
$offer = $_POST['offer'];
$name_leder = $_POST['name_leder'];
$rank_leder = $_POST['rank_leder'];


$sql = "UPDATE conclude SET offer='$offer',name_leder ='$name_leder',rank_leder='$rank_leder',status='1' WHERE id='$id'";

mysqli_query($link,$sql);

echo "<script type='text/javascript'>window.location='../pages/conclude_show_company.php?id=$id'</script>"




?>