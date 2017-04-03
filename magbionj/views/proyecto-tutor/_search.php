<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-tutor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_proyectotutor') ?>

    <?= $form->field($model, 'proyecto_tesis_id_proyecto') ?>

    <?= $form->field($model, 'tipo_tutor_proyecto_id_tipo') ?>

    <?= $form->field($model, 'profesor_id_profesor') ?>

    <?= $form->field($model, 'fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
