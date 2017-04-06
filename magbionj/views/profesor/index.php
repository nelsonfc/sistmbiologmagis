<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Jerarquia;
use app\models\Troncal;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfesorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
Modal::begin([
    'header' => '<h4 class="modal-title">Modificar Profesor</h4>',
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
    'header' => '<h4 class="modal-title">Agregar Profesor</h4>',
    'class' => 'modal',
    'closeButton' => ['onclick' => "$('div').removeClass('modal-backdrop fade in');"],
    'size' => 'modal-lg'
]);
echo "<div class='modalContent'></div>";

Modal::end();
?>
<div class="profesor-index">

    <?php
    \yii\widgets\Pjax::begin(['id' => 'refrescar']);
    $titulo = "PROFESORES";
    $modelo = new \app\models\Profesor();
    $gridColumns = [
        'rut',
        'nombres',
        'apellidos',
        'telefono',
        'correo',
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
        ['attribute' => 'jerariquia_id_jerarquia',
            'width' => '10.49%',
            'value' => function($model) {
                return Jerarquia::findOne($model->jerariquia_id_jerarquia)->nombre;
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => $modelo->listaJerarquia,
            'filterInputOptions' => ['placeholder' => 'Ingrese Jerarquia...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],

        ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}{update}',
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
function getPuntosRut( $rut ){
    $rutTmp = explode( "-", $rut );
    return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
}
?>