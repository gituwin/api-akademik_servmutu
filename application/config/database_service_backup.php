<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
$active_record = TRUE;


$db['default']['hostname'] 	= '172.16.4.115'; 
$db['default']['username']	= "postgres";
$db['default']['password'] 	= "Pmegaloman01";
$db['default']['database'] 	= "mutu2";
$db['default']['dbdriver'] 		= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['default']['dbprefix'] 		= '';
$db['default']['pconnect'] 	= FALSE; #sebelumnya TRUE
$db['default']['db_debug'] 	= TRUE;
$db['default']['cache_on'] 	= FALSE;
$db['default']['cachedir'] 		= '';
$db['default']['char_set'] 		= 'utf8';
$db['default']['dbcollat'] 		= 'utf8_general_ci';
$db['default']['swap_pre']	= '';
$db['default']['autoinit'] 		= TRUE;
$db['default']['stricton'] 		= FALSE;

$db['mutu']['hostname'] 	= '172.16.4.115'; 
$db['mutu']['username'] 	= "postgres";
$db['mutu']['password'] 	= "Pmegaloman01";
$db['mutu']['database'] 	= "mutu2";
$db['mutu']['dbdriver'] 		= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['mutu']['dbprefix']		= '';
$db['mutu']['pconnect'] 	= FALSE; #sebelumnya TRUE
$db['mutu']['db_debug'] 	= TRUE;
$db['mutu']['cache_on'] 	= FALSE;
$db['mutu']['cachedir'] 	= '';
$db['mutu']['char_set'] 	= 'utf8';
$db['mutu']['dbcollat'] 		= 'utf8_general_ci';
$db['mutu']['swap_pre'] 	= '';
$db['mutu']['autoinit'] 		= TRUE;
$db['mutu']['stricton'] 		= FALSE;

$db['kuesioner']['hostname'] 	= '172.16.4.115'; 
$db['kuesioner']['username'] 	= "postgres";
$db['kuesioner']['password'] 	= "Pmegaloman01";
$db['kuesioner']['database'] 	= "kuesioner";
$db['kuesioner']['dbdriver'] 	= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['kuesioner']['dbprefix']	= '';
$db['kuesioner']['pconnect'] 	= FALSE; #sebelumnya TRUE
$db['kuesioner']['db_debug'] 	= TRUE;
$db['kuesioner']['cache_on'] 	= FALSE;
$db['kuesioner']['cachedir'] 	= '';
$db['kuesioner']['char_set'] 	= 'utf8';
$db['kuesioner']['dbcollat'] 		= 'utf8_general_ci';
$db['kuesioner']['swap_pre'] 	= '';
$db['kuesioner']['autoinit'] 		= TRUE;
$db['kuesioner']['stricton'] 		= FALSE;

$db['kuesioner2']['hostname'] 	= '172.16.9.106'; 
$db['kuesioner2']['username'] 	= "postgres";
$db['kuesioner2']['password'] 	= "danang";
$db['kuesioner2']['database'] 	= "kuesioner";
$db['kuesioner2']['dbdriver'] 	= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['kuesioner2']['dbprefix']	= '';
$db['kuesioner2']['pconnect'] 	= FALSE; #sebelumnya TRUE
$db['kuesioner2']['db_debug'] 	= TRUE;
$db['kuesioner2']['cache_on'] 	= FALSE;
$db['kuesioner2']['cachedir'] 	= '';
$db['kuesioner2']['char_set'] 	= 'utf8';
$db['kuesioner2']['dbcollat'] 		= 'utf8_general_ci';
$db['kuesioner2']['swap_pre'] 	= '';
$db['kuesioner2']['autoinit'] 		= TRUE;
$db['kuesioner2']['stricton'] 		= FALSE;

$db['kerjasama']['hostname'] 	= '172.16.4.115'; 
$db['kerjasama']['username'] 	= "postgres";
$db['kerjasama']['password'] 	= "Pmegaloman01";
$db['kerjasama']['database'] 	= "kerjasama";
$db['kerjasama']['dbdriver'] 		= "postgre_edit"; #lihat file driver di "system/database/drivers/postgre_edit/postgre_edit_driver.php"
$db['kerjasama']['dbprefix']		= '';
$db['kerjasama']['pconnect'] 	= FALSE; #sebelumnya TRUE
$db['kerjasama']['db_debug'] 	= TRUE;
$db['kerjasama']['cache_on'] 	= FALSE;
$db['kerjasama']['cachedir'] 	= '';
$db['kerjasama']['char_set'] 	= 'utf8';
$db['kerjasama']['dbcollat'] 	= 'utf8_general_ci';
$db['kerjasama']['swap_pre'] 	= '';
$db['kerjasama']['autoinit'] 	= TRUE;
$db['kerjasama']['stricton']	= FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */