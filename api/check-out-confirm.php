<?php
require "../library/model/ourModel.php";
date_default_timezone_set("Asia/Dhaka");

if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
    header('Content-Type: application/json');
    $om = new ourModel();
    $now = date('Y-m-d');
    $resID = $_POST['resID'];

    $udata = [
        'end_date' => $now
    ];

    $uResult = $om->update("reservations", $udata, array( "id" => $resID ));

    $data = $uResult;

    if($uResult > 0){
        $sql = "DELETE
        FROM
            dining_logs
        WHERE
            reservation_id = '$resID' AND date > '$now'";
        if($om->raw($sql)){
            $data = 'Check Out Successfully';
        }
    } else {
        $data = 'Check Out Fail';
    }

    echo json_encode($data);

}
?>