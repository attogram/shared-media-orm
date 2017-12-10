<?php

namespace Attogram\SharedMedia\Orm\Base;

use \Exception;
use \PDO;
use Attogram\SharedMedia\Orm\Media as ChildMedia;
use Attogram\SharedMedia\Orm\MediaQuery as ChildMediaQuery;
use Attogram\SharedMedia\Orm\Map\MediaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'media' table.
 *
 *
 *
 * @method     ChildMediaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMediaQuery orderBySourceId($order = Criteria::ASC) Order by the source_id column
 * @method     ChildMediaQuery orderByPageid($order = Criteria::ASC) Order by the pageid column
 * @method     ChildMediaQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildMediaQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildMediaQuery orderByMime($order = Criteria::ASC) Order by the mime column
 * @method     ChildMediaQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildMediaQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildMediaQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     ChildMediaQuery orderBySha1($order = Criteria::ASC) Order by the sha1 column
 * @method     ChildMediaQuery orderByThumburl($order = Criteria::ASC) Order by the thumburl column
 * @method     ChildMediaQuery orderByThumbmime($order = Criteria::ASC) Order by the thumbmime column
 * @method     ChildMediaQuery orderByThumbwidth($order = Criteria::ASC) Order by the thumbwidth column
 * @method     ChildMediaQuery orderByThumbheight($order = Criteria::ASC) Order by the thumbheight column
 * @method     ChildMediaQuery orderByThumbsize($order = Criteria::ASC) Order by the thumbsize column
 * @method     ChildMediaQuery orderByDescriptionurl($order = Criteria::ASC) Order by the descriptionurl column
 * @method     ChildMediaQuery orderByDescriptionurlshort($order = Criteria::ASC) Order by the descriptionurlshort column
 * @method     ChildMediaQuery orderByImagedescription($order = Criteria::ASC) Order by the imagedescription column
 * @method     ChildMediaQuery orderByDatetimeoriginal($order = Criteria::ASC) Order by the datetimeoriginal column
 * @method     ChildMediaQuery orderByArtist($order = Criteria::ASC) Order by the artist column
 * @method     ChildMediaQuery orderByLicenseshortname($order = Criteria::ASC) Order by the licenseshortname column
 * @method     ChildMediaQuery orderByUsageterms($order = Criteria::ASC) Order by the usageterms column
 * @method     ChildMediaQuery orderByAttributionrequired($order = Criteria::ASC) Order by the attributionrequired column
 * @method     ChildMediaQuery orderByRestrictions($order = Criteria::ASC) Order by the restrictions column
 * @method     ChildMediaQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 * @method     ChildMediaQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildMediaQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildMediaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildMediaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildMediaQuery groupById() Group by the id column
 * @method     ChildMediaQuery groupBySourceId() Group by the source_id column
 * @method     ChildMediaQuery groupByPageid() Group by the pageid column
 * @method     ChildMediaQuery groupByTitle() Group by the title column
 * @method     ChildMediaQuery groupByUrl() Group by the url column
 * @method     ChildMediaQuery groupByMime() Group by the mime column
 * @method     ChildMediaQuery groupByWidth() Group by the width column
 * @method     ChildMediaQuery groupByHeight() Group by the height column
 * @method     ChildMediaQuery groupBySize() Group by the size column
 * @method     ChildMediaQuery groupBySha1() Group by the sha1 column
 * @method     ChildMediaQuery groupByThumburl() Group by the thumburl column
 * @method     ChildMediaQuery groupByThumbmime() Group by the thumbmime column
 * @method     ChildMediaQuery groupByThumbwidth() Group by the thumbwidth column
 * @method     ChildMediaQuery groupByThumbheight() Group by the thumbheight column
 * @method     ChildMediaQuery groupByThumbsize() Group by the thumbsize column
 * @method     ChildMediaQuery groupByDescriptionurl() Group by the descriptionurl column
 * @method     ChildMediaQuery groupByDescriptionurlshort() Group by the descriptionurlshort column
 * @method     ChildMediaQuery groupByImagedescription() Group by the imagedescription column
 * @method     ChildMediaQuery groupByDatetimeoriginal() Group by the datetimeoriginal column
 * @method     ChildMediaQuery groupByArtist() Group by the artist column
 * @method     ChildMediaQuery groupByLicenseshortname() Group by the licenseshortname column
 * @method     ChildMediaQuery groupByUsageterms() Group by the usageterms column
 * @method     ChildMediaQuery groupByAttributionrequired() Group by the attributionrequired column
 * @method     ChildMediaQuery groupByRestrictions() Group by the restrictions column
 * @method     ChildMediaQuery groupByTimestamp() Group by the timestamp column
 * @method     ChildMediaQuery groupByUser() Group by the user column
 * @method     ChildMediaQuery groupByUserid() Group by the userid column
 * @method     ChildMediaQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildMediaQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildMediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMediaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMediaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMediaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMediaQuery leftJoinSource($relationAlias = null) Adds a LEFT JOIN clause to the query using the Source relation
 * @method     ChildMediaQuery rightJoinSource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Source relation
 * @method     ChildMediaQuery innerJoinSource($relationAlias = null) Adds a INNER JOIN clause to the query using the Source relation
 *
 * @method     ChildMediaQuery joinWithSource($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Source relation
 *
 * @method     ChildMediaQuery leftJoinWithSource() Adds a LEFT JOIN clause and with to the query using the Source relation
 * @method     ChildMediaQuery rightJoinWithSource() Adds a RIGHT JOIN clause and with to the query using the Source relation
 * @method     ChildMediaQuery innerJoinWithSource() Adds a INNER JOIN clause and with to the query using the Source relation
 *
 * @method     ChildMediaQuery leftJoinC2M($relationAlias = null) Adds a LEFT JOIN clause to the query using the C2M relation
 * @method     ChildMediaQuery rightJoinC2M($relationAlias = null) Adds a RIGHT JOIN clause to the query using the C2M relation
 * @method     ChildMediaQuery innerJoinC2M($relationAlias = null) Adds a INNER JOIN clause to the query using the C2M relation
 *
 * @method     ChildMediaQuery joinWithC2M($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the C2M relation
 *
 * @method     ChildMediaQuery leftJoinWithC2M() Adds a LEFT JOIN clause and with to the query using the C2M relation
 * @method     ChildMediaQuery rightJoinWithC2M() Adds a RIGHT JOIN clause and with to the query using the C2M relation
 * @method     ChildMediaQuery innerJoinWithC2M() Adds a INNER JOIN clause and with to the query using the C2M relation
 *
 * @method     ChildMediaQuery leftJoinM2P($relationAlias = null) Adds a LEFT JOIN clause to the query using the M2P relation
 * @method     ChildMediaQuery rightJoinM2P($relationAlias = null) Adds a RIGHT JOIN clause to the query using the M2P relation
 * @method     ChildMediaQuery innerJoinM2P($relationAlias = null) Adds a INNER JOIN clause to the query using the M2P relation
 *
 * @method     ChildMediaQuery joinWithM2P($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the M2P relation
 *
 * @method     ChildMediaQuery leftJoinWithM2P() Adds a LEFT JOIN clause and with to the query using the M2P relation
 * @method     ChildMediaQuery rightJoinWithM2P() Adds a RIGHT JOIN clause and with to the query using the M2P relation
 * @method     ChildMediaQuery innerJoinWithM2P() Adds a INNER JOIN clause and with to the query using the M2P relation
 *
 * @method     \Attogram\SharedMedia\Orm\SourceQuery|\Attogram\SharedMedia\Orm\C2MQuery|\Attogram\SharedMedia\Orm\M2PQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMedia findOne(ConnectionInterface $con = null) Return the first ChildMedia matching the query
 * @method     ChildMedia findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMedia matching the query, or a new ChildMedia object populated from the query conditions when no match is found
 *
 * @method     ChildMedia findOneById(int $id) Return the first ChildMedia filtered by the id column
 * @method     ChildMedia findOneBySourceId(int $source_id) Return the first ChildMedia filtered by the source_id column
 * @method     ChildMedia findOneByPageid(int $pageid) Return the first ChildMedia filtered by the pageid column
 * @method     ChildMedia findOneByTitle(string $title) Return the first ChildMedia filtered by the title column
 * @method     ChildMedia findOneByUrl(string $url) Return the first ChildMedia filtered by the url column
 * @method     ChildMedia findOneByMime(string $mime) Return the first ChildMedia filtered by the mime column
 * @method     ChildMedia findOneByWidth(int $width) Return the first ChildMedia filtered by the width column
 * @method     ChildMedia findOneByHeight(int $height) Return the first ChildMedia filtered by the height column
 * @method     ChildMedia findOneBySize(int $size) Return the first ChildMedia filtered by the size column
 * @method     ChildMedia findOneBySha1(string $sha1) Return the first ChildMedia filtered by the sha1 column
 * @method     ChildMedia findOneByThumburl(string $thumburl) Return the first ChildMedia filtered by the thumburl column
 * @method     ChildMedia findOneByThumbmime(string $thumbmime) Return the first ChildMedia filtered by the thumbmime column
 * @method     ChildMedia findOneByThumbwidth(int $thumbwidth) Return the first ChildMedia filtered by the thumbwidth column
 * @method     ChildMedia findOneByThumbheight(int $thumbheight) Return the first ChildMedia filtered by the thumbheight column
 * @method     ChildMedia findOneByThumbsize(int $thumbsize) Return the first ChildMedia filtered by the thumbsize column
 * @method     ChildMedia findOneByDescriptionurl(string $descriptionurl) Return the first ChildMedia filtered by the descriptionurl column
 * @method     ChildMedia findOneByDescriptionurlshort(string $descriptionurlshort) Return the first ChildMedia filtered by the descriptionurlshort column
 * @method     ChildMedia findOneByImagedescription(string $imagedescription) Return the first ChildMedia filtered by the imagedescription column
 * @method     ChildMedia findOneByDatetimeoriginal(string $datetimeoriginal) Return the first ChildMedia filtered by the datetimeoriginal column
 * @method     ChildMedia findOneByArtist(string $artist) Return the first ChildMedia filtered by the artist column
 * @method     ChildMedia findOneByLicenseshortname(string $licenseshortname) Return the first ChildMedia filtered by the licenseshortname column
 * @method     ChildMedia findOneByUsageterms(string $usageterms) Return the first ChildMedia filtered by the usageterms column
 * @method     ChildMedia findOneByAttributionrequired(string $attributionrequired) Return the first ChildMedia filtered by the attributionrequired column
 * @method     ChildMedia findOneByRestrictions(string $restrictions) Return the first ChildMedia filtered by the restrictions column
 * @method     ChildMedia findOneByTimestamp(string $timestamp) Return the first ChildMedia filtered by the timestamp column
 * @method     ChildMedia findOneByUser(string $user) Return the first ChildMedia filtered by the user column
 * @method     ChildMedia findOneByUserid(int $userid) Return the first ChildMedia filtered by the userid column
 * @method     ChildMedia findOneByCreatedAt(string $created_at) Return the first ChildMedia filtered by the created_at column
 * @method     ChildMedia findOneByUpdatedAt(string $updated_at) Return the first ChildMedia filtered by the updated_at column *

 * @method     ChildMedia requirePk($key, ConnectionInterface $con = null) Return the ChildMedia by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOne(ConnectionInterface $con = null) Return the first ChildMedia matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMedia requireOneById(int $id) Return the first ChildMedia filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneBySourceId(int $source_id) Return the first ChildMedia filtered by the source_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByPageid(int $pageid) Return the first ChildMedia filtered by the pageid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByTitle(string $title) Return the first ChildMedia filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByUrl(string $url) Return the first ChildMedia filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByMime(string $mime) Return the first ChildMedia filtered by the mime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByWidth(int $width) Return the first ChildMedia filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByHeight(int $height) Return the first ChildMedia filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneBySize(int $size) Return the first ChildMedia filtered by the size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneBySha1(string $sha1) Return the first ChildMedia filtered by the sha1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByThumburl(string $thumburl) Return the first ChildMedia filtered by the thumburl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByThumbmime(string $thumbmime) Return the first ChildMedia filtered by the thumbmime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByThumbwidth(int $thumbwidth) Return the first ChildMedia filtered by the thumbwidth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByThumbheight(int $thumbheight) Return the first ChildMedia filtered by the thumbheight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByThumbsize(int $thumbsize) Return the first ChildMedia filtered by the thumbsize column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByDescriptionurl(string $descriptionurl) Return the first ChildMedia filtered by the descriptionurl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByDescriptionurlshort(string $descriptionurlshort) Return the first ChildMedia filtered by the descriptionurlshort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByImagedescription(string $imagedescription) Return the first ChildMedia filtered by the imagedescription column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByDatetimeoriginal(string $datetimeoriginal) Return the first ChildMedia filtered by the datetimeoriginal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByArtist(string $artist) Return the first ChildMedia filtered by the artist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByLicenseshortname(string $licenseshortname) Return the first ChildMedia filtered by the licenseshortname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByUsageterms(string $usageterms) Return the first ChildMedia filtered by the usageterms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByAttributionrequired(string $attributionrequired) Return the first ChildMedia filtered by the attributionrequired column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByRestrictions(string $restrictions) Return the first ChildMedia filtered by the restrictions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByTimestamp(string $timestamp) Return the first ChildMedia filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByUser(string $user) Return the first ChildMedia filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByUserid(int $userid) Return the first ChildMedia filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByCreatedAt(string $created_at) Return the first ChildMedia filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByUpdatedAt(string $updated_at) Return the first ChildMedia filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMedia[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMedia objects based on current ModelCriteria
 * @method     ChildMedia[]|ObjectCollection findById(int $id) Return ChildMedia objects filtered by the id column
 * @method     ChildMedia[]|ObjectCollection findBySourceId(int $source_id) Return ChildMedia objects filtered by the source_id column
 * @method     ChildMedia[]|ObjectCollection findByPageid(int $pageid) Return ChildMedia objects filtered by the pageid column
 * @method     ChildMedia[]|ObjectCollection findByTitle(string $title) Return ChildMedia objects filtered by the title column
 * @method     ChildMedia[]|ObjectCollection findByUrl(string $url) Return ChildMedia objects filtered by the url column
 * @method     ChildMedia[]|ObjectCollection findByMime(string $mime) Return ChildMedia objects filtered by the mime column
 * @method     ChildMedia[]|ObjectCollection findByWidth(int $width) Return ChildMedia objects filtered by the width column
 * @method     ChildMedia[]|ObjectCollection findByHeight(int $height) Return ChildMedia objects filtered by the height column
 * @method     ChildMedia[]|ObjectCollection findBySize(int $size) Return ChildMedia objects filtered by the size column
 * @method     ChildMedia[]|ObjectCollection findBySha1(string $sha1) Return ChildMedia objects filtered by the sha1 column
 * @method     ChildMedia[]|ObjectCollection findByThumburl(string $thumburl) Return ChildMedia objects filtered by the thumburl column
 * @method     ChildMedia[]|ObjectCollection findByThumbmime(string $thumbmime) Return ChildMedia objects filtered by the thumbmime column
 * @method     ChildMedia[]|ObjectCollection findByThumbwidth(int $thumbwidth) Return ChildMedia objects filtered by the thumbwidth column
 * @method     ChildMedia[]|ObjectCollection findByThumbheight(int $thumbheight) Return ChildMedia objects filtered by the thumbheight column
 * @method     ChildMedia[]|ObjectCollection findByThumbsize(int $thumbsize) Return ChildMedia objects filtered by the thumbsize column
 * @method     ChildMedia[]|ObjectCollection findByDescriptionurl(string $descriptionurl) Return ChildMedia objects filtered by the descriptionurl column
 * @method     ChildMedia[]|ObjectCollection findByDescriptionurlshort(string $descriptionurlshort) Return ChildMedia objects filtered by the descriptionurlshort column
 * @method     ChildMedia[]|ObjectCollection findByImagedescription(string $imagedescription) Return ChildMedia objects filtered by the imagedescription column
 * @method     ChildMedia[]|ObjectCollection findByDatetimeoriginal(string $datetimeoriginal) Return ChildMedia objects filtered by the datetimeoriginal column
 * @method     ChildMedia[]|ObjectCollection findByArtist(string $artist) Return ChildMedia objects filtered by the artist column
 * @method     ChildMedia[]|ObjectCollection findByLicenseshortname(string $licenseshortname) Return ChildMedia objects filtered by the licenseshortname column
 * @method     ChildMedia[]|ObjectCollection findByUsageterms(string $usageterms) Return ChildMedia objects filtered by the usageterms column
 * @method     ChildMedia[]|ObjectCollection findByAttributionrequired(string $attributionrequired) Return ChildMedia objects filtered by the attributionrequired column
 * @method     ChildMedia[]|ObjectCollection findByRestrictions(string $restrictions) Return ChildMedia objects filtered by the restrictions column
 * @method     ChildMedia[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildMedia objects filtered by the timestamp column
 * @method     ChildMedia[]|ObjectCollection findByUser(string $user) Return ChildMedia objects filtered by the user column
 * @method     ChildMedia[]|ObjectCollection findByUserid(int $userid) Return ChildMedia objects filtered by the userid column
 * @method     ChildMedia[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildMedia objects filtered by the created_at column
 * @method     ChildMedia[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildMedia objects filtered by the updated_at column
 * @method     ChildMedia[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MediaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Attogram\SharedMedia\Orm\Base\MediaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Attogram\\SharedMedia\\Orm\\Media', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMediaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMediaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMediaQuery) {
            return $criteria;
        }
        $query = new ChildMediaQuery();
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
     * @return ChildMedia|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MediaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MediaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMedia A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, source_id, pageid, title, url, mime, width, height, size, sha1, thumburl, thumbmime, thumbwidth, thumbheight, thumbsize, descriptionurl, descriptionurlshort, imagedescription, datetimeoriginal, artist, licenseshortname, usageterms, attributionrequired, restrictions, timestamp, user, userid, created_at, updated_at FROM media WHERE id = :p0';
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
            /** @var ChildMedia $obj */
            $obj = new ChildMedia();
            $obj->hydrate($row);
            MediaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMedia|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MediaTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MediaTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the source_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySourceId(1234); // WHERE source_id = 1234
     * $query->filterBySourceId(array(12, 34)); // WHERE source_id IN (12, 34)
     * $query->filterBySourceId(array('min' => 12)); // WHERE source_id > 12
     * </code>
     *
     * @see       filterBySource()
     *
     * @param     mixed $sourceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterBySourceId($sourceId = null, $comparison = null)
    {
        if (is_array($sourceId)) {
            $useMinMax = false;
            if (isset($sourceId['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_SOURCE_ID, $sourceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourceId['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_SOURCE_ID, $sourceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_SOURCE_ID, $sourceId, $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByPageid($pageid = null, $comparison = null)
    {
        if (is_array($pageid)) {
            $useMinMax = false;
            if (isset($pageid['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_PAGEID, $pageid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pageid['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_PAGEID, $pageid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_PAGEID, $pageid, $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the mime column
     *
     * Example usage:
     * <code>
     * $query->filterByMime('fooValue');   // WHERE mime = 'fooValue'
     * $query->filterByMime('%fooValue%', Criteria::LIKE); // WHERE mime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByMime($mime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_MIME, $mime, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_HEIGHT, $height, $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_SIZE, $size, $comparison);
    }

    /**
     * Filter the query on the sha1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySha1('fooValue');   // WHERE sha1 = 'fooValue'
     * $query->filterBySha1('%fooValue%', Criteria::LIKE); // WHERE sha1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sha1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterBySha1($sha1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sha1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_SHA1, $sha1, $comparison);
    }

    /**
     * Filter the query on the thumburl column
     *
     * Example usage:
     * <code>
     * $query->filterByThumburl('fooValue');   // WHERE thumburl = 'fooValue'
     * $query->filterByThumburl('%fooValue%', Criteria::LIKE); // WHERE thumburl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumburl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByThumburl($thumburl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumburl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_THUMBURL, $thumburl, $comparison);
    }

    /**
     * Filter the query on the thumbmime column
     *
     * Example usage:
     * <code>
     * $query->filterByThumbmime('fooValue');   // WHERE thumbmime = 'fooValue'
     * $query->filterByThumbmime('%fooValue%', Criteria::LIKE); // WHERE thumbmime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumbmime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByThumbmime($thumbmime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumbmime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_THUMBMIME, $thumbmime, $comparison);
    }

    /**
     * Filter the query on the thumbwidth column
     *
     * Example usage:
     * <code>
     * $query->filterByThumbwidth(1234); // WHERE thumbwidth = 1234
     * $query->filterByThumbwidth(array(12, 34)); // WHERE thumbwidth IN (12, 34)
     * $query->filterByThumbwidth(array('min' => 12)); // WHERE thumbwidth > 12
     * </code>
     *
     * @param     mixed $thumbwidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByThumbwidth($thumbwidth = null, $comparison = null)
    {
        if (is_array($thumbwidth)) {
            $useMinMax = false;
            if (isset($thumbwidth['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_THUMBWIDTH, $thumbwidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thumbwidth['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_THUMBWIDTH, $thumbwidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_THUMBWIDTH, $thumbwidth, $comparison);
    }

    /**
     * Filter the query on the thumbheight column
     *
     * Example usage:
     * <code>
     * $query->filterByThumbheight(1234); // WHERE thumbheight = 1234
     * $query->filterByThumbheight(array(12, 34)); // WHERE thumbheight IN (12, 34)
     * $query->filterByThumbheight(array('min' => 12)); // WHERE thumbheight > 12
     * </code>
     *
     * @param     mixed $thumbheight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByThumbheight($thumbheight = null, $comparison = null)
    {
        if (is_array($thumbheight)) {
            $useMinMax = false;
            if (isset($thumbheight['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_THUMBHEIGHT, $thumbheight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thumbheight['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_THUMBHEIGHT, $thumbheight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_THUMBHEIGHT, $thumbheight, $comparison);
    }

    /**
     * Filter the query on the thumbsize column
     *
     * Example usage:
     * <code>
     * $query->filterByThumbsize(1234); // WHERE thumbsize = 1234
     * $query->filterByThumbsize(array(12, 34)); // WHERE thumbsize IN (12, 34)
     * $query->filterByThumbsize(array('min' => 12)); // WHERE thumbsize > 12
     * </code>
     *
     * @param     mixed $thumbsize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByThumbsize($thumbsize = null, $comparison = null)
    {
        if (is_array($thumbsize)) {
            $useMinMax = false;
            if (isset($thumbsize['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_THUMBSIZE, $thumbsize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thumbsize['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_THUMBSIZE, $thumbsize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_THUMBSIZE, $thumbsize, $comparison);
    }

    /**
     * Filter the query on the descriptionurl column
     *
     * Example usage:
     * <code>
     * $query->filterByDescriptionurl('fooValue');   // WHERE descriptionurl = 'fooValue'
     * $query->filterByDescriptionurl('%fooValue%', Criteria::LIKE); // WHERE descriptionurl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descriptionurl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByDescriptionurl($descriptionurl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descriptionurl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_DESCRIPTIONURL, $descriptionurl, $comparison);
    }

    /**
     * Filter the query on the descriptionurlshort column
     *
     * Example usage:
     * <code>
     * $query->filterByDescriptionurlshort('fooValue');   // WHERE descriptionurlshort = 'fooValue'
     * $query->filterByDescriptionurlshort('%fooValue%', Criteria::LIKE); // WHERE descriptionurlshort LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descriptionurlshort The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByDescriptionurlshort($descriptionurlshort = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descriptionurlshort)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_DESCRIPTIONURLSHORT, $descriptionurlshort, $comparison);
    }

    /**
     * Filter the query on the imagedescription column
     *
     * Example usage:
     * <code>
     * $query->filterByImagedescription('fooValue');   // WHERE imagedescription = 'fooValue'
     * $query->filterByImagedescription('%fooValue%', Criteria::LIKE); // WHERE imagedescription LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imagedescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByImagedescription($imagedescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imagedescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_IMAGEDESCRIPTION, $imagedescription, $comparison);
    }

    /**
     * Filter the query on the datetimeoriginal column
     *
     * Example usage:
     * <code>
     * $query->filterByDatetimeoriginal('fooValue');   // WHERE datetimeoriginal = 'fooValue'
     * $query->filterByDatetimeoriginal('%fooValue%', Criteria::LIKE); // WHERE datetimeoriginal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datetimeoriginal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByDatetimeoriginal($datetimeoriginal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datetimeoriginal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_DATETIMEORIGINAL, $datetimeoriginal, $comparison);
    }

    /**
     * Filter the query on the artist column
     *
     * Example usage:
     * <code>
     * $query->filterByArtist('fooValue');   // WHERE artist = 'fooValue'
     * $query->filterByArtist('%fooValue%', Criteria::LIKE); // WHERE artist LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artist The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByArtist($artist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_ARTIST, $artist, $comparison);
    }

    /**
     * Filter the query on the licenseshortname column
     *
     * Example usage:
     * <code>
     * $query->filterByLicenseshortname('fooValue');   // WHERE licenseshortname = 'fooValue'
     * $query->filterByLicenseshortname('%fooValue%', Criteria::LIKE); // WHERE licenseshortname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $licenseshortname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByLicenseshortname($licenseshortname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($licenseshortname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_LICENSESHORTNAME, $licenseshortname, $comparison);
    }

    /**
     * Filter the query on the usageterms column
     *
     * Example usage:
     * <code>
     * $query->filterByUsageterms('fooValue');   // WHERE usageterms = 'fooValue'
     * $query->filterByUsageterms('%fooValue%', Criteria::LIKE); // WHERE usageterms LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usageterms The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByUsageterms($usageterms = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usageterms)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_USAGETERMS, $usageterms, $comparison);
    }

    /**
     * Filter the query on the attributionrequired column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributionrequired('fooValue');   // WHERE attributionrequired = 'fooValue'
     * $query->filterByAttributionrequired('%fooValue%', Criteria::LIKE); // WHERE attributionrequired LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attributionrequired The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByAttributionrequired($attributionrequired = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attributionrequired)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_ATTRIBUTIONREQUIRED, $attributionrequired, $comparison);
    }

    /**
     * Filter the query on the restrictions column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictions('fooValue');   // WHERE restrictions = 'fooValue'
     * $query->filterByRestrictions('%fooValue%', Criteria::LIKE); // WHERE restrictions LIKE '%fooValue%'
     * </code>
     *
     * @param     string $restrictions The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByRestrictions($restrictions = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($restrictions)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_RESTRICTIONS, $restrictions, $comparison);
    }

    /**
     * Filter the query on the timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp('2011-03-14'); // WHERE timestamp = '2011-03-14'
     * $query->filterByTimestamp('now'); // WHERE timestamp = '2011-03-14'
     * $query->filterByTimestamp(array('max' => 'yesterday')); // WHERE timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
     * $query->filterByUser('%fooValue%', Criteria::LIKE); // WHERE user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $user The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_USER, $user, $comparison);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userid = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userid IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userid > 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_USERID, $userid, $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Attogram\SharedMedia\Orm\Source object
     *
     * @param \Attogram\SharedMedia\Orm\Source|ObjectCollection $source The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMediaQuery The current query, for fluid interface
     */
    public function filterBySource($source, $comparison = null)
    {
        if ($source instanceof \Attogram\SharedMedia\Orm\Source) {
            return $this
                ->addUsingAlias(MediaTableMap::COL_SOURCE_ID, $source->getId(), $comparison);
        } elseif ($source instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MediaTableMap::COL_SOURCE_ID, $source->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
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
     * @return ChildMediaQuery The current query, for fluid interface
     */
    public function filterByC2M($c2M, $comparison = null)
    {
        if ($c2M instanceof \Attogram\SharedMedia\Orm\C2M) {
            return $this
                ->addUsingAlias(MediaTableMap::COL_ID, $c2M->getMediaId(), $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
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
     * Filter the query by a related \Attogram\SharedMedia\Orm\M2P object
     *
     * @param \Attogram\SharedMedia\Orm\M2P|ObjectCollection $m2P the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMediaQuery The current query, for fluid interface
     */
    public function filterByM2P($m2P, $comparison = null)
    {
        if ($m2P instanceof \Attogram\SharedMedia\Orm\M2P) {
            return $this
                ->addUsingAlias(MediaTableMap::COL_ID, $m2P->getMediaId(), $comparison);
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
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
     * @param   ChildMedia $media Object to remove from the list of results
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function prune($media = null)
    {
        if ($media) {
            $this->addUsingAlias(MediaTableMap::COL_ID, $media->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the media table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MediaTableMap::clearInstancePool();
            MediaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MediaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MediaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MediaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildMediaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(MediaTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildMediaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(MediaTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildMediaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(MediaTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildMediaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(MediaTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildMediaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(MediaTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildMediaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(MediaTableMap::COL_CREATED_AT);
    }

} // MediaQuery
