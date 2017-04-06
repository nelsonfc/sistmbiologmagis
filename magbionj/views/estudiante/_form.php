<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */
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
<script src="../web/js/jquery.rut.js"></script>
<div style=" margin-top: 1px">
    <div id="alerta" class="alert alert-danger" style="display: none;"><strong>Error!</strong> RUT Incorrecto.
    </div>
</div>
<br>
<div class="estudiante-form">

    <?php $form = ActiveForm::begin(['id' => 'formulario']); ?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    <?php
                    if(!$model->isNewRecord) {
                        $model->rut = getPuntosRut($model->rut);
                    }
                    echo $form->field($model, 'rut')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'direccion_extranjera')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'movil')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-header with-border">
            <h3 class="box-title">Antecedentes Académicos</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'procedencia')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?php

                    echo $form->field($model, 'troncal_id_troncal')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaTroncal,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Troncal...'],
                        'pluginOptions' => [

                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?php

                    echo $form->field($model, 'anio_ingreso')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaAnios,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Año de Ingreso...'],
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
<script>
    $("input#estudiante-rut").rut({
        formatOn: 'keyup',
        validateOn: 'change'
    });
    $("input#estudiante-rut").rut().on('rutInvalido', function (e) {
        if ($(this).val() !== '') {
            document.getElementById('estudiante-rut').value = '';

            document.getElementById("alerta").style.display = 'inline';
            setTimeout(function () {
                $("#alerta").fadeOut(1500);
            }, 3000);

        }
    });


</script>

<?php
function getPuntosRut( $rut ){
    $rutTmp = explode( "-", $rut );
    return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
}
?>

