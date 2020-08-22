<?php
		//session_start();
	    function function_alert($msg) {
	        echo "<script type='text/javascript'>alert('$msg');</script>";
	    }
		$msg = "";
		$css_class = "";
        $host = "localhost";
        $dbusername = "admin";
        $dbpassword = "summergroup";
        $dbname = "bookstore";				
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

?>