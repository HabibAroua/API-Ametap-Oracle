<?php
	$tns = "  
    		(
			DESCRIPTION =
        				(
						ADDRESS_LIST =
            					(
							ADDRESS = (PROTOCOL = TCP)(HOST =192.168.43.212)(PORT = 1521)
						)
        				)
        		(
				CONNECT_DATA =
            			(SERVICE_NAME = XE)
        		)
    		)";
	$db_username = "Ametap";
    	$db_password = "informatique";
    	try
    	{
        	$conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
    	}
	catch(PDOException $e)
	{
        	echo ($e->getMessage());
    	}
?>
