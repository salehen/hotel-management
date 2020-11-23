

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
            <h2 class="title_w">View All Rooms</h2>
        </div>
        
        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-9 col-sm m-auto">
                <div class="facilities_item">
                    <table  id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Description</th>
                                <th scope="col">Serial</th>
                                <th scope="col">Price</th>
                                <th scope="col">Adult</th>
                                <th scope="col">Child</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        $rel = [
                            "rooms.category_id" => "room_categories.id"
                        ];

                        $results = $om->view("rooms, room_categories", "rooms.*, room_categories.name as cname", array("serial", "asc"), "", $rel);
                        while ($d = $results->fetch_object()) {
                            echo "<tr>";
                            echo "<th scope=\"row\">{$d->id}</th>";

                            echo "<td>{$d->description}</td>";
                            echo "<td>{$d->serial}</td>";
                            echo "<td>{$d->price}</td>";
                            echo "<td>{$d->adult_number}</td>";
                            echo "<td>{$d->child_number}</td>";
                            echo "<td>{$d->cname}</td>";
                            echo "<td><a href='index.php?u=room-edit&id={$d->id}' class=\"btn btn-primary\">Edit</a>
                      <a href='index.php?u=room-view&id={$d->id}' class=\"btn btn-danger\" 
                      onclick=\"return confirm('Are you sure do you want to delete \\n Room Number :  {$d->serial}');\">Delete</a>
                  </td>";
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

