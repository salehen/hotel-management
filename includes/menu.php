        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="home"><img src="assets/image/Logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="accomodation">Accomodation</a></li>
                            <li class="nav-item"><a class="nav-link" href="gallery">Gallery</a></li>
                            <!--<li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="index.php?v=home">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php?v=home">Blog Details</a></li>
                                </ul>
                            </li> -->
                            

                            <?php
                            if (isset($_SESSION['uid'])){
                            ?>
                                <li class="nav-item"><a class="nav-link" href="index.php?u=dashboard">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout">logout</a></li>
                            <?php }elseif (isset($_SESSION['cid'])){ ?>
                                <li class="nav-item"><a class="nav-link" href="index.php?c=dashboard">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout">logout</a></li>
                            <?php } else {?>
                            <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->
