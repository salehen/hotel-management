<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg'])) {
    $msg = "";
    $ext = "";
    /*if ($_FILES['pic']['name']){
        $extention = pathinfo($_FILES['pic']['name']);
        $ext = strtolower($extention['extension']);
        if ($ext!='jpg' && $ext!='jpeg' && $ext!='png' &&$ext!='gif'){
            $ext = "";
        }
    }*/
    if ($_POST["fname"] == "") {
        $msg .= 'name required <br>';
    }
    if ($_POST["email"] == "") {
        $msg .= 'email required <br>';
    }
    if ($_POST["pass"] == "") {
        $msg .= 'pass required <br>';
    }
    /*if ($_POST["pid"] == "") {
        $msg .= 'pid required <br>';
    }
    if ($_POST["ry"] == "") {
        $msg .= 'ry required <br>';
    }

    if ($_POST["rat"] == "") {
        $msg .= 'name required <br>';
    }
    if ($_POST["mid"] == "") {
        $msg .= 'mid required <br>';
    }
    if ($ext == ""){
        $msg .= "Uplode Valid Picture";
    }*/


    if ($msg == "") {


        $data = [
            'f_name' => $_POST['fname'],
            'l_name' => $_POST['lname'],
            'email' => $_POST['email'],
            'contact' => $_POST['contact'],
            'gender' => $_POST['gender'],
            'country_id' => $_POST['coid'],
            'city_id' => $_POST['cid'],
            'address' => $_POST['address'],
            'post_code' => $_POST['pc'],
            'nationality' => $_POST['nat'],
            'cpassword' => md5($_POST['pass']),
        ];

        if ($om->insert("customers", $data)) {

                $_SESSION['cname'] = $_POST['fname'] . " " . $_POST['lname'];
                $_SESSION['cid'] = $om->ID;
                $_SESSION['type'] = 2;


            $sdate = substr($_GET['sdate'], 0, 10);
            $edate = substr($_GET['edate'], 0, 10);
            $adult = $_GET['adult'];
            $child = $_GET['child'];
            $rid = $_POST['rid'];

            echo "<script>window.location='index.php?c=reservation&rid={$rid}&sd={$sdate}&ed={$edate}&adult={$adult}&child={$child}'</script>";

            /*
                                        $fContent = $_POST['metatitel'] . "~$$@@!!~" . $_POST['metadis'];
                                        $fh = fopen("files/{$om->ID}.txt", "w");
                                        fwrite($fh, $fContent);
                                        fclose($fh);

                                        if ($ext) {
                                            move_uploaded_file($_FILES['pic']['tmp_name'], "images/{$om->ID}.{$ext}");
                                        }*/
            echo "Account created Successfully <br>";
            //echo "<script>window.location='index.php?c=dashboard&ms=Profile created Successfully'</script>";
        } else {

            echo "Customer already exist <br>";
        }
    } else {
        echo $msg;
    }
}
?>
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Available Rooms</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clogin'])) {

                $msg = "";
                if ($_POST["email"] == "") {
                    $msg .= 'email required <br>';
                }
                if ($_POST["pass"] == "") {
                    $msg .= 'Password required <br>';
                }
                if ($msg == "") {
                    $data = [
                        'email' => $_POST['email'],
                        'cpassword' => md5($_POST['pass'])
                    ];

                    $result = $om->view("customers", "*", "", $data);

                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_object()) {
                            $_SESSION['cname'] = $data->f_name . " " . $data->l_name;
                            $_SESSION['cid'] = $data->id;
                            $_SESSION['type'] = 2;
                        }

                        $sdate = substr($_GET['sdate'], 0, 10);
                        $edate = substr($_GET['edate'], 0, 10);
                        $adult = $_GET['adult'];
                        $child = $_GET['child'];
                        $rid = $_POST['rid'];

                        echo "<script>window.location='index.php?c=reservation&rid={$rid}&sd={$sdate}&ed={$edate}&adult={$adult}&child={$child}'</script>";
                    } else {

                        echo "<span class='alert-danger'>invalid Email or password or user type</span><br>";
                    }

                } else {
                    echo $msg;
                }
            }
            ?>
        </div>

        <div class="row mb_30">
                <?php
                    $sql = "SELECT
                                rooms.*,
                                room_categories.name
                            FROM
                                rooms
                            JOIN room_categories ON room_categories.id = rooms.category_id
                            LEFT JOIN booked ON booked.room_id = rooms.id
                            WHERE
                                rooms.id NOT IN(
                                SELECT
                                    bkk.room_id
                                FROM
                                    booked bkk
                                WHERE
                                    bkk.sdate >=(
                                    SELECT
                                        MIN(bk.sdate)
                                    FROM
                                        booked bk
                                    WHERE
                                        bk.edate > '". substr($_GET['sdate'], 0, 10) ."' AND bk.id = bkk.id
                                ) AND bkk.sdate <= '". substr($_GET['edate'], 0, 10) ."'
                            GROUP BY
                                bkk.room_id
                            )AND rooms.adult_number >= '". $_GET['adult'] ."' AND rooms.child_number >= '". $_GET['child'] ."'
                            GROUP BY rooms.id
                    ";
                 
                    $result =  $om->raw($sql);
                if ($result->num_rows>0) {
                   while($r = $result->fetch_object()) {


                       ?>


                       <div class="col-lg-4 col-sm-6">
                           <div class="accomodation_item text-center">
                               <div class="hotel_img">
                                   <?php
                                   if (file_exists("assets/image/room/{$r->id}_1.{$r->picture1}")) {
                                       echo "<img src='assets/image/room/{$r->id}_1.{$r->picture1}' alt='room_picture'  width=100% >";
                                   } else {
                                       echo "<img src='assets/image/room/no-image.jpg' alt='room_picture'  width=95% >";
                                   }
                                   ?>

                               </div>
                           </div>
                       </div>
                       <div class="col-lg-4 col-sm-6 accomodation_item">
                           <a href="#."><h4 class="sec_h4"><?php echo "{$r->name}"; ?></h4></a>


                           <p><?php echo "{$r->description}"; ?></p>
                           <h4>Adult - <?php echo "{$r->adult_number}"; ?> &nbsp;&amp;&nbsp; Child
                               - <?php echo "{$r->child_number}"; ?></h4>
                           <h4>Room Number - <?php echo "{$r->serial}"; ?></h4>
                           <h5>$<?php echo "{$r->price}"; ?><small>/night</small></h5>
                           <br>

                           <?php
                           if (isset($_SESSION['type'])) {
                               ?>
                               <a href="index.php?c=reservation&rid=<?php echo $r->id; ?>&sd=<?php echo substr($_GET['sdate'], 0, 10) ?>&ed=<?php echo substr($_GET['edate'], 0, 10) ?>&adult=<?php echo $_GET['adult'] ?>&child=<?php echo $_GET['child'] ?>"
                                  class="book-btn btn theme_btn button_hover">Book Now</a>
                               <?php
                           } else {

                               ?>
                               <!-- Button trigger modal -->
                               <a href="index.php?c=reservation&rid=<?php echo $r->id; ?>&sd=<?php echo substr($_GET['sdate'], 0, 10) ?>&ed=<?php echo substr($_GET['edate'], 0, 10) ?>&adult=<?php echo $_GET['adult'] ?>&child=<?php echo $_GET['child'] ?>"
                                  class="book-btn btn theme_btn button_hover" data-toggle="modal"
                                  data-target="#loginPopup">Book Now</a>


                               <!-- Modal for login -->


                               <div class="modal fade" id="loginPopup" tabindex="-1" role="dialog"
                                    aria-labelledby="loginPopupTitle" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="loginPopupTitle">Customer Login</h5>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">

                                               <form method="post" class="px-4 py-3"
                                                     action="index.php?v=search-result&rid=<?php echo $r->id; ?>&sdate=<?php echo substr($_GET['sdate'], 0, 10) ?>&edate=<?php echo substr($_GET['edate'], 0, 10) ?>&adult=<?php echo $_GET['adult'] ?>&child=<?php echo $_GET['child'] ?>">
                                                   <div class="form-group">
                                                       <label for="exampleDropdownFormEmail1">Email address</label>
                                                       <input type="email" name="email" class="form-control"
                                                              id="exampleDropdownFormEmail1"
                                                              placeholder="email@example.com">
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="exampleDropdownFormPassword1">Password</label>
                                                       <input type="password" name="pass" class="form-control"
                                                              id="exampleDropdownFormPassword1"
                                                              placeholder="Password">
                                                   </div>
                                                   <div class="form-check">
                                                       <input type="checkbox" class="form-check-input"
                                                              id="dropdownCheck">
                                                       <label class="form-check-label" for="dropdownCheck">
                                                           Remember me
                                                       </label>
                                                   </div>
                                                   <input type="hidden" name="rid" value="<?php echo $r->id; ?>">
                                                   <button type="submit" name="clogin" class="btn btn-primary">Log
                                                       in
                                                   </button>

                                               </form>
                                               <div class="dropdown-divider"></div>
                                               <button type="submit" class="btn btn-primary ml-auto"
                                                       data-toggle="modal"
                                                       data-target="#regPopup">Create New Account
                                               </button>
                                               <button type="submit" class="btn btn-danger ml-auto">Forget Password
                                               </button>
                                           </div>
                                           <div class="modal-footer">

                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <?php

                           }

                           ?>
                           <!--model for log in end-->


                           <!--model for reg-->

                           <div class="modal fade" id="regPopup" tabindex="-1" role="dialog"
                                aria-labelledby="regPopupTitle" aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 class="modal-title" id="regPopupTitle">Customer Registration</h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <form method="post" action="" name="" enctype="multipart/form-data">
                                               <input type="hidden" name="rid" value="<?php echo $r->id; ?>">
                                               <div class="form-group row">
                                                   <label for="fname" class="col-sm-3 col-form-label">Fast
                                                       Name</label>
                                                   <div class="col-sm-9">
                                                       <input type="text" name="fname" class="form-control"
                                                              id="fname"
                                                              placeholder="Enter Name">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="lname" class="col-sm-3 col-form-label">Last
                                                       Name</label>
                                                   <div class="col-sm-9">
                                                       <input type="text" name="lname" class="form-control"
                                                              id="lname"
                                                              placeholder="Enter Name">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="inputEmail3"
                                                          class="col-sm-3 col-form-label">Email</label>
                                                   <div class="col-sm-9">
                                                       <input type="email" name="email" class="form-control"
                                                              id="inputEmail3" placeholder="Enter Email">
                                                       <span id="val-email" class="em"></span>
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="contact"
                                                          class="col-sm-3 col-form-label">contact</label>
                                                   <div class="col-sm-9">
                                                       <input type="number" name="contact" class="form-control"
                                                              id="contact" placeholder="Enter contact">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="gender"
                                                          class="col-sm-3 col-form-label">Gender</label>
                                                   <div class="col-sm-9" style="display: flex;">
                                                       <input type="radio" name="gender"
                                                              class="form-control col-sm-2"
                                                              id="gender" value="1">Male
                                                       <input type="radio" name="gender"
                                                              class="form-control col-sm-2"
                                                              id="gender1" value="2">Female
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="coid" class="col-sm-3 col-form-label">Country</label>
                                                   <div class="col-sm-9">
                                                       <select name="coid" id="cid" class="form-control">
                                                           <option value="">Select one</option>

                                                           <?php

                                                           $data = $om->view("countries", "id, name", array("name", "asc"));

                                                           while ($m = $data->fetch_object()) {
                                                               echo "<option value='{$m->id}'>{$m->name}</option>";
                                                           }

                                                           ?>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="cid" class="col-sm-3 col-form-label">city</label>
                                                   <div class="col-sm-9">
                                                       <select name="cid" id="cid" class="form-control">
                                                           <option value="">Select one</option>

                                                           <?php

                                                           $data = $om->view("citys", "id, name", array("name", "asc"));

                                                           while ($m = $data->fetch_object()) {
                                                               echo "<option value='{$m->id}'>{$m->name}</option>";
                                                           }

                                                           ?>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="address"
                                                          class="col-sm-3 col-form-label">Address</label>
                                                   <div class="col-sm-9">
                                                       <textarea name="address" class="form-control" id="address"
                                                                 placeholder="Enter address"></textarea>
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="pc" class="col-sm-3 col-form-label">Post Code</label>
                                                   <div class="col-sm-9">
                                                       <input type="number" name="pc" class="form-control" id="pc"
                                                              placeholder="Enter post code">
                                                   </div>
                                               </div>


                                               <div class="form-group row">
                                                   <label for="nat"
                                                          class="col-sm-3 col-form-label">nationality</label>
                                                   <div class="col-sm-9">
                                                       <input type="text" name="nat" class="form-control" id="nat"
                                                              placeholder="Enter nationality">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="inputPassword3"
                                                          class="col-sm-3 col-form-label">Password</label>
                                                   <div class="col-sm-9">
                                                       <input type="password" name="pass" class="form-control"
                                                              id="inputPassword3" placeholder="Password">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="inputPassword3"
                                                          class="col-sm-3 col-form-label"></label>
                                                   <div class="col-sm-9">
                                                       <button type="submit" name="reg" class="btn btn-primary">
                                                           Registered Now
                                                       </button>
                                                   </div>
                                               </div>
                                           </form>
                                       </div>
                                       <div class="modal-footer">

                                       </div>
                                   </div>
                               </div>
                           </div>
                           <!--                model for reg end-->

                       </div>
                       <div class="col-lg-4 col-sm-6 accomodation_item room-feature">
                           <div class="alert alert-success" role="alert">
                               <h4> Room Features</h4>
                           </div>
                           <?php
                           $whare = [
                               "room_features.room_id" => "$r->id",
                           ];
                           $rel = [
                               "room_features.feature_id" => "features.id"
                           ];
                           $data = $om->view("room_features, features", "room_features.*, features.name", array("name", "asc"), $whare, $rel);

                           while ($m = $data->fetch_object()) {
                               ?>
                               <span class="badge badge-pill badge-info"><i class="fa fa-arrow-circle-o-right"
                                                                            aria-hidden="true"></i> <?php echo $m->name; ?></span>
                               <?php
                           }
                           ?>
                       </div>


                       <?php
                   }
                       } else {
                    ?>
            <div class="col-lg col-sm-6 accomodation_item text-center">

                          <h5 align="center">No Room Available In This Date Range or Number of Peoples </h5>
                <a href="index.php#hbook" class="btn theme_btn button_hover mt-5">Search Again</a>
            </div>
                <?php
                       }

            ?>

        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->

