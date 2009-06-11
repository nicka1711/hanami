<p><em>This module requires Auth or a similar databased user system.</em><p>

<p>The following tables must be installed in your database: blog_articles, blog_categories, and blog_comments. If you have not already installed these tables, please run the following query:</p>

<pre>
CREATE TABLE IF NOT EXISTS `blog_articles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `posted` datetime NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL COMMENT 'author',
  `allow_comments` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL COMMENT 'author',
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) default NULL,
  `blog_article_id` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
</pre>

<p>After the tables have been installed, <?php echo html::anchor('blog_admin_demo/article', 'create a new article') ?>, <?php echo html::anchor('blog_demo/articles', 'list all articles') ?> or <?php echo html::anchor('blog_demo/archive', 'view the archive') ?>.</p>