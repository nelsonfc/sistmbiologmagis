<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTesis */

$this->title = $model->id_proyecto;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$estudiante= \app\models\Estudiante::findOne($model->estudiante_id_estudiante);
$estado = '';
if ($model->nota_final == 0) {
    $estado = '<span class="label label-default" style="border-radius: 10px;">Inscrita</span>';
}
if ($model->nota_final >= 50 && $model->nota_final != 0) {
    $estado = '<span class="label label-success" style="border-radius: 10px;">Aprobado</span>';
}
if ($model->nota_final < 50 && $model->nota_final != 0) {
    $estado = '<span class="label label-danger" style="border-radius: 10px;">Reprobado</span>';
}
//tutor
$tutores = array_reverse(\app\models\ProyectoTutor::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->andWhere(['tipo_tutor_proyecto_id_tipo' => 1])->all());
//cotutor
$tutor = null;
$co_tutor = null;
$co_tutores = array_reverse(\app\models\ProyectoTutor::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->andWhere(['tipo_tutor_proyecto_id_tipo' => 2])->all());
if(isset($tutores[0])) {
    $tutor = \app\models\Profesor::findOne(\app\models\ProyectoTutor::findOne($tutores[0]->id_proyectotutor)->profesor_id_profesor)->nombres." ".\app\models\Profesor::findOne(\app\models\ProyectoTutor::findOne($tutores[0]->id_proyectotutor)->profesor_id_profesor)->apellidos;
}
if(isset($co_tutores[0])) {
    $co_tutor = \app\models\Profesor::findOne(\app\models\ProyectoTutor::findOne($co_tutores[0]->id_proyectotutor)->profesor_id_profesor)->nombres." ".\app\models\Profesor::findOne(\app\models\ProyectoTutor::findOne($co_tutores[0]->id_proyectotutor)->profesor_id_profesor)->apellidos;

}
$nota = "-";
if($model->nota_final != 0){
    $nota = substr_replace ($model->nota_final, '.', -1, 0);
}
?>

<div class="proyecto-tesis-view">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3 class="modal-title"><strong><?php echo 'PROYECTO DE TESIS' ?></strong></h3></center>

    </div>
    <div class="modal-body">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 25px;"><?php if($model->isNewRecord){ echo "Registro de Cliente";}else{echo "Datos Generales";} ?>
                <p style="float: right;">
                    <?= Html::a('Modificar', ['update', 'id' => $model->id_proyecto, 'id_est' => $model->estudiante_id_estudiante], ['class' => 'btn btn-primary']) ?>
                </p>
            </div>
        </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'estudiante_id_estudiante',
            'value' => $estudiante->nombres." ".$estudiante->apellido_paterno." ".$estudiante->apellido_materno],
            'nombre_tesis',
            'financiamiento',
            ['attribute' => 'tutor',
                'label' => 'Tutor',
                'format' => 'html',
                'value' => $tutor],
            ['attribute' => 'cotutor',
                'label' => 'Co-Tutor',
                'format' => 'html',
                'value' => $co_tutor],
            ['attribute' => 'fecha_rendicion',
                'value' => date("d-m-Y", strtotime($model->fecha_rendicion))],
            ['attribute' => 'nota_final', 'value' => $nota ],
            ['attribute' => 'estado_tesis_id_estado',
                'format' => 'html',
                'value' => $estado],

        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 25px;">
            <?php if($model->isNewRecord){ echo "Registro de Cliente";}else{echo "Calificaciones Revisores";} ?>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="active">
            <th>Revisor</th>
            <th style="text-align: center;">Nota Escrita (50%)</th>
            <th style="text-align: center;">Nota Oral (50%)</th>
            <th style="text-align: center;">Promedio</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(\app\models\RevisorProfesorProyecto::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->all()
        as $revisor){ ?>
            <tr>
                <td><?php echo \app\models\Profesor::findOne($revisor->profesor_id_profesor)->nombres." ".\app\models\Profesor::findOne($revisor->profesor_id_profesor)->apellidos; ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_escrita == 0){ echo "-";}else{echo substr_replace ($revisor->nota_escrita, '.', -1, 0);} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_oral == 0){ echo "-";}else{echo substr_replace ($revisor->nota_oral, '.', -1, 0);} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_final == 0){ echo "-";}else{echo substr_replace ($revisor->nota_final, '.', -1, 0);} ?></td>
            </tr>
        <?php } ?>
        <?php foreach(\app\models\RevisorExternoProyecto::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->all()
                            as $revisor){ ?>
            <tr>
                <td><?php echo \app\models\RevisorExterno::findOne($revisor->revisor_externo_id_revisor)->nombre; ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_escrita == 0){ echo "-";}else{echo substr_replace ($revisor->nota_escrita, '.', -1, 0);} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_oral == 0){ echo "-";}else{echo substr_replace ($revisor->nota_oral, '.', -1, 0);} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_final == 0){ echo "-";}else{echo substr_replace ($revisor->nota_final, '.', -1, 0);} ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td style="text-align: right;
    border-left: 8px solid rgba(244, 244, 244, 0);
    border-bottom: 8px solid rgba(244, 244, 244, 0);"></td>
            <td style="text-align: right;
    border-left: 8px solid rgba(244, 244, 244, 0);
    border-bottom: 8px solid rgba(244, 244, 244, 0);"></td>
            <td style="text-align: right;
    border-left: 8px solid rgba(244, 244, 244, 0);
    border-bottom: 8px solid rgba(244, 244, 244, 0);">Promedio Final</td>
            <td style="text-align: center;"><?php if($model->nota_final == 0){ echo "-";}else{echo substr_replace ($model->nota_final, '.', -1, 0);} ?></td>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

    </div>
</div>
