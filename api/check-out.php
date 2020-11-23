<?php
require "../library/model/ourModel.php";
date_default_timezone_set("Asia/Dhaka");

if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
    header('Content-Type: application/json');
    $om = new ourModel();
    $now = date('Y-m-d');
    $resID = $_POST['resID'];
    $din = array();
    $customer = array();
    $sql = "SELECT
                rooms.serial,
                dining_logs.*,
                COUNT(dining_logs.id) AS total,
                dining_items.name,
                dining_items.amount AS diamount,
                reservations.adult + reservations.child as totalP,
                COUNT(dining_logs.id) * dining_items.amount * (reservations.adult + reservations.child) AS subtotal,
                reservations.amount AS resAmount,
                reservations.start_date,
                reservations.end_date,
                rooms.price,
                customers.id,
                customers.f_name,
                customers.l_name,
                customers.email,
                customers.contact,
                customers.gender,
                customers.country_id,
                customers.city_id,
                customers.address,
                customers.post_code,
                customers.nationality                
            FROM
                dining_logs,
                dining_items,
                reservations,
                rooms,
                customers
            WHERE
                dining_logs.reservation_id = $resID AND dining_logs.status = '1' 
                AND dining_logs.date <= '$now'
                AND dining_logs.dianing_id = dining_items.id 
                AND dining_logs.reservation_id = reservations.id AND reservations.room_id = rooms.id
                AND reservations.customer_id = customers.id
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
                       $today = new DateTime(date("Y-m-d H:i:s"));
                       $diff = $today->diff($earlier)->format("%a");
                   
                       $din[] = $r;
                      
                       $totalDamo +=  $r->total * $r->diamount * $r->totalP;
                       $resTotal =  $r->price*$diff;
                       $gtotal = $totalDamo+($resTotal);
                   }

                   $data['dining'] = $din;
                   $data['customer'] = $customer;
                   $data['total'] = $totalDamo;
                   $data['resTotal'] = $resTotal;
                   $data['gtotal'] = $gtotal;
                   $data['totalDays'] = $diff;

                   echo json_encode($data);
}
?>