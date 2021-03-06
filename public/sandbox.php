<?php // attogram/shared-media-orm - sandbox.php - v1.1.3

use Attogram\SharedMedia\Api\Sources;
use Attogram\SharedMedia\Sandbox\Sandbox;

$lib = '../vendor/autoload.php';
if (!is_readable($lib)) {
    print 'ERROR: Autoloader Not Found: ' . $lib;
    return false;
}
require_once($lib);

$lib = '../config/config.php';
if (!is_readable($lib)) {
    print 'ERROR: Propel Config Not Found: ' . $lib;
    return false;
}
require_once($lib);

if (!class_exists('Attogram\SharedMedia\Sandbox\Sandbox')) {
    print 'ERROR: Sandbox Class Not Found';
    return false;
}

$sandbox = new Sandbox('shared-media-orm');

$sandbox->setMethods([
    ['Attogram\SharedMedia\Orm\CategoryQuery', 'search',              'query',  false],
    ['Attogram\SharedMedia\Orm\CategoryQuery', 'info',                false,    true],
    ['Attogram\SharedMedia\Orm\CategoryQuery', 'subcats',             false,    true],
    ['Attogram\SharedMedia\Orm\CategoryQuery', 'getCategoryfromPage', false,    true],
    ['Attogram\SharedMedia\Orm\MediaQuery',    'search',              'query',  false],
    ['Attogram\SharedMedia\Orm\MediaQuery',    'info',                false,    true],
    ['Attogram\SharedMedia\Orm\MediaQuery',    'getMediaInCategory',  false,    true],
    ['Attogram\SharedMedia\Orm\MediaQuery',    'getMediaOnPage',      false,    true],
    ['Attogram\SharedMedia\Orm\PageQuery',     'search',              'query',  false],
    ['Attogram\SharedMedia\Orm\PageQuery',     'info',                false,    true],
]);

$sandbox->setSources(Sources::$sources);

$sandbox->setPreCall([
    ['setApiPageid', 'pageids'],      // Set the pageid identifier
    ['setApiTitle', 'titles'],        // Set the title identifier
    ['setApiEndpoint', 'endpoint'],   // Set the API endpoint
    ['setApiLimit', 'limit'],         // Set the # of responses to get
]);

$sandbox->play();
