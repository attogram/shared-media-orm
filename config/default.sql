
-----------------------------------------------------------------------
-- category
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [category];

CREATE TABLE [category]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [pageid] INTEGER,
    [title] VARCHAR(255),
    [files] INTEGER,
    [subcats] INTEGER,
    [pages] INTEGER,
    [size] INTEGER,
    [hidden] INTEGER,
    UNIQUE ([pageid],[title]),
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- media
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [media];

CREATE TABLE [media]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [pageid] INTEGER,
    [title] VARCHAR(255),
    [url] VARCHAR(255),
    [mime] VARCHAR(255),
    [width] INTEGER,
    [height] INTEGER,
    [size] INTEGER,
    [sha1] VARCHAR(255),
    [thumburl] VARCHAR(255),
    [thumbmime] VARCHAR(255),
    [thumbwidth] INTEGER,
    [thumbheight] INTEGER,
    [thumbsize] INTEGER,
    [descriptionurl] VARCHAR(255),
    [descriptionurlshort] VARCHAR(255),
    [imagedescription] LONGTEXT,
    [datetimeoriginal] VARCHAR(255),
    [artist] VARCHAR(255),
    [licenseshortname] VARCHAR(255),
    [usageterms] VARCHAR(255),
    [attributionrequired] VARCHAR(255),
    [restrictions] VARCHAR(255),
    [timestamp] TIMESTAMP(255),
    [user] VARCHAR(255),
    [userid] INTEGER,
    UNIQUE ([pageid],[title]),
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- page
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [page];

CREATE TABLE [page]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [pageid] INTEGER,
    [title] VARCHAR(255),
    [displaytitle] VARCHAR(255),
    [page_image_free] VARCHAR(255),
    [wikibase_item] VARCHAR(255),
    [disambiguation] VARCHAR(255),
    [defaultsort] VARCHAR(255),
    UNIQUE ([pageid],[title]),
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- c2m
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [c2m];

CREATE TABLE [c2m]
(
    [category_id] INTEGER NOT NULL,
    [media_id] INTEGER NOT NULL,
    PRIMARY KEY ([category_id],[media_id]),
    UNIQUE ([category_id],[media_id]),
    FOREIGN KEY ([category_id]) REFERENCES [category] ([id]),
    FOREIGN KEY ([media_id]) REFERENCES [media] ([id])
);

-----------------------------------------------------------------------
-- c2p
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [c2p];

CREATE TABLE [c2p]
(
    [category_id] INTEGER NOT NULL,
    [page_id] INTEGER NOT NULL,
    PRIMARY KEY ([category_id],[page_id]),
    UNIQUE ([category_id],[page_id]),
    FOREIGN KEY ([category_id]) REFERENCES [category] ([id]),
    FOREIGN KEY ([page_id]) REFERENCES [page] ([id])
);

-----------------------------------------------------------------------
-- m2p
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [m2p];

CREATE TABLE [m2p]
(
    [media_id] INTEGER NOT NULL,
    [page_id] INTEGER NOT NULL,
    PRIMARY KEY ([media_id],[page_id]),
    UNIQUE ([media_id],[page_id]),
    FOREIGN KEY ([media_id]) REFERENCES [media] ([id]),
    FOREIGN KEY ([page_id]) REFERENCES [page] ([id])
);
