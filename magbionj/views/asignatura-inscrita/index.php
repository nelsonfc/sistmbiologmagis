<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturaInscritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = false;

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
    'header' => '<h4 class="modal-title">Modificar Asignatura</h4>',
    'id' => 'modaleditar',
    'class' => 'modal',
    'closeButton' => ['onclick' => "$('div').removeClass('modal-backdrop fade in');"],
    'size' => 'modal-lg',
]);
echo "<div class='modalContent'></div>";

Modal::end();
?>
<div class="asignatura-inscrita-index">


    <?php
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/Santiago");
    $fecha = utf8_encode(strftime("%d de %B de %Y"));
    \yii\widgets\Pjax::begin(['id' => 'refrescar']);
    $lista_asignaturas[0] ='';
    $i = 0;
    foreach($a_i as $asig_insc){
        $lista_asignaturas[$i]= ['id' => $asig_insc->asignatura_disponible_id_asignatura_disponible, 'nombre' => '('.\app\models\Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($asig_insc->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->codigo.') '.\app\models\Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($asig_insc->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->nombre.' ('.\app\models\AsignaturaDisponible::findOne($asig_insc->asignatura_disponible_id_asignatura_disponible)->anio.'-'.\app\models\AsignaturaDisponible::findOne($asig_insc->asignatura_disponible_id_asignatura_disponible)->semestre.')'];
        $i++;
    }
    $titulo = 'Asignaturas Inscritas: '.\app\models\Estudiante::findOne($id)->nombres.' '.\app\models\Estudiante::findOne($id)->apellido_paterno.' '.\app\models\Estudiante::findOne($id)->apellido_materno;
    $gridColumns = [
        ['attribute' => 'asignatura_disponible_id_asignatura_disponible',
            'width' => '58.49%',
            'label' => 'Asignatura Inscrita',
            'value' => function($model) {
                return '('.\app\models\Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->codigo.') '.\app\models\Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->nombre.' ('.\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->anio.'-'.\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->semestre.')';
            },
            'filterType' => kartik\grid\GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map($lista_asignaturas, 'id', 'nombre'),
            'filterInputOptions' => ['placeholder' => 'Ingrese Asignatura...'],
            'format' => 'raw',
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
        ],
        ['attribute' => 'calificacion','value' => function($model){ return $model->calificacion/10;},
        ], ['class' => 'kartik\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), $url, ['class' => 'modalButton']);
                },
            ]
        ]];
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
    height: 47px; float:left;" src="imagenes/ubb.png"/>|'.'Asignaturas de: '.\app\models\Estudiante::findOne($id)->nombres.' '.\app\models\Estudiante::findOne($id)->apellido_paterno.' '.\app\models\Estudiante::findOne($id)->apellido_materno.'|<img style="float:right;width: 168px;
    height: 47px;" src="imagenes/logo.png"/>'],

                        'SetFooter'=>['Generado el ' . utf8_encode($fecha).'|Página {PAGENO}| Empresas Piedra'],
                    ],
                    'options' => [
                        'title' => 'Asignaturas de: '.\app\models\Estudiante::findOne($id)->nombres.' '.\app\models\Estudiante::findOne($id)->apellido_paterno.' '.\app\models\Estudiante::findOne($id)->apellido_materno,
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
    $(".modalButton3").click(function(){
    
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
