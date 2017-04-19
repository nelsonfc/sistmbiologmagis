<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Asignatura;
use app\models\AsignaturaDisponible;
use app\models\AsignaturaInscrita;
/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = $model->id_estudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-view">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo 'Detalle Estudiante'; ?></h4>

    </div>
    <div class="modal-body">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
        </div>
        <div class="box-body">
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                    RUN
                </div>
                <div class="col-md-4">
                    <?php if($model->rut != null && $model->rut != ""){ echo getPuntosRut($model->rut); }else{ echo ("(No Posee)");}?>
                </div>
                <div class="col-md-2" style="color: #478fca!important;">
                    ID Extranjero
                </div>
                <div class="col-md-3">
                    <?php if($model->id_extranjero != null || $model->id_extranjero != ''){echo $model->id_extranjero;}else{ echo "(No Registra)"; } ?>
                </div>
            </div>
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                    Nombre
                </div>
                <div class="col-md-4">
                    <?php echo $model->nombres." ".$model->apellido_paterno." ".$model->apellido_materno; ?>
                </div>
                <div class="col-md-2" style="color: #478fca!important;">
                    Correo
                </div>
                <div class="col-md-3">
                    <?php echo $model->correo; ?>
                </div>
            </div>
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                    Teléfono
                </div>
                <div class="col-md-4">
                    <?php echo $model->telefono; ?>
                </div>
                <div class="col-md-2" style="color: #478fca!important;">
                    Celular
                </div>
                <div class="col-md-3">
                    <?php echo $model->movil; ?>
                </div>
            </div>
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                    Dirección
                </div>
                <div class="col-md-4">
                    <?php echo $model->direccion; ?>
                </div>
                <div class="col-md-2" style="color: #478fca!important;">
                    Dirección Extranjera
                </div>
                <div class="col-md-3">
                    <?php if($model->direccion_extranjera != null || $model->direccion_extranjera != ''){echo $model->direccion_extranjera;}else{ echo "(No Registra)"; } ?>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-header with-border">
            <h3 class="box-title">Antecedentes Generales</h3>
        </div>

        <div class="box-body">
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                    Procedencia
                </div>
                <div class="col-md-4">
                    <?php echo $model->procedencia; ?>
                </div>
                <div class="col-md-2" style="color: #478fca!important;">
                    Profesión
                </div>
                <div class="col-md-3">
                    <?php echo $model->profesion; ?>
                </div>
            </div>
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                   Troncal
                </div>
                <div class="col-md-4" >
                    <?php echo \app\models\Troncal::findOne($model->troncal_id_troncal)->nombre; ?>

                </div>
                <div class="col-md-2" style="color: #478fca!important;">
                    Año de Ingreso
                </div>
                <div class="col-md-3">
                    <?php echo $model->anio_ingreso ?>
                </div>
            </div>
            <div class="row" style="    margin-bottom: 8px;">
                <div class="col-md-3" style="color: #478fca!important;">
                    Situación
                </div>
                <div class="col-md-4" >
                    <?php echo \app\models\SituacionAcademica::findOne($model->situacion_academica_id_situacion)->nombre; ?>
                </div>

            </div>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">Asignaturas Inscritas</h3>
        </div>

        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr class="encabezadotabla nopadding inf">
                    <th class="center inf">Año</th>
                    <th class="center inf">Semestre</th>
                    <th class="center inf">Código</th>
                    <th class="center inf">Asignatura</th>
                    <th class="text-center">Calificación</th>
                    <th class="text-center">Estado</th>
                </tr>
                </thead>
                <tbody>
                <tr class="inf">
                    <?php
                    $asignaturas = AsignaturaInscrita::find()->where(['estudiante_id_estudiante' => $model->id_estudiante])->all();
                    foreach($asignaturas as $asignatura){
                    ?>
                    <td class="center inf"><?php echo AsignaturaDisponible::findOne($asignatura->asignatura_disponible_id_asignatura_disponible)->anio; ?></td>
                    <td class="center inf"><?php echo AsignaturaDisponible::findOne($asignatura->asignatura_disponible_id_asignatura_disponible)->semestre; ?></td>
                    <td class="center inf"><?php echo Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($asignatura->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->codigo;  ?></td>
                    <td class="left inf"><?php echo Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($asignatura->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->nombre;  ?></td>
                    <td class="center elementoaocultar "> <?php if($asignatura->calificacion == 0){
                            echo '-';
                        }else{
                            echo $asignatura->calificacion;
                        } ?></td>
                    <td class="center elementoaocultar "> <?php
                        if($asignatura->calificacion == 0){
                            echo '<span class="label label-default" style="border-radius: 10px;">Inscrita</span>';
                        }
                        if($asignatura->calificacion >= 40 && $asignatura->calificacion != 0){
                            echo '<span class="label label-success" style="border-radius: 10px;">Aprobado</span>';
                        }
                        if($asignatura->calificacion < 40 && $asignatura->calificacion != 0){
                            echo '<span class="label label-danger" style="border-radius: 10px;">Reprobado</span>';
                        }
                        ?></td>
                </tr><tr class="inf">
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>
    <div class="modal-footer">
        <div class="form-group">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('div').removeClass('modal-backdrop fade in');">Cerrar</button>
        </div>
    </div>

</div>
<?php
function getPuntosRut( $rut ){
    $rutTmp = explode( "-", $rut );
    return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
}
?>