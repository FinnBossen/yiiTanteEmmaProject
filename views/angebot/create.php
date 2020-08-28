<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Angebot */

$this->title = 'Create Angebot';
$this->params['breadcrumbs'][] = ['label' => 'Angebots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angebot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
