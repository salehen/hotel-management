<?php
$myScript = [
    "assets/js/my.js",
    "assets/js/pages/reservation.js",

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
            ?>
        </span>
        <div class="section_title text-center">
            <h2 class="title_w">View Current Reservation</h2>
        </div>

        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-10 col-sm">
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
                                            reservations.customer_id = customers.id AND reservations.room_id = rooms.id AND CURDATE() <= reservations.end_date AND CURDATE() >= reservations.start_date AND reservations.id = booked.reaservation_id AND booked.book_status = 1
                                        ORDER BY
                                            rooms.serial ASC, reservations.end_date ASC
                                        LIMIT 0, 15                                 
                                        ");
                    ?>
                    <table id="dataTable" width="100%" border="1" cellspacing="0" cellpadding="0"
                        style="text-align: center" class=" table table-striped">
                        <thead>
                            <tr>
                                <th colspan="6">Total Current Reservation -> <?php echo $res->num_rows; ?></th>
                            </tr>
                            <tr class="">
                                <th>Room No</th>
                                <th>Customer Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Total days</th>
                                <th>View detail</th>
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
                                <td class="totaldays"><?php echo $diff; ?></td>
                                <td class="action-btn">
                                    <button name="rView" type="submit" class="btn btn-primary rView m-2"
                                        value="<?php echo $r->id; ?>" data-toggle="modal"
                                        data-target="#exampleModalCenter">View
                                    </button>
                                    <button name="cOut" type="submit" class="btn btn-success cOut m-2"
                                        value="<?php echo $r->id; ?>" data-toggle="modal"
                                        data-target="#exampleModalCenter">Check-out
                                    </button>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade invoice" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="room-detail" class="mt-3">
                    <table id='rdetails' width="100%" border="1" cellspacing="0" cellpadding="0"
                        style="text-align: center" class="text-dark ">
                        <thead>
                            <tr>
                                <td colspan="6">Customer Name : <span id="cn" class="text-secondary"></span></td>
                            </tr>
                            <tr>
                                <td colspan="6">Contact : <span id="co" class="text-secondary"></span></td>
                            </tr>
                            <tr>
                                <td colspan="6">Address : <span id="ad" class="text-secondary"></span></td>
                            </tr>
                            <tr>
                                <th colspan="6">Room No-><span id="rno" class="text-success"> </span></th>
                            </tr>
                            <tr class="text-dark">
                                <th>Dining Items</th>
                                <th>Total Items</th>
                                <th>Total Person</th>
                                <th>Amount</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody id="cDetails">

                        </tbody>
                    </table>

                    <?php

                    ?>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="window.print(); return false;">Print</button>
                <button type="button" class="btn btn-success cOutSubmit">Confirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--================ add feature  =================-->