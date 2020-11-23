<!--================ add feature  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Offer Edit</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";

                    if ($_POST["titel"] == "") {
                        $msg .= 'Name Required <br>';
                    }
                    if ($_POST["dis"] == "") {
                        $msg .= 'description  Required <br>';
                    }
                    if ($_POST["rnum"] == "") {
                        $msg .= 'Room number  Required <br>';
                    }
                    if ($_POST["start_date"] == "") {
                        $msg .= 'start date  Required <br>';
                    }
                    if ($_POST["end_date"] == "") {
                        $msg .= 'end data  Required <br>';
                    }
                    if ($_POST["price"] == "") {
                        $msg .= 'Amount  Required <br>';
                    }

                    if($msg == ""){

                        $data = [
                            'title' => $_POST['titel'],
                            'description' => $_POST['dis'],
                            'room_id' => $_POST['rnum'],
                            'start_date' => $_POST['start_date'],
                            'end_date' => $_POST['end_date'],
                            'price' => $_POST['price']
                        ];

                        if($om->update("offers", $data, array("id"=>$_GET['id']))){
                            echo "<script>window.location='index.php?u=offers-view&ms=Offer edited Successfully'</script>";
                        } else {
                            echo "Offer Edit Fail <br>";
                        }
                    }else{
                        echo $msg;
                    }
                }
                ?></h4>
        </div>
        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-9 col-sm m-auto">
                <div class="facilities_item">
                    <?php
                    $results = $om->view("offers", "*", "", array("id"=>$_GET['id']));
                    while ($d = $results->fetch_object()) {
                    ?>

                    <form method="post" action="" name="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="titel" class="col-sm-3 col-form-label">Titel</label>
                            <div class="col-sm-9">
                                <input type="text" name="titel" class="form-control" id="titel" value="<?php echo "{$d->title}" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dis" class="col-sm-3 col-form-label">Discription</label>
                            <div class="col-sm-9">
                                <textarea name="dis" class="form-control" id="dis" ><?php echo "{$d->description}" ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rnum" class="col-sm-3 col-form-label">Room Number</label>
                            <div class="col-sm-9">
                                <select name="rnum" id="rnum" class="form-control">
                                    <option value="">Select one</option>
                                    <?php

                                    $data = $om->view("rooms", "id, title, serial", array("serial", "asc"));
                                    while($m = $data->fetch_object()){
                                        if ($m->id == $d->room_id) {
                                            echo "<option value='{$m->id}' selected>{$m->serial}</option>";
                                        }else{
                                            echo "<option value='{$m->id}' >{$m->serial}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start date" class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="start_date" class="form-control" id="start_date" value="<?php echo "{$d->start_date}" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end date" class="col-sm-3 col-form-label">End Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="end_date" class="form-control" id="end_date" value="<?php echo "{$d->end_date}" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="price" value="<?php echo "{$d->price}" ?>">
                            </div>
                        </div>
                        


                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ add feature  =================-->

