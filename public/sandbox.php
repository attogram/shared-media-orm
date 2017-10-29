<?php // attogram/shared-media-orm - sandbox.php - v0.0.1

use Attogram\SharedMedia\Api\Sandbox;

$autoload = '../vendor/autoload.php';
if (!is_readable($autoload)) {
    print 'ERROR: Autoloader not found: ' . $autoload;
    return false;
}
require_once($autoload);

$sandbox = new Sandbox();
$sandbox->play();
