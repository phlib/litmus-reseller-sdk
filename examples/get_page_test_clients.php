<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$clients = $LitmusAPI->getPageTestClients();

echo "Supported Page Clients: \n";

foreach ($clients as $PageTestClient)
{
    echo "- {$PageTestClient->getApplicationLongName()} | {$PageTestClient->getApplicationName()} [status: {$PageTestClient->getStatus()}]\n";
}

?>