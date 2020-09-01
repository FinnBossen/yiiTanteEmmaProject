<?php
/* @var $this yii\web\View */

use app\models\Angebot;
use app\services\CalenderService;
use app\services\LocationService;
use yii\helpers\Html;

?>

<?php
// service Dependencies
$calenderService = new CalenderService();
$locationService = new LocationService();
?>
<!-- The Werbemittel Preview Slider -->
<h1>Werbemittel Preview</h1>
<div class="slider-container">
    <div class="my-slider">
        <?php
        // gets array of all Angebote with current route location and current Week
        // maybe better to use the window.location.href component from Javascript
        // because the Werbemittel is supposed to be used as a iframe and to determine
        // the route on sites like shz.de we need the client side route
        // and not the server sided.
        $url = substr(urldecode($_SERVER['REQUEST_URI']), 1);
        $id = $locationService->findLocationIDfromRoute($url);
        $array = Angebot::find()->where(['filiale_id' => $id, 'kalender_woche' => $calenderService->getCurrentCalenderWeek()])->limit(10)->all();
        ?>
        <?php foreach ($array as $model): ?>
            <div class="angebot_werbemittel">
                <a href=<?= $model->detail_link ?>>
                    <h1 class="angebot_title"><?= $model->name ?></h1>
                    <?= Html::img($model->visual, ['alt' => 'some', 'class' => 'angebot_visual']); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>




