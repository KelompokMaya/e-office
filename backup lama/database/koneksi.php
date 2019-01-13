<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "db_eoffice";
	

	/*$db_host = "sql12.freemysqlhosting.net";
	$db_user = "sql12196540";
	$db_pass = "R74qLCMy92";
	$db_name = "sql12196540"; */

	$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if(mysqli_connect_errno())
	{
		echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
	}
?>