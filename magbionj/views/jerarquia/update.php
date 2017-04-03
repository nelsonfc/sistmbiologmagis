<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jerarquia */

$this->title = 'Update Jerarquia: ' . $model->id_jerarquia;
$this->params['breadcrumbs'][] = ['label' => 'Jerarquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jerarquia, 'url' => ['view', 'id' => $model->id_jerarquia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jerarquia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
