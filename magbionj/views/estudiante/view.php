<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = $model->id_estudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_estudiante], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_estudiante], [
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
            'id_estudiante',
            'rut',
            'nombres',
            'apellido_paterno',
            'apellido_materno',
            'telefono',
            'movil',
            'correo',
            'direccion',
            'anio_ingreso',
            'anio_egreso',
            'id_extranjero',
            'procedencia',
            'profesion',
            'direccion_extranjera',
            'situacion_academica_id_situacion',
            'troncal_id_troncal',
        ],
    ]) ?>

</div>
