<?php
/**
 * Include required file for application
 */

//Include config file for environment value
require_once '../Application/Config/Config.php';

//Include bootstrap file to run application
require_once '../Application/Core/Application.php';

require_once '../vendor/autoload.php';
//Include base controller
require_once '../Application/Core/Controller.php';

/**
 * Call bootstrap file
 */

$app = new Application();

