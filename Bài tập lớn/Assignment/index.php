<?php
require_once 'system/config/config.php';

// https://viblo.asia/p/php-autoloading-psr4-and-composer-V3m5Wy0QZO7
spl_autoload_register(function($className){   
    include_once PATH_SYSTEM . "/core/$className.php";
});

spl_autoload_register(function ($className) {
    include_once PATH_SYSTEM . "/core/$className.php";
});

Router::load();

?>