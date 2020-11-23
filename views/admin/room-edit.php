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
            <h2 class="title_w">Room Edit</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";
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
                        ];

                        if($om->update("rooms", $data, array("id"=>$_GET['id']))){
                            echo "<script>window.location='index.php?u=room-view&ms=Room edited Successfully'</script>";
                            $om->delete("room_features", array("room_id"=>$_GET['id']));

                            $id = $_GET['id'];
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

                        } else {
                            echo "Room Edit Fail <br>";
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
                    $results = $om->view("rooms", "*", "", array("id"=>$_GET['id']));
                    while ($d = $results->fetch_object()) {
                    ?>

                    <form method="post" action="" name="" enctype="multipart/form-data">
                    <div class="form-group row">
                            <label for="serial" class="col-sm-3 col-form-label">Room Serial</label>
                            <div class="col-sm-9">
                                <input type="number" name="serial" class="form-control" id="serial" value="<?php echo "{$d->serial}" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dis" class="col-sm-3 col-form-label">Discription</label>
                            <div class="col-sm-9">
                                <textarea name="dis" class="form-control" id="dis" ><?php echo "{$d->description}" ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="price" value="<?php echo "{$d->price}" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ad_num" class="col-sm-3 col-form-label">Adult Number</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="ad_num" id="ad_num">
                                    <option value="<?php echo "{$d->adult_number}" ?>" selected><?php echo "{$d->adult_number}" ?></option>
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
                                    <option value="<?php echo "{$d->child_number}" ?>" selected><?php echo "{$d->child_number}" ?></option>
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
                                        if ($d->category_id == $m->id) {
                                            echo "<option value='{$m->id}' selected>{$m->name}</option>";
                                        }else{
                                            echo "<option value='{$m->id}'>{$m->name}</option>";
                                        }
                                    }

                                    ?>
                                    
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="feature" class="col-sm-3 col-form-label">Features</label>
                            <div class="col-sm-9">
                                <select name="fid[]" id="fid" class="form-control" multiple="multiple">
                                    <option value="">Select Features</option>

                                    <?php
                                    $feature = $om->view("room_features", "*", "", array("room_id"=>$_GET['id'])); 
                                    $featureList = array();
                                    while($m = $feature->fetch_object()){
                                        $featureList[] = $m->feature_id;
                                    }

                                    $dt = $om->view("features", "*");
                                    while($m = $dt->fetch_object()){
                                        if($featureList && in_array($m->id, $featureList)){
                                            echo "<option selected value='{$m->id}'>{$m->name}</option>";
                                        }
                                        else{
                                            echo "<option value='{$m->id}'>{$m->name}</option>";
                                        }
                                        
                                    }

                                    ?>
                                </select>
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


