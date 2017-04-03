<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvanceProyectoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avance-proyecto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_avance') ?>

    <?= $form->field($model, 'porcentaje') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'proyecto_tesis_id_proyecto') ?>

    <?= $form->field($model, 'tesis_id_tesis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
