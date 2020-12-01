<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">User Login</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";
                    if ($_POST["email"] == "") {
                        $msg .= 'email required <br>';
                    }
                    if ($_POST["pass"] == "") {
                        $msg .= 'Password required <br>';
                    }
                    if ($_POST["utype"] == "") {
                        $msg .= 'User type required <br>';
                    }

                    if($msg == ""){
                        if ($_POST['utype'] ==1) {

                            $data = [
                                'email' => $_POST['email'],
                                'upassword' => md5($_POST['pass'])
                            ];

                            $result = $om->view("users", "*", "", $data);

                            if ($result->num_rows > 0) {
                                while ($data = $result->fetch_object()) {
                                    $_SESSION['uname'] = $data->name;
                                    $_SESSION['uid'] = $data->id;
                                    $_SESSION['type'] = $_POST['utype'];
                                    $_SESSION['ucat'] = $data->category_id;


                                    echo "<script>window.location='index.php?u=dashboard'</script>";
                                }
                            }else{
                                echo "invalid Email or password<br>";
                            }
                        }elseif ($_POST['utype'] == 2) {

                            $data = [
                                'email' => $_POST['email'],
                                'cpassword' => md5($_POST['pass'])
                            ];

                            $result = $om->view("customers", "*", "", $data);

                            if ($result->num_rows > 0) {
                                while ($data = $result->fetch_object()) {
                                    $_SESSION['cname'] = $data->f_name." ".$data->l_name;
                                    $_SESSION['cid'] = $data->id;
                                    $_SESSION['type'] = $_POST['utype'];

                                    echo "<script>window.location='index.php?c=dashboard'</script>";
                                }
                            }else{
                                echo "invalid Email or password<br>";
                            }
                        } else{

                            echo "invalid Email or password<br>";
                        }
                    }else{
                        echo $msg;
                    }
                }
                ?></h4>
        </div>
        <div class="row mb_30">

            <div class="col-lg-6 col-sm m-auto">
                <div class="facilities_item">
                <div class="text-center mb-2">
                    <p><b>Admin:</b> admin@gmail.com</p>
                    <p><b>Pass:</b> 1234</p>
                    <p><b>Customer:</b> customer@gmail.com</p>
                    <p><b>Pass:</b> 1234</p>
                </div>

                    <form method="post" action="" name="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="utype" class="col-sm-3 col-form-label">User type</label>
                            <div class="col-sm-9">
                                <select id="utype" name="utype" class="form-control">
                                    <option value="" selected>Choose user Type</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-auto mr-3">
                                <a href="register"><button type="button" class="btn btn-info">Register Now</button></a>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Facilities Area  =================-->

