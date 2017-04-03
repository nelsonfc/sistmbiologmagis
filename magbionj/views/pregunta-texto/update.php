<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PreguntaTexto */

$this->title = 'Update Pregunta Texto: ' . $model->id_pregunta_texto;
$this->params['breadcrumbs'][] = ['label' => 'Pregunta Textos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pregunta_texto, 'url' => ['view', 'id' => $model->id_pregunta_texto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pregunta-texto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
