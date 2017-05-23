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
$content = '<table class="table table-bordered" style="width: 150%; font-size: 12px;">
        <thead>
        <tr class="active">
            <th>Fecha</th>
            <th style="text-align: center;">Profesor</th>
        </tr>
        </thead>
        <tbody>';
$historial_t = \app\models\ProyectoTutor::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->andWhere(['tipo_tutor_proyecto_id_tipo'=> 1])->all();
foreach ($historial_t as $tutors){
    $profe = \app\models\Profesor::findOne($tutors->profesor_id_profesor)->nombres." ".\app\models\Profesor::findOne($tutors->profesor_id_profesor)->apellidos;
    $content = $content.'<tr><td>'.date("d-m-Y", strtotime($tutors->fecha)).'</td><td>'.$profe.'</td></tr>';
}
$content = $content.'</tbody>
    </table>';
$content2 = '<table class="table table-bordered" style="width: 100%;font-size: 12px;">
        <thead>
        <tr class="active">
            <th>Fecha</th>
            <th style="text-align: center;">Profesor</th>
        </tr>
        </thead>
        <tbody>';
$historial_ct = \app\models\ProyectoTutor::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->andWhere(['tipo_tutor_proyecto_id_tipo'=> 2])->all();
foreach ($historial_ct as $c_tutors){
    $profe = \app\models\Profesor::findOne($c_tutors->profesor_id_profesor)->nombres." ".\app\models\Profesor::findOne($c_tutors->profesor_id_profesor)->apellidos;
    $content2 = $content2.'<tr><td>'.date("d-m-Y", strtotime($c_tutors->fecha)).'</td><td>'.$profe.'</td></tr>';
}
$content2 = $content2.'</tbody>
    </table>';
?>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>
<style>
    .popover {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1060;
        display: none;
        max-width: 500px;
        padding: 1px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-style: normal;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: left;
        text-align: start;
        text-decoration: none;
        text-shadow: none;
        text-transform: none;
        letter-spacing: normal;
        word-break: normal;
        word-spacing: normal;
        word-wrap: normal;
        white-space: normal;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        line-break: auto;
    }
</style>
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
        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
            <tr>
                <th>Estudiante</th>
                <td><?php echo $estudiante->nombres." ".$estudiante->apellido_paterno." ".$estudiante->apellido_materno; ?></td>
            </tr>
            <tr><th>Nombre Tesis</th><td><?php echo $model->nombre_tesis; ?></td></tr>
            <tr><th>Financiamiento</th><td><?php echo $model->financiamiento; ?></td></tr>
            <tr><th>Tutor</th><td><?php echo $tutor."   "; ?> <button style="background: transparent; border: 1px solid; float: right;" title="Historial Tutores" data-toggle="popover" data-trigger="focus" data-placement="left" data-html="true"  data-content='<?php echo $content; ?>'>Ver Historial</button></td></tr>
            <tr><th>Co-Tutor</th><td><?php echo $co_tutor."   "; ?><button style="background: transparent; border: 1px solid; float: right;" title="Historial Co-Tutores" data-toggle="popover" data-trigger="focus" data-placement="left" data-html="true"  data-content='<?php echo $content2; ?>'>Ver Historial</button></td></tr>
            <tr><th>Fecha Rendición Aproximada (4 meses después)</th><td><?php echo date("d-m-Y", strtotime($model->fecha_rendicion)); ?></td></tr>
            <tr><th>Promedio Final</th><td><?php echo $nota; ?></td></tr>
            <tr><th>Estado</th><td><?php echo $estado; ?></td></tr></tbody></table>


    <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 25px;">
            <?php if($model->isNewRecord){ echo "Registro de Cliente";}else{echo "Calificaciones Revisores";} ?>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="active">
            <th style="text-align: center;">Revisor</th>
            <th style="text-align: center;">Nota Escrita (50%)</th>
            <th style="text-align: center;">Nota Oral (50%)</th>
            <th style="text-align: center;">Promedio</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(\app\models\RevisorProfesorProyecto::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->all()
        as $revisor){ ?>
            <tr>
                <td style="text-align: center;"><?php if($revisor->profesor_id_profesor != null){ echo \app\models\Profesor::findOne($revisor->profesor_id_profesor)->nombres." ".\app\models\Profesor::findOne($revisor->profesor_id_profesor)->apellidos;}else{echo '-';} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_escrita == 0){ echo "-";}else{echo substr_replace ($revisor->nota_escrita, '.', -1, 0);} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_oral == 0){ echo "-";}else{echo substr_replace ($revisor->nota_oral, '.', -1, 0);} ?></td>
                <td style="text-align: center;"><?php if($revisor->nota_final == 0){ echo "-";}else{echo substr_replace ($revisor->nota_final, '.', -1, 0);} ?></td>
            </tr>
        <?php } ?>
        <?php foreach(\app\models\RevisorExternoProyecto::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->all()
                            as $revisor){ ?>
            <tr>
                <td style="text-align: center;"><?php if($revisor->revisor_externo_id_revisor != null){ echo \app\models\RevisorExterno::findOne($revisor->revisor_externo_id_revisor)->nombre;}else{echo '-';} ?></td>
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
