<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RespuestaNumericaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respuesta-numerica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_respuestanumero') ?>

    <?= $form->field($model, 'valor_respuesta') ?>

    <?= $form->field($model, 'id_preguntanumerica') ?>

    <?= $form->field($model, 'id_ece') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
