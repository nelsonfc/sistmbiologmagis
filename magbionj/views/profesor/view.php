<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = '';
?>
    <div class="estudiante-view">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo 'Detalle Profesor'; ?></h4>

        </div>
        <div class="modal-body">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos Personales</h3>
                </div>
                <div class="box-body">
                    <div class="row" style="    margin-bottom: 8px;">
                        <div class="col-md-2" style="color: #478fca!important;">
                            RUN
                        </div>
                        <div class="col-md-3">
                            <?php echo getPuntosRut($model->rut); ?>
                        </div>
                        <div class="col-md-3" style="color: #478fca!important;">
                            Nombre
                        </div>
                        <div class="col-md-4">
                            <?php echo $model->nombres." ".$model->apellidos ;?>
                        </div>
                    </div>
                    <div class="row" style="    margin-bottom: 8px;">
                        <div class="col-md-2" style="color: #478fca!important;">
                            Teléfono
                        </div>
                        <div class="col-md-3">
                            <?php echo $model->telefono; ?>
                        </div>
                        <div class="col-md-3" style="color: #478fca!important;">
                            Correo
                        </div>
                        <div class="col-md-4">
                            <?php echo $model->correo; ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-header with-border">
                    <h3 class="box-title">Antecedentes Académicos</h3>
                </div>

                <div class="box-body">
                    <div class="row" style="    margin-bottom: 8px;">
                        <div class="col-md-2" style="color: #478fca!important;">
                            Troncal
                        </div>
                        <div class="col-md-3" >
                            <?php echo \app\models\Troncal::findOne($model->troncal_id_troncal)->nombre; ?>

                        </div>
                        <div class="col-md-3" style="color: #478fca!important;">
                            Jerarquía
                        </div>
                        <div class="col-md-4">
                            <?php echo \app\models\Jerarquia::findOne($model->jerariquia_id_jerarquia)->nombre; ?>
                        </div>
                    </div>
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