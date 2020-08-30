<?php

namespace app\components;

use Yii;
use yii\web\Request;
use yii\web\UrlManager as YiiUrlManager;

/**
 * UrlManager
 * Allows to translate urls dynamically.
 */
class UrlManager extends YiiUrlManager
{
    public $enablePrettyUrl = true;
    public $showScriptName  = false;

    public $language;

    /**
     * Translated controllers names.
     * language code => [
     *      source name => translated name
     * ]
     * @var array
     */
    public $languageControllers = [
        'Flensburg' => [
            'site'  => 'flensburg',
        ],
        'Schleswig'=>[
            'site'  => 'schleswig',
        ],

        'Eckernförde'=>[
            'site'  => 'eckernförde',
        ],

        'Niebüll'=>[
            'site'  => 'niebüll',
        ],

        'Sylt'=>[
            'site'  => 'sylt',
        ],

        'Wyk'=>[
            'site'  => 'wyk',
        ],

        'Husum'=>[
            'site'  => 'husum',
        ],

        'Rendsburg'=>[
            'site'  => 'rendsburg',
        ],

        'Neumünster'=>[
            'site'  => 'neumünster',
        ],

        'Itzehoe'=>[
            'site'  => 'itzehoe',
        ],

        'Glücksstadt'=>[
            'site'  => 'glücksstadt',
        ],

        'Wilster'=>[
            'site'  => 'wilster',
        ],

        'Eutin'=>[
            'site'  => 'eutin',
        ],

        'Badoldesloe'=>[
            'site'  => 'badoldesloe',
        ],

        'Elmshorn'=>[
            'site'  => 'elmshorn',
        ],

        'Barmstedt'=>[
            'site'  => 'barmstedt',
        ],

        'Pinneberg'=>[
            'site'  => 'pinneberg',
        ],

        'Quickborn'=>[
            'site'  => 'quickborn',
        ],

        'Schenefeld'=>[
            'site'  => 'schenefeld',
        ],

        'Wedel'=>[
            'site'  => 'wedel',
        ],

        'Lübz'=>[
            'site'  => 'lübz',
        ],

        'Parchim'=>[
            'site'  => 'parchim',
        ],

        'Güstrow'=>[
            'site'  => 'güstrow',
        ],

        'Gadebusch'=>[
            'site'  => 'gadebusch',
        ],

        'Hagenow'=>[
            'site'  => 'hagenow',
        ],

        'Ludwigslust'=>[
            'site'  => 'ludwigslust',
        ],

        'Perlenberg'=>[
            'site'  => 'perlenberg',
        ],

        'Sternberg'=>[
            'site'  => 'sternberg',
        ],

        'Schwerin'=>[
            'site'  => 'schwerin',
        ],

        'Rostock'=>[
            'site'  => 'rostock',
        ]
    ];

    /**
     * Initializes UrlManager.
     */
    public function init()
    {
        parent::init();

        if (empty($this->language)) {
            $this->language = Yii::$app->language;
        }
    }

    /**
     * Creates translated url.
     * @param array $params
     * @return string the created URL
     */
    public function createUrl($params)
    {
        $params = (array)$params;

        $route = explode('/', trim($params[0], '/'));
        if (isset($route[0]) && !empty($this->languageControllers[$this->language][$route[0]])) {
            $route[0] = $this->languageControllers[$this->language][$route[0]];
        }
        if (isset($route[1]) && !empty($this->languageActions[$this->language][$route[1]])) {
            $route[1] = $this->languageActions[$this->language][$route[1]];
        }
        $params[0] = implode('/', $route);

        return parent::createUrl($params);
    }

    /**
     * Translates the request back to the source one.
     * @param Request $request the request component
     * @return Request
     */
    public function translateRequest($request)
    {
        if (empty($this->languageControllers[$this->language])) {
            return $request;
        }
        $url = ltrim($request->getPathInfo(), '/');
        $parts = explode('/', $url);
        $controller = $parts[0];
        $action = isset($parts[1]) ? $parts[1] : null;
        foreach ($this->languageControllers[$this->language] as $default => $localized) {
            if ($localized == $controller) {
                $controller = $default;
                break;
            }
        }
        $parts[0] = $controller;
        if ($action !== null) {
            foreach ($this->languageActions[$this->language] as $default => $localized) {
                if ($localized === substr($action, 0, mb_strlen($localized, 'UTF-8'))) {
                    $action = $default . substr($action, mb_strlen($localized, 'UTF-8'));
                    break;
                }
            }
            $parts[1] = $action;
        }
        $request->setPathInfo(implode('/', $parts));
        return $request;
    }

    /**
     * Parses and translates the user request.
     * @param Request $request the request component
     * @return array|boolean the route and the associated parameters. The latter is always empty
     * if [[enablePrettyUrl]] is false. False is returned if the current request cannot be successfully parsed.
     */
    public function parseRequest($request)
    {
        return parent::parseRequest($this->translateRequest($request));
    }
}