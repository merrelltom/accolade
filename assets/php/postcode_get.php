<?php


//$postcode = $_POST["postcode"];
$postcode =  isset($_POST['postcode']) ? $_POST['postcode'] : '';
//$postcode = 'RG74UU';

if ( strlen($postcode) < 7  && strlen($postcode) > 0 ) {
  $postcode = substr($postcode, 0, -3) . ' ' . substr($postcode, -3);
}

//print_r($postcode);
//echo("\n");

$db = new SQLite3('../db/simple_postcode.db', SQLITE3_OPEN_READWRITE);

$statement = $db->prepare('SELECT "SPRGRP" FROM "simple_lookup" WHERE "PCD" = ?');
$statement->bindValue(1, $postcode);
$result = $statement->execute();

//echo("Get the 1st row as an associative array:\n");
$val = $result->fetchArray(SQLITE3_ASSOC);

if ( !is_array($val)) {
  echo('none');
} else {
  echo($val['SPRGRP']);
}
$result->finalize();