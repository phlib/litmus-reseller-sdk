<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$result = $LitmusAPI->getResult(7380204);

var_dump($result);