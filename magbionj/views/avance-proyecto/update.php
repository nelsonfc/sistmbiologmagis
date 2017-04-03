<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AvanceProyecto */

$this->title = 'Update Avance Proyecto: ' . $model->id_avance;
$this->params['breadcrumbs'][] = ['label' => 'Avance Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_avance, 'url' => ['view', 'id' => $model->id_avance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avance-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
