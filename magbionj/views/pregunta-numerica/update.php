<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PreguntaNumerica */

$this->title = 'Update Pregunta Numerica: ' . $model->id_pregunta_numerica;
$this->params['breadcrumbs'][] = ['label' => 'Pregunta Numericas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pregunta_numerica, 'url' => ['view', 'id' => $model->id_pregunta_numerica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pregunta-numerica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
