<?php
		session_start();
	    //function to redirect page
		function redirect($page){    //php function to use js redirection
			echo '<script> window.location.href="'.$page .'" </script>';
		}

		//function alert
		function phpAlert($msg) {   //php function to use js alert
			echo '<script type="text/javascript">alert("' . $msg . '");</script>';
		}

		$msg = "";
		$css_class = "";
        $host = "localhost";
        $dbusername = "admin";
        $dbpassword = "summergroup";
        $dbname = "bookstore";				
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

?>