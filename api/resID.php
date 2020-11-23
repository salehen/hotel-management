<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header('Content-Type: application/json');
    $om = new ourModel();
    $resID = [];
    $sql = "SELECT
                reservations.*,
                CONCAT(
                    customers.f_name,
                    ' ',
                    customers.l_name
                ) AS name,
                customers.email
            FROM
                reservations,
                customers
            WHERE
                reservations.customer_id = customers.id
            ORDER BY
                reservations.id
            DESC";

    $result = $om->raw($sql);
    while ($r = $result->fetch_object()) {
        $resID[] = $r;
    }

    $data['resID'] = $resID;

    echo json_encode($data);
}
?>
