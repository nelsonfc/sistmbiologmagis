<?php

use app\models\PreguntaNumerica;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\RespuestaNumerica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respuesta-numerica-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <?php $pregunta = PreguntaNumerica::find()->where(['>=','id_pregunta_numerica' , 27])->andWhere(['<=','id_pregunta_numerica' , 37])->all();

                $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];


                 ?>
            </div>

        </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class

        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $model[0],
        'formId' => 'dynamic-form',
        'formFields' => [
                'id_preguntanumerica',
            'id_ece',
            'valor_respuesta',

        ],
    ]); ?>
    <div class="panel panel-default">

        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php

            $i = 0;
            foreach ($pregunta as $preguntas) {
                $numero_pregunta = $preguntas->id_pregunta_numerica;
                $j = 27;

                foreach ($model as $modelAddress):
                    // necessary for update action.
                    echo $numero_pregunta . ".- " . $preguntas->pregunta;
                    ?>
                    <div class="item panel panel-default" style="    border-color: #fff;      margin-bottom: 0px;">
                        <!-- widgetBody -->

                        <div class="panel-body" style="    padding: 0px">
                            <div class="row">
                                <div class="col-md-3">

                                    <?php echo Html::activeHiddenInput($modelAddress,"[{$i}]id_preguntanumerica", ['value' => $numero_pregunta]);  ?>
                                    <?php echo Html::activeHiddenInput($modelAddress,"[{$i}]id_preguntanumerica", ['value' => 37]);  ?>
                                    <?php echo $form->field($modelAddress, "[{$i}]valor_respuesta")->radioList($list)->label(false);
                                    $i++; ?>

                                </div>




                            </div>

                        </div>
                    </div>
                <?php endforeach;
            }?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    <div class="form-group">
        <?= Html::submitButton($model2->isNewRecord ? 'Create' : 'Update', ['class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
