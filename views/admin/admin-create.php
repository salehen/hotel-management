<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Create New Admin</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";
                    $ext = "";
                    /*
                    if ($_FILES['pic']['name']){
                        $extention = pathinfo($_FILES['pic']['name']);
                        $ext = strtolower($extention['extension']);
                        if ($ext!='jpg' && $ext!='jpeg' && $ext!='png' &&$ext!='gif'){
                            $ext = "";
                        }
                    }
                    */
                    if ($_POST["name"] == "") {
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


                    if($msg == ""){


                        $data = [
                            'name' => $_POST['name'],
                            'email' => $_POST['email'],
                            'contact' => $_POST['contact'],
                            'category_id' => $_POST['utype'],
                            'gender' => $_POST['gender'],
                            'address' => $_POST['address'],
                            'upassword' => md5($_POST['pass']),
                            'picture' => $ext
                        ];

                        if($om->insert("users", $data)){
                            /*
                            $fContent = $_POST['metatitel'] . "~$$@@!!~" . $_POST['metadis'];
                            $fh = fopen("files/{$om->ID}.txt", "w");
                            fwrite($fh, $fContent);
                            fclose($fh);

                            if ($ext) {
                                move_uploaded_file($_FILES['pic']['tmp_name'], "images/{$om->ID}.{$ext}");
                            }
                            
                            */
                            echo "create admin Successfully <br>";
                            echo "<script>window.location='index.php?u=admin-view&ms=sub admin created Successfully'</script>";
                        }

                        else{

                            echo "admin already exist <br>";
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
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Enter Email">
                                <span id="val-email" class="em"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-3 col-form-label">contact</label>
                            <div class="col-sm-9">
                                <input type="number" name="contact" class="form-control" id="contact" placeholder="Enter contact">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9" style="display: flex;">
                                <input type="radio" name="gender" class="form-control col-sm-2" id="gender" value="1">Male
                                <input type="radio" name="gender" class="form-control col-sm-2" id="gender1" value="2">Female
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="utype" class="col-sm-3 col-form-label">User type</label>
                            <div class="col-sm-9">
                                <select id="utype" name="utype" class="form-control">
                                    <option value="" selected disabled>Choose user Type</option>
                                    <option value="3">Sub Admin</option>
                                    <option value="2">Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea name="address" class="form-control" id="address" placeholder="Enter address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Create New</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Facilities Area  =================-->

<script type="text/javascript">
    $(document).ready(function () {
        $("input[name='email']").keyup(function () {
            var em = $(this).val();
            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
            if (validateEmail(em)){
                $.ajax({
                    type: "post",
                    url: $("meta[name='url']").attr('content')+"api/check-email-available.php",
                    data: {
                        "email": em
                    },
                success:function(res){
                        console.log(res);
                        if (res == 1){
                    $("#val-email").html("<h5>This Email NOT Available.</h5>");
                    $(".em").css({
                        'color': 'red'
                    })
                }else {
                    $("#val-email").html("<h5>Available.</h5>");
                    $(".em").css({
                        'color': 'green'
                            })
                    }
                }
                })
            }else {
                $("#val-email").text("");
            }

            //alert(em);
        });
    });
</script>

