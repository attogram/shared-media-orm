<?php // attogram/shared-media-orm - sandbox.php - v0.0.1

use Attogram\SharedMedia\Orm\Sandbox;

$lib = '../vendor/autoload.php';
if (!is_readable($lib)) {
    print 'ERROR: Autoloader not found: ' . $lib;
    return false;
}
require_once($lib);

$lib = '../config/config.php';
if (!is_readable($lib)) {
    print 'ERROR: Propel config not found: ' . $lib;
    return false;
}
require_once($lib);

$sandbox = new Sandbox();
$sandbox->play();
