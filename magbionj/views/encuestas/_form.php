<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Encuestas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuestas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_encuesta')->textInput() ?>

    <?= $form->field($model, 'nombre_encuesta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
