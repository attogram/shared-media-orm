<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Sandbox as ApiSandbox;
use Attogram\SharedMedia\Orm\CategoryQuery;
use Attogram\SharedMedia\Orm\MediaQuery;
use Attogram\SharedMedia\Orm\PageQuery;

class Sandbox extends ApiSandbox
{
    const VERSION = '0.0.3';

    public $sandboxTitle = 'shared-media-orm';
    public $methods = [ // Class, Method, Has Arg, Use Identifiers
        ['CategoryQuery', 'search',              'query',  false],
        ['CategoryQuery', 'info',                false,    true],
        ['CategoryQuery', 'subcats',             false,    true],
        ['CategoryQuery', 'getCategoryfromPage', false,    true],
        ['MediaQuery',    'search',              'query',  false],
        ['MediaQuery',    'info',                false,    true],
        ['MediaQuery',    'getMediaInCategory',  false,    true],
        ['MediaQuery',    'getMediaOnPage',      false,    true],
        ['PageQuery',     'search',              'query',  false],
    ];
    public $versions = [
        'Attogram\SharedMedia\Orm\Category',
        'Attogram\SharedMedia\Orm\CategoryQuery',
        'Attogram\SharedMedia\Orm\Media',
        'Attogram\SharedMedia\Orm\MediaQuery',
        'Attogram\SharedMedia\Orm\Page',
        'Attogram\SharedMedia\Orm\PageQuery',
        'Attogram\SharedMedia\Orm\C2M',
        'Attogram\SharedMedia\Orm\C2MQuery',
        'Attogram\SharedMedia\Orm\C2P',
        'Attogram\SharedMedia\Orm\C2PQuery',
        'Attogram\SharedMedia\Orm\M2P',
        'Attogram\SharedMedia\Orm\M2PQuery',
        'Attogram\SharedMedia\Orm\Sandbox',
        'Attogram\SharedMedia\Api\Transport',
        'Attogram\SharedMedia\Api\Base',
        'Attogram\SharedMedia\Api\Category',
        'Attogram\SharedMedia\Api\Media',
        'Attogram\SharedMedia\Api\Page',
        'Attogram\SharedMedia\Api\Tools',
        'Attogram\SharedMedia\Api\Sources',
        'Attogram\SharedMedia\Api\Logger',
        'Attogram\SharedMedia\Api\Sandbox',
    ];
    public $versionsPad = 38;

    public function getClass()
    {
        switch ($this->class) {
            case 'CategoryQuery':
                return new CategoryQuery($this->logger);
            case 'MediaQuery':
                return new MediaQuery($this->logger);
            case 'PageQuery':
                return new PageQuery($this->logger);
            default:
                return new \StdClass();
        }
    }
}
