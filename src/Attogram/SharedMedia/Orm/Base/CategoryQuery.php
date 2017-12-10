<?php

namespace Attogram\SharedMedia\Orm\Base;

use \Exception;
use \PDO;
use Attogram\SharedMedia\Orm\Category as ChildCategory;
use Attogram\SharedMedia\Orm\CategoryQuery as ChildCategoryQuery;
use Attogram\SharedMedia\Orm\Map\CategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;

/**
 * Base class that represents a query for the 'category' table.
 *
 *
 *
 * @method     ChildCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCategoryQuery orderBySourceid($order = Criteria::ASC) Order by the sourceid column
 * @method     ChildCategoryQuery orderByPageid($order = Criteria::ASC) Order by the pageid column
 * @method     ChildCategoryQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildCategoryQuery orderByFiles($order = Criteria::ASC) Order by the files column
 * @method     ChildCategoryQuery orderBySubcats($order = Criteria::ASC) Order by the subcats column
 * @method     ChildCategoryQuery orderByPages($order = Criteria::ASC) Order by the pages column
 * @method     ChildCategoryQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     ChildCategoryQuery orderByHidden($order = Criteria::ASC) Order by the hidden column
 * @method     ChildCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildCategoryQuery orderByTreeLeft($order = Criteria::ASC) Order by the tree_left column
 * @method     ChildCategoryQuery orderByTreeRight($order = Criteria::ASC) Order by the tree_right column
 * @method     ChildCategoryQuery orderByTreeLevel($order = Criteria::ASC) Order by the tree_level column
 *
 * @method     ChildCategoryQuery groupById() Group by the id column
 * @method     ChildCategoryQuery groupBySourceid() Group by the sourceid column
 * @method     ChildCategoryQuery groupByPageid() Group by the pageid column
 * @method     ChildCategoryQuery groupByTitle() Group by the title column
 * @method     ChildCategoryQuery groupByFiles() Group by the files column
 * @method     ChildCategoryQuery groupBySubcats() Group by the subcats column
 * @method     ChildCategoryQuery groupByPages() Group by the pages column
 * @method     ChildCategoryQuery groupBySize() Group by the size column
 * @method     ChildCategoryQuery groupByHidden() Group by the hidden column
 * @method     ChildCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildCategoryQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildCategoryQuery groupByTreeLeft() Group by the tree_left column
 * @method     ChildCategoryQuery groupByTreeRight() Group by the tree_right column
 * @method     ChildCategoryQuery groupByTreeLevel() Group by the tree_level column
 *
 * @method     ChildCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCategoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCategoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCategoryQuery leftJoinSource($relationAlias = null) Adds a LEFT JOIN clause to the query using the Source relation
 * @method     ChildCategoryQuery rightJoinSource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Source relation
 * @method     ChildCategoryQuery innerJoinSource($relationAlias = null) Adds a INNER JOIN clause to the query using the Source relation
 *
 * @method     ChildCategoryQuery joinWithSource($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Source relation
 *
 * @method     ChildCategoryQuery leftJoinWithSource() Adds a LEFT JOIN clause and with to the query using the Source relation
 * @method     ChildCategoryQuery rightJoinWithSource() Adds a RIGHT JOIN clause and with to the query using the Source relation
 * @method     ChildCategoryQuery innerJoinWithSource() Adds a INNER JOIN clause and with to the query using the Source relation
 *
 * @method     ChildCategoryQuery leftJoinC2M($relationAlias = null) Adds a LEFT JOIN clause to the query using the C2M relation
 * @method     ChildCategoryQuery rightJoinC2M($relationAlias = null) Adds a RIGHT JOIN clause to the query using the C2M relation
 * @method     ChildCategoryQuery innerJoinC2M($relationAlias = null) Adds a INNER JOIN clause to the query using the C2M relation
 *
 * @method     ChildCategoryQuery joinWithC2M($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the C2M relation
 *
 * @method     ChildCategoryQuery leftJoinWithC2M() Adds a LEFT JOIN clause and with to the query using the C2M relation
 * @method     ChildCategoryQuery rightJoinWithC2M() Adds a RIGHT JOIN clause and with to the query using the C2M relation
 * @method     ChildCategoryQuery innerJoinWithC2M() Adds a INNER JOIN clause and with to the query using the C2M relation
 *
 * @method     ChildCategoryQuery leftJoinC2P($relationAlias = null) Adds a LEFT JOIN clause to the query using the C2P relation
 * @method     ChildCategoryQuery rightJoinC2P($relationAlias = null) Adds a RIGHT JOIN clause to the query using the C2P relation
 * @method     ChildCategoryQuery innerJoinC2P($relationAlias = null) Adds a INNER JOIN clause to the query using the C2P relation
 *
 * @method     ChildCategoryQuery joinWithC2P($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the C2P relation
 *
 * @method     ChildCategoryQuery leftJoinWithC2P() Adds a LEFT JOIN clause and with to the query using the C2P relation
 * @method     ChildCategoryQuery rightJoinWithC2P() Adds a RIGHT JOIN clause and with to the query using the C2P relation
 * @method     ChildCategoryQuery innerJoinWithC2P() Adds a INNER JOIN clause and with to the query using the C2P relation
 *
 * @method     \Attogram\SharedMedia\Orm\SourceQuery|\Attogram\SharedMedia\Orm\C2MQuery|\Attogram\SharedMedia\Orm\C2PQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCategory findOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query
 * @method     ChildCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategory matching the query, or a new ChildCategory object populated from the query conditions when no match is found
 *
 * @method     ChildCategory findOneById(int $id) Return the first ChildCategory filtered by the id column
 * @method     ChildCategory findOneBySourceid(int $sourceid) Return the first ChildCategory filtered by the sourceid column
 * @method     ChildCategory findOneByPageid(int $pageid) Return the first ChildCategory filtered by the pageid column
 * @method     ChildCategory findOneByTitle(string $title) Return the first ChildCategory filtered by the title column
 * @method     ChildCategory findOneByFiles(int $files) Return the first ChildCategory filtered by the files column
 * @method     ChildCategory findOneBySubcats(int $subcats) Return the first ChildCategory filtered by the subcats column
 * @method     ChildCategory findOneByPages(int $pages) Return the first ChildCategory filtered by the pages column
 * @method     ChildCategory findOneBySize(int $size) Return the first ChildCategory filtered by the size column
 * @method     ChildCategory findOneByHidden(boolean $hidden) Return the first ChildCategory filtered by the hidden column
 * @method     ChildCategory findOneByCreatedAt(string $created_at) Return the first ChildCategory filtered by the created_at column
 * @method     ChildCategory findOneByUpdatedAt(string $updated_at) Return the first ChildCategory filtered by the updated_at column
 * @method     ChildCategory findOneByTreeLeft(int $tree_left) Return the first ChildCategory filtered by the tree_left column
 * @method     ChildCategory findOneByTreeRight(int $tree_right) Return the first ChildCategory filtered by the tree_right column
 * @method     ChildCategory findOneByTreeLevel(int $tree_level) Return the first ChildCategory filtered by the tree_level column *

 * @method     ChildCategory requirePk($key, ConnectionInterface $con = null) Return the ChildCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategory requireOneById(int $id) Return the first ChildCategory filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneBySourceid(int $sourceid) Return the first ChildCategory filtered by the sourceid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByPageid(int $pageid) Return the first ChildCategory filtered by the pageid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTitle(string $title) Return the first ChildCategory filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByFiles(int $files) Return the first ChildCategory filtered by the files column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneBySubcats(int $subcats) Return the first ChildCategory filtered by the subcats column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByPages(int $pages) Return the first ChildCategory filtered by the pages column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneBySize(int $size) Return the first ChildCategory filtered by the size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByHidden(boolean $hidden) Return the first ChildCategory filtered by the hidden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByCreatedAt(string $created_at) Return the first ChildCategory filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByUpdatedAt(string $updated_at) Return the first ChildCategory filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTreeLeft(int $tree_left) Return the first ChildCategory filtered by the tree_left column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTreeRight(int $tree_right) Return the first ChildCategory filtered by the tree_right column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTreeLevel(int $tree_level) Return the first ChildCategory filtered by the tree_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCategory objects based on current ModelCriteria
 * @method     ChildCategory[]|ObjectCollection findById(int $id) Return ChildCategory objects filtered by the id column
 * @method     ChildCategory[]|ObjectCollection findBySourceid(int $sourceid) Return ChildCategory objects filtered by the sourceid column
 * @method     ChildCategory[]|ObjectCollection findByPageid(int $pageid) Return ChildCategory objects filtered by the pageid column
 * @method     ChildCategory[]|ObjectCollection findByTitle(string $title) Return ChildCategory objects filtered by the title column
 * @method     ChildCategory[]|ObjectCollection findByFiles(int $files) Return ChildCategory objects filtered by the files column
 * @method     ChildCategory[]|ObjectCollection findBySubcats(int $subcats) Return ChildCategory objects filtered by the subcats column
 * @method     ChildCategory[]|ObjectCollection findByPages(int $pages) Return ChildCategory objects filtered by the pages column
 * @method     ChildCategory[]|ObjectCollection findBySize(int $size) Return ChildCategory objects filtered by the size column
 * @method     ChildCategory[]|ObjectCollection findByHidden(boolean $hidden) Return ChildCategory objects filtered by the hidden column
 * @method     ChildCategory[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildCategory objects filtered by the created_at column
 * @method     ChildCategory[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildCategory objects filtered by the updated_at column
 * @method     ChildCategory[]|ObjectCollection findByTreeLeft(int $tree_left) Return ChildCategory objects filtered by the tree_left column
 * @method     ChildCategory[]|ObjectCollection findByTreeRight(int $tree_right) Return ChildCategory objects filtered by the tree_right column
 * @method     ChildCategory[]|ObjectCollection findByTreeLevel(int $tree_level) Return ChildCategory objects filtered by the tree_level column
 * @method     ChildCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Attogram\SharedMedia\Orm\Base\CategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Attogram\\SharedMedia\\Orm\\Category', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCategoryQuery) {
            return $criteria;
        }
        $query = new ChildCategoryQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CategoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sourceid, pageid, title, files, subcats, pages, size, hidden, created_at, updated_at, tree_left, tree_right, tree_level FROM category WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCategory $obj */
            $obj = new ChildCategory();
            $obj->hydrate($row);
            CategoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sourceid column
     *
     * Example usage:
     * <code>
     * $query->filterBySourceid(1234); // WHERE sourceid = 1234
     * $query->filterBySourceid(array(12, 34)); // WHERE sourceid IN (12, 34)
     * $query->filterBySourceid(array('min' => 12)); // WHERE sourceid > 12
     * </code>
     *
     * @see       filterBySource()
     *
     * @param     mixed $sourceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterBySourceid($sourceid = null, $comparison = null)
    {
        if (is_array($sourceid)) {
            $useMinMax = false;
            if (isset($sourceid['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_SOURCEID, $sourceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourceid['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_SOURCEID, $sourceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_SOURCEID, $sourceid, $comparison);
    }

    /**
     * Filter the query on the pageid column
     *
     * Example usage:
     * <code>
     * $query->filterByPageid(1234); // WHERE pageid = 1234
     * $query->filterByPageid(array(12, 34)); // WHERE pageid IN (12, 34)
     * $query->filterByPageid(array('min' => 12)); // WHERE pageid > 12
     * </code>
     *
     * @param     mixed $pageid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPageid($pageid = null, $comparison = null)
    {
        if (is_array($pageid)) {
            $useMinMax = false;
            if (isset($pageid['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_PAGEID, $pageid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pageid['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_PAGEID, $pageid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_PAGEID, $pageid, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the files column
     *
     * Example usage:
     * <code>
     * $query->filterByFiles(1234); // WHERE files = 1234
     * $query->filterByFiles(array(12, 34)); // WHERE files IN (12, 34)
     * $query->filterByFiles(array('min' => 12)); // WHERE files > 12
     * </code>
     *
     * @param     mixed $files The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByFiles($files = null, $comparison = null)
    {
        if (is_array($files)) {
            $useMinMax = false;
            if (isset($files['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_FILES, $files['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($files['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_FILES, $files['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_FILES, $files, $comparison);
    }

    /**
     * Filter the query on the subcats column
     *
     * Example usage:
     * <code>
     * $query->filterBySubcats(1234); // WHERE subcats = 1234
     * $query->filterBySubcats(array(12, 34)); // WHERE subcats IN (12, 34)
     * $query->filterBySubcats(array('min' => 12)); // WHERE subcats > 12
     * </code>
     *
     * @param     mixed $subcats The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterBySubcats($subcats = null, $comparison = null)
    {
        if (is_array($subcats)) {
            $useMinMax = false;
            if (isset($subcats['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_SUBCATS, $subcats['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subcats['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_SUBCATS, $subcats['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_SUBCATS, $subcats, $comparison);
    }

    /**
     * Filter the query on the pages column
     *
     * Example usage:
     * <code>
     * $query->filterByPages(1234); // WHERE pages = 1234
     * $query->filterByPages(array(12, 34)); // WHERE pages IN (12, 34)
     * $query->filterByPages(array('min' => 12)); // WHERE pages > 12
     * </code>
     *
     * @param     mixed $pages The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPages($pages = null, $comparison = null)
    {
        if (is_array($pages)) {
            $useMinMax = false;
            if (isset($pages['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_PAGES, $pages['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pages['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_PAGES, $pages['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_PAGES, $pages, $comparison);
    }

    /**
     * Filter the query on the size column
     *
     * Example usage:
     * <code>
     * $query->filterBySize(1234); // WHERE size = 1234
     * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
     * $query->filterBySize(array('min' => 12)); // WHERE size > 12
     * </code>
     *
     * @param     mixed $size The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_SIZE, $size, $comparison);
    }

    /**
     * Filter the query on the hidden column
     *
     * Example usage:
     * <code>
     * $query->filterByHidden(true); // WHERE hidden = true
     * $query->filterByHidden('yes'); // WHERE hidden = true
     * </code>
     *
     * @param     boolean|string $hidden The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByHidden($hidden = null, $comparison = null)
    {
        if (is_string($hidden)) {
            $hidden = in_array(strtolower($hidden), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CategoryTableMap::COL_HIDDEN, $hidden, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the tree_left column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeLeft(1234); // WHERE tree_left = 1234
     * $query->filterByTreeLeft(array(12, 34)); // WHERE tree_left IN (12, 34)
     * $query->filterByTreeLeft(array('min' => 12)); // WHERE tree_left > 12
     * </code>
     *
     * @param     mixed $treeLeft The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTreeLeft($treeLeft = null, $comparison = null)
    {
        if (is_array($treeLeft)) {
            $useMinMax = false;
            if (isset($treeLeft['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEFT, $treeLeft['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeLeft['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEFT, $treeLeft['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TREE_LEFT, $treeLeft, $comparison);
    }

    /**
     * Filter the query on the tree_right column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeRight(1234); // WHERE tree_right = 1234
     * $query->filterByTreeRight(array(12, 34)); // WHERE tree_right IN (12, 34)
     * $query->filterByTreeRight(array('min' => 12)); // WHERE tree_right > 12
     * </code>
     *
     * @param     mixed $treeRight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTreeRight($treeRight = null, $comparison = null)
    {
        if (is_array($treeRight)) {
            $useMinMax = false;
            if (isset($treeRight['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_RIGHT, $treeRight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeRight['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_RIGHT, $treeRight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TREE_RIGHT, $treeRight, $comparison);
    }

    /**
     * Filter the query on the tree_level column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeLevel(1234); // WHERE tree_level = 1234
     * $query->filterByTreeLevel(array(12, 34)); // WHERE tree_level IN (12, 34)
     * $query->filterByTreeLevel(array('min' => 12)); // WHERE tree_level > 12
     * </code>
     *
     * @param     mixed $treeLevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTreeLevel($treeLevel = null, $comparison = null)
    {
        if (is_array($treeLevel)) {
            $useMinMax = false;
            if (isset($treeLevel['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEVEL, $treeLevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeLevel['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEVEL, $treeLevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TREE_LEVEL, $treeLevel, $comparison);
    }

    /**
     * Filter the query by a related \Attogram\SharedMedia\Orm\Source object
     *
     * @param \Attogram\SharedMedia\Orm\Source|ObjectCollection $source The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterBySource($source, $comparison = null)
    {
        if ($source instanceof \Attogram\SharedMedia\Orm\Source) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_SOURCEID, $source->getId(), $comparison);
        } elseif ($source instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CategoryTableMap::COL_SOURCEID, $source->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySource() only accepts arguments of type \Attogram\SharedMedia\Orm\Source or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Source relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinSource($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Source');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Source');
        }

        return $this;
    }

    /**
     * Use the Source relation Source object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Attogram\SharedMedia\Orm\SourceQuery A secondary query class using the current class as primary query
     */
    public function useSourceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSource($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Source', '\Attogram\SharedMedia\Orm\SourceQuery');
    }

    /**
     * Filter the query by a related \Attogram\SharedMedia\Orm\C2M object
     *
     * @param \Attogram\SharedMedia\Orm\C2M|ObjectCollection $c2M the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByC2M($c2M, $comparison = null)
    {
        if ($c2M instanceof \Attogram\SharedMedia\Orm\C2M) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_ID, $c2M->getCategoryId(), $comparison);
        } elseif ($c2M instanceof ObjectCollection) {
            return $this
                ->useC2MQuery()
                ->filterByPrimaryKeys($c2M->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByC2M() only accepts arguments of type \Attogram\SharedMedia\Orm\C2M or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the C2M relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinC2M($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('C2M');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'C2M');
        }

        return $this;
    }

    /**
     * Use the C2M relation C2M object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Attogram\SharedMedia\Orm\C2MQuery A secondary query class using the current class as primary query
     */
    public function useC2MQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinC2M($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'C2M', '\Attogram\SharedMedia\Orm\C2MQuery');
    }

    /**
     * Filter the query by a related \Attogram\SharedMedia\Orm\C2P object
     *
     * @param \Attogram\SharedMedia\Orm\C2P|ObjectCollection $c2P the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByC2P($c2P, $comparison = null)
    {
        if ($c2P instanceof \Attogram\SharedMedia\Orm\C2P) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_ID, $c2P->getCategoryId(), $comparison);
        } elseif ($c2P instanceof ObjectCollection) {
            return $this
                ->useC2PQuery()
                ->filterByPrimaryKeys($c2P->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByC2P() only accepts arguments of type \Attogram\SharedMedia\Orm\C2P or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the C2P relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function joinC2P($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('C2P');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'C2P');
        }

        return $this;
    }

    /**
     * Use the C2P relation C2P object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Attogram\SharedMedia\Orm\C2PQuery A secondary query class using the current class as primary query
     */
    public function useC2PQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinC2P($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'C2P', '\Attogram\SharedMedia\Orm\C2PQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCategory $category Object to remove from the list of results
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function prune($category = null)
    {
        if ($category) {
            $this->addUsingAlias(CategoryTableMap::COL_ID, $category->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoryTableMap::clearInstancePool();
            CategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CategoryTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CategoryTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CategoryTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CategoryTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CategoryTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CategoryTableMap::COL_CREATED_AT);
    }

    // nested_set behavior

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     ChildCategory $category The object to use for descendant search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function descendantsOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     ChildCategory $category The object to use for branch search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function branchOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     ChildCategory $category The object to use for child search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function childrenOf(ChildCategory $category)
    {
        return $this
            ->descendantsOf($category)
            ->addUsingAlias(ChildCategory::LEVEL_COL, $category->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     ChildCategory $category The object to use for sibling search
     * @param      ConnectionInterface $con Connection to use.
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function siblingsOf(ChildCategory $category, ConnectionInterface $con = null)
    {
        if ($category->isRoot()) {
            return $this->
                add(ChildCategory::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($category->getParent($con))
                ->prune($category);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     ChildCategory $category The object to use for ancestors search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function ancestorsOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(ChildCategory::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     ChildCategory $category The object to use for roots search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function rootsOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(ChildCategory::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(ChildCategory::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(ChildCategory::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(ChildCategory::LEVEL_COL)
                ->addDescendingOrderByColumn(ChildCategory::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(ChildCategory::LEVEL_COL)
                ->addAscendingOrderByColumn(ChildCategory::LEFT_COL);
        }
    }

    /**
     * Returns the root node for the tree
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return     ChildCategory The tree root object
     */
    public function findRoot(ConnectionInterface $con = null)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, 1, Criteria::EQUAL)
            ->findOne($con);
    }

    /**
     * Returns the tree of objects
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return     ChildCategory[]|ObjectCollection|mixed the list of results, formatted by the current formatter
     */
    public function findTree(ConnectionInterface $con = null)
    {
        return $this
            ->orderByBranch()
            ->find($con);
    }

    /**
     * Returns the root node for a given scope
     *
     * @param      ConnectionInterface $con    Connection to use.
     * @return     ChildCategory            Propel object for root node
     */
    static public function retrieveRoot(ConnectionInterface $con = null)
    {
        $c = new Criteria(CategoryTableMap::DATABASE_NAME);
        $c->add(ChildCategory::LEFT_COL, 1, Criteria::EQUAL);

        return ChildCategoryQuery::create(null, $c)->findOne($con);
    }

    /**
     * Returns the whole tree node for a given scope
     *
     * @param      Criteria $criteria    Optional Criteria to filter the query
     * @param      ConnectionInterface $con    Connection to use.
     * @return     ChildCategory[]|ObjectCollection|mixed the list of results, formatted by the current formatter
     */
    static public function retrieveTree(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        if (null === $criteria) {
            $criteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        }
        $criteria->addAscendingOrderByColumn(ChildCategory::LEFT_COL);

        return ChildCategoryQuery::create(null, $criteria)->find($con);
    }

    /**
     * Tests if node is valid
     *
     * @param      ChildCategory $node    Propel object for src node
     * @return     bool
     */
    static public function isValid(ChildCategory $node = null)
    {
        if (is_object($node) && $node->getRightValue() > $node->getLeftValue()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete an entire tree
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return     int  The number of deleted nodes
     */
    static public function deleteTree(ConnectionInterface $con = null)
    {

        return CategoryTableMap::doDeleteAll($con);
    }

    /**
     * Adds $delta to all L and R values that are >= $first and <= $last.
     * '$delta' can also be negative.
     *
     * @param int $delta               Value to be shifted by, can be negative
     * @param int $first               First node to be shifted
     * @param int $last                Last node to be shifted (optional)
     * @param ConnectionInterface $con Connection to use.
     */
    static public function shiftRLValues($delta, $first, $last = null, ConnectionInterface $con = null)
    {
        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        // Shift left column values
        $whereCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ChildCategory::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ChildCategory::LEFT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);

        $valuesCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $valuesCriteria->add(ChildCategory::LEFT_COL, array('raw' => ChildCategory::LEFT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        $whereCriteria->doUpdate($valuesCriteria, $con);

        // Shift right column values
        $whereCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ChildCategory::RIGHT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ChildCategory::RIGHT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);

        $valuesCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $valuesCriteria->add(ChildCategory::RIGHT_COL, array('raw' => ChildCategory::RIGHT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        $whereCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Adds $delta to level for nodes having left value >= $first and right value <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta        Value to be shifted by, can be negative
     * @param      int $first        First node to be shifted
     * @param      int $last            Last node to be shifted
     * @param      ConnectionInterface $con        Connection to use.
     */
    static public function shiftLevel($delta, $first, $last, ConnectionInterface $con = null)
    {
        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        $whereCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $whereCriteria->add(ChildCategory::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        $whereCriteria->add(ChildCategory::RIGHT_COL, $last, Criteria::LESS_EQUAL);

        $valuesCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $valuesCriteria->add(ChildCategory::LEVEL_COL, array('raw' => ChildCategory::LEVEL_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        $whereCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Reload all already loaded nodes to sync them with updated db
     *
     * @param      ChildCategory $prune        Object to prune from the update
     * @param      ConnectionInterface $con        Connection to use.
     */
    static public function updateLoadedNodes($prune = null, ConnectionInterface $con = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            $keys = array();
            /** @var $obj ChildCategory */
            foreach (CategoryTableMap::$instances as $obj) {
                if (!$prune || !$prune->equals($obj)) {
                    $keys[] = $obj->getPrimaryKey();
                }
            }

            if (!empty($keys)) {
                // We don't need to alter the object instance pool; we're just modifying these ones
                // already in the pool.
                $criteria = new Criteria(CategoryTableMap::DATABASE_NAME);
                $criteria->add(CategoryTableMap::COL_ID, $keys, Criteria::IN);
                $dataFetcher = ChildCategoryQuery::create(null, $criteria)->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
                while ($row = $dataFetcher->fetch()) {
                    $key = CategoryTableMap::getPrimaryKeyHashFromRow($row, 0);
                    /** @var $object ChildCategory */
                    if (null !== ($object = CategoryTableMap::getInstanceFromPool($key))) {
                        $object->setLeftValue($row[11]);
                        $object->setRightValue($row[12]);
                        $object->setLevel($row[13]);
                        $object->clearNestedSetChildren();
                    }
                }
                $dataFetcher->close();
            }
        }
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      int $left    left column value
     * @param      mixed $prune    Object to prune from the shift
     * @param      ConnectionInterface $con    Connection to use.
     */
    static public function makeRoomForLeaf($left, $prune = null, ConnectionInterface $con = null)
    {
        // Update database nodes
        ChildCategoryQuery::shiftRLValues(2, $left, null, $con);

        // Update all loaded nodes
        ChildCategoryQuery::updateLoadedNodes($prune, $con);
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      ConnectionInterface $con    Connection to use.
     */
    static public function fixLevels(ConnectionInterface $con = null)
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(ChildCategory::LEFT_COL);
        $dataFetcher = ChildCategoryQuery::create(null, $c)->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);

        // set the class once to avoid overhead in the loop
        $cls = CategoryTableMap::getOMClass(false);
        $level = null;
        // iterate over the statement
        while ($row = $dataFetcher->fetch()) {

            // hydrate object
            $key = CategoryTableMap::getPrimaryKeyHashFromRow($row, 0);
            /** @var $obj ChildCategory */
            if (null === ($obj = CategoryTableMap::getInstanceFromPool($key))) {
                $obj = new $cls();
                $obj->hydrate($row);
                CategoryTableMap::addInstanceToPool($obj, $key);
            }

            // compute level
            // Algorithm shamelessly stolen from sfPropelActAsNestedSetBehaviorPlugin
            // Probably authored by Tristan Rivoallan
            if ($level === null) {
                $level = 0;
                $i = 0;
                $prev = array($obj->getRightValue());
            } else {
                while ($obj->getRightValue() > $prev[$i]) {
                    $i--;
                }
                $level = ++$i;
                $prev[$i] = $obj->getRightValue();
            }

            // update level in node if necessary
            if ($obj->getLevel() !== $level) {
                $obj->setLevel($level);
                $obj->save($con);
            }
        }
        $dataFetcher->close();
    }

} // CategoryQuery
