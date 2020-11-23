<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header('Content-Type: application/json');
    $om = new ourModel();

    $resID = $_POST['resID'];
    $result = $om->view("reservations, customers, rooms", "reservations.*, customers.f_name, customers.l_name, customers.contact, customers.address, rooms.serial, rooms.price",
        "", array("reservations.id" => $resID), array("reservations.customer_id" => "customers.id", "reservations.room_id" => "rooms.id"));
    $res = array();
    while ($r = $result->fetch_object()) {

        $res[] = $r;
    }

    $data['res'] = $res;

    echo json_encode($data);

}
?>
