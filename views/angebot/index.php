<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AngebotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Angebote';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angebot-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Angebot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'visual',
            'kalender_woche',
            'detail_link',
            //'filiale_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
