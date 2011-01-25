<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$PageTest = $LitmusAPI->getPageTest(000000);

var_dump($PageTest);

?>