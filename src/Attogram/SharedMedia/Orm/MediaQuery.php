<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Media as ApiMedia;
use Attogram\SharedMedia\Orm\Base\MediaQuery as BaseMediaQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'media' table.
 */
class MediaQuery extends BaseMediaQuery
{
    const VERSION = '0.0.2';

    public $media;
    public $pageid;
    public $title;

    public function __construct($logger = null)
    {
        $this->media = new ApiMedia($logger);
    }

    public function setIdentifiers()
    {
        $this->media->pageid = $this->pageid;
        $this->media->title = $this->title;
    }

    public function search($query)
    {
        return $this->media->search($query);
    }

    public function info()
    {
        $this->setIdentifiers();
        return $this->media->info();
    }

    public function getMediaInCategory()
    {
        $this->setIdentifiers();
        return $this->media->getMediaInCategory();
    }

    public function getMediaOnPage()
    {
        $this->setIdentifiers();
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
