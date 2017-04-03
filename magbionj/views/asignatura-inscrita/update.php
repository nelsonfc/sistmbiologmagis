<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaInscrita */

$this->title = 'Update Asignatura Inscrita: ' . $model->id_asignatura_inscrita;
$this->params['breadcrumbs'][] = ['label' => 'Asignatura Inscritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asignatura_inscrita, 'url' => ['view', 'id' => $model->id_asignatura_inscrita]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignatura-inscrita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
