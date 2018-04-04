<?php 

	include 'lib/DateRange.php';

	
	$dateRange = new DateRange("2018-03-30","2018-04-04");
	$dateRange->setDateReturnFormat("d-M-Y");
	echo "<pre>";
	var_dump($dateRange->getDateArrayOverRange());

 ?>