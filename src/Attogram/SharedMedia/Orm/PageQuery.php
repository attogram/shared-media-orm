<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Page as ApiPage;
use Attogram\SharedMedia\Orm\Base\PageQuery as BasePageQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'page' table.
 */
class PageQuery extends BasePageQuery
{
    const VERSION = '0.0.2';

    public $page;
    public $pageid;
    public $title;

    public function __construct($logger = null)
    {
        $this->page = new ApiPage($logger);
    }

    public function setIdentifiers()
    {
        $this->page->pageid = $this->pageid;
        $this->page->title = $this->title;
    }

    public function search($query)
    {
        return $this->page->search($query);
    }

    public function setEndpoint($endpoint)
    {
        return $this->page->setEndpoint($endpoint);
    }

    public function setLimit($limit)
    {
        return $this->page->setLimit($limit);
    }
}
