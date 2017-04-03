<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProfesorConAsignatura */

$this->title = 'Update Profesor Con Asignatura: ' . $model->id_profesor_asignatura;
$this->params['breadcrumbs'][] = ['label' => 'Profesor Con Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_profesor_asignatura, 'url' => ['view', 'id' => $model->id_profesor_asignatura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profesor-con-asignatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
