<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Session key
    |--------------------------------------------------------------------------
    |
    | This defines which key is used in the session to store the information.
    | Change this value if you would already use the key for something else
    | in your application
    |
    */


    'sessionKey' => 'flash_message',

    /*
    |--------------------------------------------------------------------------
    | Levels
    |--------------------------------------------------------------------------
    |
    | This defines the different levels which can be called
    | If changed, do not forget to set the necessary styles in the view file
    |
    */

    'levels' => [
        'info',
        'success',
        'warning',
        'error',
    ],

    /*
    |--------------------------------------------------------------------------
    | Defaults
    |--------------------------------------------------------------------------
    |
    | Default values which can be changed
    | Dismissable (bool): are the messages dismissable by default?
    |
    */


    'defaults' => [
        'dismissable' => true,
    ],
];
