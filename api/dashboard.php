<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    header('Content-Type: application/json');
    $om = new ourModel();

    $resID = $_POST['resID'];
    $din = array();
    $sql = "SELECT
                rooms.serial,
                rooms.price,
                dining_logs.*,
                COUNT(dining_logs.id) AS total,
                dining_items.name,
                dining_items.amount AS diamount,
                reservations.adult + reservations.child as totalP,
                COUNT(dining_logs.id) * dining_items.amount * (reservations.adult + reservations.child) AS subtotal,
                reservations.amount AS resAmount,
                reservations.start_date,
                reservations.end_date
                
            FROM
                dining_logs,
                dining_items,
                reservations,
                rooms
            WHERE
                dining_logs.reservation_id = $resID AND dining_logs.status = '1' AND dining_logs.dianing_id = dining_items.id AND dining_logs.reservation_id = reservations.id AND reservations.room_id = rooms.id
            GROUP BY
                dining_logs.dianing_id
            ORDER BY
                dining_logs.dianing_id ASC
                    ";
                    $totalDamo = 0;
                    $gtotal =0;
                    
                    $result =  $om->raw($sql);
                   while($r = $result->fetch_object()) {
                    $earlier = new DateTime(substr($r->start_date, 0, 10));
                    $later = new DateTime(substr($r->end_date, 0, 10));
                    $diff = $later->diff($earlier)->format("%a");
                       $din[] = $r;
                      
                       $totalDamo +=  $r->total * $r->diamount * $r->totalP;
                       $gtotal = $totalDamo+$r->resAmount;
                   }
                   $data['dining'] = $din;
                   $data['total'] = $totalDamo;
                   $data['gtotal'] = $gtotal;
                   $data['totalDays'] = $diff;


                   echo json_encode($data);
                  
}
?>