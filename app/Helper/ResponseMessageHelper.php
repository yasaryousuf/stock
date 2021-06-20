<?php


namespace App\Helper;


class ResponseMessageHelper
{
    public static $response_message = [
        'model_created' => 'New %s created!',
        'model_updated' => '%s updated!',
        'model_deleted' => '%s deleted!',
        'invalid_credential' => 'You have entered invalid credentials.',
        'registration_successful' => 'You have Successfully logged in.',
    ];
}
