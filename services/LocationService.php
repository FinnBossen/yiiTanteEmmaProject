<?php

namespace app\services;


class LocationService
{
    function __construct() {

    }
    private $locations = array(
        'flensburg',

        'schleswig',

        'eckernförde',

        'niebüll',

        'sylt',

        'wykaufföhr',

        'husum',

        'rendsburg',

        'neumünster',

        'itzehoe',

        'glücksstadt',

        'wilster',

        'eutin',

        'badoldesloe',

        'elmshorn',

        'barmstedt',

        'pinneberg',

        'quickborn',

        'schenefeld',

        'wedel',

        'lübz',

        'parchim',

        'güstrow',

        'gadebusch',

        'hagenow',

        'ludwigslust',

        'perlenberg',

        'sternberg',

        'schwerin',

        'rostock'
    );

    public function randomLocation(){
        return $this->locations[array_rand($this->locations)];
    }

}