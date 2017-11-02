<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Page as ApiPage;
use Attogram\SharedMedia\Orm\Base\PageQuery as BasePageQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'page' table.
 */
class PageQuery extends BasePageQuery
{
    const VERSION = '0.0.3';

    public $page;

    public function __construct($logger = null)
    {
        $this->page = new ApiPage($logger);
    }

    /**
     * @param int $pageid
     */
    public function setPageid($pageid = null)
    {
        $this->page->setPageid($pageid);
    }

    /**
     * @param string $title
     */
    public function setTitle($title = null)
    {
        $this->page->setTitle($title);
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
