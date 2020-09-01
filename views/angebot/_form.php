<?php

use app\models\Filiale;
use app\services\CalenderService;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Angebot */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
// service Dependencies
$calenderService = new CalenderService();
?>
<!-- Creation form for the model Angebot -->
<div class="angebot-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <p class='creation_information'>When File is left bland placeholder will be generated </p>

    <?= $form->field($model, 'kalender_woche')->dropDownList($calenderService->calenderWeeks, ['prompt' => 'select calenderWeek']) ?>
    <p class='creation_information'>When Kalender Woche is left blank current Kalender Woche will be entered </p>

    <?= $form->field($model, 'detail_link')->textInput(['maxlength' => true]) ?>
    <p class='creation_information'>When the link is left blank random website will be entered</p>

    <?= $form->field($model, 'filiale_id')->dropDownList(
        ArrayHelper::map(Filiale::find()->orderBy('standort')->asArray()->all(), 'id', 'standort'),
        ['prompt' => 'select location']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
