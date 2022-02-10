<?php
    function OpenCon()
    {
        $dbhost = "localhost:3308";
        $dbuser = "root";
        $dbpass = "";
        $db = "sigma";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
        
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }
    
?>