<?php

namespace Attogram\SharedMedia\Orm;

/**
 * API Trait v0.0.1
 */
trait ApiTrait
{
    /** @var \Attogram\SharedMedia\Api\Base $api */
    public $api;

    /**
     * @param string|int $pageids
     */
    public function setApiPageid($pageids)
    {
        $this->api->setPageid($pageids);
    }

    /**
     * @param string|int $titles
     */
    public function setApiTitle($titles)
    {
        $this->api->setTitle($titles);
    }

    /**
     * @param string|int $limit
     */
    public function setApiLimit($limit)
    {
        $this->api->setLimit($limit);
    }

    /**
     * @param string $endpoint
     */
    public function setApiEndpoint($endpoint)
    {
        $this->api->setEndpoint($endpoint);
    }
}