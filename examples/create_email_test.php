<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$EmailTest = new EmailTest();

# Use the Sandbox environment
$EmailTest->setSandbox(true);

# Reuest a free of charge test.
//$EmailTest->initializeFreeTest();

$EmailTest = $LitmusAPI->createEmailTest($EmailTest);

# show the result
var_dump($EmailTest);

?>