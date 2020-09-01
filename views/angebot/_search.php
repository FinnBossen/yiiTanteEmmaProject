<?php

use app\models\Filiale;
use app\services\CalenderService;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AngebotSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
// service Dependencies
$calenderService = new CalenderService();
?>
<!-- Search form for the Angebote list -->
<div class="angebot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'kalender_woche')->dropDownList($calenderService->calenderWeeks,['prompt'=>'select calenderWeek']) ?>

    <?= $form->field($model, 'filiale_id')->dropDownList(
        ArrayHelper::map(Filiale::find()->orderBy('standort')->asArray()->all(), 'id', 'standort')
    ,['prompt'=>'select location']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
