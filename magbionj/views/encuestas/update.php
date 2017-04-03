<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Encuestas */

$this->title = 'Update Encuestas: ' . $model->id_encuesta;
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_encuesta, 'url' => ['view', 'id' => $model->id_encuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encuestas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
