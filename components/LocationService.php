<?php

namespace app\components;


class LocationService
{
    public static $currentLocation = 'Flensburg';
    private $locations = array(
        'Flensburg',

        'Schleswig',

        'Eckernförde',

        'Niebüll',

        'Sylt',

        'Wyk auf Föhr',

        'Husum',

        'Rendsburg',

        'Neumünster',

        'Itzehoe',

        'Glücksstadt',

        'Wilster',

        'Eutin',

        'Bad Oldesloe',

        'Elmshorn',

        'Barmstedt',

        'Pinneberg',

        'Quickborn',

        'Schenefeld',

        'Wedel',

        'Lübz',

        'Parchim',

        'Güstrow',

        'Gadebusch',

        'Hagenow',

        'Ludwigslust',

        'Perlenberg',

        'Sternberg',

        'Schwerin',

        'Rostock'
    );

    public function randomLocation(){
        LocationService::$currentLocation = $this->locations[array_rand($this->locations)];
    }
    public static function returnRules(){
        return [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'site/login',
                LocationService::$currentLocation=> '',
                'signup' => 'site/signup',
                'article/<action:(index|update|create|delete)>' => 'article/<action>',
                'article/<slug>' => 'article/view'
            ],
        ];
    }

}