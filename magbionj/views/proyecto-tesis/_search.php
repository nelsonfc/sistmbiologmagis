<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTesisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-tesis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_proyecto') ?>

    <?= $form->field($model, 'nombre_tesis') ?>

    <?= $form->field($model, 'financiamiento') ?>

    <?= $form->field($model, 'fecha_rendicion') ?>

    <?= $form->field($model, 'nota_final') ?>

    <?php // echo $form->field($model, 'estudiante_id_estudiante') ?>

    <?php // echo $form->field($model, 'estado_tesis_id_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
