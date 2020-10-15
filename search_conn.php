<?php
	include_once "dbconnect.php";

	if (isset($_POST['submit-search'])) {
		$_SESSION['X'] = $_POST['Search'];
		
		redirect("search.php");
	}else{
		redirect("search.php");
	}
?>