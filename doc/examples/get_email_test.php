<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$EmailTest = $LitmusAPI->getEmailTest($emailTestId);

var_dump($EmailTest);