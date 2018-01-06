<?php

namespace Attogram\SharedMedia\Orm\Map;

use Attogram\SharedMedia\Orm\Media;
use Attogram\SharedMedia\Orm\MediaQuery;
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
 * This class defines the structure of the 'media' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MediaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Attogram.SharedMedia.Orm.Map.MediaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'media';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Attogram\\SharedMedia\\Orm\\Media';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Attogram.SharedMedia.Orm.Media';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 32;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 32;

    /**
     * the column name for the id field
     */
    const COL_ID = 'media.id';

    /**
     * the column name for the source_id field
     */
    const COL_SOURCE_ID = 'media.source_id';

    /**
     * the column name for the pageid field
     */
    const COL_PAGEID = 'media.pageid';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'media.title';

    /**
     * the column name for the url field
     */
    const COL_URL = 'media.url';

    /**
     * the column name for the mime field
     */
    const COL_MIME = 'media.mime';

    /**
     * the column name for the width field
     */
    const COL_WIDTH = 'media.width';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'media.height';

    /**
     * the column name for the size field
     */
    const COL_SIZE = 'media.size';

    /**
     * the column name for the sha1 field
     */
    const COL_SHA1 = 'media.sha1';

    /**
     * the column name for the thumburl field
     */
    const COL_THUMBURL = 'media.thumburl';

    /**
     * the column name for the thumbmime field
     */
    const COL_THUMBMIME = 'media.thumbmime';

    /**
     * the column name for the thumbwidth field
     */
    const COL_THUMBWIDTH = 'media.thumbwidth';

    /**
     * the column name for the thumbheight field
     */
    const COL_THUMBHEIGHT = 'media.thumbheight';

    /**
     * the column name for the thumbsize field
     */
    const COL_THUMBSIZE = 'media.thumbsize';

    /**
     * the column name for the descriptionurl field
     */
    const COL_DESCRIPTIONURL = 'media.descriptionurl';

    /**
     * the column name for the descriptionurlshort field
     */
    const COL_DESCRIPTIONURLSHORT = 'media.descriptionurlshort';

    /**
     * the column name for the imagedescription field
     */
    const COL_IMAGEDESCRIPTION = 'media.imagedescription';

    /**
     * the column name for the datetimeoriginal field
     */
    const COL_DATETIMEORIGINAL = 'media.datetimeoriginal';

    /**
     * the column name for the artist field
     */
    const COL_ARTIST = 'media.artist';

    /**
     * the column name for the licenseshortname field
     */
    const COL_LICENSESHORTNAME = 'media.licenseshortname';

    /**
     * the column name for the usageterms field
     */
    const COL_USAGETERMS = 'media.usageterms';

    /**
     * the column name for the attributionrequired field
     */
    const COL_ATTRIBUTIONREQUIRED = 'media.attributionrequired';

    /**
     * the column name for the restrictions field
     */
    const COL_RESTRICTIONS = 'media.restrictions';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'media.timestamp';

    /**
     * the column name for the user field
     */
    const COL_USER = 'media.user';

    /**
     * the column name for the userid field
     */
    const COL_USERID = 'media.userid';

    /**
     * the column name for the missing field
     */
    const COL_MISSING = 'media.missing';

    /**
     * the column name for the known field
     */
    const COL_KNOWN = 'media.known';

    /**
     * the column name for the imagerepository field
     */
    const COL_IMAGEREPOSITORY = 'media.imagerepository';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'media.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'media.updated_at';

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
        self::TYPE_PHPNAME       => array('Id', 'SourceId', 'Pageid', 'Title', 'Url', 'Mime', 'Width', 'Height', 'Size', 'Sha1', 'Thumburl', 'Thumbmime', 'Thumbwidth', 'Thumbheight', 'Thumbsize', 'Descriptionurl', 'Descriptionurlshort', 'Imagedescription', 'Datetimeoriginal', 'Artist', 'Licenseshortname', 'Usageterms', 'Attributionrequired', 'Restrictions', 'Timestamp', 'User', 'Userid', 'Missing', 'Known', 'Imagerepository', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'sourceId', 'pageid', 'title', 'url', 'mime', 'width', 'height', 'size', 'sha1', 'thumburl', 'thumbmime', 'thumbwidth', 'thumbheight', 'thumbsize', 'descriptionurl', 'descriptionurlshort', 'imagedescription', 'datetimeoriginal', 'artist', 'licenseshortname', 'usageterms', 'attributionrequired', 'restrictions', 'timestamp', 'user', 'userid', 'missing', 'known', 'imagerepository', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(MediaTableMap::COL_ID, MediaTableMap::COL_SOURCE_ID, MediaTableMap::COL_PAGEID, MediaTableMap::COL_TITLE, MediaTableMap::COL_URL, MediaTableMap::COL_MIME, MediaTableMap::COL_WIDTH, MediaTableMap::COL_HEIGHT, MediaTableMap::COL_SIZE, MediaTableMap::COL_SHA1, MediaTableMap::COL_THUMBURL, MediaTableMap::COL_THUMBMIME, MediaTableMap::COL_THUMBWIDTH, MediaTableMap::COL_THUMBHEIGHT, MediaTableMap::COL_THUMBSIZE, MediaTableMap::COL_DESCRIPTIONURL, MediaTableMap::COL_DESCRIPTIONURLSHORT, MediaTableMap::COL_IMAGEDESCRIPTION, MediaTableMap::COL_DATETIMEORIGINAL, MediaTableMap::COL_ARTIST, MediaTableMap::COL_LICENSESHORTNAME, MediaTableMap::COL_USAGETERMS, MediaTableMap::COL_ATTRIBUTIONREQUIRED, MediaTableMap::COL_RESTRICTIONS, MediaTableMap::COL_TIMESTAMP, MediaTableMap::COL_USER, MediaTableMap::COL_USERID, MediaTableMap::COL_MISSING, MediaTableMap::COL_KNOWN, MediaTableMap::COL_IMAGEREPOSITORY, MediaTableMap::COL_CREATED_AT, MediaTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'source_id', 'pageid', 'title', 'url', 'mime', 'width', 'height', 'size', 'sha1', 'thumburl', 'thumbmime', 'thumbwidth', 'thumbheight', 'thumbsize', 'descriptionurl', 'descriptionurlshort', 'imagedescription', 'datetimeoriginal', 'artist', 'licenseshortname', 'usageterms', 'attributionrequired', 'restrictions', 'timestamp', 'user', 'userid', 'missing', 'known', 'imagerepository', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'SourceId' => 1, 'Pageid' => 2, 'Title' => 3, 'Url' => 4, 'Mime' => 5, 'Width' => 6, 'Height' => 7, 'Size' => 8, 'Sha1' => 9, 'Thumburl' => 10, 'Thumbmime' => 11, 'Thumbwidth' => 12, 'Thumbheight' => 13, 'Thumbsize' => 14, 'Descriptionurl' => 15, 'Descriptionurlshort' => 16, 'Imagedescription' => 17, 'Datetimeoriginal' => 18, 'Artist' => 19, 'Licenseshortname' => 20, 'Usageterms' => 21, 'Attributionrequired' => 22, 'Restrictions' => 23, 'Timestamp' => 24, 'User' => 25, 'Userid' => 26, 'Missing' => 27, 'Known' => 28, 'Imagerepository' => 29, 'CreatedAt' => 30, 'UpdatedAt' => 31, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sourceId' => 1, 'pageid' => 2, 'title' => 3, 'url' => 4, 'mime' => 5, 'width' => 6, 'height' => 7, 'size' => 8, 'sha1' => 9, 'thumburl' => 10, 'thumbmime' => 11, 'thumbwidth' => 12, 'thumbheight' => 13, 'thumbsize' => 14, 'descriptionurl' => 15, 'descriptionurlshort' => 16, 'imagedescription' => 17, 'datetimeoriginal' => 18, 'artist' => 19, 'licenseshortname' => 20, 'usageterms' => 21, 'attributionrequired' => 22, 'restrictions' => 23, 'timestamp' => 24, 'user' => 25, 'userid' => 26, 'missing' => 27, 'known' => 28, 'imagerepository' => 29, 'createdAt' => 30, 'updatedAt' => 31, ),
        self::TYPE_COLNAME       => array(MediaTableMap::COL_ID => 0, MediaTableMap::COL_SOURCE_ID => 1, MediaTableMap::COL_PAGEID => 2, MediaTableMap::COL_TITLE => 3, MediaTableMap::COL_URL => 4, MediaTableMap::COL_MIME => 5, MediaTableMap::COL_WIDTH => 6, MediaTableMap::COL_HEIGHT => 7, MediaTableMap::COL_SIZE => 8, MediaTableMap::COL_SHA1 => 9, MediaTableMap::COL_THUMBURL => 10, MediaTableMap::COL_THUMBMIME => 11, MediaTableMap::COL_THUMBWIDTH => 12, MediaTableMap::COL_THUMBHEIGHT => 13, MediaTableMap::COL_THUMBSIZE => 14, MediaTableMap::COL_DESCRIPTIONURL => 15, MediaTableMap::COL_DESCRIPTIONURLSHORT => 16, MediaTableMap::COL_IMAGEDESCRIPTION => 17, MediaTableMap::COL_DATETIMEORIGINAL => 18, MediaTableMap::COL_ARTIST => 19, MediaTableMap::COL_LICENSESHORTNAME => 20, MediaTableMap::COL_USAGETERMS => 21, MediaTableMap::COL_ATTRIBUTIONREQUIRED => 22, MediaTableMap::COL_RESTRICTIONS => 23, MediaTableMap::COL_TIMESTAMP => 24, MediaTableMap::COL_USER => 25, MediaTableMap::COL_USERID => 26, MediaTableMap::COL_MISSING => 27, MediaTableMap::COL_KNOWN => 28, MediaTableMap::COL_IMAGEREPOSITORY => 29, MediaTableMap::COL_CREATED_AT => 30, MediaTableMap::COL_UPDATED_AT => 31, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'source_id' => 1, 'pageid' => 2, 'title' => 3, 'url' => 4, 'mime' => 5, 'width' => 6, 'height' => 7, 'size' => 8, 'sha1' => 9, 'thumburl' => 10, 'thumbmime' => 11, 'thumbwidth' => 12, 'thumbheight' => 13, 'thumbsize' => 14, 'descriptionurl' => 15, 'descriptionurlshort' => 16, 'imagedescription' => 17, 'datetimeoriginal' => 18, 'artist' => 19, 'licenseshortname' => 20, 'usageterms' => 21, 'attributionrequired' => 22, 'restrictions' => 23, 'timestamp' => 24, 'user' => 25, 'userid' => 26, 'missing' => 27, 'known' => 28, 'imagerepository' => 29, 'created_at' => 30, 'updated_at' => 31, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
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
        $this->setName('media');
        $this->setPhpName('Media');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Attogram\\SharedMedia\\Orm\\Media');
        $this->setPackage('Attogram.SharedMedia.Orm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('source_id', 'SourceId', 'INTEGER', 'source', 'id', false, null, null);
        $this->addColumn('pageid', 'Pageid', 'INTEGER', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 255, null);
        $this->addColumn('mime', 'Mime', 'VARCHAR', false, 255, null);
        $this->addColumn('width', 'Width', 'INTEGER', false, null, null);
        $this->addColumn('height', 'Height', 'INTEGER', false, null, null);
        $this->addColumn('size', 'Size', 'INTEGER', false, null, null);
        $this->addColumn('sha1', 'Sha1', 'VARCHAR', false, 255, null);
        $this->addColumn('thumburl', 'Thumburl', 'VARCHAR', false, 255, null);
        $this->addColumn('thumbmime', 'Thumbmime', 'VARCHAR', false, 255, null);
        $this->addColumn('thumbwidth', 'Thumbwidth', 'INTEGER', false, null, null);
        $this->addColumn('thumbheight', 'Thumbheight', 'INTEGER', false, null, null);
        $this->addColumn('thumbsize', 'Thumbsize', 'INTEGER', false, null, null);
        $this->addColumn('descriptionurl', 'Descriptionurl', 'VARCHAR', false, 255, null);
        $this->addColumn('descriptionurlshort', 'Descriptionurlshort', 'VARCHAR', false, 255, null);
        $this->addColumn('imagedescription', 'Imagedescription', 'CLOB', false, null, null);
        $this->addColumn('datetimeoriginal', 'Datetimeoriginal', 'VARCHAR', false, 255, null);
        $this->addColumn('artist', 'Artist', 'VARCHAR', false, 255, null);
        $this->addColumn('licenseshortname', 'Licenseshortname', 'VARCHAR', false, 255, null);
        $this->addColumn('usageterms', 'Usageterms', 'VARCHAR', false, 255, null);
        $this->addColumn('attributionrequired', 'Attributionrequired', 'VARCHAR', false, 255, null);
        $this->addColumn('restrictions', 'Restrictions', 'VARCHAR', false, 255, null);
        $this->addColumn('timestamp', 'Timestamp', 'TIMESTAMP', false, 255, null);
        $this->addColumn('user', 'User', 'VARCHAR', false, 255, null);
        $this->addColumn('userid', 'Userid', 'INTEGER', false, null, null);
        $this->addColumn('missing', 'Missing', 'BOOLEAN', false, null, null);
        $this->addColumn('known', 'Known', 'BOOLEAN', false, null, null);
        $this->addColumn('imagerepository', 'Imagerepository', 'VARCHAR', false, 255, null);
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
        $this->addRelation('C2M', '\\Attogram\\SharedMedia\\Orm\\C2M', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':media_id',
    1 => ':id',
  ),
), null, null, 'C2Ms', false);
        $this->addRelation('M2P', '\\Attogram\\SharedMedia\\Orm\\M2P', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':media_id',
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
        return $withPrefix ? MediaTableMap::CLASS_DEFAULT : MediaTableMap::OM_CLASS;
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
     * @return array           (Media object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MediaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MediaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MediaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MediaTableMap::OM_CLASS;
            /** @var Media $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MediaTableMap::addInstanceToPool($obj, $key);
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
            $key = MediaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MediaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Media $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MediaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MediaTableMap::COL_ID);
            $criteria->addSelectColumn(MediaTableMap::COL_SOURCE_ID);
            $criteria->addSelectColumn(MediaTableMap::COL_PAGEID);
            $criteria->addSelectColumn(MediaTableMap::COL_TITLE);
            $criteria->addSelectColumn(MediaTableMap::COL_URL);
            $criteria->addSelectColumn(MediaTableMap::COL_MIME);
            $criteria->addSelectColumn(MediaTableMap::COL_WIDTH);
            $criteria->addSelectColumn(MediaTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(MediaTableMap::COL_SIZE);
            $criteria->addSelectColumn(MediaTableMap::COL_SHA1);
            $criteria->addSelectColumn(MediaTableMap::COL_THUMBURL);
            $criteria->addSelectColumn(MediaTableMap::COL_THUMBMIME);
            $criteria->addSelectColumn(MediaTableMap::COL_THUMBWIDTH);
            $criteria->addSelectColumn(MediaTableMap::COL_THUMBHEIGHT);
            $criteria->addSelectColumn(MediaTableMap::COL_THUMBSIZE);
            $criteria->addSelectColumn(MediaTableMap::COL_DESCRIPTIONURL);
            $criteria->addSelectColumn(MediaTableMap::COL_DESCRIPTIONURLSHORT);
            $criteria->addSelectColumn(MediaTableMap::COL_IMAGEDESCRIPTION);
            $criteria->addSelectColumn(MediaTableMap::COL_DATETIMEORIGINAL);
            $criteria->addSelectColumn(MediaTableMap::COL_ARTIST);
            $criteria->addSelectColumn(MediaTableMap::COL_LICENSESHORTNAME);
            $criteria->addSelectColumn(MediaTableMap::COL_USAGETERMS);
            $criteria->addSelectColumn(MediaTableMap::COL_ATTRIBUTIONREQUIRED);
            $criteria->addSelectColumn(MediaTableMap::COL_RESTRICTIONS);
            $criteria->addSelectColumn(MediaTableMap::COL_TIMESTAMP);
            $criteria->addSelectColumn(MediaTableMap::COL_USER);
            $criteria->addSelectColumn(MediaTableMap::COL_USERID);
            $criteria->addSelectColumn(MediaTableMap::COL_MISSING);
            $criteria->addSelectColumn(MediaTableMap::COL_KNOWN);
            $criteria->addSelectColumn(MediaTableMap::COL_IMAGEREPOSITORY);
            $criteria->addSelectColumn(MediaTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(MediaTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.source_id');
            $criteria->addSelectColumn($alias . '.pageid');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.mime');
            $criteria->addSelectColumn($alias . '.width');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.size');
            $criteria->addSelectColumn($alias . '.sha1');
            $criteria->addSelectColumn($alias . '.thumburl');
            $criteria->addSelectColumn($alias . '.thumbmime');
            $criteria->addSelectColumn($alias . '.thumbwidth');
            $criteria->addSelectColumn($alias . '.thumbheight');
            $criteria->addSelectColumn($alias . '.thumbsize');
            $criteria->addSelectColumn($alias . '.descriptionurl');
            $criteria->addSelectColumn($alias . '.descriptionurlshort');
            $criteria->addSelectColumn($alias . '.imagedescription');
            $criteria->addSelectColumn($alias . '.datetimeoriginal');
            $criteria->addSelectColumn($alias . '.artist');
            $criteria->addSelectColumn($alias . '.licenseshortname');
            $criteria->addSelectColumn($alias . '.usageterms');
            $criteria->addSelectColumn($alias . '.attributionrequired');
            $criteria->addSelectColumn($alias . '.restrictions');
            $criteria->addSelectColumn($alias . '.timestamp');
            $criteria->addSelectColumn($alias . '.user');
            $criteria->addSelectColumn($alias . '.userid');
            $criteria->addSelectColumn($alias . '.missing');
            $criteria->addSelectColumn($alias . '.known');
            $criteria->addSelectColumn($alias . '.imagerepository');
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
        return Propel::getServiceContainer()->getDatabaseMap(MediaTableMap::DATABASE_NAME)->getTable(MediaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MediaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MediaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MediaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Media or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Media object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Attogram\SharedMedia\Orm\Media) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MediaTableMap::DATABASE_NAME);
            $criteria->add(MediaTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MediaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MediaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MediaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the media table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MediaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Media or Criteria object.
     *
     * @param mixed               $criteria Criteria or Media object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Media object
        }

        if ($criteria->containsKey(MediaTableMap::COL_ID) && $criteria->keyContainsValue(MediaTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MediaTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MediaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MediaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MediaTableMap::buildTableMap();
