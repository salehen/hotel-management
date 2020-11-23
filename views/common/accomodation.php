<?php
$myScript = [
    "assets/vendors/nice-select/js/jquery.nice-select.js",
    "assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js",


];
?>
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Accomodation</h2>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Accomodation</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Special Accomodation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room1.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Double Deluxe Room</h4></a>
                    <h5>TK- 2500<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room2.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Single Deluxe Room</h4></a>
                    <h5>TK- 2000<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room3.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Honeymoon Suit</h4></a>
                    <h5>TK- 3000<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room4.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Economy Double</h4></a>
                    <h5>TK- 1500<small>/night</small></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->
<!--================Booking Tabel Area =================-->
<section class="hotel_booking_area">
    <div class="container">
        <form action="index.php?v=home" method="get">
            <input type="hidden" name="v" value="search-result" >
            <div class="hotel_booking_area position" >
                <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-3">
                            <h2>Book<br> Your Room</h2>
                        </div>
                        <div class="col-md-9">
                            <div class="boking_table">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class="input-group date" id="datetimepicker11">
                                                    <input type="text" name="sdate" class="form-control" placeholder="Arrival Date" autocomplete="off" required">
                                                    <span class="input-group-addon">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input type="text" name="edate" class="form-control" placeholder="Departure Date" autocomplete="off" required>
                                                    <span class="input-group-addon">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                <select class="wide" name="adult" style="display: none;" required>
                                                    <option value="0" data-display="Adult">Adult</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <div class="nice-select wide" tabindex="0"><span class="current">Adult</span>
                                                    <ul class="list">
                                                        <li data-value="Adult" data-display="Adult" class="option selected focus">Adult</li>
                                                        <li data-value="1" class="option">1</li>
                                                        <li data-value="2" class="option">2</li>
                                                        <li data-value="3" class="option">3</li>
                                                        <li data-value="4" class="option">4</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <select class="wide" name="child" style="display: none;" required>
                                                    <option value="0" data-display="Child">Child</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select><div class="nice-select wide" tabindex="0"><span class="current">Child</span>
                                                    <ul class="list">
                                                        <li data-value="Child" data-display="Child" class="option selected">Child</li>
                                                        <li data-value="0" class="option">0</li>
                                                        <li data-value="1" class="option">1</li>
                                                        <li data-value="2" class="option">2</li>
                                                        <li data-value="3" class="option">3</li>
                                                        <li data-value="4" class="option">4</li>
                                                    </ul></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 dflex">
                                        <div class="book_tabel_item">
                                            <input type="submit" name="" id="" value="BOOK NOW" class="book_now_btn button_hover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================Booking Tabel Area  =================-->
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Normal Accomodation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,</p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room1.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Double Deluxe Room</h4></a>
                    <h5>TK- 2500<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room2.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Single Deluxe Room</h4></a>
                    <h5>TK- 2000<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room3.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Honeymoon Suit</h4></a>
                    <h5>TK- 3000<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="assets/image/room4.jpg" alt="">
                        <a href="index.php?home#hbook" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="index.php?home#hbook"><h4 class="sec_h4">Economy Double</h4></a>
                    <h5>TK- 1500<small>/night</small></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->