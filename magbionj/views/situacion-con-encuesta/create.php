<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SituacionConEncuesta */

$this->title = 'Create Situacion Con Encuesta';
$this->params['breadcrumbs'][] = ['label' => 'Situacion Con Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacion-con-encuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
