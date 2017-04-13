<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaInscrita */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
    function traerAsignaturas() {
        $("#asignaturainscrita-asignatura_disponible_id_asignatura_disponible option:not(:selected)").remove();
        $.ajax({
            url: '<?php echo Yii::$app->urlManager->createUrl(['/asignatura-inscrita/asignaturas']) ?>',
            type: 'post',
            data: {anio: $('#asignaturainscrita-anio').val(), semestre: $('#asignaturainscrita-semestre').val(), asignaturas: $('#asignaturainscrita-asignatura_disponible_id_asignatura_disponible').val()},
            success: function (data) {
                //alert(data);
                $('#asignaturainscrita-asignatura_disponible_id_asignatura_disponible').append(data);
                $('#asignaturainscrita-asignatura_disponible_id_asignatura_disponible').bootstrapDualListbox('refresh');
            }
        });
    }
</script>
<div class="asignatura-inscrita-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php \yii\widgets\Pjax::begin(['id'=> 'formu']);?>

    <div class="row">
        <div class="col-md-3">
            <?php
            if(date("m") < 6){
                $semestre = 1;
            }else{
                $semestre = 2;
            }
            $model->anio = date("Y");
            echo $form->field($model, 'anio')->dropDownList($model->listaAnios, [ 'prompt' => 'Seleccione Año...', 'onchange' => "traerAsignaturas()"
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            $model->semestre = $semestre;
            echo $form->field($model, 'semestre')->dropDownList($model->listaSemestre, [ 'prompt' => 'Seleccione Semestre...', 'onchange' => "traerAsignaturas()"
            ]);
            ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-md-12">

            <?php

            $opciones = \app\models\AsignaturaDisponible::find()->where(['anio' => date("Y")])->andWhere(['semestre' => $semestre])->all();

            $opciones_con_tipo = '';
            $i = 0;
            if($opciones != null) {
                foreach ($opciones as $option) {
                    
                    $opciones_con_tipo[$i] = ['id_asignatura' => $option->id_asignatura_disponible, 'nombre' => \app\models\Asignatura::findOne($option->asignatura_id_asignatura)->nombre];
                    $i++;
                }

            $selection = [];
            $options = [
                'multiple' => true,
                'size' => 10,
            ];
            ?>
            <?php
            //añadir ->where(['subarea' => $sub])
            ?>
            <div id="recarga">
                <?php
                echo $form->field($model, 'asignatura_disponible_id_asignatura_disponible')->widget(
                    \softark\duallistbox\DualListbox::className(), [
                        'model' => $model,
                        'attribute' => 'asignatura_disponible_id_asignatura_disponible',
                        'selection' => $selection,
                        'items' => \yii\helpers\ArrayHelper::map($opciones_con_tipo, 'id_asignatura', 'nombre'),
                        'options' => $options,
                        'clientOptions' => [
                            'moveOnSelect' => true,
                            'moveAllLabel' => 'Seleccionar Todo',
                            'moveSelectedLabel' => 'Eliminar Asignaturas Seleccionadas',
                            'removeAllLabel' => 'Remove all',
                            'nonSelectedListLabel' => false,
                            'filterOnValues' => false,
                            'filterPlaceHolder' => 'Buscar Asignaturas',
                            'infoText' => false
                        ],
                    ]
                )->label(false);
                }
                ?>

            </div>
        </div>
    </div>

    <?php \yii\widgets\Pjax::end();?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
