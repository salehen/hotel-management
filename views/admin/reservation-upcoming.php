<?php
$myScript = [
    "assets/js/pages/reservation_edit.js",
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

            if (isset($_POST['regEdit'])) {
                $earlier = new DateTime(substr($_POST['ciDate'], 0, 10));
                $later = new DateTime(substr($_POST['coDate'], 0, 10));
                $diff = $later->diff($earlier)->format("%a");

                $amo = $diff * $_POST['price'];

                $data = [
                    "start_date" => $_POST['ciDate'],
                    "end_date" => $_POST['coDate'],
                    "adult" => $_POST['adult'],
                    "child" => $_POST['child'],
                    "amount" => $amo
                ];
                $result = $om->update("reservations", $data, array("id" => $_POST['regID']));
                if ($result > 0) {
                    $bookrd = [
                        'reaservation_id' => $_POST['regID'],
                        'sdate' => $_POST['ciDate'],
                        'edate' => $_POST['coDate'],
                        'amount' => $amo
                    ];

                    $om->update("booked", $bookrd, array("reaservation_id" => $_POST['regID']));


                    $dinD = $om->delete("dining_logs", array("reservation_id" => $_POST['regID']));
                    if ($dinD > 0) {
                        $sdate = substr($_POST['ciDate'], 0, 10);
                        $edate = substr($_POST['coDate'], 0, 10);
                        // $edate = $_POST['ed'];
                        $i = 0;
                        while (strtotime($sdate) <= strtotime($edate)) {
                            if ($i == 0) {
                                $dianing = $om->raw("select * from dining_items where id > 1");
                            } else if (strtotime($sdate) == strtotime($edate)) {
                                $dianing = $om->raw("select * from dining_items where id < 2");
                            } else {
                                $dianing = $om->raw("select * from dining_items");
                            }
                            $i++;
                            while ($dl = $dianing->fetch_object()) {
                                $data = [
                                    "date" => $sdate,
                                    "reservation_id" => $_POST['regID'],
                                    "dianing_id" => $dl->id,
                                    "status" => 1
                                ];
                                $om->insert("dining_logs", $data);
                            }
                            $sdate = Date('Y-m-d', strtotime("+1 days", strtotime($sdate)));
                        }

                    } else {
                        echo "Dining Item not Delete";
                    }
                    //echo "saved";
                    echo "<script>                   
                           window.location='index.php?u=reservation-upcoming&ms=Save Successfully.'
                        </script>";
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                    echo "Save Fail";
                    echo " </div>";
                }
            }

            if (isset($_GET['did'])) {
                $results = $om->delete("reservations", array("id" => $_GET['did']));
                if ($results) {
                    //echo "Delete Successfully.";
                    echo "<script>
                            //alert(\"Delete Successfully.\");
                            window.location='index.php?u=reservation-upcoming&ms=Delete Successfully.'
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
            <h2 class="title_w">All Upcoming Reservation</h2>
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
                                        AND CURDATE() < reservations.start_date
                                        AND reservations.id = booked.reaservation_id
                                        AND booked.book_status = 1
                                    GROUP BY reservations.id
                                    ORDER BY rooms.serial ASC , reservations.end_date DESC
                                    LIMIT 0,15  
                                    
                                        ");
                    ?>
                    <table id="dataTable" width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align: center"
                           class="table table-striped">
                        <thead>
                        <tr>
                            <th colspan="6">Total Upcoming Reservation -> <?php echo $res->num_rows; ?></th>
                        </tr>
                        <tr>
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
                                    <button name="rEdit" type="submit" class="btn btn-primary rEdit m-2"
                                            value="<?php echo $r->id; ?>"
                                            data-toggle="modal" data-target="#exampleModalCenter">Edit
                                    </button>
                                    <a href="index.php?u=reservation-pending&did=<?php echo $r->id; ?>"
                                       class="btn btn-danger m-2"
                                       onclick="return confirm('Are you sure do you want to delete Reservation for ' +
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
<!-- Modal -->
<div class="modal fade invoice" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Reservation Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="room-detail" class="mt-3">
                        <table id='rdetails' width="100%" border="1" cellspacing="0" cellpadding="0"
                               style="text-align: center" class="text-secondary ">
                            <tr>
                                <td colspan="6">Customer Name : <span id="cn" class="text-dark"></span></td>
                            </tr>
                            <tr>
                                <td colspan="6">Contact : <span id="co" class="text-dark"></span></td>
                            </tr>
                            <tr>
                                <td colspan="6">Address : <span id="ad" class="text-dark"></span></td>
                            </tr>
                            <tr>
                                <th colspan="2">Room No -> <span id="rno" class="text-success"> </span></th>
                            </tr>
                            <tr class="text-dark">
                                <th><label for="adult">Adult Number :</label></th>
                                <td>
                                    <select id="adult" name="adult" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <!--                                    <input type="text" id="adult" name="adult" class="form-control">-->
                                </td>
                            </tr>
                            <tr class="text-dark">
                                <th><label for="child">Child Number :</label></th>
                                <td>
                                    <select id="child" name="child" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="text-dark">
                                <th><label for="ciDate"> Check-in Date :</label></th>
                                <td><input type="date" id="ciDate" name="ciDate" class="form-control"></td>
                            </tr>
                            <tr class="text-dark">
                                <th><label for="coDate">Check-out Date :</label></th>
                                <td><input type="date" id="coDate" name="coDate" class="form-control"></td>
                            </tr>
                        </table>
                        <input type="hidden" id="regID" name="regID" value="">
                        <input type="hidden" id="price" name="price" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="regEdit" value="Save">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--================ end Model  =================-->


