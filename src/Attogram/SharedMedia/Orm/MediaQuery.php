<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Media as ApiMedia;
use Attogram\SharedMedia\Api\Tools as ApiTools;
use Attogram\SharedMedia\Orm\Base\MediaQuery as BaseMediaQuery;

/**
 * subclass for performing query and update operations on the 'media' table.
 */
class MediaQuery extends BaseMediaQuery
{
    use ApiTrait;

    const VERSION = '1.0.3';

    public function __construct($logger = null)
    {
        parent::__construct();
        $this->api = new ApiMedia($logger);
    }

    /**
     * search for media
     *
     * @param string $query  Search query
     * @return array         An array of ORM Media objects
     */
    public function search($query)
    {
        return $this->getMediasFromApiResponse($this->api->search($query));
    }

    public function info()
    {
        return $this->getMediasFromApiResponse($this->api->info());
    }

    public function getMediaInCategory()
    {
        return $this->getMediasFromApiResponse($this->api->getMediaInCategory());
    }

    public function getMediaOnPage()
    {
        return $this->getMediasFromApiResponse($this->api->getMediaOnPage());
    }

    protected function getMediasFromApiResponse($response)
    {
        $medias = [];
        foreach ($response as $media) {
            if (empty($media)) {
                continue;
            }
            $medias[] = $this->getMediaFromApiResponse($media);
        }
        return $medias;
    }

    protected function getMediaFromApiResponse($response)
    {
        $media = new Media();
        foreach ($this->getMediaFields() as list($field, $setter)) {
            if (isset($response[$field])) {
                $media->{$setter}($response[$field]);
            }
        }
        return $media;
    }

    /**
     * @return array
     */
    private function getMediaFields()
    {
        return [
            ['pageid', 'setPageid'],
            ['title',  'setTitle'],
            ['url', 'setUrl'],
            ['mime', 'setMime'],
            ['width', 'setWidth'],
            ['height', 'setHeight'],
            ['size', 'setSize'],
            ['sha1', 'setSha1'],
            ['thumburl', 'setThumburl'],
            ['thumbmime', 'setThumbmime'],
            ['thumbwidth', 'setThumbwidth'],
            ['thumbheight', 'setThumbheight'],
            ['thumbsize', 'setThumbsize'],
            ['descriptionurl', 'setDescriptionurl'],
            ['descriptionurlshort', 'setDescriptionurlshort'],
            ['imagedescription', 'setImagedescription'],
            ['datetimeoriginal', 'setDatetimeoriginal'],
            ['artist', 'setArtist'],
            ['licenseshortname', 'setLicenseshortname'],
            ['usageterms', 'setUsageterms'],
            ['attributionrequired', 'setAttributionrequired'],
            ['restrictions', 'setRestrictions'],
            ['timestamp', 'setTimestamp'],
            ['user', 'setUser'],
            ['userid', 'setUserid'],
        ];
    }

    /**
     * format a media response as an HTML string
     *
     * @param array $response
     * @return string
     */
    public function format(array $response)
    {
        $car = '<br />';
        $format = '';
        foreach ($response as $media) {
            $format .= '<div class="media">'
            . '<img'
            . ' src="' . $media->getThumburl() . '"'
            . ' width="' . $media->getThumbwidth() . '"'
            . ' height="' . $media->getThumbheight() . '"'
            . ' title="'.ApiTools::safeString(print_r($media, true)).'">'
            . $car . '<span class="pageid">' . $media->getPageid() . '</span>'
            . $car . '<span class="title">'
            . ApiTools::safeString($media->getTitle())
            . '</span>'
            . '</div>';
        }
        return $format;
    }
}
