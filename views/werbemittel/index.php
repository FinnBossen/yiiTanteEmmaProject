<?php
/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use app\models\Angebot;
use app\models\Filiale;

use app\services\CalenderService;
use yii\helpers\Html;

?>
<h1>Werbemittel Preview</h1>
<div class="slider-container">
    <div class="my-slider">
        <?php
        $calenderService = new CalenderService();
        $id = Filiale::find()->where(['standort' => 'Flensburg'])->one()->id;
        $array = Angebot::find()->where(['filiale_id' => $id])->where(['kalender_woche' =>$calenderService->getCurrentCalenderWeek()])->all();
        echo $array[0]->name;
        ?>

        <?php foreach($array as $model): ?>
            <div  class="angebot_werbemittel" >
                <a href=<?= $model->detail_link ?>>
                    <h1 class="angebot_title"><?= $model->name ?></h1>
                    <?= Html::img($model->visual, ['alt'=>'some', 'class'=>'angebot_visual']);?>
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
