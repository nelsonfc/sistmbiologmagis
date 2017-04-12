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

                <?php $pregunta = PreguntaNumerica::find()->where(['id_pregunta_numerica' => 1])->one();

                echo "<br>"."1.- ".$pregunta->pregunta; ?>
            </div>
            <div class="col-md-6">
                <?php $list = [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
                echo $form->field($model, 'valor_respuesta')->radioList($list);
                ?>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
