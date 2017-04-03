<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTesis */

$this->title = 'Update Proyecto Tesis: ' . $model->id_proyecto;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proyecto, 'url' => ['view', 'id' => $model->id_proyecto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyecto-tesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
