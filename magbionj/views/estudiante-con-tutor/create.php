<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstudianteConTutor */

$this->title = 'Create Estudiante Con Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Estudiante Con Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-con-tutor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
