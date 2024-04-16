<?php

namespace App\Services;

use Carbon\Carbon;

class TelegramService
{
    const PARSE_MODE_HTML = 'HTML';
    const PARSE_MODE_MARKDOWN = 'MarkdownV2';
    const LIFETIME = -1;
    //https://api.telegram.org/bot945151095:AAHNux9jpUJ6iH0VlY-ZYyIVgrX8u05sUiM/getUpdates

    private $botToken, $parseMode, $groupId;

    public function __construct($parseMode = self::PARSE_MODE_HTML)
    {
        $this->botToken = config('services.telegram.bot_token');
        //Set Parse mode;
        $this->parseMode = $parseMode;
        $this->groupId =  config('services.telegram.realtime_group');
    }

    public function sendMessage($message)
    {
        $this->sendRequest(
            config('rcms-services.telegram.realtime_group'),
            $message
        );
    }

    private function sendRequest($groupId, $message)
    {
        $url = 'https://api.telegram.org/bot' . $this->botToken . '/sendMessage?chat_id=' . $groupId . '&parse_mode=' . $this->parseMode . '&text=' . urlencode($message);

        @file_get_contents($url);
    }

    public function sendContact(
        string $product,
        string $email,
        string $user = null,
        string $note = null
    ){
        $message = $this->buildMessageContact($product, $email, $user, $note);
        
        $this->sendRequest(
            $this->groupId,
            $message
        );
    }

    public function sendBookingDemo(
        string $product,
        string $email,
        string $user = null,
        string $note = null
    ){
        $message = $this->buildMessageContact($product, $email, $user, $note);
        
        $this->sendRequest(
            config("services.telegram.booking_demo_group"),
            $message
        );
    }

    private function buildMessageContact(string $product, string $email, string $user,string $note = null)
    {
        $time = now()->format('Y-m-d H:i');

        $message = "<b>".strtoupper($product)."</b>\n\n";
        $message .= "<b>System  :</b> Landing Page\n";
        $message .= "<b>Time       :</b> {$time}\n";
        $message .= "<b>Email     :</b> {$email}\n";
        if($user)
            $message .= "<b>User       :</b> {$user}\n";
        
        if ($note)
            $message .= "<b>Note       :</b> \n" . ucfirst($note) . "\n ";

        return $message;
    }

    public function setGroupId($id)
    {
        $this->groupId = $id;
    }

}
