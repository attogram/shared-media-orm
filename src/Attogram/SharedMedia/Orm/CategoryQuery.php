<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Category as ApiCategory;
use Attogram\SharedMedia\Orm\Base\CategoryQuery as BaseCategoryQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'category' table.
 */
class CategoryQuery extends BaseCategoryQuery
{
    const VERSION = '0.0.3';

    public $category;

    public function __construct($logger = null)
    {
        $this->category = new ApiCategory($logger);
    }

    /**
     * @param int $pageid
     */
    public function setPageid($pageid = null)
    {
        $this->category->setPageid($pageid);
    }

    /**
     * @param string $title
     */
    public function setTitle($title = null)
    {
        $this->category->setTitle($title);
    }

    public function search($query)
    {
        return $this->category->search($query);
    }

    public function info()
    {
        return $this->category->info();
    }

    public function subcats()
    {
        return $this->category->subcats();
    }

    public function getCategoryfromPage()
    {
        return $this->category->getCategoryfromPage();
    }

    public function setEndpoint($endpoint)
    {
        return $this->category->setEndpoint($endpoint);
    }

    public function setLimit($limit)
    {
        return $this->category->setLimit($limit);
    }
}
