<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProfesorConAsignatura */

$this->title = 'Create Profesor Con Asignatura';
$this->params['breadcrumbs'][] = ['label' => 'Profesor Con Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-con-asignatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
