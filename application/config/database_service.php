<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
                 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = true;


// $db['default']['hostname'] 	= '172.16.4.11x5';
// $db['default']['username']	= "postgres";
// $db['default']['password'] 	= "Pmegaloman01";
// $db['default']['database'] 	= "mutu2";
// $db['default']['dbdriver'] 		= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
// $db['default']['dbprefix'] 		= '';
// $db['default']['pconnect'] 	= FALSE; #sebelumnya TRUE
// $db['default']['db_debug'] 	= TRUE;
// $db['default']['cache_on'] 	= FALSE;
// $db['default']['cachedir'] 		= '';
// $db['default']['char_set'] 		= 'utf8';
// $db['default']['dbcollat'] 		= 'utf8_general_ci';
// $db['default']['swap_pre']	= '';
// $db['default']['autoinit'] 		= TRUE;
// $db['default']['stricton'] 		= FALSE;

$db['mutu']['hostname'] 	= '10.1.249.114';
$db['mutu']['username'] 	= "mutu3";
$db['mutu']['password'] 	= "mutu3@2021.";
$db['mutu']['database'] 	= "mutu3";
$db['mutu']['dbdriver'] 		= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['mutu']['dbprefix']		= '';
$db['mutu']['pconnect'] 	= false; #sebelumnya TRUE
$db['mutu']['db_debug'] 	= true;
$db['mutu']['cache_on'] 	= false;
$db['mutu']['cachedir'] 	= '';
$db['mutu']['char_set'] 	= 'utf8';
$db['mutu']['dbcollat'] 		= 'utf8_general_ci';
$db['mutu']['swap_pre'] 	= '';
$db['mutu']['autoinit'] 		= true;
$db['mutu']['stricton'] 		= false;

// $db['kuesioner']['hostname'] 	= '10.0.8.37';
// $db['kuesioner']['username'] 	= "postgres";
// $db['kuesioner']['password'] 	= "postgres";
// $db['kuesioner']['database'] 	= "kuesioner2018";
// $db['kuesioner']['dbdriver'] 	= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
// $db['kuesioner']['dbprefix']	= '';
// $db['kuesioner']['pconnect'] 	= FALSE; #sebelumnya TRUE
// $db['kuesioner']['db_debug'] 	= TRUE;
// $db['kuesioner']['cache_on'] 	= FALSE;
// $db['kuesioner']['cachedir'] 	= '';
// $db['kuesioner']['char_set'] 	= 'utf8';
// $db['kuesioner']['dbcollat'] 		= 'utf8_general_ci';
// $db['kuesioner']['swap_pre'] 	= '';
// $db['kuesioner']['autoinit'] 		= TRUE;
// $db['kuesioner']['stricton'] 		= FALSE;

$db['kuesioner']['hostname'] 	= '10.1.248.91';
$db['kuesioner']['username'] 	= "kuesioner";
$db['kuesioner']['password'] 	= "kuesioner";
$db['kuesioner']['database'] 	= "administrativa01";
$db['kuesioner']['schema'] 	= "kuesioner";
$db['kuesioner']['dbdriver'] 	= "postgre"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['kuesioner']['dbprefix']	= '';
$db['kuesioner']['pconnect'] 	= false; #sebelumnya TRUE
$db['kuesioner']['db_debug'] 	= true;
$db['kuesioner']['cache_on'] 	= false;
$db['kuesioner']['cachedir'] 	= '';
$db['kuesioner']['char_set'] 	= 'utf8';
$db['kuesioner']['dbcollat'] 		= 'utf8_general_ci';
$db['kuesioner']['swap_pre'] 	= '';
$db['kuesioner']['autoinit'] 		= true;
$db['kuesioner']['stricton'] 		= false;


$db['ppk']['hostname'] 	= '10.1.248.62';
$db['ppk']['username'] 	= "ppkk";
$db['ppk']['password'] 	= "ppkk@2023.";
$db['ppk']['database'] 	= "ppkk";
// $db['ppk']['schema'] 	= "kuesioner";
$db['ppk']['dbdriver'] 	= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['ppk']['dbprefix']	= '';
$db['ppk']['pconnect'] 	= false; #sebelumnya TRUE
$db['ppk']['db_debug'] 	= true;
$db['ppk']['cache_on'] 	= false;
$db['ppk']['cachedir'] 	= '';
$db['ppk']['char_set'] 	= 'utf8';
$db['ppk']['dbcollat'] 		= 'utf8_general_ci';
$db['ppk']['swap_pre'] 	= '';
$db['ppk']['autoinit'] 		= true;
$db['ppk']['stricton'] 		= false;



$db['workload']['hostname'] 	= '10.1.248.62';
$db['workload']['username'] 	= "workload";
$db['workload']['password'] 	= "workload@2023.";
$db['workload']['database'] 	= "workload";
$db['workload']['schema'] 	= "workload";
$db['workload']['dbdriver'] 	= "postgre"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['workload']['dbprefix']	= '';
$db['workload']['pconnect'] 	= false; #sebelumnya TRUE
$db['workload']['db_debug'] 	= true;
$db['workload']['cache_on'] 	= false;
$db['workload']['cachedir'] 	= '';
$db['workload']['char_set'] 	= 'utf8';
$db['workload']['dbcollat'] 		= 'utf8_general_ci';
$db['workload']['swap_pre'] 	= '';
$db['workload']['autoinit'] 		= true;
$db['workload']['stricton'] 		= false;

$db['kerjasama']['hostname'] 	= '172.16.4.115';
$db['kerjasama']['username'] 	= "postgres";
$db['kerjasama']['password'] 	= "Pmegaloman01";
$db['kerjasama']['database'] 	= "kerjasama";
$db['kerjasama']['dbdriver'] 		= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['kerjasama']['dbprefix']		= '';
$db['kerjasama']['pconnect'] 	= false; #sebelumnya TRUE
$db['kerjasama']['db_debug'] 	= true;
$db['kerjasama']['cache_on'] 	= false;
$db['kerjasama']['cachedir'] 	= '';
$db['kerjasama']['char_set'] 	= 'utf8';
$db['kerjasama']['dbcollat'] 	= 'utf8_general_ci';
$db['kerjasama']['swap_pre'] 	= '';
$db['kerjasama']['autoinit'] 	= true;
$db['kerjasama']['stricton']	= false;

/* End of file database.php */
/* Location: ./application/config/database.php */
