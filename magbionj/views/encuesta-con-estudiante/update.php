<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaConEstudiante */

$this->title = 'Update Encuesta Con Estudiante: ' . $model->id_ece;
$this->params['breadcrumbs'][] = ['label' => 'Encuesta Con Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ece, 'url' => ['view', 'id' => $model->id_ece]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encuesta-con-estudiante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
