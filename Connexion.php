<?php
    $tns = "  
    (DESCRIPTION =
        (ADDRESS_LIST =
            (ADDRESS = (PROTOCOL = TCP)(HOST =192.168.1.7 )(PORT = 1521))
        )
        (CONNECT_DATA =
            (SERVICE_NAME = XE)
        )
    )";
	
    $db_username = "Ametap";
    $db_password = "informatique";
	
    try
	{
        $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
	    //echo 'Connexion succes';
    }
	catch(PDOException $e)
	{
        echo ($e->getMessage());
	    echo 'connexion echoué';
    }
	//echo date('d').'/'.date('m').'/'.date('Y');

?>