<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PreguntaNumericaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pregunta-numerica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pregunta_numerica') ?>

    <?= $form->field($model, 'pregunta') ?>

    <?= $form->field($model, 'respuesta') ?>

    <?= $form->field($model, 'encuestas_id_encuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
