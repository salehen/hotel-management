<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //header('Content-Type: application/json');
    $om = new ourModel();
    $sql = "SELECT
                                    reservations.id,
                                    reservations.start_date,
                                    reservations.end_date,
                                    reservations.amount,
                                    rooms.serial,
                                    customers.f_name,
                                    customers.l_name
                                    
                                    FROM
                                        reservations,
                                        customers,
                                        rooms,
                                        booked
                                    WHERE
                                        reservations.customer_id = customers.id 
                                        AND reservations.room_id = rooms.id
                                        AND CURDATE() <= reservations.end_date
                                        AND reservations.id = booked.reaservation_id
                                        AND booked.book_status = 0
                                    GROUP BY reservations.id
                                    ORDER BY rooms.serial ASC , reservations.end_date DESC
                    ";

    $result =  $om->raw($sql);
    $totalP = $result->num_rows;
    echo $totalP;
                  
}
?>
