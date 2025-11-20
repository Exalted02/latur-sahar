<?php

return [

    // Global API credentials
    'base_url'   => "http://alldigitalmsg.in/api/SmsApi/SendSingleApi",
    'user_id'   => 'NGSOLUTIONS',
    'password'  => 'fmvd2828FM',
    'sender_id' => 'LTRCMC',
    'entity_id' => '1001568227866742267',

    // All SMS templates
    'templates' => [

        'otp' => [
            'id'      => '1007742779198804600',
            'message' => 'OTP for your mobile verification is {otp} Latur city corporation',
        ],

        'grievance_1' => [
            'id'      => '1007965995431207323',
            'message' => 'Your grievance has been submitted successfully and complaint No {complaint_no} Latur City Corporation',
        ],

        'grievance_2' => [
            'id'      => '1007239595826889396',
            'message' => 'Your grievance has been re-submitted successfully and complaint No {complaint_no} Latur City Corporation',
        ],

    ],

];
