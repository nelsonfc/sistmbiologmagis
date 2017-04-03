<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RespuestaNumerica */

$this->title = 'Create Respuesta Numerica';
$this->params['breadcrumbs'][] = ['label' => 'Respuesta Numericas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respuesta-numerica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
