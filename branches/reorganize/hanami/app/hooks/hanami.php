<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Hanami base file.
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license    
 */

define('HANAMI_VERSION', '0.1');
define('HANAMI_CODENAME', '');

Hanami::setup();

// Load i18n
new I18n;

I18n::set_locale(Kohana::$locale);
