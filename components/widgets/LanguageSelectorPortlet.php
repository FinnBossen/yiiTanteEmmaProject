<?php
namespace app\components\widgets;
use Yii;
use yii\helpers\Html;
use yii\base\Widget;
use app\components\views;

class LanguageSelectorPortlet extends Widget
{
    public function init(){
        $this->renderContent();
    }

    public function renderContent()
    {
        $currentLang = Yii::$app->language;

        $languages = Yii::$app->params['languages'];
        echo $this->render('languageSelector', array('currentLang' => $currentLang,    'languages'=>$languages));
    }
}