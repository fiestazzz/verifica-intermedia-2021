<?php
require './class/User.php';
require './lib/sanitize.php';
require './lib/searchFunctions.php';
require './lib/funzioneCreaOggetti.php';


$users = include(__DIR__."/mockdata_array.php");

// Test ricerca omonimi
// expectedResult è il risultato della funzione  count applicato al risultato della ricerca 
$testResultsDataset = array(
	array(
		"firstName" => "Achille",
		"lastName" => "BIANCHI",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Adamo",
		"lastName" => "ROSSI",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Adriano",
		"lastName" => "ROMANO",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Luigi",
		"lastName" => "RUSSO",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Mario",
		"lastName" => "FERRARI",
		"expectedResult" => 2,
	),
);

foreach ($testResultsDataset as $row) {
        extract($row);
		$Users=UserFactory($users);
		$Users=array_filter($Users , searchTextNome($firstName));
		$Users=array_filter($Users , searchTextCognome($lastName));
		if($expectedResult === count($Users))
		{
			echo "Pass";
		}
		else
		{
			echo "Fail";
		}

		
        
}