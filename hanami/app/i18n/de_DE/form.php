<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * @todo Translating de_DE/form.php
 */
$lang = array
(
	'username' => array
    (
        'required' => 'The name cannot be blank.',
        'alpha'    => 'Only alphabetic characters are allowed.',
        'length'   => 'The name must be between three and twenty letters.',
        'default'  => 'Invalid Input.',
    ),
	'number' => array
    (
        'required' => 'The number cannot be blank.',
        'numeric'  => 'Only numbers are allowed.',
        'length'   => 'The number must be between three and five numerals.',
        'default'  => 'Invalid Input.',
    ),
	'code' => array
    (
        'numeric' => 'Only numbers are allowed.',
        'length'  => 'The code must be exactly three numerals.',
        'default' => 'Invalid Input.',
    ),
	'password' => array
    (
        'required'  => 'Bitte gib ein Passwort an.',
        'pwd_check' => 'The password is not correct.',
        'default'   => 'Invalid Input.',
    ),
);