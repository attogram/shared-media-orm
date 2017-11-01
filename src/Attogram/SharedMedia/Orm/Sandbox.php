<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Sandbox as ApiSandbox;

class Sandbox extends ApiSandbox
{
    const VERSION = '0.0.2';

    public $sandboxTitle = 'shared-media-orm';
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
}
