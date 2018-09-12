<?php
$server = "140.131.114.241";
$connectionInfo = array( "Database"=>"107-204", "UID"=>"s107204", "PWD"=>"ss107204", 'ReturnDatesAsStrings'=> true, "CharacterSet"=>"UTF-8" );
$conn = sqlsrv_connect( $server, $connectionInfo );
?>