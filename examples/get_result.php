<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$result = $LitmusAPI->getResult(000000);

var_dump($result);

?>