<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstudianteConTutor */

$this->title = 'Update Estudiante Con Tutor: ' . $model->id_estudiante_tutor;
$this->params['breadcrumbs'][] = ['label' => 'Estudiante Con Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estudiante_tutor, 'url' => ['view', 'id' => $model->id_estudiante_tutor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiante-con-tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
