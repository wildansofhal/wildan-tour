<?php

function mine(){
    return 
    [
        "domain"       => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] ,
        
        "title"        => 'Dulbali',

        "longTitle"    => 'Dulbali Tour and Travel',

        "slogan"       => 'The best Tour and Travel in Bali',

        "number"       => '+62 81353991747',

        "linkWa"       => function(){
            return 'https://api.whatsapp.com/send/?phone=6281353991747&text=Halo Admin%0A' . mine()['domain'] . '&type=phone_number&app_absent=0';
        },

        "linkBooking"  => function(){
            return 'https://api.whatsapp.com/send/?phone=6281353991747&text=Halo Admin%0A%0A*I Want to book a tour package.*%0A' . mine()['domain'] . $_SERVER['REQUEST_URI'] . '&type=phone_number&app_absent=0';
        },

        'dollar'       => function($parm){
            // return "Rp " . number_format($parm,0,',','.'); 
            return '$ ' . number_format($parm, 2, '.', ',');
        }


    ];
}

?>