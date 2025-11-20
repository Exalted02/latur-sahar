<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('sms.base_url');
    }

    public function sendTemplate($mobile, $templateKey, $params = [])
    {
        $template = config("sms.templates.$templateKey");

        if (!$template) {
            return "Invalid template key: $templateKey";
        }

        // Replace variables in message
        $message = $template['message'];
        foreach ($params as $key => $value) {
            $message = str_replace("{".$key."}", $value, $message);
        }

        $response = Http::get($this->baseUrl, [
            'UserID'     => config('sms.user_id'),
            'Password'   => config('sms.password'),
            'SenderID'   => config('sms.sender_id'),
            'Phno'       => $mobile,
            'Msg'        => $message,
            'EntityID'   => config('sms.entity_id'),
            'TemplateID' => $template['id'],
        ]);

        return $response->body();
    }
}
