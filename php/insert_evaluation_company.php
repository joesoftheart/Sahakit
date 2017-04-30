<meta charset="UTF-8">

<?php
include 'config.php';

$id = $_POST['id'];
$h_topic1 = $_POST['h_topic1'];
$topic_1 = $_POST['topic_1'];
$topic_2 = $_POST['topic_2'];
$h_topic2 = $_POST['h_topic2'];
$topic_3 = $_POST['topic_3'];
$topic_4 = $_POST['topic_4'];
$topic_5 = $_POST['topic_5'];
$topic_6 = $_POST['topic_6'];
$topic_7 = $_POST['topic_7'];
$topic_8 = $_POST['topic_8'];
$topic_9 = $_POST['topic_9'];
$topic_10 = $_POST['topic_10'];
$h_topic3 = $_POST['h_topic3'];
$topic_11 = $_POST['topic_11'];
$topic_12 = $_POST['topic_12'];
$topic_13 = $_POST['topic_13'];
$topic_14 = $_POST['topic_14'];
$h_topic4 = $_POST['h_topic4'];
$topic_15 = $_POST['topic_15'];
$topic_16 = $_POST['topic_16'];
$topic_17 = $_POST['topic_17'];
$topic_18 = $_POST['topic_18'];
$topic_19 = $_POST['topic_19'];
$topic_20 = $_POST['topic_20'];

echo $h_topic3;




$sql = "UPDATE form_evaluator_company SET h_topic1 ='$h_topic1',
topic_1 ='$topic_1',
topic_2 ='$topic_2',
h_topic2 ='$h_topic2',
topic_3 ='$topic_3',
topic_4 ='$topic_4',
topic_5 ='$topic_5',
topic_6 ='$topic_6',
topic_7 ='$topic_7',
topic_8 ='$topic_8',
topic_9 ='$topic_9',
topic_10 ='$topic_10',
h_topic3 ='$h_topic3',
topic_11 ='$topic_11',
topic_12 ='$topic_12',
topic_13 ='$topic_13',
topic_14 ='$topic_14',
h_topic4 ='$h_topic4',
topic_15 ='$topic_15',
topic_16 ='$topic_16',
topic_17 ='$topic_17',
topic_18 ='$topic_18',
topic_19 ='$topic_19',
topic_20 ='$topic_20'
            WHERE id = $id";
var_dump($sql);
$query = mysqli_query($link, $sql);


?>
<!--<script type="text/javascript">window.location = '../pages/evaluation_for_company_edit.php'</script>-->
