<?php

use app\models\PreguntaNumerica;
use app\models\PreguntaTexto;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\RespuestaNumerica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respuesta-numerica-form">

    <?php $form = ActiveForm::begin(["action" => "encuestatemauno"]); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <?php
                if (htmlspecialchars($_GET["idpaso"]) <= 6){
                if ($idpaso == 1) {
                    $pregunta = PreguntaNumerica::find()->where(['>=', 'id_pregunta_numerica', 27])->andWhere(['<=', 'id_pregunta_numerica', 37])->all();
                    $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];

                }
                if ($idpaso == 2) {
                    $pregunta = PreguntaNumerica::find()->where(['>=', 'id_pregunta_numerica', 38])->andWhere(['<=', 'id_pregunta_numerica', 44])->all();
                    $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
                }

                if ($idpaso == 3) {
                    $pregunta = PreguntaNumerica::find()->where(['>=', 'id_pregunta_numerica', 45])->andWhere(['<=', 'id_pregunta_numerica', 50])->all();
                    $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
                }
                if ($idpaso == 4) {
                    $pregunta = PreguntaNumerica::find()->where(['>=', 'id_pregunta_numerica', 51])->andWhere(['<=', 'id_pregunta_numerica', 54])->all();
                    $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
                }
                if ($idpaso == 5) {
                    $pregunta = PreguntaNumerica::find()->where(['>=', 'id_pregunta_numerica', 55])->andWhere(['<=', 'id_pregunta_numerica', 57])->all();
                    $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
                }
                if ($idpaso == 6) {
                    $pregunta = PreguntaNumerica::find()->where(['>=', 'id_pregunta_numerica', 56])->andWhere(['<=', 'id_pregunta_numerica', 56])->all();
                    $list = [3 => 'Nota menor a 4', 5 => 'Nota entre 4 y 6', 7 => 'Nota sobre 6'];
                }

                                ?>
            </div>

        </div>
    </div>

    <?php

    DynamicFormWidget::begin([
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


                foreach ($model as $modelAddress):
                    // necessary for update action.
                    echo $numero_pregunta . ".- " . $preguntas->pregunta;
                    ?>
                    <div class="item panel panel-default" style="    border-color: #fff;      margin-bottom: 0px;">
                        <!-- widgetBody -->

                        <div class="panel-body" style="    padding: 0px">
                            <div class="row">
                                <div class="col-md-3">

                                    <?php echo Html::activeHiddenInput($modelAddress, "[{$i}]id_preguntanumerica", ['value' => $numero_pregunta]); ?>
                                    <?php echo Html::activeHiddenInput($modelAddress, "[{$i}]id_ece", ['value' => $idpaso]); ?>
                                    <?php echo $form->field($modelAddress, "[{$i}]valor_respuesta")->radioList($list)->label(false);
                                    $i++; ?>

                                </div>


                            </div>

                        </div>
                    </div>
                <?php endforeach;
            } ?>
            <div class="form-group">
                <?= Html::submitButton($model2->isNewRecord ? 'Siguente' : 'Update', ['class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php DynamicFormWidget::end(); ?>


    <?php  ActiveForm::end();

                }

    else{

        $pregunta = PreguntaTexto::find()->where('id_pregunta_texto' == 14)->one();
    ?>

    <div class="respuesta-texto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model3, 'respuesta')->textarea(['rows' => 6]) ?>




    <div class="form-group">
        <?= Html::submitButton($model3->isNewRecord ? 'Create' : 'Update', ['class' => $model3->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); }?>

</div>