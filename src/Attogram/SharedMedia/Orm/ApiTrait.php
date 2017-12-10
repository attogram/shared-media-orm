<?php

namespace Attogram\SharedMedia\Orm;

/**
 * API Trait v0.0.5
 */
trait ApiTrait
{
    /** @var object $api */
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

    /**
     * @return array
     */
    public function getApiFields()
    {
        return [
            ['pageid', 'setPageid'],
            ['title', 'setTitle'],
        ];
    }

    /**
     * @param array $fields
     * @return array
     */
    public function getFields($fields)
    {
        return array_merge(
            $this->getApiFields(),
            $fields
        );
    }

    /**
     * @param object $orm
     * @param array  $fields
     * @param array  $response
     */
    protected function setItemFromApiResponse($orm, $fields, $response)
    {
        foreach ($fields as list($field, $setter)) {
            if (isset($response[$field])) {
                $orm->{$setter}($response[$field]);
            }
        }
        return $orm;
    }
}
