<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PreguntaTexto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pregunta-texto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pregunta_texto')->textInput() ?>

    <?= $form->field($model, 'pregunta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'respuesta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'encuestas_id_encuesta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
