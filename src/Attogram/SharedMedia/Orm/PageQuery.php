<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Page as ApiPage;
use Attogram\SharedMedia\Orm\Base\PageQuery as BasePageQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'page' table.
 */
class PageQuery extends BasePageQuery
{
    const VERSION = '0.0.4';

    public $api;

    public function __construct($logger = null)
    {
        $this->api = new ApiPage($logger);
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
