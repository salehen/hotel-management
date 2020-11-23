<!--================ add Dining list  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">

        <div class="section_title text-center">
            <h2 class="title_w">Today's Dining Items</h2>
        </div>
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

        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-9 col-sm">

                <div class="facilities_item">
                    <?php
                    if (isset($_GET['dlID'])) {
                        $data = [
                            "status" => 0
                        ];

                        if ($om->update("dining_logs", $data, array("id" => $_GET['dlID']))) {
                            // echo "Cancelation Successfuly done";
                            echo "<script>window.location='index.php?u=dining-list&ms=Cancelation Successfull'</script>";
                        } else {
                            echo "Dining Item Cancelation Failed";
                        }
                    }
                    $results = $om->raw("SELECT
                                dining_logs.*,
                                dining_items.name AS dname,
                                customers.f_name,
                                customers.l_name,
                                rooms.serial
                                FROM
                                    dining_logs,
                                    dining_items,
                                    reservations,
                                    customers,
                                    rooms,
                                    booked
                                WHERE
                                    CURDATE() = dining_logs.date 
                                    AND dining_logs.status='1'
                                    AND dining_logs.dianing_id = dining_items.id
                                    AND dining_logs.reservation_id = reservations.id
                                    AND reservations.customer_id = customers.id
                                    AND reservations.room_id = rooms.id
                                    AND dining_logs.reservation_id = booked.reaservation_id
                                    AND booked.book_status = 1
                                    
                                ORDER BY
                                    dining_logs.id ASC
                        ");
                    $totalOrder = $results->num_rows;
                    ?>
                    <h3>Today's Total Order - <?php echo $totalOrder ?></h3>
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Room Number</th>
                            <th scope="col">Customer Name</th>

                            <th scope="col">Dining Item</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        while ($d = $results->fetch_object()) {
                            echo "<tr>";
                            echo "<th scope=\"row\">{$d->id}</th>";
                            echo "<td>{$d->serial}</td>";
                            echo "<td>{$d->f_name} {$d->l_name}</td>";
                            echo "<td>{$d->dname}</td>";


                            echo "<td class='action-btn'>
<a href='index.php?u=dining-list&dlID={$d->id}' class=\"btn btn-primary mx-auto m-2\" 
onclick=\"return confirm('Are you sure do you want to Cancel \\n Dining Item :  {$d->dname}  \\n For Room :  {$d->serial}');\">Cancel</a>
                  </td>";
                            echo "</tr>";
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


