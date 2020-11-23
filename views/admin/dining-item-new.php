

<!--================ add feature  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Add Dining Items</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";

                    if ($_POST["name"] == "") {
                        $msg .= 'Name Required <br>';
                    }
                    if ($_POST["des"] == "") {
                        $msg .= 'description  Required <br>';
                    }
                    if ($_POST["amo"] == "") {
                        $msg .= 'Amount  Required <br>';
                    }

                    if($msg == ""){

                        $data = [
                            'name' => $_POST['name'],
                            'description' => $_POST['des'],
                            'amount' => $_POST['amo'],
                        ];

                        if($om->insert("dining_items", $data)){
                            echo "<script>window.location='index.php?u=dining-item-view&ms=New item Add Successfully'</script>";
                        } else {
                            echo "Item Already Exist <br>";
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

                    <form method="post" action="" name="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Dining Items Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="des" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="des" class="form-control" id="des" placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amo" class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="text" name="amo" class="form-control" id="amo" placeholder="Enter Amount">
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

