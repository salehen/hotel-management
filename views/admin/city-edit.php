<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Edit city</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";
                    
                    if ($_POST["name"] == "") {
                        $msg .= 'city Name Required <br>';
                    }

                    if($msg == ""){

                        $data = [
                            'name' => $_POST['name'],
                            'country_id' => $_POST['cid'],
                        ];

                        if($om->update("citys", $data, array("id"=>$_GET['id']))){
                            echo "<script>window.location='index.php?u=city-view&ms=city Update Successfully'</script>";
                        } else {
                            echo "city Update Failed <br>";
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

            <div class="col-lg-8 col-sm m-auto">
                <div class="facilities_item">
                <?php
                    $results = $om->view("citys", "*", "", array("id"=>$_GET['id']));
                    while ($d = $results->fetch_object()) {
                ?>

                    <form method="post" action="" name="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $d->name ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cid" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                            <select name="cid" id="cid" class="form-control">
                                <option value="">Select one</option>

                                <?php

                                $data = $om->view("countries", "id, name", array("name", "asc"));

                                while($m = $data->fetch_object()){
                                    if ($m->id == $results->country_id){
                                        echo "<option value='{$m->id}' selected>{$m->name}</option>";
                                    }else {
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
<!--================ Facilities Area  =================-->

