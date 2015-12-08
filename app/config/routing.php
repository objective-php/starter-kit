<?php

    return [

        // route aliasing
        //
        // allow very (very!) basic SEO
        'router.routes' => [
            '/' => '/home' // this one is needed for default routing process
                           // it means that the URL "/" will be handled just
                           // like "/home" has been requested, and will map
                           // to "Action\Home" action name
        ]
    ];