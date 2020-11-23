<?php
$myScript = [
    "assets/js/fSelect.js",
    "assets/js/my.js",

];
?>


<link rel="stylesheet" href="assets/css/fSelect.css">
<!--================ add feature  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">New Room</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";

                    $ext1 = "";
                    $ext2 = "";
                    $ext3 = "";
                    $ext4 = "";

                    if ($_FILES['pic1']['name']){
                        $extention = pathinfo($_FILES['pic1']['name']);
                        $ext1 = strtolower($extention['extension']);
                        if ($ext1!='jpg' && $ext1!='jpeg' && $ext1!='png' &&$ext1!='gif'){
                            $ext1 = "";
                        }
                    }
                    if ($_FILES['pic2']['name']){
                        $extention = pathinfo($_FILES['pic2']['name']);
                        $ext2 = strtolower($extention['extension']);
                        if ($ext2!='jpg' && $ext2!='jpeg' && $ext2!='png' &&$ext2!='gif'){
                            $ext2 = "";
                        }
                    }
                    if ($_FILES['pic3']['name']){
                        $extention = pathinfo($_FILES['pic3']['name']);
                        $ext3 = strtolower($extention['extension']);
                        if ($ext3!='jpg' && $ext3!='jpeg' && $ext3!='png' &&$ext3!='gif'){
                            $ext3 = "";
                        }
                    }
                    if ($_FILES['pic4']['name']){
                        $extention = pathinfo($_FILES['pic4']['name']);
                        $ext4 = strtolower($extention['extension']);
                        if ($ext4!='jpg' && $ext4!='jpeg' && $ext4!='png' &&$ext4!='gif'){
                            $ext4 = "";
                        }
                    }


                   if ($_POST["dis"] == "") {
                       $msg .= 'description  Required <br>';
                   }
                   if ($_POST["price"] == "") {
                       $msg .= 'Amount  Required <br>';
                   }

                    if($msg == ""){
                        
                        
                        $data = [

                            'description' => $_POST['dis'],
                            'price' => $_POST['price'],
                            'serial' => $_POST['serial'],
                            'adult_number' => $_POST['ad_num'],
                            'child_number' => $_POST['ch_num'],
                            'category_id' => $_POST['rcat'],
                            'picture1' => $ext1,
                            'picture2' => $ext2,
                            'picture3' => $ext3,
                            'picture4' => $ext4,
                        ];

                        if($om->insert("rooms", $data)){
                            $id = $om->ID;

                            $fetures = $_POST['fid'];
                            if($fetures){
                                foreach($fetures as $feture){
                                    $dt = [
                                        'room_id' => $id,
                                        'feature_id' => $feture
                                    ];
                                    $om->insert("room_features", $dt);
                                }
                            }

                            if($ext1){
                                move_uploaded_file($_FILES['pic1']['tmp_name'], "assets/image/room/{$id}_1.{$ext1}");
                            }
                            if($ext2){
                                move_uploaded_file($_FILES['pic2']['tmp_name'], "assets/image/room/{$id}_2.{$ext2}");
                            }
                            if($ext3){
                                move_uploaded_file($_FILES['pic3']['tmp_name'], "assets/image/room/{$id}_3.{$ext3}");
                            }
                            if($ext4){
                                move_uploaded_file($_FILES['pic4']['tmp_name'], "assets/image/room/{$id}_4.{$ext4}");
                            }




//                            echo "done";
                            echo "<script>window.location='index.php?u=room-view&ms=New Room Add Successfully'</script>";
                        } else {
                            echo "Room Already Exist <br>";
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

                    <form method="post" action="" name="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="serial" class="col-sm-3 col-form-label">Room Serial</label>
                            <div class="col-sm-9">
                                <input type="number" name="serial" class="form-control" id="serial" placeholder="Enter serial">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dis" class="col-sm-3 col-form-label">Discription</label>
                            <div class="col-sm-9">
                                <textarea name="dis" class="form-control" id="dis" placeholder="Enter Discription"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="price" placeholder="Enter price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ad_num" class="col-sm-3 col-form-label">Adult Number</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="ad_num" id="ad_num">
                                    <option value="">Select Adult Numbers</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ch_num" class="col-sm-3 col-form-label">Child Number</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="ch_num" id="ch_num">
                                    <option value="">Select Child Numbers</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rcat" class="col-sm-3 col-form-label">Room Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="rcat" id="rcat">
                                    <option value="">Select Category</option>
                                    <?php

                                    $data = $om->view("room_categories", "id, name", array("name", "asc"));

                                    while($m = $data->fetch_object()){
                                        echo "<option value='{$m->id}'>{$m->name}</option>";
                                    }

                                    ?>
                                    
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="fid" class="col-sm-3 col-form-label">Features</label>
                            <div class="col-sm-9">
                                <select name="fid[]" id="fid" class="form-control" multiple="multiple">
                                    <option value="">Select Features</option>

                                    <?php

                                    $data = $om->view("features", "id, name", array("name", "asc"));

                                    while($m = $data->fetch_object()){
                                        echo "<option value='{$m->id}'>{$m->name}</option>";
                                    }

                                    ?>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="pic" class="col-sm-3 col-form-label">Picture</label>
                            <div class="col-sm-9">
                                <input type="file" name="pic1" class="form-control" id="pic1">
                                <input type="file" name="pic2" class="form-control" id="pic2">
                                <input type="file" name="pic3" class="form-control" id="pic3">
                                <input type="file" name="pic4" class="form-control" id="pic4">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add New</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ add feature  =================-->

