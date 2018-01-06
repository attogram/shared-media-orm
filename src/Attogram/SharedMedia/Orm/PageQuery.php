<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Page as ApiPage;
use Attogram\SharedMedia\Api\Tools as ApiTools;
use Attogram\SharedMedia\Orm\Base\PageQuery as BasePageQuery;

/**
 * subclass for performing query and update operations on the 'page' table.
 */
class PageQuery extends BasePageQuery
{
    use ApiTrait;

    const VERSION = '1.0.7';

    public function __construct($logger = null)
    {
        parent::__construct();
        $this->api = new ApiPage($logger);
    }

    /**
     * search for pages
     *
     * @param string $query  Search query
     * @return array         An array of ORM Page objects
     */
    public function search($query)
    {
        return $this->getPagesFromApiResponse($this->api->search($query));
    }

    public function info()
    {
        return $this->getPagesFromApiResponse($this->api->info());
    }

    protected function getPagesFromApiResponse($response)
    {
        $pages = [];
        foreach ($response as $page) {
            if (empty($page)) {
                continue;
            }
            $pages[] = $this->getPageFromApiResponse($page);
        }
        return $pages;
    }

    protected function getPageFromApiResponse($response)
    {
        return $this->setItemFromApiResponse(
            new Page(),
            $this->getPageFields(),
            $response
        );
    }

    /**
     * @return array
     */
    private function getPageFields()
    {
        return $this->getFields([
            ['displaytitle', 'setDisplaytitle'],
            ['page_image_free', 'setPageImageFree'],
            ['wikibase_item', 'setWikibaseItem'],
            ['disambiguation', 'setDisambiguation'],
            ['defaultsort', 'setDefaultsort'],
        ]);
    }

    /**
     * format a page response as an HTML string
     *
     * @param array $response
     * @return string
     */
    public function format(array $response)
    {
        $car = '<br />';
        $format = '';
        foreach ($response as $page) {
            $format .= '<div class="page"><span class="title">'
            . ApiTools::safeString($page->getTitle()) . '</span>'
            .$car . 'pageid: <span class="pageid">' . $page->getPageid() . '</span>'
            .$car . 'displaytitle: ' . ApiTools::safeString($page->getDisplaytitle())
            .$car . 'page_image_free: ' . $page->getPageImageFree()
            .$car . 'wikibase_item: ' . $page->getWikibaseItem()
            .$car . 'disambiguation: ' . $page->getDisambiguation()
            .$car . 'defaultsort: ' . $page->getDefaultsort()
            .'</div>';
        }
        return $format;
    }
}
