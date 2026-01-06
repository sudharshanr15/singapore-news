<?php

include_once __DIR__ . "/utils.php";
require_once __DIR__ . '/../vendor/autoload.php';

use Appwrite\Client;
use Appwrite\Services\Databases;
use Appwrite\ID;

$client = new Client();

$client
    ->setEndpoint('https://fra.cloud.appwrite.io/v1')
    ->setProject('695d18100032d97c7761')
    ->setKey('standard_9cf3eff0341747619256c6a115633f837806779e48ceec8d3ab22278dd74139c03ba693d8aaddf3048319a821ac4b48ceeed940dcfc11bc870405254ef9d33de6a97501cf040955599c6c0fafcb47ca91699e109e297c7dae514335802813588a81c3e1b8374460283aea03766549cf5c05fc4de1b4ff8375cb02ecde9c94264');

$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? NULL;
$ip = getClientIp();

$location = getIpLocation($ip);

$database = new Databases($client);
$database->createDocument(
    "695d18430026a2f5c19b",
    "requests",
    ID::unique(),
    [
        "user_agent" => $user_agent,
        "ip_details" => json_encode($location),
        "ip_address" => $ip
    ]
);