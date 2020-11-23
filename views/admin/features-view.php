

<!--================ add feature  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>

    <div class="container">
        <span class="section_title text-center">
            <?php
            if(isset($_GET['ms'])){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['ms']; ?>
                </div>
                <?php
            }
            ?>
        </span>
        <div class="section_title text-center">
            <h2 class="title_w">View All Features</h2>
        </div>
        <div class="col-sm m-auto text-center">
            <h4>
                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $msg = "";

                    if ($_POST["name"] == "") {
                        $msg .= 'Feature Name Required <br>';
                    }

                    if($msg == ""){

                        $data = [
                            'name' => $_POST['name'],
                        ];

                        if($om->insert("features", $data)){
                            echo "<script>window.location='index.php?u=features-view&ms=New Feature Add Successfully'</script>";
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

            <div class="col-lg-8 col-sm m-auto">
                <div class="facilities_item">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $results = $om->view("features", "*", array("id", "desc"));
                        while ($d = $results->fetch_object()) {
                            echo "<tr>";
                            echo "<th scope=\"row\">{$d->id}</th>";
                            echo "<td>{$d->name}</td>";
                            echo "<td><a href='index.php?u=features-edit&id={$d->id}' class=\"btn btn-primary\">Edit</a>
                      <a href='index.php?u=features-view&id={$d->id}' class=\"btn btn-danger\" 
                      onclick=\"return confirm('Are you sure do you want to delete \\n Name :  {$d->name}');\">Delete</a>
                  </td>";
                            echo "</tr>";
                        }


                        ?>

                        </tbody>

                    </table>
                    <?php
                    if (isset($_GET['id'])) {
                        $results = $om->view("features", "*", "", array("id"=>$_GET['id']));
                        while ($result = $results->fetch_object()){
                            $old_ext = $result->picture;
                        }
                        if ($om->delete("features", array("id" => $_GET['id']))) {
                            //echo "Delete Successfully.";
                            echo "<script>
                            //alert(\"Delete Successfully.\");
                            window.location='index.php?u=features-view&ms=Delete Successfully.'
                        </script>";
                        } else {
                            echo "Delete Fail";

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ add feature  =================-->


