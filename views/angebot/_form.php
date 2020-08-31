<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Filiale;
use app\services\CalenderService;

/* @var $this yii\web\View */
/* @var $model app\models\Angebot */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$calenderService = new CalenderService();
?>

<div class="angebot-form">

    <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput()  ?>

    <?= $form->field($model, 'kalender_woche')->dropDownList($calenderService->calenderWeeks,['prompt'=>'select calenderWeek'])?>

    <?= $form->field($model, 'detail_link')->textInput(['maxlength' => true]) ?>
    <p>Wenn detail_link leer gelassen zufällige Webseite wird geladen</p>
    <?= $form->field($model, 'filiale_id')->dropDownList(
           ArrayHelper::map(Filiale::find()->orderBy('standort')->asArray()->all(), 'id', 'standort')
       )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
