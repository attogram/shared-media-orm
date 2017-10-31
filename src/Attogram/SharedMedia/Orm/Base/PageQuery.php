<?php

namespace Attogram\SharedMedia\Orm\Base;

use \Exception;
use \PDO;
use Attogram\SharedMedia\Orm\Page as ChildPage;
use Attogram\SharedMedia\Orm\PageQuery as ChildPageQuery;
use Attogram\SharedMedia\Orm\Map\PageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'page' table.
 *
 *
 *
 * @method     ChildPageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPageQuery orderByPageid($order = Criteria::ASC) Order by the pageid column
 * @method     ChildPageQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildPageQuery orderByDisplaytitle($order = Criteria::ASC) Order by the displaytitle column
 * @method     ChildPageQuery orderByPageImageFree($order = Criteria::ASC) Order by the page_image_free column
 * @method     ChildPageQuery orderByWikibaseItem($order = Criteria::ASC) Order by the wikibase_item column
 * @method     ChildPageQuery orderByDisambiguation($order = Criteria::ASC) Order by the disambiguation column
 * @method     ChildPageQuery orderByDefaultsort($order = Criteria::ASC) Order by the defaultsort column
 *
 * @method     ChildPageQuery groupById() Group by the id column
 * @method     ChildPageQuery groupByPageid() Group by the pageid column
 * @method     ChildPageQuery groupByTitle() Group by the title column
 * @method     ChildPageQuery groupByDisplaytitle() Group by the displaytitle column
 * @method     ChildPageQuery groupByPageImageFree() Group by the page_image_free column
 * @method     ChildPageQuery groupByWikibaseItem() Group by the wikibase_item column
 * @method     ChildPageQuery groupByDisambiguation() Group by the disambiguation column
 * @method     ChildPageQuery groupByDefaultsort() Group by the defaultsort column
 *
 * @method     ChildPageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPageQuery leftJoinC2P($relationAlias = null) Adds a LEFT JOIN clause to the query using the C2P relation
 * @method     ChildPageQuery rightJoinC2P($relationAlias = null) Adds a RIGHT JOIN clause to the query using the C2P relation
 * @method     ChildPageQuery innerJoinC2P($relationAlias = null) Adds a INNER JOIN clause to the query using the C2P relation
 *
 * @method     ChildPageQuery joinWithC2P($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the C2P relation
 *
 * @method     ChildPageQuery leftJoinWithC2P() Adds a LEFT JOIN clause and with to the query using the C2P relation
 * @method     ChildPageQuery rightJoinWithC2P() Adds a RIGHT JOIN clause and with to the query using the C2P relation
 * @method     ChildPageQuery innerJoinWithC2P() Adds a INNER JOIN clause and with to the query using the C2P relation
 *
 * @method     ChildPageQuery leftJoinM2P($relationAlias = null) Adds a LEFT JOIN clause to the query using the M2P relation
 * @method     ChildPageQuery rightJoinM2P($relationAlias = null) Adds a RIGHT JOIN clause to the query using the M2P relation
 * @method     ChildPageQuery innerJoinM2P($relationAlias = null) Adds a INNER JOIN clause to the query using the M2P relation
 *
 * @method     ChildPageQuery joinWithM2P($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the M2P relation
 *
 * @method     ChildPageQuery leftJoinWithM2P() Adds a LEFT JOIN clause and with to the query using the M2P relation
 * @method     ChildPageQuery rightJoinWithM2P() Adds a RIGHT JOIN clause and with to the query using the M2P relation
 * @method     ChildPageQuery innerJoinWithM2P() Adds a INNER JOIN clause and with to the query using the M2P relation
 *
 * @method     \Attogram\SharedMedia\Orm\C2PQuery|\Attogram\SharedMedia\Orm\M2PQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPage findOne(ConnectionInterface $con = null) Return the first ChildPage matching the query
 * @method     ChildPage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPage matching the query, or a new ChildPage object populated from the query conditions when no match is found
 *
 * @method     ChildPage findOneById(int $id) Return the first ChildPage filtered by the id column
 * @method     ChildPage findOneByPageid(int $pageid) Return the first ChildPage filtered by the pageid column
 * @method     ChildPage findOneByTitle(string $title) Return the first ChildPage filtered by the title column
 * @method     ChildPage findOneByDisplaytitle(string $displaytitle) Return the first ChildPage filtered by the displaytitle column
 * @method     ChildPage findOneByPageImageFree(string $page_image_free) Return the first ChildPage filtered by the page_image_free column
 * @method     ChildPage findOneByWikibaseItem(string $wikibase_item) Return the first ChildPage filtered by the wikibase_item column
 * @method     ChildPage findOneByDisambiguation(string $disambiguation) Return the first ChildPage filtered by the disambiguation column
 * @method     ChildPage findOneByDefaultsort(string $defaultsort) Return the first ChildPage filtered by the defaultsort column *

 * @method     ChildPage requirePk($key, ConnectionInterface $con = null) Return the ChildPage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOne(ConnectionInterface $con = null) Return the first ChildPage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPage requireOneById(int $id) Return the first ChildPage filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByPageid(int $pageid) Return the first ChildPage filtered by the pageid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByTitle(string $title) Return the first ChildPage filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByDisplaytitle(string $displaytitle) Return the first ChildPage filtered by the displaytitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByPageImageFree(string $page_image_free) Return the first ChildPage filtered by the page_image_free column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByWikibaseItem(string $wikibase_item) Return the first ChildPage filtered by the wikibase_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByDisambiguation(string $disambiguation) Return the first ChildPage filtered by the disambiguation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPage requireOneByDefaultsort(string $defaultsort) Return the first ChildPage filtered by the defaultsort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPage objects based on current ModelCriteria
 * @method     ChildPage[]|ObjectCollection findById(int $id) Return ChildPage objects filtered by the id column
 * @method     ChildPage[]|ObjectCollection findByPageid(int $pageid) Return ChildPage objects filtered by the pageid column
 * @method     ChildPage[]|ObjectCollection findByTitle(string $title) Return ChildPage objects filtered by the title column
 * @method     ChildPage[]|ObjectCollection findByDisplaytitle(string $displaytitle) Return ChildPage objects filtered by the displaytitle column
 * @method     ChildPage[]|ObjectCollection findByPageImageFree(string $page_image_free) Return ChildPage objects filtered by the page_image_free column
 * @method     ChildPage[]|ObjectCollection findByWikibaseItem(string $wikibase_item) Return ChildPage objects filtered by the wikibase_item column
 * @method     ChildPage[]|ObjectCollection findByDisambiguation(string $disambiguation) Return ChildPage objects filtered by the disambiguation column
 * @method     ChildPage[]|ObjectCollection findByDefaultsort(string $defaultsort) Return ChildPage objects filtered by the defaultsort column
 * @method     ChildPage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Attogram\SharedMedia\Orm\Base\PageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Attogram\\SharedMedia\\Orm\\Page', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPageQuery) {
            return $criteria;
        }
        $query = new ChildPageQuery();
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
     * @return ChildPage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PageTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PageTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, pageid, title, displaytitle, page_image_free, wikibase_item, disambiguation, defaultsort FROM page WHERE id = :p0';
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
            /** @var ChildPage $obj */
            $obj = new ChildPage();
            $obj->hydrate($row);
            PageTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PageTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PageTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PageTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PageTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByPageid($pageid = null, $comparison = null)
    {
        if (is_array($pageid)) {
            $useMinMax = false;
            if (isset($pageid['min'])) {
                $this->addUsingAlias(PageTableMap::COL_PAGEID, $pageid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pageid['max'])) {
                $this->addUsingAlias(PageTableMap::COL_PAGEID, $pageid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_PAGEID, $pageid, $comparison);
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
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the displaytitle column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplaytitle('fooValue');   // WHERE displaytitle = 'fooValue'
     * $query->filterByDisplaytitle('%fooValue%', Criteria::LIKE); // WHERE displaytitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displaytitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByDisplaytitle($displaytitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displaytitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_DISPLAYTITLE, $displaytitle, $comparison);
    }

    /**
     * Filter the query on the page_image_free column
     *
     * Example usage:
     * <code>
     * $query->filterByPageImageFree('fooValue');   // WHERE page_image_free = 'fooValue'
     * $query->filterByPageImageFree('%fooValue%', Criteria::LIKE); // WHERE page_image_free LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pageImageFree The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByPageImageFree($pageImageFree = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pageImageFree)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_PAGE_IMAGE_FREE, $pageImageFree, $comparison);
    }

    /**
     * Filter the query on the wikibase_item column
     *
     * Example usage:
     * <code>
     * $query->filterByWikibaseItem('fooValue');   // WHERE wikibase_item = 'fooValue'
     * $query->filterByWikibaseItem('%fooValue%', Criteria::LIKE); // WHERE wikibase_item LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wikibaseItem The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByWikibaseItem($wikibaseItem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wikibaseItem)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_WIKIBASE_ITEM, $wikibaseItem, $comparison);
    }

    /**
     * Filter the query on the disambiguation column
     *
     * Example usage:
     * <code>
     * $query->filterByDisambiguation('fooValue');   // WHERE disambiguation = 'fooValue'
     * $query->filterByDisambiguation('%fooValue%', Criteria::LIKE); // WHERE disambiguation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $disambiguation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByDisambiguation($disambiguation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($disambiguation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_DISAMBIGUATION, $disambiguation, $comparison);
    }

    /**
     * Filter the query on the defaultsort column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultsort('fooValue');   // WHERE defaultsort = 'fooValue'
     * $query->filterByDefaultsort('%fooValue%', Criteria::LIKE); // WHERE defaultsort LIKE '%fooValue%'
     * </code>
     *
     * @param     string $defaultsort The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function filterByDefaultsort($defaultsort = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($defaultsort)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PageTableMap::COL_DEFAULTSORT, $defaultsort, $comparison);
    }

    /**
     * Filter the query by a related \Attogram\SharedMedia\Orm\C2P object
     *
     * @param \Attogram\SharedMedia\Orm\C2P|ObjectCollection $c2P the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPageQuery The current query, for fluid interface
     */
    public function filterByC2P($c2P, $comparison = null)
    {
        if ($c2P instanceof \Attogram\SharedMedia\Orm\C2P) {
            return $this
                ->addUsingAlias(PageTableMap::COL_ID, $c2P->getPageId(), $comparison);
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
     * @return $this|ChildPageQuery The current query, for fluid interface
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
     * Filter the query by a related \Attogram\SharedMedia\Orm\M2P object
     *
     * @param \Attogram\SharedMedia\Orm\M2P|ObjectCollection $m2P the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPageQuery The current query, for fluid interface
     */
    public function filterByM2P($m2P, $comparison = null)
    {
        if ($m2P instanceof \Attogram\SharedMedia\Orm\M2P) {
            return $this
                ->addUsingAlias(PageTableMap::COL_ID, $m2P->getPageId(), $comparison);
        } elseif ($m2P instanceof ObjectCollection) {
            return $this
                ->useM2PQuery()
                ->filterByPrimaryKeys($m2P->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByM2P() only accepts arguments of type \Attogram\SharedMedia\Orm\M2P or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the M2P relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function joinM2P($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('M2P');

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
            $this->addJoinObject($join, 'M2P');
        }

        return $this;
    }

    /**
     * Use the M2P relation M2P object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Attogram\SharedMedia\Orm\M2PQuery A secondary query class using the current class as primary query
     */
    public function useM2PQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinM2P($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'M2P', '\Attogram\SharedMedia\Orm\M2PQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPage $page Object to remove from the list of results
     *
     * @return $this|ChildPageQuery The current query, for fluid interface
     */
    public function prune($page = null)
    {
        if ($page) {
            $this->addUsingAlias(PageTableMap::COL_ID, $page->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the page table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PageTableMap::clearInstancePool();
            PageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PageQuery
