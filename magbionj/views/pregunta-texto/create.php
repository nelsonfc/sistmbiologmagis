<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PreguntaTexto */

$this->title = 'Create Pregunta Texto';
$this->params['breadcrumbs'][] = ['label' => 'Pregunta Textos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-texto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
