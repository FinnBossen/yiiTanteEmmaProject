<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AngebotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Angebote';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Index View of the Angebote Route -->
<div class="angebot-index">
    <?php
    echo $this->render('_search', ['model' => $searchModel]);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) : ?>
        <p>
            <?= Html::a('Create Angebot', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_angebot_item'
    ]); ?>
</div>
