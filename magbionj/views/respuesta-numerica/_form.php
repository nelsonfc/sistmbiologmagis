<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RespuestaNumerica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respuesta-numerica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valor_respuesta')->textInput() ?>

    <?= $form->field($model, 'id_preguntanumerica')->textInput() ?>

    <?= $form->field($model, 'id_ece')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
