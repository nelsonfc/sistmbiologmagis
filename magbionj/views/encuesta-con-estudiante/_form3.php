<?php

use app\models\PreguntaNumerica;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaConEstudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-con-estudiante-form">



    <?php $form = ActiveForm::begin(); ?>
    <?php
    $pregunta= PreguntaNumerica::findAll('id_pregunta_numerica');

    $wizard_config = [
        'id' => 'stepwizard',
        'steps' => [
            1 => [
                'title' => 'Tema 1: Sobre la organizacion del Programa',
                'icon' => 'glyphicon glyphicon-cloud-download',
                'content' =>

                    "<h3>Tema 1: Sobre la organizacion del Programa</h3>"
                ,


                'buttons' => [
                    'next' => [
                        'title' => 'Siguiente tema',
                        'options' => [
                            'class' => 'btn btn-success'
                        ],
                    ],
                ],
            ],

            2 => [
                'title' => 'Step 2',
                'icon' => 'glyphicon glyphicon-cloud-upload',
                'content' => '<h3>Step 2</h3>This is step 2',
                'skippable' => true,
            ],
            3 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
            ],
            4 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
            ],
            5 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
            ],
            6 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
            ],
        ],
        'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
        'start_step' => 1, // Optional, start with a specific step
    ];

    ?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
