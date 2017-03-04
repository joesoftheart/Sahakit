<?php

   include '../php/config.php';


   $data_json = $_REQUEST['data'];
if ($data_json !=" ") {
    $sql = "SELECT * FROM student WHERE idst LIKE '%$data_json%' AND tid = '0'";
    $query_value = mysqli_query($link, $sql) or die(mysqli_error($sql));

    $data_value = array();

    for ($i = 1; $row = mysqli_fetch_array($query_value); $i++) {

        $data_row = array(
            "level" => $i,
            "fn_st" => $row['fn_st'],
            "ln_st" => $row['ln_st'],
            "idst" => $row['idst'],
            "status" => $row['status']
        );

        array_push($data_value, $data_row);
    }

    echo json_encode($data_value);

}else{

    $sql = "SELECT * FROM student WHERE tid = '0'";
    $query_value = mysqli_query($link,$sql)or die(mysqli_error($sql));

    $data_value = array();

    for($i=1 ; $row = mysqli_fetch_array($query_value);$i++){

        $data_row = array(
            "level"    => $i,
            "fn_st" => $row['fn_st'],
            "ln_st" => $row['ln_st'],
            "idst"     => $row['idst'],
            "status"   => $row['status']
        );

        array_push($data_value,$data_row);
    }

    echo json_encode($data_value);
}
?>