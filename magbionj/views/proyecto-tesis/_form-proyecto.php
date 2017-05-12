<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use drsdre\wizardwidget\WizardWidget;
/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-tesis-form">

    <?php $form = ActiveForm::begin();

    $wizard_config = [
        'id' => 'stepwizard',
        'steps' => [
            1 => [
                'title' => 'Paso I: Información General de Proyecto',
                'icon' => 'glyphicon glyphicon-cloud-download',

                'title' => 'Paso I: Información General de Proyecto',
                'icon' => 'glyphicon glyphicon-list-alt',
                'content' => "<h3 class='text-center'>Paso I: Información General de Proyecto</h3>".$content,

                'buttons' => [
                    'next' => [
                        'title' => 'Continuar',
                        'options' => [
                            'class' => 'btn btn-success',
                            'id' => 'continuar'
                        ],
                    ],
                ],
            ],
            2 => [
                'title' => 'Tema II: Sobre la Administracion General del Programa',
                'icon' => 'glyphicon glyphicon-plane',
                'content' =>"<h3>Tema II: Sobre la Administracion General del Programa</h3>",
                'skippable' => true,
            ],
            3 => [
                'title' => 'Tema III: Sobre el Entorno de estudio',
                'icon' => 'glyphicon glyphicon-education',
                'content' => "<h3>Tema III: Sobre el Entorno de estudio</h3>",
            ],
            4 => [
                'title' => 'Tema IV: Sobre las Bibliotecas',
                'icon' => 'glyphicon glyphicon-book',
                'content' => "<h3>TTema IV: Sobre las Bibliotecas</h3>",
            ],
            5 => [
                'title' => 'Tema V: Sobre los espacios físicos',
                'icon' => 'glyphicon glyphicon-tree-deciduous',
                'content' =>"<h3>Tema V: Sobre los espacios físicos</h3>",
            ],
            6 => [
                'title' => 'Tema VI: Opinión Global sobre el Programa',
                'icon' => 'glyphicon glyphicon-globe',
                'content' =>"<h3>Tema VI: Opinión Global sobre el Programas</h3>",
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
    <?php ActiveForm::end(); ?>

</div>
