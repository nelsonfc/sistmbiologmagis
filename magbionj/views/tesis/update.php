<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tesis */

$this->title = 'Update Tesis: ' . $model->id_tesis;
$this->params['breadcrumbs'][] = ['label' => 'Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tesis, 'url' => ['view', 'id' => $model->id_tesis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
