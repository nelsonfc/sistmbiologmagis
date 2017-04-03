<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SituacionConEncuesta */

$this->title = 'Update Situacion Con Encuesta: ' . $model->id_sce;
$this->params['breadcrumbs'][] = ['label' => 'Situacion Con Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sce, 'url' => ['view', 'id' => $model->id_sce]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="situacion-con-encuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
