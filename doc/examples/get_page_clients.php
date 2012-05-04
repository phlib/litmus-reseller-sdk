<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$clients = $LitmusAPI->getPageClients();

echo "Supported Page Clients:" . "\n";

foreach ($clients as $PageClient) {
    echo "- {$PageClient->getApplicationLongName()} | {$PageClient->getApplicationName()} [status: {$PageClient->getStatus()}]" . "\n";
}