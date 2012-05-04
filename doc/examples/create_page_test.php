<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;
use Litmus\Page\PageTest;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$PageTest = new PageTest();

# Use the Sandbox environment
$PageTest->setSandbox(true);

# Set the url that you want to be test
$PageTest->setURL('http://www.mailingreport.com');

# Reuest a free of charge test
$PageTest->initializeFreeTest();

$PageTest = $LitmusAPI->createPageTest($PageTest);

# show the result
var_dump($PageTest);