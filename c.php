<?php
	echo 'Test conn...<br>';

	$connection = pg_connect ("host=172.16.4.115 dbname=mutu2 user=postgres password=Pmegaloman01");
	if($connection) {
		echo 'connected';
	} else {
		echo 'there has been an error connecting';
	}

/*
	$host        = "host = 172.16.4.115";
	$port        = "port = 5432";
	$dbname      = "dbname = postgres";
	$credentials = "user = mutu password=Pmegaloman01";
//	echo $host.$port.$dbname.$credentials;

	$db = pg_connect('"$host $port $dbname $credentials"');
	if(!$db) {
	echo "Error : Unable to open database\n";
	} else {
	echo "Opened database successfully\n";
	}
*/
//phpinfo();
//	echo 'Finn...<br>';
?>