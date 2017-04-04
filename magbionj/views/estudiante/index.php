<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\SituacionAcademica;
use app\models\Troncal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
?>
<div class="estudiante-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $titulo = "ESTUDIANTES";
    $modelo = new \app\models\Estudiante();
    $gridColumns = [
        //'id_estudiante',
        'rut',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        //'telefono',
        //'movil',
         //'correo',
        // 'direccion',
        ['attribute' => 'anio_ingreso',
            'width' => '10.49%',
            'value' => function($model) {
                return $model->anio_ingreso;
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => $modelo->listaAnios,
            'filterInputOptions' => ['placeholder' => 'Ingrese Año...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],
        // 'anio_egreso',
        // 'id_extranjero',
        // 'procedencia',
        // 'profesion',
        // 'direccion_extranjera',
        ['attribute' => 'troncal_id_troncal',
            'width' => '10.49%',
            'value' => function($model) {
                return Troncal::findOne($model->troncal_id_troncal)->nombre;
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => $modelo->listaTroncal,
            'filterInputOptions' => ['placeholder' => 'Ingrese Troncal...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],
        ['attribute' => 'situacion_academica_id_situacion',
            'width' => '10.49%',
            'value' => function($model) {
                return SituacionAcademica::findOne($model->situacion_academica_id_situacion)->nombre;
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => $modelo->listaSituacion,
            'filterInputOptions' => ['placeholder' => 'Ingrese Situación...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],

        ['class' => 'kartik\grid\ActionColumn'],];
    echo GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>$gridColumns,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success'])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export'=>[
            'fontAwesome'=>true
        ],
        // parameters from the demo form

        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=> $titulo
        ],
        'persistResize'=>false,
    ]);
   ?>
</div>
