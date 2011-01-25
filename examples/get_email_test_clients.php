<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$clients = $LitmusAPI->getEmailTestClients();

echo "Supported Email Clients: \n";

foreach ($clients as $EmailTestClient)
{
    echo "- {$EmailTestClient->getApplicationLongName()} | {$EmailTestClient->getApplicationName()} [status: {$EmailTestClient->getStatus()}]\n";
}

?>