<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EncuestaConEstudiante */

$this->title = 'Create Encuesta Con Estudiante';

?>
<div class="encuesta-con-estudiante-create">



    <?= $this->render('_form3', [
        'content' => $content,
        'content2' => $content2,
        'model' => $model,
        'content' => $content
    ]) ?>

</div>