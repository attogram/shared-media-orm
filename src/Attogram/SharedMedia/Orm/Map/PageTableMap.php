<?php

namespace Attogram\SharedMedia\Orm\Map;

use Attogram\SharedMedia\Orm\Page;
use Attogram\SharedMedia\Orm\PageQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'page' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Attogram.SharedMedia.Orm.Map.PageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'page';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Attogram\\SharedMedia\\Orm\\Page';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Attogram.SharedMedia.Orm.Page';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'page.id';

    /**
     * the column name for the source_id field
     */
    const COL_SOURCE_ID = 'page.source_id';

    /**
     * the column name for the pageid field
     */
    const COL_PAGEID = 'page.pageid';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'page.title';

    /**
     * the column name for the displaytitle field
     */
    const COL_DISPLAYTITLE = 'page.displaytitle';

    /**
     * the column name for the page_image_free field
     */
    const COL_PAGE_IMAGE_FREE = 'page.page_image_free';

    /**
     * the column name for the wikibase_item field
     */
    const COL_WIKIBASE_ITEM = 'page.wikibase_item';

    /**
     * the column name for the disambiguation field
     */
    const COL_DISAMBIGUATION = 'page.disambiguation';

    /**
     * the column name for the defaultsort field
     */
    const COL_DEFAULTSORT = 'page.defaultsort';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'page.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'page.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'SourceId', 'Pageid', 'Title', 'Displaytitle', 'PageImageFree', 'WikibaseItem', 'Disambiguation', 'Defaultsort', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'sourceId', 'pageid', 'title', 'displaytitle', 'pageImageFree', 'wikibaseItem', 'disambiguation', 'defaultsort', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(PageTableMap::COL_ID, PageTableMap::COL_SOURCE_ID, PageTableMap::COL_PAGEID, PageTableMap::COL_TITLE, PageTableMap::COL_DISPLAYTITLE, PageTableMap::COL_PAGE_IMAGE_FREE, PageTableMap::COL_WIKIBASE_ITEM, PageTableMap::COL_DISAMBIGUATION, PageTableMap::COL_DEFAULTSORT, PageTableMap::COL_CREATED_AT, PageTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'source_id', 'pageid', 'title', 'displaytitle', 'page_image_free', 'wikibase_item', 'disambiguation', 'defaultsort', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'SourceId' => 1, 'Pageid' => 2, 'Title' => 3, 'Displaytitle' => 4, 'PageImageFree' => 5, 'WikibaseItem' => 6, 'Disambiguation' => 7, 'Defaultsort' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sourceId' => 1, 'pageid' => 2, 'title' => 3, 'displaytitle' => 4, 'pageImageFree' => 5, 'wikibaseItem' => 6, 'disambiguation' => 7, 'defaultsort' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
        self::TYPE_COLNAME       => array(PageTableMap::COL_ID => 0, PageTableMap::COL_SOURCE_ID => 1, PageTableMap::COL_PAGEID => 2, PageTableMap::COL_TITLE => 3, PageTableMap::COL_DISPLAYTITLE => 4, PageTableMap::COL_PAGE_IMAGE_FREE => 5, PageTableMap::COL_WIKIBASE_ITEM => 6, PageTableMap::COL_DISAMBIGUATION => 7, PageTableMap::COL_DEFAULTSORT => 8, PageTableMap::COL_CREATED_AT => 9, PageTableMap::COL_UPDATED_AT => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'source_id' => 1, 'pageid' => 2, 'title' => 3, 'displaytitle' => 4, 'page_image_free' => 5, 'wikibase_item' => 6, 'disambiguation' => 7, 'defaultsort' => 8, 'created_at' => 9, 'updated_at' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('page');
        $this->setPhpName('Page');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Attogram\\SharedMedia\\Orm\\Page');
        $this->setPackage('Attogram.SharedMedia.Orm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('source_id', 'SourceId', 'INTEGER', 'source', 'id', false, null, null);
        $this->addColumn('pageid', 'Pageid', 'INTEGER', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('displaytitle', 'Displaytitle', 'VARCHAR', false, 255, null);
        $this->addColumn('page_image_free', 'PageImageFree', 'VARCHAR', false, 255, null);
        $this->addColumn('wikibase_item', 'WikibaseItem', 'VARCHAR', false, 255, null);
        $this->addColumn('disambiguation', 'Disambiguation', 'VARCHAR', false, 255, null);
        $this->addColumn('defaultsort', 'Defaultsort', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Source', '\\Attogram\\SharedMedia\\Orm\\Source', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':source_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('C2P', '\\Attogram\\SharedMedia\\Orm\\C2P', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':page_id',
    1 => ':id',
  ),
), null, null, 'C2Ps', false);
        $this->addRelation('M2P', '\\Attogram\\SharedMedia\\Orm\\M2P', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':page_id',
    1 => ':id',
  ),
), null, null, 'M2Ps', false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PageTableMap::CLASS_DEFAULT : PageTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Page object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PageTableMap::OM_CLASS;
            /** @var Page $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PageTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Page $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PageTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PageTableMap::COL_ID);
            $criteria->addSelectColumn(PageTableMap::COL_SOURCE_ID);
            $criteria->addSelectColumn(PageTableMap::COL_PAGEID);
            $criteria->addSelectColumn(PageTableMap::COL_TITLE);
            $criteria->addSelectColumn(PageTableMap::COL_DISPLAYTITLE);
            $criteria->addSelectColumn(PageTableMap::COL_PAGE_IMAGE_FREE);
            $criteria->addSelectColumn(PageTableMap::COL_WIKIBASE_ITEM);
            $criteria->addSelectColumn(PageTableMap::COL_DISAMBIGUATION);
            $criteria->addSelectColumn(PageTableMap::COL_DEFAULTSORT);
            $criteria->addSelectColumn(PageTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(PageTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.source_id');
            $criteria->addSelectColumn($alias . '.pageid');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.displaytitle');
            $criteria->addSelectColumn($alias . '.page_image_free');
            $criteria->addSelectColumn($alias . '.wikibase_item');
            $criteria->addSelectColumn($alias . '.disambiguation');
            $criteria->addSelectColumn($alias . '.defaultsort');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PageTableMap::DATABASE_NAME)->getTable(PageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Page or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Page object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Attogram\SharedMedia\Orm\Page) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PageTableMap::DATABASE_NAME);
            $criteria->add(PageTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the page table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Page or Criteria object.
     *
     * @param mixed               $criteria Criteria or Page object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Page object
        }

        if ($criteria->containsKey(PageTableMap::COL_ID) && $criteria->keyContainsValue(PageTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PageTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PageTableMap::buildTableMap();
