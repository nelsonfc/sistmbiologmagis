<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaDisponible */

$this->title = 'Update Asignatura Disponible: ' . $model->id_asignatura_disponible;
$this->params['breadcrumbs'][] = ['label' => 'Asignatura Disponibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asignatura_disponible, 'url' => ['view', 'id' => $model->id_asignatura_disponible]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignatura-disponible-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
