<?php

namespace App\Services;

class GoogleRecaptchaService
{
    private $url = "https://www.google.com/recaptcha/api/siteverify";

    public function getCaptcha($response)
    {
        $secretKey =  config('services.google.grecaptchaSecret');
        return json_decode( file_get_contents($this->url.'?secret='.$secretKey.'&response='.$response) );
    }

    public function checkCaptcha($response)
    {
        $return = $this->getCaptcha($response);

        return $return->success == true && $return->score > 0.5 ? true : false ;
    }
}
