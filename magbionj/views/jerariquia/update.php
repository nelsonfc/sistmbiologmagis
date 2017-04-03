<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jerariquia */

$this->title = 'Update Jerariquia: ' . $model->id_jerarquia;
$this->params['breadcrumbs'][] = ['label' => 'Jerariquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jerarquia, 'url' => ['view', 'id' => $model->id_jerarquia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jerariquia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
