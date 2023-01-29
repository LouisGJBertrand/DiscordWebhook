<?php

require './vendor/autoload.php';

use LouisGJBertrand\DiscordWebhook\DiscordWebhook;


//=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "https://discord.com/api/webhooks/1069266253933453352/S6mQ5iyYyFsGrd51hhpixvAS3TXlXNR-SFwtiT5vcv9n2Srd2Usls5welU1Wa2ZuonO1";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================


$embed = DiscordWebhook::GenerateEmbed(title: "test", description: "test embeded message");
$embeds = [$embed];

$response;

DiscordWebhook::Send($webhookurl, embeds: $embeds, response: $response);

var_dump($response);