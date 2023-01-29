# Discord Webhook Sender

A simple & lightweight webhook sender.

Based on the code from [this Stack exchange answer]("https://stackoverflow.com/a/62447056"), this library is a lightweight Discord Webhook Event Sender that comes with two main functions.

------------

# Installation

run the following command in your project

```bash
composer require louisgjbertrand/discordwebhook
```

------------

# Usage

## Requirements

the buit-in CURL Library is required. please uncomment the curl library in your php.ini file

```ini
# in the php.ini file
extension=curl
```

require the class in the php script you need it in.

```php
require './vendor/autoload.php';

use LouisGJBertrand\DiscordWebhook\DiscordWebhook;
```

## Sending the event

you just have to use the Send function to send a message.
only the url is required in this function.

you can use a pointer to store the json response from the discord api using the response param.

```php
DiscordWebhook::Send($webhookurl, content: $content, response: $response);
```

not all parameters are supported in the current state, but will be added later. It's mapping the discord webhook api.

```php
static public function Send(
        string $webhookurl,
        string $content = null,
        string $username = null,
        string $avatar_url = null,
        bool $tts = false,
        array $embeds = null,
        string &$response = null)
```

note: tts is text to speech.

## Generating embeded messages

you can create an array in order to create an embeded message using this function

```php
$embed = DiscordWebhook::GenerateEmbed(title: "test", description: "test embeded message");
$embeds = [$embed];
```

putting the embeded message in an array is necessary since it's asked in the [discord webhook documentation](https://discord.com/developers/docs/resources/webhook). the maximum embeded messages by webhook events is 10.

the function, to generate an embeded message follows the discord documentation.

```php
static public function GenerateEmbed(
        string $title = null,
        string $type = null,
        string $description = null,
        string $url = null,
        int $timestamp = null,
        int $color= null,
        array $footer= null,
        array $image= null,
        array $thumbnail= null,
        array $video= null,
        array $provider= null,
        array $author= null,
        array $fields= null): array
```

in the future, arrays will be replaced by discord api objects but will still remain retro compatible.

------------

# Example Script

you can find this example script in the tests/ folder.

```php
require './vendor/autoload.php';

use LouisGJBertrand\DiscordWebhook\DiscordWebhook;


// Replace with the webhook url
$webhookurl = "https://discord.com/api/webhooks/.../...";


$embed = DiscordWebhook::GenerateEmbed(title: "test", description: "test embeded message");
$embeds = [$embed];

DiscordWebhook::Send($webhookurl, embeds: $embeds, response: $response);

// returns the response from the Discord API
var_dump($response);
```

# Notes

this library does not use ssl verification for curl by default. Please set the secure flag in the static variable `DiscordWebhook::$SECURE_CURL_CONNECTION` to true in order to use SSL verification for CURL.



# External Ressources

[1 - composer documentation](https://getcomposer.org/doc/)
[2 - Discord Webhook Documentation](https://discord.com/developers/docs/resources/webhook#execute-webhook-jsonform-params)
[3 - Discord Embeded Message Documentation](https://discord.com/developers/docs/resources/channel#embed-object)
[4 - Stack Exchange Discord Webhook Original Post](https://stackoverflow.com/questions/59219193/how-can-i-send-a-discord-webhook-using-php)