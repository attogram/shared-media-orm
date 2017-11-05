<?php // attogram/shared-media-orm - sandbox.php - v0.0.2

use Attogram\SharedMedia\Api\Sources;
use Attogram\SharedMedia\Sandbox\Sandbox;

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

$sandbox->setTitle('shared-media-orm');

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
]);

$sandbox->setVersions([
    //'Attogram\SharedMedia\Orm\Category',
    'Attogram\SharedMedia\Orm\CategoryQuery',
    //'Attogram\SharedMedia\Orm\Media',
    'Attogram\SharedMedia\Orm\MediaQuery',
    //'Attogram\SharedMedia\Orm\Page',
    'Attogram\SharedMedia\Orm\PageQuery',
    //'Attogram\SharedMedia\Orm\C2M',
    //'Attogram\SharedMedia\Orm\C2MQuery',
    //'Attogram\SharedMedia\Orm\C2P',
    //'Attogram\SharedMedia\Orm\C2PQuery',
    //'Attogram\SharedMedia\Orm\M2P',
    //'Attogram\SharedMedia\Orm\M2PQuery',
    'Attogram\SharedMedia\Api\Transport',
    'Attogram\SharedMedia\Api\Base',
    'Attogram\SharedMedia\Api\Category',
    'Attogram\SharedMedia\Api\Media',
    'Attogram\SharedMedia\Api\Page',
    'Attogram\SharedMedia\Api\Tools',
    'Attogram\SharedMedia\Api\Sources',
    'Attogram\SharedMedia\Sandbox\Sandbox',
    'Attogram\SharedMedia\Sandbox\Tools',
    'Attogram\SharedMedia\Sandbox\Logger',
]);

$sandbox->setSources(Sources::$sources);

$sandbox->play();
