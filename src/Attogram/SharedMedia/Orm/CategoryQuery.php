<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Category as ApiCategory;
use Attogram\SharedMedia\Orm\Base\CategoryQuery as BaseCategoryQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'category' table.
 */
class CategoryQuery extends BaseCategoryQuery
{
    const VERSION = '0.0.2';

    public $category;
    public $pageid;
    public $title;

    public function __construct($logger = null)
    {
        $this->category = new ApiCategory($logger);
    }

    public function setIdentifiers()
    {
        $this->category->pageid = $this->pageid;
        $this->category->title = $this->title;
    }

    public function search($query)
    {
        return $this->category->search($query);
    }

    public function info()
    {
        $this->setIdentifiers();
        return $this->category->info();
    }

    public function subcats()
    {
        $this->setIdentifiers();
        return $this->category->subcats();
    }

    public function getCategoryfromPage()
    {
        $this->setIdentifiers();
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
