

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
            <h2 class="title_w">View All Customer</h2>
        </div>
        
        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-9 col-sm m-auto">
                <div class="facilities_item">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <!-- <th scope="col">Gender</th>
                            <th scope="col">Country</th>
                            <th scope="col">City</th> -->
                            <th scope="col">Address</th>
                            <th scope="col">Post code</th>
                            <th scope="col">nationality</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        

                        $results = $om->view("customers", "*", array("id", "desc"));
                        while ($d = $results->fetch_object()) {
                            echo "<tr>";
                            echo "<th scope=\"row\">{$d->id}</th>";
                            echo "<td>{$d->f_name} {$d->l_name}</td>";
                            echo "<td>{$d->email}</td>";
                            echo "<td>{$d->contact}</td>";
                            // echo "<td>{$d->gender}</td>";
                            // echo "<td>{$d->country_id}</td>";
                            // echo "<td>{$d->city_id}</td>";
                            echo "<td>{$d->address}</td>";
                            echo "<td>{$d->post_code}</td>";
                            echo "<td>{$d->nationality}</td>";
//                            echo "<td><a href='index.php?u=Customers-edit&id={$d->id}' class=\"btn btn-primary\">Edit</a>
//                      <a href='index.php?u=customers-view&id={$d->id}' class=\"btn btn-danger\"
//                      onclick=\"return confirm('Are you sure do you want to delete \\n id :  {$d->id}');\">Delete</a>
//                  </td>";
                            echo "</tr>";
                        }


                        ?>

                        </tbody>

                    </table>
                    <?php
                    if (isset($_GET['id'])) {
                        if ($om->delete("rooms", array("id" => $_GET['id']))) {
                            //echo "Delete Successfully.";
                            echo "<script>
                            //alert(\"Delete Successfully.\");
                            window.location='index.php?u=room-view&ms=Delete Successfully.'
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


