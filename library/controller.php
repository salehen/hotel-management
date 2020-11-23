<?php
 require "includes/menu.php";
if (isset($_GET["v"])) {
    if (file_exists("views/common/{$_GET['v']}.php")) {
        require "views/common/{$_GET['v']}.php";
    } else {
        require "views/common/404.php";
    }
} elseif (isset($_GET["u"]) && isset($_SESSION['type']) && $_SESSION['type'] == 1 ) {
    
        if (file_exists("views/admin/{$_GET['u']}.php")) {
            require "views/admin/{$_GET['u']}.php";
        } else {
            require "views/common/404.php";
        }
    
} elseif (isset($_GET["c"]) && isset($_SESSION['type']) && ($_SESSION['type'] == 1 || $_SESSION['type'] == 2)) {
  
        if (file_exists("views/customer/{$_GET['c']}.php")) {
            require "views/customer/{$_GET['c']}.php";
        } else {
            require "views/common/404.php";
        }
    
} else {
    require "views/common/home.php";
}
require "includes/footer.php";