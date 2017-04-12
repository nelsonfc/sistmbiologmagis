<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EncuestaConEstudiante */

$this->title = 'Create Encuesta Con Estudiante';
$this->params['breadcrumbs'][] = ['label' => 'Encuesta Con Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuesta-con-estudiante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form3', [
        'model' => $model,
        'content' => $content
    ]) ?>

</div>
