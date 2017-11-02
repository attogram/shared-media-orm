<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Media as ApiMedia;
use Attogram\SharedMedia\Orm\Base\MediaQuery as BaseMediaQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'media' table.
 */
class MediaQuery extends BaseMediaQuery
{
    const VERSION = '0.0.3';

    public $media;

    public function __construct($logger = null)
    {
        $this->media = new ApiMedia($logger);
    }

    /**
     * @param int $pageid
     */
    public function setPageid($pageid = null)
    {
        $this->media->setPageid($pageid);
    }

    /**
     * @param string $title
     */
    public function setTitle($title = null)
    {
        $this->media->setTitle($title);
    }

    public function search($query)
    {
        return $this->media->search($query);
    }

    public function info()
    {
        return $this->media->info();
    }

    public function getMediaInCategory()
    {
        return $this->media->getMediaInCategory();
    }

    public function getMediaOnPage()
    {
        return $this->media->getMediaOnPage();
    }

    public function setEndpoint($endpoint)
    {
        return $this->media->setEndpoint($endpoint);
    }

    public function setLimit($limit)
    {
        return $this->media->setLimit($limit);
    }
}
