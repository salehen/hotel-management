<?php

$myScript = [
    "assets/js/my.js",
    "assets/js/pages/dashboard.js",

];


if ($_SESSION['type'] == 2 || $_SESSION['type'] == 1){
    ?>
<!--================ login Area  =================-->
<section class="accomodation_area section_gap pb-2 ">
    <div class="container">

        <div class="accomodation_item text-center">
            <h5>Welcome To Our Hotel</h5>
        </div>
        <span class="section_title text-center">
            <?php
            if(isset($_GET['ms'])){
                ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['ms']; ?>
            </div>
            <?php
            }
            ?>
        </span>
    </div>
</section>
<!--================ login Area  =================-->
<section class="accomodation_area pb-5">
    <div class="container">
        <din class="row mb-30">
            <div class="col-sm-2">
                <?php
                    include "./includes/customer-sidebar.php";
                ?>
            </div>
            <div class="col-sm-10">
                <div>
                    <hr class="mt-0">
                    <h4 class="text-center">Current Reservation Information</h4>
                    <hr>
                    <?php
                    $res = $om->raw("SELECT
                                    reservations.id,
                                    reservations.start_date,
                                    reservations.end_date,
                                    reservations.amount,
                                    rooms.serial,
                                    booked.book_status AS bstatus
                                    
                                    FROM
                                        reservations,
                                        customers,
                                        rooms,
                                        booked
                                    WHERE
                                        reservations.customer_id = customers.id 
                                        AND reservations.room_id = rooms.id
                                        AND customers.id = {$_SESSION['cid']}
                                        AND CURDATE() <= reservations.end_date
                                        AND reservations.id = booked.reaservation_id
                                        ");
                    ?>
                    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align: center"
                        class="text-dark table table-striped">
                        <tr>
                            <th colspan="5">Total Reservation -> <?php echo $res->num_rows; ?></th>
                        </tr>
                        <tr class="text-dark">
                            <th>Room No</th>
                            <th class="text-success">Check-in</th>
                            <th class="text-danger">Check-out</th>
                            <th>Total days</th>
                            <th>View detail</th>
                        </tr>
                        <?php
                    while($r = $res->fetch_object()) {
                        $earlier = new DateTime(substr($r->start_date, 0, 10));
                        $later = new DateTime(substr($r->end_date, 0, 10));
                        $diff = $later->diff($earlier)->format("%a");
                        ?>
                        <input type="hidden" name="amount" value="<?php echo $r->amount;?>">
                        <tr class="acb">
                            <td><?php echo $r->serial; ?></td>
                            <td><?php echo $r->start_date; ?></td>
                            <td><?php echo $r->end_date; ?></td>
                            <td><?php echo $diff; ?></td>
                            <td>
                                <?php
                                    if ($r->bstatus == 0){
                                        echo "<p class='text-danger'><strong>Pending</strong></p>";
                                    }else {
                                        ?>
                                <button name="rView" type="submit" class="btn btn-primary rView m-1"
                                    value="<?php echo $r->id; ?>" data-toggle="modal" data-target="#exampleModal">View
                                </button>
                                <?php
                                    }
                                    ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </table>
                </div>
            </div>
        </din>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="room-detail" class="mt-3" style="display: none">
                    <table id='rdetails' width="100%" border="1" cellspacing="0" cellpadding="0"
                        style="text-align: center" class="text-dark ">
                        <tr>
                            <th colspan="6">Room Details for Room No-><span id="rno" class="text-success"> </span>
                            </th>
                        </tr>
                        <tr class="text-dark">
                            <th>Dining Items</th>
                            <th>Total Items</th>
                            <th>Total Person</th>
                            <th>Amount</th>
                            <th>Sub Total</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?php
}else{
    echo "<script>window.location='index.php'</script>";
}
?>