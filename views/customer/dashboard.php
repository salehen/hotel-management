<?php

$myScript = [
    "assets/js/my.js",
    "assets/js/pages/dashboard.js",

];


if ($_SESSION['type'] == 2 || $_SESSION['type'] == 1){
    ?>
<!--================ login Area  =================-->
<section class="accomodation_area section_gap pb-2 ">
    <div class="container">

        <div class="accomodation_item text-center">
            <h5>Welcome To Our Hotel</h5>
        </div>
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
    </div>
</section>
<!--================ login Area  =================-->
<section class="accomodation_area pb-5">
    <div class="container">
        <din class="row mb-30">
            <div class="col-sm-2">
                <?php
                    include "./includes/customer-sidebar.php";
                ?>
            </div>
            <div class="col-sm-10">
                <hr class="mt-0">
                <h4 class="text-center">Customer Information</h4>
                <hr>
                <?php
            $data = $om->raw("SELECT
                           customers.id as cid,
                           customers.f_name,
                           customers.l_name,
                           customers.email,
                           customers.contact,                           
                           customers.address,
                           countries.name AS country,
                           citys.name AS city
                        FROM
                            customers,
                            countries,
                            citys
                        WHERE
                            customers.id = {$_SESSION['cid']}
                            AND customers.country_id = countries.id
                           AND citys.id = customers.city_id
                           ");

            while($cf = $data->fetch_object()){      
            ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
                    <tr>
                        <th class="text-dark">
                            <h4>Name : </h4>
                        </th>
                        <td>
                            <h4><?php echo strtoupper($cf->f_name." ".$cf->l_name) ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-dark">
                            <h4>E-Mail : </h4>
                        </th>
                        <td>
                            <h4><?php echo "{$cf->email}"; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-dark">
                            <h4>Contact:</h4>
                        </th>
                        <td>
                            <h4><?php echo "{$cf->contact}"; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-dark">
                            <h4>Address:</h4>
                        </th>
                        <td>
                            <h4><?php echo "{$cf->address}"; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-dark">
                            <h4>City:</h4>
                        </th>
                        <td>
                            <h4><?php echo "{$cf->city}"; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-dark">
                            <h4>Country:</h4>
                        </th>
                        <td>
                            <h4><?php echo "{$cf->country}"; ?></h4>
                        </td>
                    </tr>


                </table>

                <?php
            }
            ?>
            </div>
        </din>
    </div>
</section>






<?php
}else{
    echo "<script>window.location='index.php'</script>";
}
?>