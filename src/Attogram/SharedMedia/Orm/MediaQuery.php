<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Media as ApiMedia;
use Attogram\SharedMedia\Orm\Base\MediaQuery as BaseMediaQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'media' table.
 */
class MediaQuery extends BaseMediaQuery
{
    const VERSION = '1.0.0';

    public $api;
    public $logger;

    public function __construct($logger = null)
    {
        $this->api = new ApiMedia($logger);
        $this->logger = $this->api->logger;
    }

    public function __call($name, $arguments = null)
    {
        if (!is_callable([$this->api, $name])) {
            return false;
        }
        if (empty($arguments)) {
            return $this->api->{$name}();
        }
        return $this->api->{$name}($arguments[0]);
    }
}
