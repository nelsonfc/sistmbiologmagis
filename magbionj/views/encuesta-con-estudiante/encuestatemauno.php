<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RespuestaNumerica */

$this->title = 'Create Respuesta Numerica';

?>
<div class="respuesta-numerica-create">



    <?=

    $this->render('_formrespuestatemauno', [
        'model' => $model,
        'model2' => $model2,
    'model3'=> $model3,
        'idece' => $idece,
        'idpaso' => $idpaso
    ]) ?>

</div>
