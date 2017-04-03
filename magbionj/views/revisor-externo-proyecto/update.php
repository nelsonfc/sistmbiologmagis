<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorExternoProyecto */

$this->title = 'Update Revisor Externo Proyecto: ' . $model->id_revision;
$this->params['breadcrumbs'][] = ['label' => 'Revisor Externo Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_revision, 'url' => ['view', 'id' => $model->id_revision]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revisor-externo-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
