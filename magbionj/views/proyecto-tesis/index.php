<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectoTesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
?>
<div class="proyecto-tesis-index">


    <?php
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/Santiago");
    $fecha = utf8_encode(strftime("%d de %B de %Y"));
    $modelo = new \app\models\ProyectoTesis();
    \yii\widgets\Pjax::begin(['id' => 'refrescar']);
    $gridColumns = [
            //'id_proyecto',
        'nombre_tesis',
        'financiamiento',
        [
            'label' => 'Fecha Rendición',
            'attribute' => 'fecha_rendicion',
            'width' => '20%',
            'content' => function($model) {
                setlocale(LC_TIME, 'spanish');
                date_default_timezone_set("America/Santiago");
                return date("d-m-Y", strtotime($model->fecha_rendicion));
            },
            'filterType'=> \kartik\grid\GridView::FILTER_DATE,
            'filterWidgetOptions' => [
                'options' => ['placeholder' => 'Seleccione Fecha'],
                'pluginOptions' => [
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ],
            'format' => 'html'
        ],
        'nota_final',
            // 'estudiante_id_estudiante',
        ['attribute' => 'estado_tesis_id_estado',
            'format'=> 'html',
            'value' => function($model) {
                if ($model->nota_final == 0) {
                    return '<center><span class="label label-default" style="border-radius: 10px;">Inscrita</span></center>';
                }
                if ($model->nota_final >= 50 && $model->nota_final != 0) {
                    return '<center><span class="label label-success" style="border-radius: 10px;">Aprobado</span></center>';
                }
                if ($model->nota_final < 50 && $model->nota_final != 0) {
                    return '<center><span class="label label-danger" style="border-radius: 10px;">Reprobado</span></center>';
                }
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => $modelo->listaEstado,
            'filterInputOptions' => ['placeholder' => 'Ingrese Estado...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],
        ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {update}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-eye-open"></span>&nbsp'), $url, ['class' => 'modalButton2']);
                },
                'update' => function ($url, $model, $id) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), ['update', 'id' => $model->id_proyecto, 'id_est' => $model->estudiante_id_estudiante], ['class' => 'modalButton']);

                },
            ]
        ]
    ];
    $titulo = 'Proyecto(s) de Tesis de '.\app\models\Estudiante::findOne($id)->nombres." ".\app\models\Estudiante::findOne($id)->apellido_paterno." ".\app\models\Estudiante::findOne($id)->apellido_materno;

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
            ['content' => Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>'), ['create', 'id' => $id], ['class' => 'btn btn-primary modalButton3'])
            ],
            '{export}',
            '{toggleData}',
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'exportConfig' => [
            GridView::EXCEL => [],
            GridView::PDF => [
                'config' => [
                    'cssInline' => '.kv-heading-1{font-size:16px}',
                    'marginTop' => '30',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'methods' => [
                        'SetHeader'=>['<img style="width: 168px;
    height: 47px; float:left;" src="imagenes/ubb.png"/>|Estudiantes|<img style="float:right;width: 168px;
    height: 47px;" src="imagenes/logo.png"/>'],

                        'SetFooter'=>['Generado el ' . utf8_encode($fecha).'|Página {PAGENO}| Empresas Piedra'],
                    ],
                    'options' => [
                        'title' => 'Proyecto(s) de Tesis de '.\app\models\Estudiante::findOne($id)->nombres." ".\app\models\Estudiante::findOne($id)->apellido_paterno." ".\app\models\Estudiante::findOne($id)->apellido_materno,
                        'subject' => 'PDF Document Subject',
                        'keywords' => 'krajee, grid, export, yii2-grid, pdf'

                    ]
                ]
            ],
        ],
        // parameters from the demo form

        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=> $titulo
        ],
        'persistResize'=>false,
    ]);
    \yii\widgets\Pjax::end();
    ?>
</div>
