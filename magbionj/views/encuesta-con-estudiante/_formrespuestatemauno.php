<?php

use app\models\PreguntaNumerica;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
                $i=1;
                $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
                echo "<br>";
                foreach ($pregunta as $preguntas) {

                   echo $i++.".- " .  $preguntas->pregunta;

                    echo $form->field($model, "[{$i}]valor_respuesta")->radioList($list);
                }
                 ?>
            </div>

        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
