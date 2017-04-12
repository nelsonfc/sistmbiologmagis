<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Asignatura */
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
<div class="asignatura-form">

    <?php $form = ActiveForm::begin(['id' => 'formulario']); ?>
    <div class="box box-success">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?php
                    echo $form->field($model, 'tipo')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaTipos,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Tipo de Asignatura...', 'id' => 'tipo'.$model->id_asignatura],
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
