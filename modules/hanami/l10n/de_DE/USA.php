<?php defined('SYSPATH') or die('No direct script access.');

// Phone prefix and format
$locale['phone_prefix'] = '1';
$locale['phone_format'] = '3-3-4';

// State names
$locale['states'] = array
(
	'AL' => 'Alabama',
	'AK' => 'Alaska',
	'AZ' => 'Arizona',
	'AR' => 'Arkansas',
	'CA' => 'Kalifornien',
	'CO' => 'Colorado',
	'CT' => 'Connecticut',
	'DE' => 'Delaware',
	'DC' => 'District of Columbia',
	'FL' => 'Florida',
	'GA' => 'Georgia',
	'HI' => 'Hawaii',
	'ID' => 'Idaho',
	'IL' => 'Illinois',
	'IN' => 'Indiana',
	'IA' => 'Iowa',
	'KS' => 'Kansas',
	'KY' => 'Kentucky',
	'LA' => 'Louisiana',
	'ME' => 'Maine',
	'MD' => 'Maryland',
	'MA' => 'Massachusetts',
	'MI' => 'Michigan',
	'MN' => 'Minnesota',
	'MS' => 'Mississippi',
	'MO' => 'Missouri',
	'MT' => 'Montana',
	'NE' => 'Nebraska',
	'NV' => 'Nevada',
	'NH' => 'New Hampshire',
	'NJ' => 'New Jersey',
	'NM' => 'New Mexico',
	'NY' => 'New York',
	'NC' => 'North Carolina',
	'ND' => 'North Dakota',
	'OH' => 'Ohio',
	'OK' => 'Oklahoma',
	'OR' => 'Oregon',
	'PA' => 'Pennsylvania',
	'RI' => 'Rhode Island',
	'SC' => 'South Carolina',
	'SD' => 'South Dakota',
	'TN' => 'Tennessee',
	'TX' => 'Texas',
	'UT' => 'Utah',
	'VT' => 'Vermont',
	'VA' => 'Virginia',
	'WA' => 'Washington',
	'WV' => 'West Virginia',
	'WI' => 'Wisconsin',
	'WY' => 'Wyoming',
);

// States with territories
$locale['all_states'] = array_merge($locale['states'], array
(
	'AS' => 'Amerikanisch-Samoa',
	'GU' => 'Guam',
	'FM' => 'Föderierte Staaten von Mikronesien',
	'MH' => 'Marshallinseln',
	'MP' => 'Nördliche Marianen',
	'PW' => 'Palau',
	'PR' => 'Puerto Rico',
	'VI' => 'Amerikanische Jungferninseln',
));
// Re-sort the list
ksort($locale['all_states']);


$locale['date_format'] = array
(
	'date'     => '%M %D, %Y',
	'time'     => '%H:%i',
	'datetime' => '%M %D, %Y'
);