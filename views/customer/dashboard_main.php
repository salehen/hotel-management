
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
                <div class="col-sm-6">
                    <hr class="mt-0"><h4 class="text-center">Customer Information</h4><hr>
            <?php
            $data = $om->raw("SELECT
                           customers.id as cid,
                           customers.f_name,
                           customers.l_name,
                           customers.email,
                           customers.contact,                           
                           customers.address,
                           countries.name AS country,
                           citys.name AS city
                        FROM
                            customers,
                            countries,
                            citys
                        WHERE
                            customers.id = {$_SESSION['cid']}
                            AND customers.country_id = countries.id
                           AND citys.id = customers.city_id
                           ");

            while($cf = $data->fetch_object()){      
            ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped" >
                    <tr>
                        <th class="text-dark"><h4>Name : </h4></th>
                        <td><h4><?php echo strtoupper($cf->f_name." ".$cf->l_name) ?></h4></td>
                    </tr>
                    <tr>
                        <th class="text-dark"><h4>E-Mail : </h4></th>
                        <td><h4><?php echo "{$cf->email}"; ?></h4></td>
                    </tr>
                    <tr>
                        <th class="text-dark"><h4>Contact:</h4></th>
                        <td><h4><?php echo "{$cf->contact}"; ?></h4></td>
                    </tr>
                    <tr>
                        <th class="text-dark"><h4>Address:</h4></th>
                        <td><h4><?php echo "{$cf->address}"; ?></h4></td>
                    </tr>
                    <tr>
                        <th class="text-dark"><h4>City:</h4></th>
                        <td><h4><?php echo "{$cf->city}"; ?></h4></td>
                    </tr>
                    <tr>
                        <th class="text-dark"><h4>Country:</h4></th>
                        <td><h4><?php echo "{$cf->country}"; ?></h4></td>
                    </tr>


                </table>

            <?php
            }
            ?>
                </div>
                <div class="col-sm-6">
                    <hr class="mt-0"><h4 class="text-center">Reservation Information</h4><hr>
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
                    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align: center" class="text-dark table table-striped">
                        <tr>
                            <th colspan="5">Total Reservation -> <?php echo $res->num_rows; ?></th>
                        </tr>
                        <tr class="text-dark">
                            <th >Room No</th>
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
                                                value="<?php echo $r->id; ?>">View
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
                    <div id="room-detail" class="mt-3" style="display: none">
                        <table id='rdetails' width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align: center" class="text-dark ">
                            <tr>
                                <th colspan="6">Room Details for Room No-><span id="rno" class="text-success"> </span></th>
                            </tr>
                            <tr class="text-dark">
                                <th >Dining Items</th>
                                <th >Total Items</th>
                                <th >Total Person</th>
                                <th >Amount</th>
                                <th >Sub Total</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </din>
        </div>
    </section>






    <?php
}else{
    echo "<script>window.location='index.php'</script>";
}
?>
