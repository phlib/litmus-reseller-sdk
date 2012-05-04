<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;
use Litmus\Email\EmailTest;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$EmailTest = new EmailTest();

# Use the Sandbox environment
$EmailTest->setSandbox(true);

# Reuest a free of charge test
$EmailTest->initializeFreeTest();

$EmailTest = $LitmusAPI->createEmailTest($EmailTest);

# show the result
var_dump($EmailTest);