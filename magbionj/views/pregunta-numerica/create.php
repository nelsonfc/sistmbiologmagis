<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PreguntaNumerica */

$this->title = 'Create Pregunta Numerica';
$this->params['breadcrumbs'][] = ['label' => 'Pregunta Numericas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-numerica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
