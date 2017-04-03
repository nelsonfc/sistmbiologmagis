<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorProfesorProyecto */

$this->title = 'Update Revisor Profesor Proyecto: ' . $model->id_revision;
$this->params['breadcrumbs'][] = ['label' => 'Revisor Profesor Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_revision, 'url' => ['view', 'id' => $model->id_revision]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revisor-profesor-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
