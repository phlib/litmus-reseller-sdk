<?php

include "parameters.php";
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

use Litmus\LitmusAPI;

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$clients = $LitmusAPI->getEmailClients();

echo "Supported Email Clients:" . "\n";

foreach ($clients as $EmailClient) {
    echo "- {$EmailClient->getApplicationLongName()} | {$EmailClient->getApplicationName()} [status: {$EmailClient->getStatus()}]" . "\n";
}