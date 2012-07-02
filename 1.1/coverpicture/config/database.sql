--
-- Tabellenstruktur für Tabelle `tl_module_coverpicture`
--

CREATE TABLE `tl_module_coverpicture` (
  `id` int(10) NOT NULL auto_increment,
  `tstamp` int(10) NOT NULL default '0',
  `title` varchar(128) NOT NULL default '',
  `resize_image` char(1) NOT NULL default '0',
  `singleSRC` varchar(255) NOT NULL default '',
  `multiPages` blob NULL,
  `jumpTo` smallint(5) unsigned NOT NULL default '0',
  `size` varchar(64) NOT NULL default '',
  `no_inheritance` char(1) NOT NULL default '0',
  `standard` char(1) NOT NULL default '0',
  `use_as_background` char(1) NOT NULL default '0',
  `bgposition` varchar(32) NOT NULL default '',
  `bgrepeat` varchar(32) NOT NULL default '',
  `bgCssID` varchar(255) NOT NULL default '',
  `bgcolor` varchar(64) NOT NULL default '',
  `imageMap` blob NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;