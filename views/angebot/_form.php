<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Filiale;

/* @var $this yii\web\View */
/* @var $model app\models\Angebot */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$calenderWeeks = array();

function getCurrentCalenderWeek(){
    return date('W');
}
function getCurrentWeeksInYear() {
    $date = new DateTime;
    $date->setISODate(date('Y'), 53);
    return ($date->format('W') === '53' ? 53 : 52);
}
function compareCalenderWeeks($currentWeek){
   // return $calenderWeeks[$currentWeek+1];
}
for ($i = 1; $i <= getCurrentWeeksInYear(); $i++) {
    array_push($calenderWeeks, 'Klw_'.$i);
}
echo 'first week'. $calenderWeeks[0]. 'current week'. getCurrentCalenderWeek();
?>

<div class="angebot-form">

    <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput()  ?>

    <?= $form->field($model, 'kalender_woche')->dropDownList($calenderWeeks,['prompt'=>'select calenderWeek'])?>

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
