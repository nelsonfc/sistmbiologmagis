<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
Modal::begin([
    'header' => '<h4 class="modal-title">Modificar Asignatura</h4>',
    'id' => 'modaleditar',
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
    'header' => '<h4 class="modal-title">Agregar Asignatura</h4>',
    'class' => 'modal',
    'closeButton' => ['onclick' => "$('div').removeClass('modal-backdrop fade in');"],
    'size' => 'modal-lg'
]);
echo "<div class='modalContent'></div>";

Modal::end();
/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
?>
<div class="asignatura-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/Santiago");
    $fecha = utf8_encode(strftime("%d de %B de %Y"));
    ?>
    <?php
    \yii\widgets\Pjax::begin(['id' => 'refrescar']);
    $titulo = "ASIGNATURAS";
    $modelo = new \app\models\Asignatura();
    $gridColumns = [
        'nombre',
        'codigo',
        ['attribute' => 'tipo',
            'width' => '18.49%',
            'value' => function($model) {
                return $model->listaTipos[$model->tipo];
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => $modelo->listaTipos,
            'filterInputOptions' => ['placeholder' => 'Ingrese Tipo...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],

        ['class' => 'kartik\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-eye-open"></span>&nbsp'), $url, ['class' => 'modalButton2']);
                },
                'update' => function ($url, $model) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), $url, ['class' => 'modalButton']);
                    /* Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                      'id' => 'modalButton','title' => Yii::t('yii', 'Modificar'), 'data-toggle' => 'modal',
                      'data-target' => '#modaleditardocente', 'url' => 'javascript:void(0);'
                      ]); */
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
        // set export properties
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
    height: 47px; float:left;" src="imagenes/ubb.png"/>|Asignaturas|<img style="float:right;width: 168px;
    height: 47px;" src="imagenes/logo.png"/>'],

                        'SetFooter'=>['Generado el ' . utf8_encode($fecha).'|Página {PAGENO}| Empresas Piedra'],
                    ],
                    'options' => [
                        'title' => 'Asignaturas',
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