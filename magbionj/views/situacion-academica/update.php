<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SituacionAcademica */

$this->title = 'Update Situacion Academica: ' . $model->id_situacion;
$this->params['breadcrumbs'][] = ['label' => 'Situacion Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_situacion, 'url' => ['view', 'id' => $model->id_situacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="situacion-academica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
