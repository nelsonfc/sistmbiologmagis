<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_estudiante',
            'rut',
            'nombres',
            'apellido_paterno',
            'apellido_materno',
            // 'telefono',
            // 'movil',
            // 'correo',
            // 'direccion',
            // 'anio_ingreso',
            // 'anio_egreso',
            // 'id_extranjero',
            // 'procedencia',
            // 'profesion',
            // 'direccion_extranjera',
            // 'situacion_academica_id_situacion',
            // 'troncal_id_troncal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
