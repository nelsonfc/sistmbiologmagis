<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AvanceTesis */

$this->title = 'Update Avance Tesis: ' . $model->id_avance;
$this->params['breadcrumbs'][] = ['label' => 'Avance Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_avance, 'url' => ['view', 'id' => $model->id_avance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avance-tesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
