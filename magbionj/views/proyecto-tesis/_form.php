<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTesis */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
    function promedioRevisor1(){
        $promedio = 0;
        if (document.getElementById("revisorprofesorproyecto-nota_escrita").value != '' &&
            document.getElementById("revisorprofesorproyecto-nota_oral").value != '') {
            $promedio = Math.round(parseFloat(parseFloat((document.getElementById("revisorprofesorproyecto-nota_escrita").value))+
                parseFloat(document.getElementById("revisorprofesorproyecto-nota_oral").value))/2);
            document.getElementById("revisorprofesorproyecto-nota_final").value = $promedio;
            $promedio = 0;
            if (document.getElementById("revisorprofesorproyecto-nota_final").value != '' &&
                document.getElementById("revisorprofesorproyecto-nota_final2").value != '' &&
                document.getElementById("revisorexternoproyecto-nota_final").value != ''
            ) {
                $promedio = Math.round(parseFloat(parseFloat((document.getElementById("revisorprofesorproyecto-nota_final").value))+
                        parseFloat(document.getElementById("revisorexternoproyecto-nota_final").value)+ parseFloat(document.getElementById("revisorprofesorproyecto-nota_final2").value))/3);
                document.getElementById("proyectotesis-nota_final").value = $promedio;
            }
        }
    }
    function promedioRevisor2(){
        $promedio = 0;
        if (document.getElementById("revisorprofesorproyecto-nota_escrita2").value != '' &&
            document.getElementById("revisorprofesorproyecto-nota_oral2").value != '') {
            $promedio = Math.round(parseFloat(parseFloat((document.getElementById("revisorprofesorproyecto-nota_escrita2").value))+
                    parseFloat(document.getElementById("revisorprofesorproyecto-nota_oral2").value))/2);
            document.getElementById("revisorprofesorproyecto-nota_final2").value = $promedio;
            $promedio = 0;
            if (document.getElementById("revisorprofesorproyecto-nota_final").value != '' &&
                document.getElementById("revisorprofesorproyecto-nota_final2").value != '' &&
                document.getElementById("revisorexternoproyecto-nota_final").value != ''
            ) {
                $promedio = Math.round(parseFloat(parseFloat((document.getElementById("revisorprofesorproyecto-nota_final").value))+
                        parseFloat(document.getElementById("revisorexternoproyecto-nota_final").value)+ parseFloat(document.getElementById("revisorprofesorproyecto-nota_final2").value))/3);
                document.getElementById("proyectotesis-nota_final").value = $promedio;
            }
        }
    }
    function promedioRevisor3(){
        $promedio = 0;
        if (document.getElementById("revisorexternoproyecto-nota_escrita").value != '' &&
            document.getElementById("revisorexternoproyecto-nota_oral").value != '') {
            $promedio = Math.round(parseFloat(parseFloat((document.getElementById("revisorexternoproyecto-nota_escrita").value))+
                    parseFloat(document.getElementById("revisorexternoproyecto-nota_oral").value))/2);
            document.getElementById("revisorexternoproyecto-nota_final").value = $promedio;
            $promedio = 0;
            if (document.getElementById("revisorprofesorproyecto-nota_final").value != '' &&
                document.getElementById("revisorprofesorproyecto-nota_final2").value != '' &&
                document.getElementById("revisorexternoproyecto-nota_final").value != ''
            ) {
                $promedio = Math.round(parseFloat(parseFloat((document.getElementById("revisorprofesorproyecto-nota_final").value))+
                        parseFloat(document.getElementById("revisorexternoproyecto-nota_final").value)+ parseFloat(document.getElementById("revisorprofesorproyecto-nota_final2").value))/3);
                document.getElementById("proyectotesis-nota_final").value = $promedio;
            }
        }
    }

    function promedioFinal(){

    }
</script>
<div class="proyecto-tesis-form">
            <?php $form = ActiveForm::begin(); ?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Información General</h3>
            </div>
            <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'nombre_tesis')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'financiamiento')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'fecha_rendicion')->widget( \kartik\date\DatePicker::className(), ['options' => ['placeholder' => 'Seleccione Fecha ...'],
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true
                        ]]);?>
                </div>

                    <?php
                     $form->field($model, 'estado_tesis_id_estado')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $model->listaEstado,
                        'language' => 'es',
                        'options' => ['placeholder' => 'Ingrese Estado...'],
                        'pluginOptions' => [
                        ],
                    ]);
                    ?>


            </div>

            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Tutor y Co-Tutor</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $form->field($model2, 'profesor')->widget(\kartik\select2\Select2::classname(), [
                            'data' => $model->listaProfe,
                            'language' => 'es',
                            'options' => ['placeholder' => 'Ingrese Tutor...'],
                            'pluginOptions' => [
                            ],
                        ])->label("Tutor");
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo $form->field($model3, 'profesor_id_profesor')->widget(\kartik\select2\Select2::classname(), [
                            'data' => $model->listaProfe,
                            'language' => 'es',
                            'options' => ['placeholder' => 'Ingrese Co-Tutor...'],
                            'pluginOptions' => [
                            ],
                        ])->label("Co-Tutor");
                        ?>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Calificaciones</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <?php
                        echo $form->field($model4, 'profesor_id_profesor')->widget(\kartik\select2\Select2::classname(), [
                            'data' => $model->listaProfe,
                            'language' => 'es',
                            'options' => ['placeholder' => 'Ingrese Revisor 1...'],
                            'pluginOptions' => [
                            ],
                        ])->label("Revisor 1");
                        ?>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <?= $form->field($model4, 'nota_escrita')->textInput(['onkeyup' => "promedioRevisor1();"]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model4, 'nota_oral')->textInput(['onkeyup' => "promedioRevisor1();"]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model4, 'nota_final')->textInput(['readonly' => true, 'onchange' => "promedioFinal();"]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <?php
                        echo $form->field($model5, 'profesor2')->widget(\kartik\select2\Select2::classname(), [
                            'data' => $model->listaProfe,
                            'language' => 'es',
                            'options' => ['placeholder' => 'Ingrese Revisor 2...', 'id' => 'revisor'],
                            'pluginOptions' => [
                            ],
                        ])->label("Revisor 2");
                        ?>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-2">
                        <?= $form->field($model5, 'nota_escrita2')->textInput(['onkeyup' => "promedioRevisor2();"]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model5, 'nota_oral2')->textInput(['onkeyup' => "promedioRevisor2();"]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model5, 'nota_final2')->textInput(['readonly' => true, 'onchange' => "promedioFinal();"]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <?php
                        echo $form->field($model6, 'revisor_externo_id_revisor')->widget(\kartik\select2\Select2::classname(), [
                            'data' => $model->listaRevisor,
                            'language' => 'es',
                            'options' => ['placeholder' => 'Ingrese Revisor Externo...'],
                            'pluginOptions' => [
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-2">
                        <?= $form->field($model6, 'nota_escrita')->textInput(['onkeyup' => "promedioRevisor3();"]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model6, 'nota_oral')->textInput(['onkeyup' => "promedioRevisor3();"]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model6, 'nota_final')->textInput(['readonly' => true, 'onchange' => "promedioFinal();"]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'nota_final')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <CENTer>

                        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar Cambios', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    </CENTer>
                </div>
            </div>

<BR>
        </div>

            <?php ActiveForm::end(); ?>


</div>
