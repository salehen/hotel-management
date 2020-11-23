<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $obj = new ourModel();
    $where = [
        "email" => $_POST['email']
    ];
    $results = $obj->view("customers", "*", "", $where);
    if ($results->num_rows>0){
        echo "1";
    }else{
        echo "2";
    }
}