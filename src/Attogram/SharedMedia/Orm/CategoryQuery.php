<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Category as ApiCategory;
use Attogram\SharedMedia\Orm\Base\CategoryQuery as BaseCategoryQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'category' table.
 */
class CategoryQuery extends BaseCategoryQuery
{
    const VERSION = '0.0.4';

    public $api;

    public function __construct($logger = null)
    {
        $this->api = new ApiCategory($logger);
    }

    public function __call($name, $arguments = null) {
        if (!is_callable([$this->api, $name])) {
            return false;
        }
        if (empty($arguments)) {
            return $this->api->{$name}();
        }
        return $this->api->{$name}($arguments[0]);
    }
}
