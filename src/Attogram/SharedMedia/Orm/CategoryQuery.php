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
    const VERSION = '1.0.4';

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

    public function info()
    {
        return $this->getCategoriesFromApiResponse($this->api->info());
    }

    public function subcats()
    {
        return $this->getCategoriesFromApiResponse($this->api->subcats());
    }

    public function getCategoryfromPage()
    {
        return $this->getCategoriesFromApiResponse($this->api->getCategoryfromPage());
    }

    protected function getCategoriesFromApiResponse($response)
    {
        $categories = [];
        foreach ($response as $category) {
            if (empty($category)) {
                continue;
            }
            $categories[] = $this->getCategoryFromApiResponse($category);
        }
        return $categories;
    }

    protected function getCategoryFromApiResponse($response)
    {
        $fields = [
            ['pageid', 'setPageid'],
            ['title',  'setTitle'],
            ['files',  'setFiles'],
            ['pages',  'setPages'],
            ['size',   'setSize'],
            ['hidden', 'setHidden'],
        ];
        $category = new Category();
        foreach ($fields as list($field, $setter)) {
            if (isset($response[$field])) {
                $category->{$setter}($response[$field]);
            }
        }
        return $category;
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
