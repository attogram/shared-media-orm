<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Category as ApiCategory;
use Attogram\SharedMedia\Api\Tools as ApiTools;
use Attogram\SharedMedia\Orm\Base\CategoryQuery as BaseCategoryQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'category' table.
 */
class CategoryQuery extends BaseCategoryQuery
{
    const VERSION = '1.0.1';

    public $api;

    public function __construct($logger = null)
    {
        parent::__construct();
        $this->api = new ApiCategory($logger);
    }

    /**
     * search for categories
     *
     * @param string $query  Search query
     * @return array         An array of ORM Category objects
     */
    public function search($query)
    {
        return $this->getCategoriesFromApiResponse($this->api->search($query));
    }

    protected function getCategoriesFromApiResponse($response)
    {
        $categories = [];
        foreach ($response as $apiCategory) {
            if (empty($apiCategory)) {
                continue;
            }
            $category = new Category();
            if (isset($apiCategory['pageid'])) {
                $category->setPageid($apiCategory['pageid']);
            }
            if (isset($apiCategory['title'])) {
                $category->setTitle($apiCategory['title']);
            }
            if (isset($apiCategory['files'])) {
                $category->setFiles($apiCategory['files']);
            }
            if (isset($apiCategory['pages'])) {
                $category->setPages($apiCategory['pages']);
            }
            if (isset($apiCategory['size'])) {
                $category->setSize($apiCategory['size']);
            }
            if (isset($apiCategory['hidden'])) {
                $category->setHidden($apiCategory['hidden']);
            }
            $categories[] = $category;
        }
        return $categories;
    }

    /**
     * format a category response as an HTML string
     *
     * @param array $response
     * @return string
     */
    public function format(array $response)
    {
        $car = '<br />';
        $format = '';
        foreach ($response as $category) {
            $format .= '<div class="category">'
            . '<span class="title">' . ApiTools::safeString($category->getTitle()) . '</span>'
            .$car.'pageid: ' . '<span class="pageid">' . $category->getPageid() . '</span>'
            .$car.'files: ' . $category->getFiles()
            .$car.'pages: ' . $category->getPages()
            .$car.'subcats: ' . $category->getSubcats()
            .$car.'size: ' . $category->getSize()
            .$car.'hidden: ' . ($category->getHidden() ? 'true' : 'false')
            .'</div>';
        }
        return $format;
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
