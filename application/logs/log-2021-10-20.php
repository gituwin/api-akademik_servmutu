<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2021-10-20 09:14:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...(a.status_penawaran =1 and c.id_jenis_responden = '') and (a...
                                                             ^ /home/service/servmutu/system/database/drivers/postgre/postgre_driver.php 180
ERROR - 2021-10-20 09:14:46 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...(a.status_penawaran =1 and c.id_jenis_responden = '') and (a...
                                                             ^
ERROR - 2021-10-20 09:17:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 4:    WHERE id_jenis_akreditasi IN ()
                                         ^ /home/service/servmutu/system/database/drivers/postgre_edit/postgre_edit_driver.php 176
ERROR - 2021-10-20 09:17:53 --> Query error: ERROR:  syntax error at or near ")"
LINE 4:    WHERE id_jenis_akreditasi IN ()
                                         ^
ERROR - 2021-10-20 11:47:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column reference &quot;kd_prodi&quot; is ambiguous
LINE 1: ...si_master_data.kd_unit, tmp_akd_master_fak.kd_fak,kd_prodi,n...
                                                             ^ /home/service/servmutu/system/database/drivers/postgre_edit/postgre_edit_driver.php 176
ERROR - 2021-10-20 11:47:46 --> Query error: ERROR:  column reference "kd_prodi" is ambiguous
LINE 1: ...si_master_data.kd_unit, tmp_akd_master_fak.kd_fak,kd_prodi,n...
                                                             ^
ERROR - 2021-10-20 15:52:50 --> Severity: Notice  --> Undefined index: jenis /home/service/servmutu/application/modules/mutu/m_akreditasi/models/m_sinkron.php 1083
ERROR - 2021-10-20 15:52:50 --> Severity: Notice  --> Undefined index: jenis /home/service/servmutu/application/modules/mutu/m_akreditasi/models/m_sinkron.php 1083
ERROR - 2021-10-20 15:52:50 --> Severity: Notice  --> Undefined index: jenis /home/service/servmutu/application/modules/mutu/m_akreditasi/models/m_sinkron.php 1083
