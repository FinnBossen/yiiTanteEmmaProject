<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Angebot */
/* @var $form ActiveForm */
?>
<div class="WerbeMittel">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'visual') ?>
        <?= $form->field($model, 'kalender_woche') ?>
        <?= $form->field($model, 'filiale_id') ?>
        <?= $form->field($model, 'file') ?>
        <?= $form->field($model, 'detail_link') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- WerbeMittel -->
