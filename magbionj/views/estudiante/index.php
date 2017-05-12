<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\SituacionAcademica;
use app\models\Troncal;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
Modal::begin([
    'header' => '<h4 class="modal-title">Modificar Estudiante</h4>',
    'id' => 'modaleditar',
    'class' => 'modal',
    'closeButton' => ['onclick' => "$('div').removeClass('modal-backdrop fade in');"],
    'size' => 'modal-lg',
]);
echo "<div class='modalContent'></div>";

Modal::end();
Modal::begin([
    'header' => '<h4 class="modal-title">Inscribir Asignaturas</h4>',
    'id' => 'modalinscribir',
    'class' => 'modal',
    'closeButton' => ['onclick' => "$('div').removeClass('modal-backdrop fade in');"],
    'size' => 'modal-lg',
]);
echo "<div class='modalContent'></div>";

Modal::end();
Modal::begin([
    'id' => 'modalver',
    'class' => 'modal',
    'closeButton' => false,
    'size' => 'modal-lg',
]);
echo "<div class='modalContent'></div>";

Modal::end();
Modal::begin([
    'id' => 'modalingresar',
    'header' => '<h4 class="modal-title">Agregar Estudiante</h4>',
    'class' => 'modal',
    'closeButton' => ['onclick' => "$('div').removeClass('modal-backdrop fade in');"],
    'size' => 'modal-lg'
]);
echo "<div class='modalContent'></div>";

Modal::end();
?>
<div class="estudiante-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/Santiago");
    $fecha = utf8_encode(strftime("%d de %B de %Y"));
    \yii\widgets\Pjax::begin(['id' => 'refrescar']);
    $titulo = "ESTUDIANTES";
    $modelo = new \app\models\Estudiante();
    $gridColumns = [
        //'id_estudiante',
        ['attribute' => 'rut', 'width' => '25%'],
        'id_extranjero',
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

        ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {update} {inscribir} {misasignaturas} {inscribirproyecto}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-eye-open"></span>&nbsp'), $url, ['class' => 'modalButton2', 'title' => 'Ver Ficha Estudiante']);
                },
                'update' => function ($url, $model) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), $url, ['class' => 'modalButton', 'title' => 'Modificar Ficha Estudiante']);

                },
                'inscribir' => function ($url, $model) {
        return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-book"></span>'), ['asignatura-inscrita/create', 'id' => $model->id_estudiante],['class' => 'modalButton6', 'title' => 'Inscribir Asignaturas']);

    },
    'misasignaturas' => function ($url, $model) {
        return Html::a(Yii::t('app', '<span class="fa fa-edit"></span>'), ['asignatura-inscrita/index', 'id' => $model->id_estudiante],['class' => 'modalButton10','id' => 'descarga' ,'data-pjax' => '0', 'target' => '_blank', 'title' => 'Mis Asignaturas']);

    },

    'inscribirproyecto' => function ($url, $model) {
        return Html::a(Yii::t('app', '<span class="fa fa-calendar-plus-o"></span>'), ['proyecto-tesis/index', 'id' => $model->id_estudiante],['class' => 'modalButton10','id' => 'descarga' ,'data-pjax' => '0', 'target' => '_blank', 'title' => 'Proyecto de Tesis']);

    }
            ]
        ],];

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
            ['content' => Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>'), ['create'], ['class' => 'btn btn-primary modalButton3'])
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
                        'title' => 'Estudiantes',
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
<?php
$this->registerJs('$(document).on("ready pjax:success", function() {
    $(".modal").removeAttr("tabindex");
    $(".modalButton").click(function(){
        $("#kvFileinputModal").empty();
        $("#kvFileinputModal").removeClass("modal-backdrop fade in");
       var tagname = $(this)[0].tagName;      
       $("#modaleditar").modal("show")
                  .find(".modalContent")
                  .load($(this).attr("href"));
       return false;   
   });
});')

;
?>
<?php
$this->registerJs('$(document).on("ready pjax:success", function() {
    $(".modal").removeAttr("tabindex");
    $(".modalButton2").click(function(){
        $("#kvFileinputModal").empty();
        $("#kvFileinputModal").removeClass("modal-backdrop fade in");
       var tagname = $(this)[0].tagName;      
       $("#modalver").modal("show")
                  .find(".modalContent")
                  .load($(this).attr("href"));
       return false;   
   });
});')

;
?>
<?php
$this->registerJs('$(document).on("ready pjax:success", function() {
   $(".modal").removeAttr("tabindex");
    $(".modalButton3").click(function(){
    
        $("#kvFileinputModal").empty();
        $("#kvFileinputModal").removeClass("modal-backdrop fade in");
       var tagname = $(this)[0].tagName;      
       $("#modalingresar").modal("show")
                  .find(".modalContent")
                  .load($(this).attr("href"));
       return false;   
   });
});')

;
?>
<?php
$this->registerJs('$(document).on("ready pjax:success", function() {
   $(".modal").removeAttr("tabindex");
    $(".modalButton6").click(function(){
    
        $("#kvFileinputModal").empty();
        $("#kvFileinputModal").removeClass("modal-backdrop fade in");
       var tagname = $(this)[0].tagName;      
       $("#modalinscribir").modal("show")
                  .find(".modalContent")
                  .load($(this).attr("href"));
       return false;   
   });
});')

;
?>
<?php
function getPuntosRut( $rut ){
    $rutTmp = explode( "-", $rut );
    return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
}
?>
