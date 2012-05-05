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
$EmailTest = new EmailTest();

# Use the Sandbox environment
$EmailTest->setSandbox(true);

# Reuest a free of charge test
$EmailTest->initializeFreeTest();

# launch request an get the result
$EmailTest = $LitmusAPI->createEmailTest($EmailTest);

# show the result
var_dump($EmailTest);