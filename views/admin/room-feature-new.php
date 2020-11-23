<link rel="stylesheet" href="assets/css/fSelect.css">

<!--================ add feature  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w"> Add New Room Feature</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";

                    if ($_POST["rnum"] == "") {
                        $msg .= 'Room Number Required <br>';
                    }

                    if($msg == ""){

                      
                       
                        $fetures = $_POST['fid'];

                        if($fetures){
                            foreach($fetures as $feture){
                            $data = [
                                'room_id' => $_POST['rnum'],
                                'feature_id' => $feture
                            ];
                            $om->insert("room_features", $data);
                        }
                        //echo "<script>window.location='index.php?u=room-feature-view&ms=Features Successfully added to the room'</script>";
                        } else {
                            echo "Feature Already Exist <br>";
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
                            <label for="rnum" class="col-sm-2 col-form-label">Room Number</label>
                            <div class="col-sm-10">
                                <select name="rnum" id="rnum" class="form-control">
                                    <option value="">Select one</option>
                                <?php

                                $data = $om->view("rooms", "id, title, serial", array("serial", "asc"));
                                while($m = $data->fetch_object()){
                                    echo "<option value='{$m->id}' >{$m->serial}</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feature" class="col-sm-2 col-form-label">Features</label>
                            <div class="col-sm-10">
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
<script src="assets/js/fSelect.js"></script>
<script>
    $(function() {
        $('#fid').fSelect();
    });
</script>

