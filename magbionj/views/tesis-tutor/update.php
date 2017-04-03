<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesisTutor */

$this->title = 'Update Tesis Tutor: ' . $model->id_tesistutor;
$this->params['breadcrumbs'][] = ['label' => 'Tesis Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tesistutor, 'url' => ['view', 'id' => $model->id_tesistutor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tesis-tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
