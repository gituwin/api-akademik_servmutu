<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2022-09-29 02:30:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;22607&quot;
LINE 2:                 WHERE id_prodi = ''22607'' AND sia_pddikti =...
                                           ^ /var/www/html/service_mutu/system/database/drivers/postgre_edit/postgre_edit_driver.php 176
ERROR - 2022-09-29 02:30:29 --> Query error: ERROR:  syntax error at or near "22607"
LINE 2:                 WHERE id_prodi = ''22607'' AND sia_pddikti =...
                                           ^
ERROR - 2022-09-29 03:05:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  operator does not exist: character varying = integer
LINE 2:                 WHERE id_prodi = 22607 AND sia_pddikti = 1 A...
                                       ^
HINT:  No operator matches the given name and argument type(s). You might need to add explicit type casts. /var/www/html/service_mutu/system/database/drivers/postgre_edit/postgre_edit_driver.php 176
ERROR - 2022-09-29 03:05:45 --> Query error: ERROR:  operator does not exist: character varying = integer
LINE 2:                 WHERE id_prodi = 22607 AND sia_pddikti = 1 A...
                                       ^
HINT:  No operator matches the given name and argument type(s). You might need to add explicit type casts.
