<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$PageTest = $LitmusAPI->getPageTest($pageTestId);

var_dump($PageTest);