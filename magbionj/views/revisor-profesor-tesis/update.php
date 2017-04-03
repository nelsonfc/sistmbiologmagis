<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorProfesorTesis */

$this->title = 'Update Revisor Profesor Tesis: ' . $model->id_revision;
$this->params['breadcrumbs'][] = ['label' => 'Revisor Profesor Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_revision, 'url' => ['view', 'id' => $model->id_revision]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revisor-profesor-tesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
