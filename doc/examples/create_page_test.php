<?php

# include parameters an boostraping class
if (file_exists(__DIR__ . "/../../parameters.ini")) {
    $ini_array = parse_ini_file(__DIR__ . "/../../parameters.ini");
}
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

# use required class
use Litmus\LitmusAPI;
use Litmus\Email\EmailTest;

# Instance a new Litmus API
$LitmusAPI = new LitmusAPI($ini_array['apiKey'], $ini_array['apiPass']);

# Instance a new EmailTest
$PageTest = new PageTest();

# Use the Sandbox environment
$PageTest->setSandbox(true);

# Set the url that you want to be test
$PageTest->setURL('http://www.mailingreport.com');

# Reuest a free of charge test
$PageTest->initializeFreeTest();

# launch request an get the result
$PageTest = $LitmusAPI->createPageTest($PageTest);

# show the result
var_dump($PageTest);