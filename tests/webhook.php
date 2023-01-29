<?php

require './vendor/autoload.php';

use LouisGJBertrand\DiscordWebhook\DiscordWebhook;


// Replace with the webhook url
$webhookurl = "https://discord.com/api/webhooks/.../...";


$embed = DiscordWebhook::GenerateEmbed(title: "test", description: "test embeded message");
$embeds = [$embed];

//DiscordWebhook::$SECURE_CURL_CONNECTION = true;

DiscordWebhook::Send($webhookurl, embeds: $embeds, response: $response);

// returns the response from the Discord API
var_dump($response);