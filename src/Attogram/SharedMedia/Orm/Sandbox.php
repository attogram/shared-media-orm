<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Orm\Category as OrmCategory;
use Attogram\SharedMedia\Orm\CategoryQuery;
use Attogram\SharedMedia\Orm\Media as OrmMedia;
use Attogram\SharedMedia\Orm\MediaQuery;
use Attogram\SharedMedia\Orm\Page as OrmPage;
use Attogram\SharedMedia\Orm\PageQuery;
use Attogram\SharedMedia\Orm\C2M;
use Attogram\SharedMedia\Orm\C2MQuery;
use Attogram\SharedMedia\Orm\C2P;
use Attogram\SharedMedia\Orm\C2PQuery;
use Attogram\SharedMedia\Orm\M2P;
use Attogram\SharedMedia\Orm\M2PQuery;

use Attogram\SharedMedia\Api\Transport;
use Attogram\SharedMedia\Api\Base;
use Attogram\SharedMedia\Api\Category;
use Attogram\SharedMedia\Api\Media;
use Attogram\SharedMedia\Api\Page;
use Attogram\SharedMedia\Api\Sources;
use Attogram\SharedMedia\Api\Tools;
use Attogram\SharedMedia\Api\Logger;
use Attogram\SharedMedia\Api\Sandbox as ApiSandbox;

class Sandbox extends ApiSandbox
{
    const VERSION = '0.0.1';

    public $methods = [ // Class, Method, Has Arg, Use Identifiers

        ['Category', 'search',              'query',  false],
        ['Category', 'info',                false,    true],
        ['Category', 'subcats',             false,    true],
        ['Category', 'getCategoryfromPage', false,    true],

        ['Media',    'search',              'query',  false],
        ['Media',    'info',                false,    true],
        ['Media',    'getMediaInCategory',  false,    true],
        ['Media',    'getMediaOnPage',      false,    true],

        ['Page',     'search',              'query',  false],
    ];

    public function getHeader()
    {
        return '<!DOCTYPE html><html><head>'
        .'<meta charset="UTF-8">'
        .'<meta name="viewport" content="initial-scale=1" />'
        .'<meta http-equiv="X-UA-Compatible" content="IE=edge" />'
        .'<link rel="stylesheet" type="text/css" href="sandbox.css" />'
        .'<title>shared-media-orm / sandbox</title>'
        .'</head><body><h1><a href="./">shared-media-orm</a></h1><h2><a href="'.$this->self.'">sandbox</a></h2>';
    }

    public function getFooter()
    {
        return '<footer><hr /><a href="./">shared-media-orm</a> : <a href="'.$this->self.'">sandbox</a>'
        .'<pre>Attogram\SharedMedia\Orm'
        .'<br />Category      v'.OrmCategory::VERSION
        .'<br />CategoryQuery v'.CategoryQuery::VERSION
        .'<br />Media         v'.OrmMedia::VERSION
        .'<br />MediaQuery    v'.MediaQuery::VERSION
        .'<br />Page          v'.OrmPage::VERSION
        .'<br />PageQuery     v'.PageQuery::VERSION
        .'<br />C2M           v'.C2M::VERSION
        .'<br />C2MQuery      v'.C2MQuery::VERSION
        .'<br />C2P           v'.C2P::VERSION
        .'<br />C2PQuery      v'.C2PQuery::VERSION
        .'<br />M2P           v'.M2P::VERSION
        .'<br />M2PQuery      v'.M2PQuery::VERSION
        .'<br />Sandbox       v'.self::VERSION
        .'<br /><br />Attogram\SharedMedia\Api'
        .'<br />Transport v'.Transport::VERSION
        .'<br />Base      v'.Base::VERSION
        .'<br />Category  v'.Category::VERSION
        .'<br />Media     v'.Media::VERSION
        .'<br />Page      v'.Page::VERSION
        .'<br />Tools     v'.Tools::VERSION
        .'<br />Sources   v'.Sources::VERSION
        .'<br />Logger    v'.Logger::VERSION
        .'<br />Sandbox   v'.ApiSandbox::VERSION
        .'</pre></footer></body></html>';
    }
}
