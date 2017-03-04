<?php
include 'config.php';

$at_home = $_POST['at_home'];
$moo = $_POST['moo'];
$district = $_POST['district'];
$alley = $_POST['alley'];
$road = $_POST['road'];
$amphur = $_POST['amphur'];
$province = $_POST['province'];
$passcode = $_POST['passcode'];
$email = $_POST['email'];
$telaphone = $_POST['telaphone'];
$stu_day = $_POST['stu_day'];
$stu_month = $_POST['stu_month'];
$stu_year = $_POST['stu_year'];
$age = $_POST['age'];
$marital_status = $_POST['marital_status'];
$sloder_status = $_POST['sloder_status'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$aim = $_POST['aim'];
$end1 = $_POST['end1'];
$at_end1 = $_POST['at_end1'];
$end2 = $_POST['end2'];
$at_end2 = $_POST['at_end2'];
$end3 = $_POST['end3'];
$at_end3 = $_POST['at_end3'];
$education = $_POST['education'];
$branch = $_POST['branch'];
$study_detail = $_POST['study_detail'];
$skills = $_POST['skills'];



$sql = "INSERT INTO resume (at_home,moo,district,alley,road,amphur,province,passcode,email,telaphone,stu_day,stu_month,stu_year,age,marital_status,sloder_status,weight,height,aim,end1,at_end1,end2,at_end2,end3,at_end3,educatin,branch,study_detail,skills)
            VALUE ('$at_home',
                    '$moo',
                    '$district',
                    '$alley',
                    '$road',
                    '$amphur',
                    '$province',
                    '$passcode',
                    '$email',
                    '$telaphone',
                    '$stu_day',
                    '$stu_month',
                    '$stu_year',
                    '$age',
                    '$marital_status',
                    '$sloder_status',
                    '$weight',
                    '$height',
                    '$aim',
                    '$end1',
                    '$at_end1',
                    '$end2',
                    '$at_end2',
                    '$end3',
                    '$at_end3',
                    '$education',
                    '$branch',
                    '$study_detail',
                    '$skills')";

$query = mysqli_query($link,$sql);


echo $query;




$link -> close();
?>