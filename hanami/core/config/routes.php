<?php defined('SYSPATH') or die('No direct access allowed.');

$config['login'] = 'auth/login';

$config['(scripts|js)/(.+)\.js$'] = 'scripts/index/$1';
$config['(styles|css)/(.+)\.css$'] = 'styles/index/$2';