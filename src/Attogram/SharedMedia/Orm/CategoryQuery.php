<?php

namespace Attogram\SharedMedia\Orm;

use Attogram\SharedMedia\Api\Category as ApiCategory;
use Attogram\SharedMedia\Api\Tools as ApiTools;
use Attogram\SharedMedia\Orm\Base\CategoryQuery as BaseCategoryQuery;

/**
 * subclass for performing query and update operations on the 'category' table.
 */
class CategoryQuery extends BaseCategoryQuery
{
    use ApiTrait;

    const VERSION = '1.0.12';

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
		return $this->setItemFromApiResponse(new Category(), 'getCategoryFields', $response);
    }

    /**
     * @return array
     */
    private function getCategoryFields()
    {
        return array_merge($this->getApiFields(), [
            ['files',   'setFiles'],
            ['subcats', 'setSubcats'],
            ['pages',   'setPages'],
            ['size',    'setSize'],
            ['hidden',  'setHidden'],
        ]);
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
            $format .= '<div class="category"><span class="title">'
            . ApiTools::safeString($category->getTitle()) . '</span>'
            .$car . 'pageid: <span class="pageid">' . $category->getPageid() . '</span>'
            .$car . 'files: ' . $category->getFiles()
            .$car . 'pages: ' . $category->getPages()
            .$car . 'subcats: ' . $category->getSubcats()
            .$car . 'size: ' . $category->getSize()
            .$car . 'hidden: ' . ($category->getHidden() ? 'true' : 'false')
            .'</div>';
        }
        return $format;
    }
}
