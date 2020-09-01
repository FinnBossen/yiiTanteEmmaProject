<?php

namespace app\services;


use app\models\Filiale;
use yii\base\Component;

class LocationService extends Component
{
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

    function __construct()
    {
        parent::__construct();
    }

    // returns random location from above array
    public function randomLocation()
    {
        return $this->locations[array_rand($this->locations)];
    }

    //checks Filiale locations and returns its ID based on the route of the website;
    public function findLocationIDfromRoute($route)
    {

        $filialen = Filiale::find()->all();
        foreach ($filialen as $model) {
            $filaleFormatted = str_replace(' ', '', strtolower($model->standort));

            if ($filaleFormatted == $route) {
                return $model->id;
            }
        }
        return null;
    }

}