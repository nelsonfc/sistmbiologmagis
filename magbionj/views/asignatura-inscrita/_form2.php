<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaInscrita */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
    $(document).ready(function() {
        $('#formulario').submit(function() {
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    if(data.success  != false){
                        $('#modalingresar').modal('hide');
                        $('#modaleditar').modal('hide');
                        $('#modalinscribir').modal('hide');
                        $.pjax.reload({container:'#refrescar'});
                    }else{

                    }
                }
            });
            return false;
        });
    });
</script>
<div class="asignatura-inscrita-form">
    <div id="inscritas">
        <div>

        </div>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'formulario']); ?>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7" style="    margin-top: 30px;">
            <?php echo '('.\app\models\Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->codigo.') '.\app\models\Asignatura::findOne(\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->asignatura_id_asignatura)->nombre.' ('.\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->anio.'-'.\app\models\AsignaturaDisponible::findOne($model->asignatura_disponible_id_asignatura_disponible)->semestre.')';
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'calificacion')->textInput();
            ?>
        </div>
    </div>

    <div class="modal-footer">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('div').removeClass('modal-backdrop fade in');">Cerrar</button>


        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
