<?php

namespace Attogram\SharedMedia\Orm\Map;

use Attogram\SharedMedia\Orm\Category;
use Attogram\SharedMedia\Orm\CategoryQuery;
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
 * This class defines the structure of the 'category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CategoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Attogram.SharedMedia.Orm.Map.CategoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'category';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Attogram\\SharedMedia\\Orm\\Category';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Attogram.SharedMedia.Orm.Category';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'category.id';

    /**
     * the column name for the sourceid field
     */
    const COL_SOURCEID = 'category.sourceid';

    /**
     * the column name for the pageid field
     */
    const COL_PAGEID = 'category.pageid';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'category.title';

    /**
     * the column name for the files field
     */
    const COL_FILES = 'category.files';

    /**
     * the column name for the subcats field
     */
    const COL_SUBCATS = 'category.subcats';

    /**
     * the column name for the pages field
     */
    const COL_PAGES = 'category.pages';

    /**
     * the column name for the size field
     */
    const COL_SIZE = 'category.size';

    /**
     * the column name for the hidden field
     */
    const COL_HIDDEN = 'category.hidden';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'category.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'category.updated_at';

    /**
     * the column name for the tree_left field
     */
    const COL_TREE_LEFT = 'category.tree_left';

    /**
     * the column name for the tree_right field
     */
    const COL_TREE_RIGHT = 'category.tree_right';

    /**
     * the column name for the tree_level field
     */
    const COL_TREE_LEVEL = 'category.tree_level';

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
        self::TYPE_PHPNAME       => array('Id', 'Sourceid', 'Pageid', 'Title', 'Files', 'Subcats', 'Pages', 'Size', 'Hidden', 'CreatedAt', 'UpdatedAt', 'TreeLeft', 'TreeRight', 'TreeLevel', ),
        self::TYPE_CAMELNAME     => array('id', 'sourceid', 'pageid', 'title', 'files', 'subcats', 'pages', 'size', 'hidden', 'createdAt', 'updatedAt', 'treeLeft', 'treeRight', 'treeLevel', ),
        self::TYPE_COLNAME       => array(CategoryTableMap::COL_ID, CategoryTableMap::COL_SOURCEID, CategoryTableMap::COL_PAGEID, CategoryTableMap::COL_TITLE, CategoryTableMap::COL_FILES, CategoryTableMap::COL_SUBCATS, CategoryTableMap::COL_PAGES, CategoryTableMap::COL_SIZE, CategoryTableMap::COL_HIDDEN, CategoryTableMap::COL_CREATED_AT, CategoryTableMap::COL_UPDATED_AT, CategoryTableMap::COL_TREE_LEFT, CategoryTableMap::COL_TREE_RIGHT, CategoryTableMap::COL_TREE_LEVEL, ),
        self::TYPE_FIELDNAME     => array('id', 'sourceid', 'pageid', 'title', 'files', 'subcats', 'pages', 'size', 'hidden', 'created_at', 'updated_at', 'tree_left', 'tree_right', 'tree_level', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sourceid' => 1, 'Pageid' => 2, 'Title' => 3, 'Files' => 4, 'Subcats' => 5, 'Pages' => 6, 'Size' => 7, 'Hidden' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, 'TreeLeft' => 11, 'TreeRight' => 12, 'TreeLevel' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sourceid' => 1, 'pageid' => 2, 'title' => 3, 'files' => 4, 'subcats' => 5, 'pages' => 6, 'size' => 7, 'hidden' => 8, 'createdAt' => 9, 'updatedAt' => 10, 'treeLeft' => 11, 'treeRight' => 12, 'treeLevel' => 13, ),
        self::TYPE_COLNAME       => array(CategoryTableMap::COL_ID => 0, CategoryTableMap::COL_SOURCEID => 1, CategoryTableMap::COL_PAGEID => 2, CategoryTableMap::COL_TITLE => 3, CategoryTableMap::COL_FILES => 4, CategoryTableMap::COL_SUBCATS => 5, CategoryTableMap::COL_PAGES => 6, CategoryTableMap::COL_SIZE => 7, CategoryTableMap::COL_HIDDEN => 8, CategoryTableMap::COL_CREATED_AT => 9, CategoryTableMap::COL_UPDATED_AT => 10, CategoryTableMap::COL_TREE_LEFT => 11, CategoryTableMap::COL_TREE_RIGHT => 12, CategoryTableMap::COL_TREE_LEVEL => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sourceid' => 1, 'pageid' => 2, 'title' => 3, 'files' => 4, 'subcats' => 5, 'pages' => 6, 'size' => 7, 'hidden' => 8, 'created_at' => 9, 'updated_at' => 10, 'tree_left' => 11, 'tree_right' => 12, 'tree_level' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('category');
        $this->setPhpName('Category');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Attogram\\SharedMedia\\Orm\\Category');
        $this->setPackage('Attogram.SharedMedia.Orm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('sourceid', 'Sourceid', 'INTEGER', 'source', 'id', false, null, null);
        $this->addColumn('pageid', 'Pageid', 'INTEGER', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('files', 'Files', 'INTEGER', false, null, null);
        $this->addColumn('subcats', 'Subcats', 'INTEGER', false, null, null);
        $this->addColumn('pages', 'Pages', 'INTEGER', false, null, null);
        $this->addColumn('size', 'Size', 'INTEGER', false, null, null);
        $this->addColumn('hidden', 'Hidden', 'BOOLEAN', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('tree_left', 'TreeLeft', 'INTEGER', false, null, null);
        $this->addColumn('tree_right', 'TreeRight', 'INTEGER', false, null, null);
        $this->addColumn('tree_level', 'TreeLevel', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Source', '\\Attogram\\SharedMedia\\Orm\\Source', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':sourceid',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('C2M', '\\Attogram\\SharedMedia\\Orm\\C2M', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':category_id',
    1 => ':id',
  ),
), null, null, 'C2Ms', false);
        $this->addRelation('C2P', '\\Attogram\\SharedMedia\\Orm\\C2P', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':category_id',
    1 => ':id',
  ),
), null, null, 'C2Ps', false);
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
            'nested_set' => array('left_column' => 'tree_left', 'right_column' => 'tree_right', 'level_column' => 'tree_level', 'use_scope' => 'false', 'scope_column' => 'tree_scope', 'method_proxies' => 'false', ),
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
        return $withPrefix ? CategoryTableMap::CLASS_DEFAULT : CategoryTableMap::OM_CLASS;
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
     * @return array           (Category object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CategoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CategoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CategoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CategoryTableMap::OM_CLASS;
            /** @var Category $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CategoryTableMap::addInstanceToPool($obj, $key);
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
            $key = CategoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CategoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Category $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CategoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CategoryTableMap::COL_ID);
            $criteria->addSelectColumn(CategoryTableMap::COL_SOURCEID);
            $criteria->addSelectColumn(CategoryTableMap::COL_PAGEID);
            $criteria->addSelectColumn(CategoryTableMap::COL_TITLE);
            $criteria->addSelectColumn(CategoryTableMap::COL_FILES);
            $criteria->addSelectColumn(CategoryTableMap::COL_SUBCATS);
            $criteria->addSelectColumn(CategoryTableMap::COL_PAGES);
            $criteria->addSelectColumn(CategoryTableMap::COL_SIZE);
            $criteria->addSelectColumn(CategoryTableMap::COL_HIDDEN);
            $criteria->addSelectColumn(CategoryTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(CategoryTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(CategoryTableMap::COL_TREE_LEFT);
            $criteria->addSelectColumn(CategoryTableMap::COL_TREE_RIGHT);
            $criteria->addSelectColumn(CategoryTableMap::COL_TREE_LEVEL);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sourceid');
            $criteria->addSelectColumn($alias . '.pageid');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.files');
            $criteria->addSelectColumn($alias . '.subcats');
            $criteria->addSelectColumn($alias . '.pages');
            $criteria->addSelectColumn($alias . '.size');
            $criteria->addSelectColumn($alias . '.hidden');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.tree_left');
            $criteria->addSelectColumn($alias . '.tree_right');
            $criteria->addSelectColumn($alias . '.tree_level');
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
        return Propel::getServiceContainer()->getDatabaseMap(CategoryTableMap::DATABASE_NAME)->getTable(CategoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CategoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CategoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CategoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Category or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Category object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Attogram\SharedMedia\Orm\Category) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CategoryTableMap::DATABASE_NAME);
            $criteria->add(CategoryTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CategoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CategoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CategoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CategoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Category or Criteria object.
     *
     * @param mixed               $criteria Criteria or Category object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Category object
        }

        if ($criteria->containsKey(CategoryTableMap::COL_ID) && $criteria->keyContainsValue(CategoryTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CategoryTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CategoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CategoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CategoryTableMap::buildTableMap();
