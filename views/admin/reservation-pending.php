<?php
$myScript = [

];

?>

<!--================ add feature  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">
        <span class="section_title text-center">
            <?php
            if (isset($_GET['ms'])) {
                ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['ms']; ?>
            </div>
            <?php
            }

            if (isset($_GET['cid'])) {
                $data = [
                    "book_status" => 1
                ];
                if ($om->update("booked", $data, array("reaservation_id" => $_GET['cid']))) {
                    echo "<script>                   
                            window.location='index.php?u=reservation-pending&ms=Confirmation Successful.'
                        </script>";
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                    echo "Confirmation Fail";
                    echo " </div>";
                }
            }

            if (isset($_GET['did'])) {
                $results = $om->delete("reservations", array("id" => $_GET['did']));
                if ($results > 0) {
                    //echo "Delete Successfully.";
                    echo "<script>
                            //alert(\"Delete Successfully.\");
                            window.location='index.php?u=reservation-pending&ms=Delete Successfully.'
                        </script>";
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                    echo "Delete Fail";
                    echo " </div>";
                }
            }
            ?>
        </span>
        <div class="section_title text-center">
            <h2 class="title_w">All Pending Reservation</h2>
        </div>

        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-9 col-sm">
                <div class="facilities_item">
                    <?php
                    $res = $om->raw("SELECT
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
                                    LIMIT 0,15  
                                    
                                        ");
                    ?>
                    <table id="dataTable" width="100%" border="1" cellspacing="0" cellpadding="0"
                        style="text-align: center" class=" table table-striped">
                        <thead>
                            <tr>
                                <th colspan="6">Total Pending Reservation -> <?php echo $res->num_rows; ?></th>
                            </tr>
                            <tr class="">
                                <th>Room No</th>
                                <th>Customer Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Total days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        while ($r = $res->fetch_object()) {
                            $earlier = new DateTime(substr($r->start_date, 0, 10));
                            $later = new DateTime(substr($r->end_date, 0, 10));
                            $diff = $later->diff($earlier)->format("%a");
                            ?>
                            <input type="hidden" name="amount" value="<?php echo $r->amount; ?>">
                            <tr class="acb">
                                <td><?php echo $r->serial; ?></td>
                                <td><?php echo $r->f_name . " " . $r->l_name; ?></td>
                                <td class="text-success"><strong><?php echo $r->start_date; ?></strong></td>
                                <td class="text-warning"><strong><?php echo $r->end_date; ?></strong></td>
                                <td><?php echo $diff; ?></td>
                                <td class="action-btn">
                                    <a href="index.php?u=reservation-pending&cid=<?php echo $r->id; ?>"
                                        class="btn btn-success rView m-2">Confirm
                                    </a>
                                    <a href="index.php?u=reservation-pending&did=<?php echo $r->id; ?>"
                                        class="btn btn-danger m-2" onclick="return confirm('Are you sure do you want to delete Reservation for ' +
                                                   '\n Room No :  <?php echo $r->serial; ?>'   +
                                                   '\n Customer Name :  <?php echo $r->f_name . " " . $r->l_name; ?>'+
                                                   '\n From <?php echo $r->start_date; ?> To <?php echo $r->end_date; ?>
                                                   ');">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================ add feature  =================-->