<?php

namespace Attogram\SharedMedia\Orm\Base;

use \DateTime;
use \Exception;
use \PDO;
use Attogram\SharedMedia\Orm\C2M as ChildC2M;
use Attogram\SharedMedia\Orm\C2MQuery as ChildC2MQuery;
use Attogram\SharedMedia\Orm\M2P as ChildM2P;
use Attogram\SharedMedia\Orm\M2PQuery as ChildM2PQuery;
use Attogram\SharedMedia\Orm\Media as ChildMedia;
use Attogram\SharedMedia\Orm\MediaQuery as ChildMediaQuery;
use Attogram\SharedMedia\Orm\Source as ChildSource;
use Attogram\SharedMedia\Orm\SourceQuery as ChildSourceQuery;
use Attogram\SharedMedia\Orm\Map\C2MTableMap;
use Attogram\SharedMedia\Orm\Map\M2PTableMap;
use Attogram\SharedMedia\Orm\Map\MediaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'media' table.
 *
 *
 *
 * @package    propel.generator.Attogram.SharedMedia.Orm.Base
 */
abstract class Media implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Attogram\\SharedMedia\\Orm\\Map\\MediaTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the source_id field.
     *
     * @var        int
     */
    protected $source_id;

    /**
     * The value for the pageid field.
     *
     * @var        int
     */
    protected $pageid;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the url field.
     *
     * @var        string
     */
    protected $url;

    /**
     * The value for the mime field.
     *
     * @var        string
     */
    protected $mime;

    /**
     * The value for the width field.
     *
     * @var        int
     */
    protected $width;

    /**
     * The value for the height field.
     *
     * @var        int
     */
    protected $height;

    /**
     * The value for the size field.
     *
     * @var        int
     */
    protected $size;

    /**
     * The value for the sha1 field.
     *
     * @var        string
     */
    protected $sha1;

    /**
     * The value for the thumburl field.
     *
     * @var        string
     */
    protected $thumburl;

    /**
     * The value for the thumbmime field.
     *
     * @var        string
     */
    protected $thumbmime;

    /**
     * The value for the thumbwidth field.
     *
     * @var        int
     */
    protected $thumbwidth;

    /**
     * The value for the thumbheight field.
     *
     * @var        int
     */
    protected $thumbheight;

    /**
     * The value for the thumbsize field.
     *
     * @var        int
     */
    protected $thumbsize;

    /**
     * The value for the descriptionurl field.
     *
     * @var        string
     */
    protected $descriptionurl;

    /**
     * The value for the descriptionurlshort field.
     *
     * @var        string
     */
    protected $descriptionurlshort;

    /**
     * The value for the imagedescription field.
     *
     * @var        string
     */
    protected $imagedescription;

    /**
     * The value for the datetimeoriginal field.
     *
     * @var        string
     */
    protected $datetimeoriginal;

    /**
     * The value for the artist field.
     *
     * @var        string
     */
    protected $artist;

    /**
     * The value for the licenseshortname field.
     *
     * @var        string
     */
    protected $licenseshortname;

    /**
     * The value for the usageterms field.
     *
     * @var        string
     */
    protected $usageterms;

    /**
     * The value for the attributionrequired field.
     *
     * @var        string
     */
    protected $attributionrequired;

    /**
     * The value for the restrictions field.
     *
     * @var        string
     */
    protected $restrictions;

    /**
     * The value for the timestamp field.
     *
     * @var        DateTime
     */
    protected $timestamp;

    /**
     * The value for the user field.
     *
     * @var        string
     */
    protected $user;

    /**
     * The value for the userid field.
     *
     * @var        int
     */
    protected $userid;

    /**
     * The value for the created_at field.
     *
     * @var        DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     *
     * @var        DateTime
     */
    protected $updated_at;

    /**
     * @var        ChildSource
     */
    protected $aSource;

    /**
     * @var        ObjectCollection|ChildC2M[] Collection to store aggregation of ChildC2M objects.
     */
    protected $collC2Ms;
    protected $collC2MsPartial;

    /**
     * @var        ObjectCollection|ChildM2P[] Collection to store aggregation of ChildM2P objects.
     */
    protected $collM2Ps;
    protected $collM2PsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildC2M[]
     */
    protected $c2MsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildM2P[]
     */
    protected $m2PsScheduledForDeletion = null;

    /**
     * Initializes internal state of Attogram\SharedMedia\Orm\Base\Media object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Media</code> instance.  If
     * <code>obj</code> is an instance of <code>Media</code>, delegates to
     * <code>equals(Media)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Media The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [source_id] column value.
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Get the [pageid] column value.
     *
     * @return int
     */
    public function getPageid()
    {
        return $this->pageid;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the [mime] column value.
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Get the [width] column value.
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the [height] column value.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the [size] column value.
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get the [sha1] column value.
     *
     * @return string
     */
    public function getSha1()
    {
        return $this->sha1;
    }

    /**
     * Get the [thumburl] column value.
     *
     * @return string
     */
    public function getThumburl()
    {
        return $this->thumburl;
    }

    /**
     * Get the [thumbmime] column value.
     *
     * @return string
     */
    public function getThumbmime()
    {
        return $this->thumbmime;
    }

    /**
     * Get the [thumbwidth] column value.
     *
     * @return int
     */
    public function getThumbwidth()
    {
        return $this->thumbwidth;
    }

    /**
     * Get the [thumbheight] column value.
     *
     * @return int
     */
    public function getThumbheight()
    {
        return $this->thumbheight;
    }

    /**
     * Get the [thumbsize] column value.
     *
     * @return int
     */
    public function getThumbsize()
    {
        return $this->thumbsize;
    }

    /**
     * Get the [descriptionurl] column value.
     *
     * @return string
     */
    public function getDescriptionurl()
    {
        return $this->descriptionurl;
    }

    /**
     * Get the [descriptionurlshort] column value.
     *
     * @return string
     */
    public function getDescriptionurlshort()
    {
        return $this->descriptionurlshort;
    }

    /**
     * Get the [imagedescription] column value.
     *
     * @return string
     */
    public function getImagedescription()
    {
        return $this->imagedescription;
    }

    /**
     * Get the [datetimeoriginal] column value.
     *
     * @return string
     */
    public function getDatetimeoriginal()
    {
        return $this->datetimeoriginal;
    }

    /**
     * Get the [artist] column value.
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Get the [licenseshortname] column value.
     *
     * @return string
     */
    public function getLicenseshortname()
    {
        return $this->licenseshortname;
    }

    /**
     * Get the [usageterms] column value.
     *
     * @return string
     */
    public function getUsageterms()
    {
        return $this->usageterms;
    }

    /**
     * Get the [attributionrequired] column value.
     *
     * @return string
     */
    public function getAttributionrequired()
    {
        return $this->attributionrequired;
    }

    /**
     * Get the [restrictions] column value.
     *
     * @return string
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * Get the [optionally formatted] temporal [timestamp] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTimestamp($format = NULL)
    {
        if ($format === null) {
            return $this->timestamp;
        } else {
            return $this->timestamp instanceof \DateTimeInterface ? $this->timestamp->format($format) : null;
        }
    }

    /**
     * Get the [user] column value.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the [userid] column value.
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTimeInterface ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTimeInterface ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[MediaTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [source_id] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setSourceId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->source_id !== $v) {
            $this->source_id = $v;
            $this->modifiedColumns[MediaTableMap::COL_SOURCE_ID] = true;
        }

        if ($this->aSource !== null && $this->aSource->getId() !== $v) {
            $this->aSource = null;
        }

        return $this;
    } // setSourceId()

    /**
     * Set the value of [pageid] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setPageid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pageid !== $v) {
            $this->pageid = $v;
            $this->modifiedColumns[MediaTableMap::COL_PAGEID] = true;
        }

        return $this;
    } // setPageid()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[MediaTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[MediaTableMap::COL_URL] = true;
        }

        return $this;
    } // setUrl()

    /**
     * Set the value of [mime] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setMime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mime !== $v) {
            $this->mime = $v;
            $this->modifiedColumns[MediaTableMap::COL_MIME] = true;
        }

        return $this;
    } // setMime()

    /**
     * Set the value of [width] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setWidth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->width !== $v) {
            $this->width = $v;
            $this->modifiedColumns[MediaTableMap::COL_WIDTH] = true;
        }

        return $this;
    } // setWidth()

    /**
     * Set the value of [height] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setHeight($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->height !== $v) {
            $this->height = $v;
            $this->modifiedColumns[MediaTableMap::COL_HEIGHT] = true;
        }

        return $this;
    } // setHeight()

    /**
     * Set the value of [size] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setSize($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->size !== $v) {
            $this->size = $v;
            $this->modifiedColumns[MediaTableMap::COL_SIZE] = true;
        }

        return $this;
    } // setSize()

    /**
     * Set the value of [sha1] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setSha1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sha1 !== $v) {
            $this->sha1 = $v;
            $this->modifiedColumns[MediaTableMap::COL_SHA1] = true;
        }

        return $this;
    } // setSha1()

    /**
     * Set the value of [thumburl] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setThumburl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumburl !== $v) {
            $this->thumburl = $v;
            $this->modifiedColumns[MediaTableMap::COL_THUMBURL] = true;
        }

        return $this;
    } // setThumburl()

    /**
     * Set the value of [thumbmime] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setThumbmime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumbmime !== $v) {
            $this->thumbmime = $v;
            $this->modifiedColumns[MediaTableMap::COL_THUMBMIME] = true;
        }

        return $this;
    } // setThumbmime()

    /**
     * Set the value of [thumbwidth] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setThumbwidth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->thumbwidth !== $v) {
            $this->thumbwidth = $v;
            $this->modifiedColumns[MediaTableMap::COL_THUMBWIDTH] = true;
        }

        return $this;
    } // setThumbwidth()

    /**
     * Set the value of [thumbheight] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setThumbheight($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->thumbheight !== $v) {
            $this->thumbheight = $v;
            $this->modifiedColumns[MediaTableMap::COL_THUMBHEIGHT] = true;
        }

        return $this;
    } // setThumbheight()

    /**
     * Set the value of [thumbsize] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setThumbsize($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->thumbsize !== $v) {
            $this->thumbsize = $v;
            $this->modifiedColumns[MediaTableMap::COL_THUMBSIZE] = true;
        }

        return $this;
    } // setThumbsize()

    /**
     * Set the value of [descriptionurl] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setDescriptionurl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descriptionurl !== $v) {
            $this->descriptionurl = $v;
            $this->modifiedColumns[MediaTableMap::COL_DESCRIPTIONURL] = true;
        }

        return $this;
    } // setDescriptionurl()

    /**
     * Set the value of [descriptionurlshort] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setDescriptionurlshort($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descriptionurlshort !== $v) {
            $this->descriptionurlshort = $v;
            $this->modifiedColumns[MediaTableMap::COL_DESCRIPTIONURLSHORT] = true;
        }

        return $this;
    } // setDescriptionurlshort()

    /**
     * Set the value of [imagedescription] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setImagedescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->imagedescription !== $v) {
            $this->imagedescription = $v;
            $this->modifiedColumns[MediaTableMap::COL_IMAGEDESCRIPTION] = true;
        }

        return $this;
    } // setImagedescription()

    /**
     * Set the value of [datetimeoriginal] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setDatetimeoriginal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->datetimeoriginal !== $v) {
            $this->datetimeoriginal = $v;
            $this->modifiedColumns[MediaTableMap::COL_DATETIMEORIGINAL] = true;
        }

        return $this;
    } // setDatetimeoriginal()

    /**
     * Set the value of [artist] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setArtist($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->artist !== $v) {
            $this->artist = $v;
            $this->modifiedColumns[MediaTableMap::COL_ARTIST] = true;
        }

        return $this;
    } // setArtist()

    /**
     * Set the value of [licenseshortname] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setLicenseshortname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->licenseshortname !== $v) {
            $this->licenseshortname = $v;
            $this->modifiedColumns[MediaTableMap::COL_LICENSESHORTNAME] = true;
        }

        return $this;
    } // setLicenseshortname()

    /**
     * Set the value of [usageterms] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setUsageterms($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usageterms !== $v) {
            $this->usageterms = $v;
            $this->modifiedColumns[MediaTableMap::COL_USAGETERMS] = true;
        }

        return $this;
    } // setUsageterms()

    /**
     * Set the value of [attributionrequired] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setAttributionrequired($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->attributionrequired !== $v) {
            $this->attributionrequired = $v;
            $this->modifiedColumns[MediaTableMap::COL_ATTRIBUTIONREQUIRED] = true;
        }

        return $this;
    } // setAttributionrequired()

    /**
     * Set the value of [restrictions] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setRestrictions($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->restrictions !== $v) {
            $this->restrictions = $v;
            $this->modifiedColumns[MediaTableMap::COL_RESTRICTIONS] = true;
        }

        return $this;
    } // setRestrictions()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            if ($this->timestamp === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->timestamp->format("Y-m-d H:i:s.u")) {
                $this->timestamp = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MediaTableMap::COL_TIMESTAMP] = true;
            }
        } // if either are not null

        return $this;
    } // setTimestamp()

    /**
     * Set the value of [user] column.
     *
     * @param string $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user !== $v) {
            $this->user = $v;
            $this->modifiedColumns[MediaTableMap::COL_USER] = true;
        }

        return $this;
    } // setUser()

    /**
     * Set the value of [userid] column.
     *
     * @param int $v new value
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setUserid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->userid !== $v) {
            $this->userid = $v;
            $this->modifiedColumns[MediaTableMap::COL_USERID] = true;
        }

        return $this;
    } // setUserid()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MediaTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MediaTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MediaTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MediaTableMap::translateFieldName('SourceId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->source_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MediaTableMap::translateFieldName('Pageid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pageid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MediaTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MediaTableMap::translateFieldName('Url', TableMap::TYPE_PHPNAME, $indexType)];
            $this->url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MediaTableMap::translateFieldName('Mime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MediaTableMap::translateFieldName('Width', TableMap::TYPE_PHPNAME, $indexType)];
            $this->width = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MediaTableMap::translateFieldName('Height', TableMap::TYPE_PHPNAME, $indexType)];
            $this->height = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MediaTableMap::translateFieldName('Size', TableMap::TYPE_PHPNAME, $indexType)];
            $this->size = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MediaTableMap::translateFieldName('Sha1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sha1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : MediaTableMap::translateFieldName('Thumburl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumburl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : MediaTableMap::translateFieldName('Thumbmime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumbmime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : MediaTableMap::translateFieldName('Thumbwidth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumbwidth = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : MediaTableMap::translateFieldName('Thumbheight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumbheight = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : MediaTableMap::translateFieldName('Thumbsize', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumbsize = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : MediaTableMap::translateFieldName('Descriptionurl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descriptionurl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : MediaTableMap::translateFieldName('Descriptionurlshort', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descriptionurlshort = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : MediaTableMap::translateFieldName('Imagedescription', TableMap::TYPE_PHPNAME, $indexType)];
            $this->imagedescription = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : MediaTableMap::translateFieldName('Datetimeoriginal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->datetimeoriginal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : MediaTableMap::translateFieldName('Artist', TableMap::TYPE_PHPNAME, $indexType)];
            $this->artist = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : MediaTableMap::translateFieldName('Licenseshortname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->licenseshortname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : MediaTableMap::translateFieldName('Usageterms', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usageterms = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : MediaTableMap::translateFieldName('Attributionrequired', TableMap::TYPE_PHPNAME, $indexType)];
            $this->attributionrequired = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : MediaTableMap::translateFieldName('Restrictions', TableMap::TYPE_PHPNAME, $indexType)];
            $this->restrictions = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : MediaTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timestamp = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : MediaTableMap::translateFieldName('User', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : MediaTableMap::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->userid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : MediaTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : MediaTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 29; // 29 = MediaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Attogram\\SharedMedia\\Orm\\Media'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aSource !== null && $this->source_id !== $this->aSource->getId()) {
            $this->aSource = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MediaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMediaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSource = null;
            $this->collC2Ms = null;

            $this->collM2Ps = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Media::setDeleted()
     * @see Media::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMediaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(MediaTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(\Propel\Runtime\Util\PropelDateTime::createHighPrecision());
                }
                if (!$this->isColumnModified(MediaTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(\Propel\Runtime\Util\PropelDateTime::createHighPrecision());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(MediaTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(\Propel\Runtime\Util\PropelDateTime::createHighPrecision());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                MediaTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSource !== null) {
                if ($this->aSource->isModified() || $this->aSource->isNew()) {
                    $affectedRows += $this->aSource->save($con);
                }
                $this->setSource($this->aSource);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->c2MsScheduledForDeletion !== null) {
                if (!$this->c2MsScheduledForDeletion->isEmpty()) {
                    \Attogram\SharedMedia\Orm\C2MQuery::create()
                        ->filterByPrimaryKeys($this->c2MsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->c2MsScheduledForDeletion = null;
                }
            }

            if ($this->collC2Ms !== null) {
                foreach ($this->collC2Ms as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->m2PsScheduledForDeletion !== null) {
                if (!$this->m2PsScheduledForDeletion->isEmpty()) {
                    \Attogram\SharedMedia\Orm\M2PQuery::create()
                        ->filterByPrimaryKeys($this->m2PsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->m2PsScheduledForDeletion = null;
                }
            }

            if ($this->collM2Ps !== null) {
                foreach ($this->collM2Ps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[MediaTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MediaTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MediaTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(MediaTableMap::COL_SOURCE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'source_id';
        }
        if ($this->isColumnModified(MediaTableMap::COL_PAGEID)) {
            $modifiedColumns[':p' . $index++]  = 'pageid';
        }
        if ($this->isColumnModified(MediaTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(MediaTableMap::COL_URL)) {
            $modifiedColumns[':p' . $index++]  = 'url';
        }
        if ($this->isColumnModified(MediaTableMap::COL_MIME)) {
            $modifiedColumns[':p' . $index++]  = 'mime';
        }
        if ($this->isColumnModified(MediaTableMap::COL_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'width';
        }
        if ($this->isColumnModified(MediaTableMap::COL_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'height';
        }
        if ($this->isColumnModified(MediaTableMap::COL_SIZE)) {
            $modifiedColumns[':p' . $index++]  = 'size';
        }
        if ($this->isColumnModified(MediaTableMap::COL_SHA1)) {
            $modifiedColumns[':p' . $index++]  = 'sha1';
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBURL)) {
            $modifiedColumns[':p' . $index++]  = 'thumburl';
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBMIME)) {
            $modifiedColumns[':p' . $index++]  = 'thumbmime';
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBWIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'thumbwidth';
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBHEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'thumbheight';
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBSIZE)) {
            $modifiedColumns[':p' . $index++]  = 'thumbsize';
        }
        if ($this->isColumnModified(MediaTableMap::COL_DESCRIPTIONURL)) {
            $modifiedColumns[':p' . $index++]  = 'descriptionurl';
        }
        if ($this->isColumnModified(MediaTableMap::COL_DESCRIPTIONURLSHORT)) {
            $modifiedColumns[':p' . $index++]  = 'descriptionurlshort';
        }
        if ($this->isColumnModified(MediaTableMap::COL_IMAGEDESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'imagedescription';
        }
        if ($this->isColumnModified(MediaTableMap::COL_DATETIMEORIGINAL)) {
            $modifiedColumns[':p' . $index++]  = 'datetimeoriginal';
        }
        if ($this->isColumnModified(MediaTableMap::COL_ARTIST)) {
            $modifiedColumns[':p' . $index++]  = 'artist';
        }
        if ($this->isColumnModified(MediaTableMap::COL_LICENSESHORTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'licenseshortname';
        }
        if ($this->isColumnModified(MediaTableMap::COL_USAGETERMS)) {
            $modifiedColumns[':p' . $index++]  = 'usageterms';
        }
        if ($this->isColumnModified(MediaTableMap::COL_ATTRIBUTIONREQUIRED)) {
            $modifiedColumns[':p' . $index++]  = 'attributionrequired';
        }
        if ($this->isColumnModified(MediaTableMap::COL_RESTRICTIONS)) {
            $modifiedColumns[':p' . $index++]  = 'restrictions';
        }
        if ($this->isColumnModified(MediaTableMap::COL_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'timestamp';
        }
        if ($this->isColumnModified(MediaTableMap::COL_USER)) {
            $modifiedColumns[':p' . $index++]  = 'user';
        }
        if ($this->isColumnModified(MediaTableMap::COL_USERID)) {
            $modifiedColumns[':p' . $index++]  = 'userid';
        }
        if ($this->isColumnModified(MediaTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(MediaTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO media (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'source_id':
                        $stmt->bindValue($identifier, $this->source_id, PDO::PARAM_INT);
                        break;
                    case 'pageid':
                        $stmt->bindValue($identifier, $this->pageid, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'url':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case 'mime':
                        $stmt->bindValue($identifier, $this->mime, PDO::PARAM_STR);
                        break;
                    case 'width':
                        $stmt->bindValue($identifier, $this->width, PDO::PARAM_INT);
                        break;
                    case 'height':
                        $stmt->bindValue($identifier, $this->height, PDO::PARAM_INT);
                        break;
                    case 'size':
                        $stmt->bindValue($identifier, $this->size, PDO::PARAM_INT);
                        break;
                    case 'sha1':
                        $stmt->bindValue($identifier, $this->sha1, PDO::PARAM_STR);
                        break;
                    case 'thumburl':
                        $stmt->bindValue($identifier, $this->thumburl, PDO::PARAM_STR);
                        break;
                    case 'thumbmime':
                        $stmt->bindValue($identifier, $this->thumbmime, PDO::PARAM_STR);
                        break;
                    case 'thumbwidth':
                        $stmt->bindValue($identifier, $this->thumbwidth, PDO::PARAM_INT);
                        break;
                    case 'thumbheight':
                        $stmt->bindValue($identifier, $this->thumbheight, PDO::PARAM_INT);
                        break;
                    case 'thumbsize':
                        $stmt->bindValue($identifier, $this->thumbsize, PDO::PARAM_INT);
                        break;
                    case 'descriptionurl':
                        $stmt->bindValue($identifier, $this->descriptionurl, PDO::PARAM_STR);
                        break;
                    case 'descriptionurlshort':
                        $stmt->bindValue($identifier, $this->descriptionurlshort, PDO::PARAM_STR);
                        break;
                    case 'imagedescription':
                        $stmt->bindValue($identifier, $this->imagedescription, PDO::PARAM_STR);
                        break;
                    case 'datetimeoriginal':
                        $stmt->bindValue($identifier, $this->datetimeoriginal, PDO::PARAM_STR);
                        break;
                    case 'artist':
                        $stmt->bindValue($identifier, $this->artist, PDO::PARAM_STR);
                        break;
                    case 'licenseshortname':
                        $stmt->bindValue($identifier, $this->licenseshortname, PDO::PARAM_STR);
                        break;
                    case 'usageterms':
                        $stmt->bindValue($identifier, $this->usageterms, PDO::PARAM_STR);
                        break;
                    case 'attributionrequired':
                        $stmt->bindValue($identifier, $this->attributionrequired, PDO::PARAM_STR);
                        break;
                    case 'restrictions':
                        $stmt->bindValue($identifier, $this->restrictions, PDO::PARAM_STR);
                        break;
                    case 'timestamp':
                        $stmt->bindValue($identifier, $this->timestamp ? $this->timestamp->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'user':
                        $stmt->bindValue($identifier, $this->user, PDO::PARAM_STR);
                        break;
                    case 'userid':
                        $stmt->bindValue($identifier, $this->userid, PDO::PARAM_INT);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MediaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getSourceId();
                break;
            case 2:
                return $this->getPageid();
                break;
            case 3:
                return $this->getTitle();
                break;
            case 4:
                return $this->getUrl();
                break;
            case 5:
                return $this->getMime();
                break;
            case 6:
                return $this->getWidth();
                break;
            case 7:
                return $this->getHeight();
                break;
            case 8:
                return $this->getSize();
                break;
            case 9:
                return $this->getSha1();
                break;
            case 10:
                return $this->getThumburl();
                break;
            case 11:
                return $this->getThumbmime();
                break;
            case 12:
                return $this->getThumbwidth();
                break;
            case 13:
                return $this->getThumbheight();
                break;
            case 14:
                return $this->getThumbsize();
                break;
            case 15:
                return $this->getDescriptionurl();
                break;
            case 16:
                return $this->getDescriptionurlshort();
                break;
            case 17:
                return $this->getImagedescription();
                break;
            case 18:
                return $this->getDatetimeoriginal();
                break;
            case 19:
                return $this->getArtist();
                break;
            case 20:
                return $this->getLicenseshortname();
                break;
            case 21:
                return $this->getUsageterms();
                break;
            case 22:
                return $this->getAttributionrequired();
                break;
            case 23:
                return $this->getRestrictions();
                break;
            case 24:
                return $this->getTimestamp();
                break;
            case 25:
                return $this->getUser();
                break;
            case 26:
                return $this->getUserid();
                break;
            case 27:
                return $this->getCreatedAt();
                break;
            case 28:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Media'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Media'][$this->hashCode()] = true;
        $keys = MediaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSourceId(),
            $keys[2] => $this->getPageid(),
            $keys[3] => $this->getTitle(),
            $keys[4] => $this->getUrl(),
            $keys[5] => $this->getMime(),
            $keys[6] => $this->getWidth(),
            $keys[7] => $this->getHeight(),
            $keys[8] => $this->getSize(),
            $keys[9] => $this->getSha1(),
            $keys[10] => $this->getThumburl(),
            $keys[11] => $this->getThumbmime(),
            $keys[12] => $this->getThumbwidth(),
            $keys[13] => $this->getThumbheight(),
            $keys[14] => $this->getThumbsize(),
            $keys[15] => $this->getDescriptionurl(),
            $keys[16] => $this->getDescriptionurlshort(),
            $keys[17] => $this->getImagedescription(),
            $keys[18] => $this->getDatetimeoriginal(),
            $keys[19] => $this->getArtist(),
            $keys[20] => $this->getLicenseshortname(),
            $keys[21] => $this->getUsageterms(),
            $keys[22] => $this->getAttributionrequired(),
            $keys[23] => $this->getRestrictions(),
            $keys[24] => $this->getTimestamp(),
            $keys[25] => $this->getUser(),
            $keys[26] => $this->getUserid(),
            $keys[27] => $this->getCreatedAt(),
            $keys[28] => $this->getUpdatedAt(),
        );
        if ($result[$keys[24]] instanceof \DateTimeInterface) {
            $result[$keys[24]] = $result[$keys[24]]->format('c');
        }

        if ($result[$keys[27]] instanceof \DateTimeInterface) {
            $result[$keys[27]] = $result[$keys[27]]->format('c');
        }

        if ($result[$keys[28]] instanceof \DateTimeInterface) {
            $result[$keys[28]] = $result[$keys[28]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSource) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'source';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'source';
                        break;
                    default:
                        $key = 'Source';
                }

                $result[$key] = $this->aSource->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collC2Ms) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'c2Ms';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'c2ms';
                        break;
                    default:
                        $key = 'C2Ms';
                }

                $result[$key] = $this->collC2Ms->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collM2Ps) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'm2Ps';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'm2ps';
                        break;
                    default:
                        $key = 'M2Ps';
                }

                $result[$key] = $this->collM2Ps->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Attogram\SharedMedia\Orm\Media
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MediaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Attogram\SharedMedia\Orm\Media
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setSourceId($value);
                break;
            case 2:
                $this->setPageid($value);
                break;
            case 3:
                $this->setTitle($value);
                break;
            case 4:
                $this->setUrl($value);
                break;
            case 5:
                $this->setMime($value);
                break;
            case 6:
                $this->setWidth($value);
                break;
            case 7:
                $this->setHeight($value);
                break;
            case 8:
                $this->setSize($value);
                break;
            case 9:
                $this->setSha1($value);
                break;
            case 10:
                $this->setThumburl($value);
                break;
            case 11:
                $this->setThumbmime($value);
                break;
            case 12:
                $this->setThumbwidth($value);
                break;
            case 13:
                $this->setThumbheight($value);
                break;
            case 14:
                $this->setThumbsize($value);
                break;
            case 15:
                $this->setDescriptionurl($value);
                break;
            case 16:
                $this->setDescriptionurlshort($value);
                break;
            case 17:
                $this->setImagedescription($value);
                break;
            case 18:
                $this->setDatetimeoriginal($value);
                break;
            case 19:
                $this->setArtist($value);
                break;
            case 20:
                $this->setLicenseshortname($value);
                break;
            case 21:
                $this->setUsageterms($value);
                break;
            case 22:
                $this->setAttributionrequired($value);
                break;
            case 23:
                $this->setRestrictions($value);
                break;
            case 24:
                $this->setTimestamp($value);
                break;
            case 25:
                $this->setUser($value);
                break;
            case 26:
                $this->setUserid($value);
                break;
            case 27:
                $this->setCreatedAt($value);
                break;
            case 28:
                $this->setUpdatedAt($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = MediaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSourceId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPageid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTitle($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUrl($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMime($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setWidth($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setHeight($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSize($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSha1($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setThumburl($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setThumbmime($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setThumbwidth($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setThumbheight($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setThumbsize($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDescriptionurl($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDescriptionurlshort($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setImagedescription($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDatetimeoriginal($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setArtist($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setLicenseshortname($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setUsageterms($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setAttributionrequired($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setRestrictions($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setTimestamp($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setUser($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setUserid($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setCreatedAt($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setUpdatedAt($arr[$keys[28]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MediaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MediaTableMap::COL_ID)) {
            $criteria->add(MediaTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(MediaTableMap::COL_SOURCE_ID)) {
            $criteria->add(MediaTableMap::COL_SOURCE_ID, $this->source_id);
        }
        if ($this->isColumnModified(MediaTableMap::COL_PAGEID)) {
            $criteria->add(MediaTableMap::COL_PAGEID, $this->pageid);
        }
        if ($this->isColumnModified(MediaTableMap::COL_TITLE)) {
            $criteria->add(MediaTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(MediaTableMap::COL_URL)) {
            $criteria->add(MediaTableMap::COL_URL, $this->url);
        }
        if ($this->isColumnModified(MediaTableMap::COL_MIME)) {
            $criteria->add(MediaTableMap::COL_MIME, $this->mime);
        }
        if ($this->isColumnModified(MediaTableMap::COL_WIDTH)) {
            $criteria->add(MediaTableMap::COL_WIDTH, $this->width);
        }
        if ($this->isColumnModified(MediaTableMap::COL_HEIGHT)) {
            $criteria->add(MediaTableMap::COL_HEIGHT, $this->height);
        }
        if ($this->isColumnModified(MediaTableMap::COL_SIZE)) {
            $criteria->add(MediaTableMap::COL_SIZE, $this->size);
        }
        if ($this->isColumnModified(MediaTableMap::COL_SHA1)) {
            $criteria->add(MediaTableMap::COL_SHA1, $this->sha1);
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBURL)) {
            $criteria->add(MediaTableMap::COL_THUMBURL, $this->thumburl);
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBMIME)) {
            $criteria->add(MediaTableMap::COL_THUMBMIME, $this->thumbmime);
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBWIDTH)) {
            $criteria->add(MediaTableMap::COL_THUMBWIDTH, $this->thumbwidth);
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBHEIGHT)) {
            $criteria->add(MediaTableMap::COL_THUMBHEIGHT, $this->thumbheight);
        }
        if ($this->isColumnModified(MediaTableMap::COL_THUMBSIZE)) {
            $criteria->add(MediaTableMap::COL_THUMBSIZE, $this->thumbsize);
        }
        if ($this->isColumnModified(MediaTableMap::COL_DESCRIPTIONURL)) {
            $criteria->add(MediaTableMap::COL_DESCRIPTIONURL, $this->descriptionurl);
        }
        if ($this->isColumnModified(MediaTableMap::COL_DESCRIPTIONURLSHORT)) {
            $criteria->add(MediaTableMap::COL_DESCRIPTIONURLSHORT, $this->descriptionurlshort);
        }
        if ($this->isColumnModified(MediaTableMap::COL_IMAGEDESCRIPTION)) {
            $criteria->add(MediaTableMap::COL_IMAGEDESCRIPTION, $this->imagedescription);
        }
        if ($this->isColumnModified(MediaTableMap::COL_DATETIMEORIGINAL)) {
            $criteria->add(MediaTableMap::COL_DATETIMEORIGINAL, $this->datetimeoriginal);
        }
        if ($this->isColumnModified(MediaTableMap::COL_ARTIST)) {
            $criteria->add(MediaTableMap::COL_ARTIST, $this->artist);
        }
        if ($this->isColumnModified(MediaTableMap::COL_LICENSESHORTNAME)) {
            $criteria->add(MediaTableMap::COL_LICENSESHORTNAME, $this->licenseshortname);
        }
        if ($this->isColumnModified(MediaTableMap::COL_USAGETERMS)) {
            $criteria->add(MediaTableMap::COL_USAGETERMS, $this->usageterms);
        }
        if ($this->isColumnModified(MediaTableMap::COL_ATTRIBUTIONREQUIRED)) {
            $criteria->add(MediaTableMap::COL_ATTRIBUTIONREQUIRED, $this->attributionrequired);
        }
        if ($this->isColumnModified(MediaTableMap::COL_RESTRICTIONS)) {
            $criteria->add(MediaTableMap::COL_RESTRICTIONS, $this->restrictions);
        }
        if ($this->isColumnModified(MediaTableMap::COL_TIMESTAMP)) {
            $criteria->add(MediaTableMap::COL_TIMESTAMP, $this->timestamp);
        }
        if ($this->isColumnModified(MediaTableMap::COL_USER)) {
            $criteria->add(MediaTableMap::COL_USER, $this->user);
        }
        if ($this->isColumnModified(MediaTableMap::COL_USERID)) {
            $criteria->add(MediaTableMap::COL_USERID, $this->userid);
        }
        if ($this->isColumnModified(MediaTableMap::COL_CREATED_AT)) {
            $criteria->add(MediaTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(MediaTableMap::COL_UPDATED_AT)) {
            $criteria->add(MediaTableMap::COL_UPDATED_AT, $this->updated_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildMediaQuery::create();
        $criteria->add(MediaTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Attogram\SharedMedia\Orm\Media (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSourceId($this->getSourceId());
        $copyObj->setPageid($this->getPageid());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setMime($this->getMime());
        $copyObj->setWidth($this->getWidth());
        $copyObj->setHeight($this->getHeight());
        $copyObj->setSize($this->getSize());
        $copyObj->setSha1($this->getSha1());
        $copyObj->setThumburl($this->getThumburl());
        $copyObj->setThumbmime($this->getThumbmime());
        $copyObj->setThumbwidth($this->getThumbwidth());
        $copyObj->setThumbheight($this->getThumbheight());
        $copyObj->setThumbsize($this->getThumbsize());
        $copyObj->setDescriptionurl($this->getDescriptionurl());
        $copyObj->setDescriptionurlshort($this->getDescriptionurlshort());
        $copyObj->setImagedescription($this->getImagedescription());
        $copyObj->setDatetimeoriginal($this->getDatetimeoriginal());
        $copyObj->setArtist($this->getArtist());
        $copyObj->setLicenseshortname($this->getLicenseshortname());
        $copyObj->setUsageterms($this->getUsageterms());
        $copyObj->setAttributionrequired($this->getAttributionrequired());
        $copyObj->setRestrictions($this->getRestrictions());
        $copyObj->setTimestamp($this->getTimestamp());
        $copyObj->setUser($this->getUser());
        $copyObj->setUserid($this->getUserid());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getC2Ms() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addC2M($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getM2Ps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addM2P($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Attogram\SharedMedia\Orm\Media Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildSource object.
     *
     * @param  ChildSource $v
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSource(ChildSource $v = null)
    {
        if ($v === null) {
            $this->setSourceId(NULL);
        } else {
            $this->setSourceId($v->getId());
        }

        $this->aSource = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSource object, it will not be re-added.
        if ($v !== null) {
            $v->addMedia($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSource object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSource The associated ChildSource object.
     * @throws PropelException
     */
    public function getSource(ConnectionInterface $con = null)
    {
        if ($this->aSource === null && ($this->source_id != 0)) {
            $this->aSource = ChildSourceQuery::create()->findPk($this->source_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSource->addMedias($this);
             */
        }

        return $this->aSource;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('C2M' == $relationName) {
            $this->initC2Ms();
            return;
        }
        if ('M2P' == $relationName) {
            $this->initM2Ps();
            return;
        }
    }

    /**
     * Clears out the collC2Ms collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addC2Ms()
     */
    public function clearC2Ms()
    {
        $this->collC2Ms = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collC2Ms collection loaded partially.
     */
    public function resetPartialC2Ms($v = true)
    {
        $this->collC2MsPartial = $v;
    }

    /**
     * Initializes the collC2Ms collection.
     *
     * By default this just sets the collC2Ms collection to an empty array (like clearcollC2Ms());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initC2Ms($overrideExisting = true)
    {
        if (null !== $this->collC2Ms && !$overrideExisting) {
            return;
        }

        $collectionClassName = C2MTableMap::getTableMap()->getCollectionClassName();

        $this->collC2Ms = new $collectionClassName;
        $this->collC2Ms->setModel('\Attogram\SharedMedia\Orm\C2M');
    }

    /**
     * Gets an array of ChildC2M objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMedia is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildC2M[] List of ChildC2M objects
     * @throws PropelException
     */
    public function getC2Ms(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collC2MsPartial && !$this->isNew();
        if (null === $this->collC2Ms || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collC2Ms) {
                // return empty collection
                $this->initC2Ms();
            } else {
                $collC2Ms = ChildC2MQuery::create(null, $criteria)
                    ->filterByMedia($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collC2MsPartial && count($collC2Ms)) {
                        $this->initC2Ms(false);

                        foreach ($collC2Ms as $obj) {
                            if (false == $this->collC2Ms->contains($obj)) {
                                $this->collC2Ms->append($obj);
                            }
                        }

                        $this->collC2MsPartial = true;
                    }

                    return $collC2Ms;
                }

                if ($partial && $this->collC2Ms) {
                    foreach ($this->collC2Ms as $obj) {
                        if ($obj->isNew()) {
                            $collC2Ms[] = $obj;
                        }
                    }
                }

                $this->collC2Ms = $collC2Ms;
                $this->collC2MsPartial = false;
            }
        }

        return $this->collC2Ms;
    }

    /**
     * Sets a collection of ChildC2M objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $c2Ms A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMedia The current object (for fluent API support)
     */
    public function setC2Ms(Collection $c2Ms, ConnectionInterface $con = null)
    {
        /** @var ChildC2M[] $c2MsToDelete */
        $c2MsToDelete = $this->getC2Ms(new Criteria(), $con)->diff($c2Ms);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->c2MsScheduledForDeletion = clone $c2MsToDelete;

        foreach ($c2MsToDelete as $c2MRemoved) {
            $c2MRemoved->setMedia(null);
        }

        $this->collC2Ms = null;
        foreach ($c2Ms as $c2M) {
            $this->addC2M($c2M);
        }

        $this->collC2Ms = $c2Ms;
        $this->collC2MsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related C2M objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related C2M objects.
     * @throws PropelException
     */
    public function countC2Ms(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collC2MsPartial && !$this->isNew();
        if (null === $this->collC2Ms || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collC2Ms) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getC2Ms());
            }

            $query = ChildC2MQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMedia($this)
                ->count($con);
        }

        return count($this->collC2Ms);
    }

    /**
     * Method called to associate a ChildC2M object to this object
     * through the ChildC2M foreign key attribute.
     *
     * @param  ChildC2M $l ChildC2M
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function addC2M(ChildC2M $l)
    {
        if ($this->collC2Ms === null) {
            $this->initC2Ms();
            $this->collC2MsPartial = true;
        }

        if (!$this->collC2Ms->contains($l)) {
            $this->doAddC2M($l);

            if ($this->c2MsScheduledForDeletion and $this->c2MsScheduledForDeletion->contains($l)) {
                $this->c2MsScheduledForDeletion->remove($this->c2MsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildC2M $c2M The ChildC2M object to add.
     */
    protected function doAddC2M(ChildC2M $c2M)
    {
        $this->collC2Ms[]= $c2M;
        $c2M->setMedia($this);
    }

    /**
     * @param  ChildC2M $c2M The ChildC2M object to remove.
     * @return $this|ChildMedia The current object (for fluent API support)
     */
    public function removeC2M(ChildC2M $c2M)
    {
        if ($this->getC2Ms()->contains($c2M)) {
            $pos = $this->collC2Ms->search($c2M);
            $this->collC2Ms->remove($pos);
            if (null === $this->c2MsScheduledForDeletion) {
                $this->c2MsScheduledForDeletion = clone $this->collC2Ms;
                $this->c2MsScheduledForDeletion->clear();
            }
            $this->c2MsScheduledForDeletion[]= clone $c2M;
            $c2M->setMedia(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Media is new, it will return
     * an empty collection; or if this Media has previously
     * been saved, it will retrieve related C2Ms from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Media.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildC2M[] List of ChildC2M objects
     */
    public function getC2MsJoinCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildC2MQuery::create(null, $criteria);
        $query->joinWith('Category', $joinBehavior);

        return $this->getC2Ms($query, $con);
    }

    /**
     * Clears out the collM2Ps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addM2Ps()
     */
    public function clearM2Ps()
    {
        $this->collM2Ps = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collM2Ps collection loaded partially.
     */
    public function resetPartialM2Ps($v = true)
    {
        $this->collM2PsPartial = $v;
    }

    /**
     * Initializes the collM2Ps collection.
     *
     * By default this just sets the collM2Ps collection to an empty array (like clearcollM2Ps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initM2Ps($overrideExisting = true)
    {
        if (null !== $this->collM2Ps && !$overrideExisting) {
            return;
        }

        $collectionClassName = M2PTableMap::getTableMap()->getCollectionClassName();

        $this->collM2Ps = new $collectionClassName;
        $this->collM2Ps->setModel('\Attogram\SharedMedia\Orm\M2P');
    }

    /**
     * Gets an array of ChildM2P objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMedia is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildM2P[] List of ChildM2P objects
     * @throws PropelException
     */
    public function getM2Ps(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collM2PsPartial && !$this->isNew();
        if (null === $this->collM2Ps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collM2Ps) {
                // return empty collection
                $this->initM2Ps();
            } else {
                $collM2Ps = ChildM2PQuery::create(null, $criteria)
                    ->filterByMedia($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collM2PsPartial && count($collM2Ps)) {
                        $this->initM2Ps(false);

                        foreach ($collM2Ps as $obj) {
                            if (false == $this->collM2Ps->contains($obj)) {
                                $this->collM2Ps->append($obj);
                            }
                        }

                        $this->collM2PsPartial = true;
                    }

                    return $collM2Ps;
                }

                if ($partial && $this->collM2Ps) {
                    foreach ($this->collM2Ps as $obj) {
                        if ($obj->isNew()) {
                            $collM2Ps[] = $obj;
                        }
                    }
                }

                $this->collM2Ps = $collM2Ps;
                $this->collM2PsPartial = false;
            }
        }

        return $this->collM2Ps;
    }

    /**
     * Sets a collection of ChildM2P objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $m2Ps A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMedia The current object (for fluent API support)
     */
    public function setM2Ps(Collection $m2Ps, ConnectionInterface $con = null)
    {
        /** @var ChildM2P[] $m2PsToDelete */
        $m2PsToDelete = $this->getM2Ps(new Criteria(), $con)->diff($m2Ps);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->m2PsScheduledForDeletion = clone $m2PsToDelete;

        foreach ($m2PsToDelete as $m2PRemoved) {
            $m2PRemoved->setMedia(null);
        }

        $this->collM2Ps = null;
        foreach ($m2Ps as $m2P) {
            $this->addM2P($m2P);
        }

        $this->collM2Ps = $m2Ps;
        $this->collM2PsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related M2P objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related M2P objects.
     * @throws PropelException
     */
    public function countM2Ps(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collM2PsPartial && !$this->isNew();
        if (null === $this->collM2Ps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collM2Ps) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getM2Ps());
            }

            $query = ChildM2PQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMedia($this)
                ->count($con);
        }

        return count($this->collM2Ps);
    }

    /**
     * Method called to associate a ChildM2P object to this object
     * through the ChildM2P foreign key attribute.
     *
     * @param  ChildM2P $l ChildM2P
     * @return $this|\Attogram\SharedMedia\Orm\Media The current object (for fluent API support)
     */
    public function addM2P(ChildM2P $l)
    {
        if ($this->collM2Ps === null) {
            $this->initM2Ps();
            $this->collM2PsPartial = true;
        }

        if (!$this->collM2Ps->contains($l)) {
            $this->doAddM2P($l);

            if ($this->m2PsScheduledForDeletion and $this->m2PsScheduledForDeletion->contains($l)) {
                $this->m2PsScheduledForDeletion->remove($this->m2PsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildM2P $m2P The ChildM2P object to add.
     */
    protected function doAddM2P(ChildM2P $m2P)
    {
        $this->collM2Ps[]= $m2P;
        $m2P->setMedia($this);
    }

    /**
     * @param  ChildM2P $m2P The ChildM2P object to remove.
     * @return $this|ChildMedia The current object (for fluent API support)
     */
    public function removeM2P(ChildM2P $m2P)
    {
        if ($this->getM2Ps()->contains($m2P)) {
            $pos = $this->collM2Ps->search($m2P);
            $this->collM2Ps->remove($pos);
            if (null === $this->m2PsScheduledForDeletion) {
                $this->m2PsScheduledForDeletion = clone $this->collM2Ps;
                $this->m2PsScheduledForDeletion->clear();
            }
            $this->m2PsScheduledForDeletion[]= clone $m2P;
            $m2P->setMedia(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Media is new, it will return
     * an empty collection; or if this Media has previously
     * been saved, it will retrieve related M2Ps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Media.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildM2P[] List of ChildM2P objects
     */
    public function getM2PsJoinPage(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildM2PQuery::create(null, $criteria);
        $query->joinWith('Page', $joinBehavior);

        return $this->getM2Ps($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSource) {
            $this->aSource->removeMedia($this);
        }
        $this->id = null;
        $this->source_id = null;
        $this->pageid = null;
        $this->title = null;
        $this->url = null;
        $this->mime = null;
        $this->width = null;
        $this->height = null;
        $this->size = null;
        $this->sha1 = null;
        $this->thumburl = null;
        $this->thumbmime = null;
        $this->thumbwidth = null;
        $this->thumbheight = null;
        $this->thumbsize = null;
        $this->descriptionurl = null;
        $this->descriptionurlshort = null;
        $this->imagedescription = null;
        $this->datetimeoriginal = null;
        $this->artist = null;
        $this->licenseshortname = null;
        $this->usageterms = null;
        $this->attributionrequired = null;
        $this->restrictions = null;
        $this->timestamp = null;
        $this->user = null;
        $this->userid = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collC2Ms) {
                foreach ($this->collC2Ms as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collM2Ps) {
                foreach ($this->collM2Ps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collC2Ms = null;
        $this->collM2Ps = null;
        $this->aSource = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MediaTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildMedia The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[MediaTableMap::COL_UPDATED_AT] = true;

        return $this;
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
