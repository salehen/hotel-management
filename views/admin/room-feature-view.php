

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
            <h2 class="title_w">View All Room Features</h2>
        </div>
        
        <div class="row mb_30">

            <?php
            require "./includes/sidebar.php";
            ?>

            <div class="col-lg-8 col-sm m-auto">
                <div class="facilities_item">
                    <table  id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Room Number</th>
                                <th scope="col">Feature</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $where= [
                            'room_features.room_id' => 'rooms.id',
                            'room_features.feature_id' => 'features.id',
                        ];

                        $results = $om->view("room_features, rooms, features", "room_features.*, rooms.serial, features.name", array("rooms.serial", "asc"), "", $where);
                        while ($d = $results->fetch_object()) {
                            echo "<tr>";
                            echo "<th scope=\"row\">{$d->id}</th>";
                            echo "<td>{$d->serial}</td>";
                            echo "<td>{$d->name}</td>";
                            echo "<td>
                      <a href='index.php?u=room-feature-view&id={$d->id}' class=\"btn btn-danger\" 
                      onclick=\"return confirm('Are you sure do you want to delete feature for \\n Room No :  {$d->serial} \\n Feature :  {$d->name}');\">Delete</a>
                  </td>";
                            echo "</tr>";
                        }


                        ?>

                        </tbody>

                    </table>
                    <?php
                    if (isset($_GET['id'])) {
                        if ($om->delete("room_features", array("id" => $_GET['id']))) {
                            //echo "Delete Successfully.";
                            echo "<script>
                            //alert(\"Delete Successfully.\");
                            window.location='index.php?u=room-feature-view&ms=Delete Successfully.'
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


