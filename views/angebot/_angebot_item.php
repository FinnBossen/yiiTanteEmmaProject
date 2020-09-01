<?php

use app\models\Filiale;
use yii\helpers\Html;

/* @var $model app\models\Angebot */
?>

<!-- Preview Angebot View for the Angebote list -->
<div class="angebot_AdminWrapper">

    <div class="angebot_werbemittel">
        <a href=<?= $model->detail_link ?>>
            <h1 class="angebot_title"><?= $model->name ?></h1>
            <?= Html::img($model->visual, ['alt' => 'some', 'class' => 'angebot_visual']); ?>
        </a>
    </div>
    <div class="angebot_adminHandler">
        <table class="angebot_adminDetails">
            <h3 class="angebot_adminDetailsTitel">Details</h3>
            <tr>
                <td> AngebotName:</td>
                <td> <?= $model->name ?></td>
            </tr>
            <tr>
                <td> Kalenderwoche:</td>
                <td> <?= $model->kalender_woche ?></td>
            </tr>
            <tr>
                <td> Filiale:</td>
                <td> <?= Filiale::find()->where(['id' => $model->filiale_id])->one()->standort; ?></td>
            </tr>

            <tr>
                <td> Link:</td>
                <td> <?= $model->detail_link ?></td>
            </tr>
        </table>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <p class="angebot_adminActions">
                <?= Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="newLineWerbemittelAdmin"></div>
</div>

