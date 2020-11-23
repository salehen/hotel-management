<?php
$myScript = [
    "assets/js/pages/fSelect_res.js",
    "assets/js/my.js",
    "assets/js/pages/room_reservation.js",
];

?>

<link rel="stylesheet" href="assets/css/fSelect.css">
<link rel="stylesheet" href="assets/css/image-slide.css">

<!-- image slider -->


<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

        <?php
$whare = [
    "id" => $_GET['rid']
];
$data = $om->view("rooms", "*", "",$whare);

while($im = $data->fetch_object()){
   

?>
        <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <?php
                    if(file_exists("assets/image/room/{$im->id}_1.{$im->picture1}")){
                        echo "<img src='assets/image/room/{$im->id}_1.{$im->picture1}' alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(1)\" class=\"hover-shadow cursor\"> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' alt='room_picture'  alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(1)\" class=\"hover-shadow cursor\"> ";
                    }

                    ?>
        </div>



        <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <?php
                    if(file_exists("assets/image/room/{$im->id}_2.{$im->picture2}")){
                        echo "<img src='assets/image/room/{$im->id}_2.{$im->picture2}' alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(2)\" class=\"hover-shadow cursor\"> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' alt='room_picture'  alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(2)\" class=\"hover-shadow cursor\"> ";
                    }

                    ?>
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <?php
                    if(file_exists("assets/image/room/{$im->id}_3.{$im->picture3}")){
                        echo "<img src='assets/image/room/{$im->id}_3.{$im->picture3}' alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(3)\" class=\"hover-shadow cursor\"> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' alt='room_picture'  alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(3)\" class=\"hover-shadow cursor\"> ";
                    }

                    ?>
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <?php
                    if(file_exists("assets/image/room/{$im->id}_4.{$im->picture4}")){
                        echo "<img src='assets/image/room/{$im->id}_4.{$im->picture4}' alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(4)\" class=\"hover-shadow cursor\"> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' alt='room_picture'  alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(4)\" class=\"hover-shadow cursor\"> ";
                    }

                    ?>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>




        <div class="arall">
            <div class="column">
                <?php
                    if(file_exists("assets/image/room/{$im->id}_1.{$im->picture1}")){
                        echo "<img class='demo cursor' src='assets/image/room/{$im->id}_1.{$im->picture1}' style='width:100%' onclick='currentSlide(1)'> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' onclick='currentSlide(1)'> ";
                    }

                    ?>
                <!-- <img class="demo cursor" src="img_nature_wide.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise"> -->
            </div>
            <div class="column">
                <?php
                    if(file_exists("assets/image/room/{$im->id}_2.{$im->picture2}")){
                        echo "<img class='demo cursor' src='assets/image/room/{$im->id}_2.{$im->picture2}' style='width:100%' onclick='currentSlide(2)'> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' onclick='currentSlide(2)'> ";
                    }

                    ?>
            </div>
            <div class="column">
                <?php
                    if(file_exists("assets/image/room/{$im->id}_3.{$im->picture3}")){
                        echo "<img class='demo cursor' src='assets/image/room/{$im->id}_3.{$im->picture3}' style='width:100%' onclick='currentSlide(3)'> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' onclick='currentSlide(3)'> ";
                    }

                    ?>
            </div>
            <div class="column">
                <?php
                    if(file_exists("assets/image/room/{$im->id}_4.{$im->picture4}")){
                        echo "<img class='demo cursor' src='assets/image/room/{$im->id}_4.{$im->picture4}' style='width:100%' onclick='currentSlide(4)'> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' onclick='currentSlide(4)'> ";
                    }

                    ?>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<!-- image slider end -->

<section class="accomodation_area section_gap">

    <div class="container">

        <div class="section_title text-center">
            <h2 class="title_color">Hotel Reservation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
        </div>
        <div class="row mb_30">


            <?php
            $whare = [
                "rooms.id" => $_GET['rid']
            ];
            $mel = [
                "rooms.category_id" => "room_categories.id"
            ];
            $data = $om->view("rooms, room_categories", "rooms.*, room_categories.name as cname", "", $whare, $mel);

            while($m = $data->fetch_object()){
               
          
        
            ?>

            <div class="col-lg-4 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <?php
                    if(file_exists("assets/image/room/{$m->id}_1.{$m->picture1}")){
                        echo "<img src='assets/image/room/{$m->id}_1.{$m->picture1}' alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(1)\" class=\"hover-shadow cursor\"> ";
                    }else{
                        echo "<img src='assets/image/room/no-image.jpg' alt='room_picture'  alt='room_picture'  style=\"width:100%\" onclick=\"openModal();currentSlide(1)\" class=\"hover-shadow cursor\"> ";
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-lg col-sm-6 accomodation_item">


                <a href="#">
                    <h4 class="sec_h4"><?php echo $m->cname ?></h4>
                </a>
                <p><?php echo "{$m->description}"; ?></p>
                <h4>Adult - <?php echo "{$m->adult_number}"; ?> &nbsp;&amp;&nbsp; Child -
                    <?php echo "{$m->child_number}"; ?></h4>
                <h4>Room Number - <?php echo "{$m->serial}"; ?></h4>
                <h5>TK <?php echo "<span id='rprice'>{$m->price}</span>"; ?><small>/night</small></h5>
                <br>
                <!-- reservatuion confirm start -->
                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {                      
                              
                            $data = [
                              'customer_id' => $_POST['cid'],
                              'room_id' => $_POST['rid'],
                              'start_date' => $_POST['sd'],
                              'end_date' => $_POST['ed'],
                              'amount' => $_POST['amo'],
                              'adult' => $_GET['adult'],
                              'child' => $_GET['child'],
                              'reservation_date' => $_POST['re_date']
                          ];

                          if($om->insert("reservations", $data)){
                            $id = $om->ID;

                            $res_pay_info = [
                              'reservation_id' => $id,
                              'reservation_date' => $_POST['re_date'],                      
                              'payment_id' => $_POST['pay_id'],
                              'payment_details' => $_POST['pay_det'],
                            ];

                            $om->insert("reservation_payment_info", $res_pay_info);

                            $bookrd = [
                              'room_id' => $_POST['rid'],
                              'reaservation_id' => $id,
                              'sdate' => $_POST['sd'],
                              'edate' => $_POST['ed'],
                              'customer_id' => $_POST['cid'],
                              'amount' => $_POST['amo']
                            ];

                            $om->insert("booked", $bookrd);


                              /*$room_din = $_POST['mofiz'];
                              //$room_din_ids=[];
                              $room_din_ids = explode(",",$room_din);

                              foreach($room_din_ids as $room_d_id){
                                  $dt = [
                                      'room_id' => $_POST['rid'],
                                      'reservation_id' => $id,
                                      'dining_id' => $room_d_id

                                  ];
                                  $om->insert("room_dining", $dt);
                              }*/

                              $sdate =  substr($_POST['sd'], 0, 10);
                              $edate =  substr($_POST['ed'], 0, 10);
                              // $edate = $_POST['ed'];
                              $i = 0;
                              while(strtotime($sdate) <= strtotime($edate)){
                                  if($i == 0){
                                      $dianing = $om->raw("select * from dining_items where id > 1");
                                  }
                                  else if(strtotime($sdate) == strtotime($edate)){
                                      $dianing = $om->raw("select * from dining_items where id < 2");
                                  }
                                  else{
                                      $dianing = $om->raw("select * from dining_items");
                                  }
                                  $i++;
                                  while($dl = $dianing->fetch_object()){
                                      $data = [
                                          "date" => $sdate,
                                          "reservation_id" => $id,
                                          "dianing_id" => $dl->id,
                                          "status" => 1
                                      ];
                                      $om->insert("dining_logs", $data);
                                  }
                                  $sdate = Date('Y-m-d', strtotime("+1 days", strtotime($sdate)));
                              }

                            
                              
                              echo "Reservations Successfull <br>";
                              echo "<script>window.location='index.php?c=dashboard&ms=Reservations Successful'</script>";
                          }else{

                              echo "reservations Failed <br>";
                          }
                       }                          
                 ?>



                <form method="post" action="">
                    <?php
                            $earlier = new DateTime(substr($_GET['sd'], 0, 10));
                            $later = new DateTime(substr($_GET['ed'], 0, 10));

                            $diff = $later->diff($earlier)->format("%a");
                            
                            ?>
                    <input type="hidden" name="cid" value="<?php echo $_SESSION['cid'];?>">
                    <input type="hidden" name="rid" value="<?php echo $m->id;?>">
                    <input type="hidden" name="sd" value="<?php echo $_GET['sd'];?>">
                    <input type="hidden" name="ed" value="<?php echo $_GET['ed'];?>">
                    <input type="hidden" name="amo" value="<?php echo $m->price * $diff;?>">
                    <input type="hidden" name="re_date" value="<?php echo date("Y-m-d");?>">
                    <input type="hidden" name="mofiz" id="mofiz">

                    <h5>Total Price - TK

                        <?php
                        $total = $m->price * $diff;
                        echo "<span id='total'>{$total}</span>";
                        ?>
                    </h5>

                    <div class="form-group row">
                        <label for="pay_id" class="col-sm col-form-label">payment method</label>
                        <div class="col-sm-10">
                            <select name="pay_id" id="pay_id" class="form-control" required onchange="payMethod()">
                                <option value="">Select payment method</option>
                                <?php
                                $data = $om->view("payment_methods", "id, name", array("name", "asc"));
                                while($pm = $data->fetch_object()){
                                    echo "<option value='{$pm->id}'>{$pm->name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="pay_det" class="col-sm col-form-label">payment details</label> -->
                        <div class="col-sm-10">
                            <input type="text" name="pay_det" id="pay_det" placeholder="Transaction Details"
                                class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <br>

                    <input type="submit" neme="res_con" class="book-btn btn theme_btn button_hover" value="Confirm">

                    <!-- reservatuion confirm end -->

            </div>
            <div class="col-lg col-sm-6 accomodation_item">
                <table width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align: center">
                    <tr class="text-dark">
                        <th class="text-success">Check-in</th>
                        <th class="text-danger">Check-out</th>
                    </tr>
                    <tr>
                        <td><?php echo $_GET['sd']; ?></td>
                        <td><?php echo $_GET['ed']; ?></td>
                    </tr>
                    <tr class="text-dark">
                        <th>Adult</th>
                        <th>Child</th>
                    </tr>
                    <tr>
                        <td><?php echo $_GET['adult']; ?></td>
                        <td><?php echo $_GET['child']; ?></td>
                    </tr>
                    <tr class="text-dark">
                        <th class="text-dark">Total Night</th>
                        <th>
                            <?php
                            $earlier = new DateTime(substr($_GET['sd'], 0, 10));
                            $later = new DateTime(substr($_GET['ed'], 0, 10));

                            $diff = $later->diff($earlier)->format("%a");
                            echo "<span id='tnight'>{$diff}</span>";
                            ?>
                        </th>
                    </tr>
                </table>
                <br>
                <div><span style="color: red">***</span> Dining Are included With All Reservation. You can Cancel it
                    After Check-In. </div>

                <div class="form-group row">
                    <h5 for="did" class="col-sm col-form-label">Our Dining Items</h5>
                    <div class="col-sm-9">
                        <ul>
                            <?php
                                    $data = $om->view("dining_items", "*", array("id", "asc"));
                                    while($di = $data->fetch_object()){
                                        echo "<li value='{$di->id}'>{$di->name} - {$di->amount}tk</li>";
                                    }
                            ?>
                        </ul>
                    </div>
                </div>
                <br>
            </div>
            </form>

            <?php
            }
            ?>
        </div>

    </div>
</section>
<!--================ Accomodation Area  =================-->

<!-- Modal -->
<div class="modal fade pt-0" id="payModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-pay modal-dialog-centered" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-auto">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="paySubmit"
                    onclick="paySubmit(this.value)">Submit</button>
            </div>
        </div>
    </div>
</div>