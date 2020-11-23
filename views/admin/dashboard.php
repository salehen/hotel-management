<?php
if ($_SESSION['type'] == 1){
?>


    <!--================ add feature  =================-->
    <section class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>

        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_w">Dashboard</h2>
            </div>
            <div class="row mb_30">

                <?php
                require "./includes/sidebar.php";
                ?>

                <div class="col-lg-8 col-sm m-auto">
                    <div class="facilities_item">
                        <div class="section_title text-center">
                            <?php
                            if(isset($_GET['ms'])){
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_GET['ms']; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <h2 class="title_color title_w">
                                <?php echo $_SESSION['uname']?>
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ add feature  =================-->
<?php
}else{
    echo "<script>window.location='index.php'</script>";
}
?>