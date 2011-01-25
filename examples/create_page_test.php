<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$PageTest = new PageTest();

# Use the Sandbox environment
$PageTest->setSandbox(true);

# Set the url that you want to be test
$PageTest->setURL('http://www.mailingreport.com');

# Reuest a free of charge test.
$PageTest->setFreeTest(true);

$PageTest = $LitmusAPI->createPageTest($PageTest);

# show the result
var_dump($PageTest);

?>