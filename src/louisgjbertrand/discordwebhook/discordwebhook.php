<?php


namespace LouisGJBertrand\DiscordWebhook;
class DiscordWebhook
{

    static public function GenerateEmbed(
        string $title = null,
        string $type = null,
        string $description = null,
        string $url = null,
        string $timestamp = null,
        string $color= null,
        string $footer= null,
        string $image= null,
        string $thumbnail= null,
        string $video= null,
        string $provider= null,
        string $author= null,
        string $fields= null): array
    {

        $embeded = [];

        if($title != null)
        {
            $embeded["title"] = $title;
        }
        if($type != null)
        {
            $embeded["type"] = $type;
        }
        if($description != null)
        {
            $embeded["description"] = $description;
        }
        if($url != null)
        {
            $embeded["url"] = $url;
        }
        if($timestamp != null)
        {
            $embeded["timestamp"] = $timestamp;
        }
        if($color != null)
        {
            $embeded["color"] = $color;
        }
        if($footer != null)
        {
            $embeded["footer"] = $footer;
        }
        if($image != null)
        {
            $embeded["image"] = $image;
        }
        if($thumbnail != null)
        {
            $embeded["thumbnail"] = $thumbnail;
        }
        if($video != null)
        {
            $embeded["video"] = $video;
        }
        if($provider != null)
        {
            $embeded["provider"] = $provider;
        }
        if($author != null)
        {
            $embeded["author"] = $author;
        }
        if($fields != null)
        {
            $embeded["fields"] = $fields;
        }

        return $embeded;

    }

    static public function Send(
        string $webhookurl,
        string $content = null,
        string $username = null,
        string $avatar_url = null,
        bool $tts = false,
        array $embeds = null,
        string &$response = null)
    {

        /**
         * Prepare Request
         */
        $headers = [ 'Content-Type: application/json; charset=utf-8' ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $webhookurl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        /**
         * Prepare Webhook
         */
        $POST = [];

        if($content != null)
        {
            $POST["content"] = $content;
        }
        if($username != null)
        {
            $POST["username"] = $username;
        }
        if($avatar_url != null)
        {
            $POST["avatar_url"] = $avatar_url;
        }
        if($tts != null)
        {
            $POST["tts"] = $tts;
        }
        if($embeds != null)
        {
            $POST["embeds"] = $embeds;
        }


        /**
         * Send Request
         */
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
        $response   = curl_exec($ch);

    }

}