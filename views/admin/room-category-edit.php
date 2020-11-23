<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Edit Room Category</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";
                    
                    if ($_POST["name"] == "") {
                        $msg .= 'ca Name Required <br>';
                    }

                    if($msg == ""){

                        $data = [
                            'name' => $_POST['name'],
                        ];

                        if($om->update("room_categories", $data, array("id"=>$_GET['id']))){
                            echo "<script>window.location='index.php?u=room-category-view&ms=Feature Update Successfully'</script>";
                        } else {
                            echo "Category Update Failed <br>";
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
                    $results = $om->view("room_categories", "*", "", array("id"=>$_GET['id']));
                    while ($d = $results->fetch_object()) {
                ?>

                    <form method="post" action="" name="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $d->name ?>">
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

