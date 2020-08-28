<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Angebot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="angebot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kalender_woche')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filiale_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
