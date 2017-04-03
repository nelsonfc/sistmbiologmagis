<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTutor */

$this->title = 'Update Proyecto Tutor: ' . $model->id_proyectotutor;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proyectotutor, 'url' => ['view', 'id' => $model->id_proyectotutor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyecto-tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
