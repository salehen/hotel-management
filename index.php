<?php
session_start();
require "library/model/ourModel.php";
$om = new ourModel();
date_default_timezone_set("Asia/Dhaka");
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="url" content="<?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI'].'?').'/'; ?>">
        <link rel="icon" href="assets/image/favicon.png" type="assets/image/png">
        <title>Royal Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/vendors/linericon/style.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/custom.css">
       
    </head>
    <body>

        
        <?php
             require "library/controller.php";
        ?>
        

        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/js/mail-script.js"></script>
        <script src="assets/js/mail-script.js"></script>
        <script src="assets/js/stellar.js"></script>
        <script src="assets/vendors/lightbox/simpleLightbox.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

        <?php
        if (isset($myScript)){
            foreach ($myScript as $value){
                echo "<script src='{$value}'></script>";
            }
        }
        ?>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
