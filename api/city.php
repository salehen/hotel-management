<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header('Content-Type: application/json');
    $om = new ourModel();
    
    $result = $om->view('citys', '*', '', array('country_id' => $_POST['id']));
    $city = [];
    if($result){
        while ($r = $result->fetch_object()) {
            $city[] = $r;
        }
        $data['city'] = $city;
    }

    echo json_encode($data);
}
?>