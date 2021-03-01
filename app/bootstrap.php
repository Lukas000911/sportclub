<?php

//Load Config
require_once 'config/config.php';

require_once 'helpers/sessionStart.php';


//Autoload Core Libruaries
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
