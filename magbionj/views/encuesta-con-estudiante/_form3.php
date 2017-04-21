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


    <?php
    if (htmlspecialchars($_GET["idpaso"]) == 1) {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";

        $wizard_config = [

            'id' => 'stepwizard',
            'steps' => [
                1 => [

                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la organizacion del Programa</h3><h4 class='text-center'> Estos componentes se miden segun el grado de satisfaccion, de la siguente manera:</h4>
<h5 class='text-center'>Leyenda de respuestas</h5>
<center>1 = exelente 2 = bueno 3 = regular 4 = deficiente 5 = sin respuesta</center>" . $content
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "",
                    'skippable' => false,
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "",
                    'skippable' => false,
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "",
                    'skippable' => false,
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "",
                    'skippable' => false,
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "",
                    'skippable' => false,

                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "",
                    'skippable' => false,
                ],
            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => htmlspecialchars($_GET["idpaso"]), // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    if (htmlspecialchars($_GET["idpaso"]) == 2) {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";
        $wizard_config = [
            'id' => 'stepwizard',
            'steps' => [
                1 => [
                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la Organizacion del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],

                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "<h3 class='text-center'>Tema II: Sobre la Administracion General del Programa</h3><h4 class='text-center'> Estos componentes se miden segun el grado de satisfaccion, de la siguente manera:</h4>
<h5 class='text-center'>Leyenda de respuestas</h5>
<center>1 = exelente 2 = bueno 3 = regular 4 = deficiente 5 = sin respuesta</center>" . $content,
                    'skippable' => false,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "<h3>Tema III: Sobre el Entorno de estudio</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "<h3>Tema IV: Sobre las Bibliotecas</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "<h3>Tema V: Sobre los espacios físicos</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "<h3>Tema VI: Opinión Global sobre el Programas</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "<h3>Tema VII: Sugerencias y/o Comentarios</h3>This is step 3" . $content,
                ]

            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => 2, // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    if (htmlspecialchars($_GET["idpaso"]) == 3) {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";

        $wizard_config = [

            'id' => 'stepwizard',
            'steps' => [
                1 => [

                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la Organizacion del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],

                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "<h3 class='text-center'>Tema II: Sobre la Administracion General del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "<h3>Tema III: Sobre el Entorno de estudio</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "<h3>Tema IV: Sobre las Bibliotecas</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "<h3>Tema V: Sobre los espacios físicos</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "<h3>Tema VI: Opinión Global sobre el Programas</h3>" . $content,
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'hidden'
                            ],
                        ],

                    ],
                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "<h3>Tema VII: Sugerencias y/o Comentarios</h3>This is step 3" . $content,
                ]

            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => 3, // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    if (htmlspecialchars($_GET["idpaso"]) == 4) {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";

        $wizard_config = [

            'id' => 'stepwizard',
            'steps' => [
                1 => [

                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la Organizacion del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],

                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "<h3 class='text-center'>Tema II: Sobre la Administracion General del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ], 'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "<h3 class='text-center'>Tema III: Sobre el Entorno de estudio</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],

                    ],
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "<h3>Tema IV: Sobre las Bibliotecas</h3>" . $content,
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "",
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "",

                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "",
                ]

            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => 4, // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    if (htmlspecialchars($_GET["idpaso"]) == 5) {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";

        $wizard_config = [

            'id' => 'stepwizard',
            'steps' => [
                1 => [

                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la Organizacion del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],

                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "<h3 class='text-center'>Tema II: Sobre la Administracion General del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "<h3 class='text-center'>Tema III: Sobre el Entorno de estudio</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "<h3 class='text-center'>Tema IV: Sobre las Bibliotecas</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "<h3>Tema V: Sobre los espacios físicos</h3>" . $content,
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "",
                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "",
                ]

            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => 5, // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    if (htmlspecialchars($_GET["idpaso"]) == 6) {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";

        $wizard_config = [

            'id' => 'stepwizard',
            'steps' => [
                1 => [
                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la Organizacion del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],

                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "<h3 class='text-center'>Tema II: Sobre la Administracion General del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "<h3 class='text-center'>Tema III: Sobre el Entorno de estudio</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "<h3 class='text-center'>Tema IV: Sobre las Bibliotecas</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "<h3 class='text-center'>Tema V: Sobre los Espacios Físicos</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>" ,
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "<h3 class='text-center'>Tema V: Sobre los Espacios Físicos</h3>".$content,
                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "",
                ]

            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => 6, // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    if (htmlspecialchars($_GET["idpaso"]) == 7)
    {
        $form = ActiveForm::begin(); ?>
        <?php
        //if(htmlspecialchars($_GET["idpaso"])    ==1 )
        //echo "caca";

        $wizard_config = [

            'id' => 'stepwizard',
            'steps' => [
                1 => [
                    'title' => 'Tema I: Sobre la organizacion del Programa',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'content' => "<h3 class='text-center'>Tema I: Sobre la Organizacion del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],

                    ],
                ],
                2 => [
                    'title' => 'Tema II: Sobre la Administracion General del Programa',
                    'icon' => 'glyphicon glyphicon-plane',
                    'content' => "<h3 class='text-center'>Tema II: Sobre la Administracion General del Programa</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>"
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'

                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                3 => [
                    'title' => 'Tema III: Sobre el Entorno de estudio',
                    'icon' => 'glyphicon glyphicon-education',
                    'content' => "<h3 class='text-center'>Tema III: Sobre el Entorno de estudio</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                4 => [
                    'title' => 'Tema IV: Sobre las Bibliotecas',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => "<h3 class='text-center'>Tema IV: Sobre las Bibliotecas</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                    'buttons' => [
                        'next' => [
                            'title' => 'Siguiente',
                            'options' => [
                                'class' => 'btn btn-success'
                            ],
                        ],
                        'prev' => [
                            'title' => 'Atras',
                            'options' => [
                                'class' => 'btn btn-success'
                            ]
                        ],

                    ],
                ],
                5 => [
                    'title' => 'Tema V: Sobre los espacios físicos',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                    'content' => "<h3 class='text-center'>Tema V: Sobre los Espacios Físicos</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>" ,
                ],
                6 => [
                    'title' => 'Tema VI: Opinión Global sobre el Programa',
                    'icon' => 'glyphicon glyphicon-globe',
                    'content' => "<h3 class='text-center'>Tema V: Sobre los Espacios Físicos</h3><h4 class='text-center'> Usted ya ha respondido estas preguntas y
 sus respuestas ya han sido procesadas
 <br>avance al siguiente paso </h4>",
                ],
                7 => [
                    'title' => 'Tema VII: Sugerencias y/o Comentarios',
                    'icon' => 'glyphicon glyphicon-comment',
                    'content' => "<h3 class='text-center'>Tema VII: Sugerencias y/o Comentarios".$content,
                ]

            ],
            //'complete_content' => "<center><h3>Encuesta finalizada Gracias por participar!!!</h3></center>", // Optional final screen
            'start_step' => 7, // Optional, start with a specific step
        ];

        ?>

        <?= WizardWidget::widget($wizard_config); ?>


        <?php ActiveForm::end();
    }
    ?>

</div>
