<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorExterno */

$this->title = 'Update Revisor Externo: ' . $model->id_revisor;
$this->params['breadcrumbs'][] = ['label' => 'Revisor Externos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_revisor, 'url' => ['view', 'id' => $model->id_revisor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revisor-externo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
