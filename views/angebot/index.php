<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AngebotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Angebote';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angebot-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) : ?>
    <p>
        <?= Html::a('Create Angebot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'itemView' => '_angebot_item'
    ]); ?>


</div>
