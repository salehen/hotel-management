<div class="col-lg-2 col-sm pl-0">
    <div class="facilities_item pl-0 mr-0">
        <ul class="nav nav-pills navbar-right custom-sidebar">
            <li class="nav-item"><a class="nav-link" href="index.php?u=dashboard">Dashboard</a></li>
            <?php if(isset($_SESSION['ucat']) && $_SESSION['ucat'] == 1) {?>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sub-Admin</a>
                <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="index.php?u=admin-create">Create SubAdmin</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?u=admin-view">Admin List</a></li>
                </ul>
            </li>
            <?php } ?>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=customers-view">Customer List</a></li>
                </ul>
            </li>
            
            
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Reservation <span class="badge badge-pill text-info tPending"></span> </a>
                <ul class="dropdown-menu ">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=reservation-pending">Pending <span  class="badge badge-pill text-danger tPending"></span></a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=reservation-upcoming">Upcoming</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=reservation-list">Current</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=reservation-finished">Finished</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dining Log</a>
                <ul class="dropdown-menu ">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=dining-list">Today Log</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=cancel-list">Cancel List</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rooms</a>
                <ul class="dropdown-menu ">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=room-view">View Room</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=room-new">Add Room</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room Feature</a>
                <ul class="dropdown-menu ">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=room-feature-view">View All</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Features</a>
                <ul class="dropdown-menu ">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=features-view">View Feature</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=features-new">Add Feature</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room Category</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=room-category-view">View Room Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=room-category-new">Add Room Category</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dining Item</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=dining-item-view">View Dining</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=dining-item-new">Add Dining</a></li>
                </ul>
            </li>
            <!-- <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Offers</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=offers-view">View All Offer</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=offers-new">Add Offer</a></li>
                </ul>
            </li> -->
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">payment methods</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=payment-method-new">Add New Method</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=payment-method-view">View Method</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">country</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=country-view">View country</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=country-new">Add country</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">city</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?u=city-view">View city</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?u=city-new">Add city</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
