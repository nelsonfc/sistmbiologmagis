<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaDisponible */
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
                        $.pjax.reload({container:'#refrescar'});
                    }else{

                    }
                }
            });
            return false;
        });
    });
</script>
<div class="asignatura-disponible-form">

    <?php $form = ActiveForm::begin(['id' => 'formulario']); ?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Ingresar Asignatura</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <?php

                    echo $form->field($model, 'anio')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaAnios,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Año...', 'id' => 'anios'.$model->id_asignatura_disponible],
                        'pluginOptions' => [

                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?php

                    echo $form->field($model, 'semestre')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaSemestre,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Año de Ingreso...', 'id' => 'semestre'.$model->id_asignatura_disponible],
                        'pluginOptions' => [

                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-6">
                    <?php

                    echo $form->field($model, 'asignatura_id_asignatura')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaAsignatura,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Asignatura...', 'id' => 'asignatura'.$model->id_asignatura_disponible],
                        'pluginOptions' => [

                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo $form->field($model, 'profesor')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaProfesor,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Profesor(es)...', 'multiple' => true, 'id' => 'profesor'.$model->id_asignatura_disponible],
                        'pluginOptions' => [

                        ],
                    ]);
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('div').removeClass('modal-backdrop fade in');">Cerrar</button>


        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
