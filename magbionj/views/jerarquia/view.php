<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jerarquia */

$this->title = $model->id_jerarquia;
$this->params['breadcrumbs'][] = ['label' => 'Jerarquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jerarquia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jerarquia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jerarquia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_jerarquia',
            'nombre',
        ],
    ]) ?>

</div>
