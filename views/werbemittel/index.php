<?php
/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use app\models\Angebot;
use app\models\Filiale;

use app\services\CalenderService;

?>
<h1>Werbemittel Preview</h1>
<div class="slider-container">
    <ul class="controls" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
        <li class="prev" data-controls="prev" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-left fa-5x"></i>
        </li>
        <li class="next" data-controls="next" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-right fa-5x"></i>
        </li>
    </ul>
    <div class="my-slider">
        <?php
        $calenderService = new CalenderService();
        $id = Filiale::find()->where(['standort' => 'Flensburg'])->one()->id;
        $array = Angebot::find()->where(['filiale_id' => $id])->where(['kalender_woche' =>$calenderService->getCurrentCalenderWeek()])->asArray()->all();
        ?>

        <?php foreach($array as $model): ?>
            <div  class="angebot_werbemittel" >
                <a href=<?= $model->detail_link ?>>
                    <h1 class="angebot_title"><?= $model->name ?></h1>
                    <?= Html::img('@web/'.$model->visual, ['alt'=>'some', 'class'=>'angebot_visual']);?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function getRoute(){

    }
   function getDate(){

   }
</script>
