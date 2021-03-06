<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProfesorConAsignatura */

$this->title = $model->id_profesor_asignatura;
$this->params['breadcrumbs'][] = ['label' => 'Profesor Con Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-con-asignatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_profesor_asignatura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_profesor_asignatura], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_profesor_asignatura',
            'cargo',
            'asignatura_disponible_id_asignatura_disponible',
            'profesor_id_profesor',
        ],
    ]) ?>

</div>
