<?php

function getClientIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    }
    return $_SERVER['REMOTE_ADDR'] ?? null;
}

function getIpLocation($ip)
{
    $url = "http://ip-api.com/json/{$ip}";

    $response = file_get_contents($url);
    if (!$response) {
        return null;
    }

    $data = json_decode($response, true);

    return $data['status'] === 'success' ? $data : null;
}