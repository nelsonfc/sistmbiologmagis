<?php

use app\models\PreguntaNumerica;
use drsdre\wizardwidget\WizardWidget;
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
                'title' => 'Tema I: Sobre la organizacion del Programa',
                'icon' => 'glyphicon glyphicon-list-alt',
                'content' => "<h3>Tema I: Sobre la organizacion del Programa</h3>".$content
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
                'title' => 'Tema II: Sobre la Administracion General del Programa',
                'icon' => 'glyphicon glyphicon-plane',
                'content' => $content2,
                'skippable' => true,
            ],
            3 => [
                'title' => 'Tema III: Sobre el Entorno de estudio',
                'icon' => 'glyphicon glyphicon-education',
                'content' => '<h3>Tema 3: Sobre el Entorno de estudio</h3>This is step 3',
            ],
            4 => [
                'title' => 'Tema IV: Sobre las Bibliotecas',
                'icon' => 'glyphicon glyphicon-book',
                'content' => '<h3>Tema IV: Sobre las Bibliotecas</h3>This is step 3',
            ],
            5 => [
                'title' => 'Tema V: Sobre los espacios físicos',
                'icon' => 'glyphicon glyphicon-tree-deciduous',
                'content' => '<h3>Tema V: Sobre los espacios físicos</h3>This is step 3',
            ],
            6 => [
                'title' => 'Tema VI: Opinión Global sobre el Programa',
                'icon' => 'glyphicon glyphicon-globe',
                'content' => '<h3>Tema VI: Opinión Global sobre el Programa</h3>This is step 3',
            ],
            7 => [
                'title' => 'Tema VII: Sugerencias y/o Comentarios',
                'icon' => 'glyphicon glyphicon-comment',
                'content' => '<h3>Tema VII: Sugerencias y/o Comentarios</h3>This is step 3',
            ],
        ],
        //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
        'start_step' => 1, // Optional, start with a specific step
    ];

    ?>

    <?= WizardWidget::widget($wizard_config); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
