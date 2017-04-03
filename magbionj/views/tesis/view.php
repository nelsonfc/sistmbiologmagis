<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tesis */

$this->title = $model->id_tesis;
$this->params['breadcrumbs'][] = ['label' => 'Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tesis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tesis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tesis], [
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
            'id_tesis',
            'nombre_tesis',
            'financiamiento',
            'fecha_rendicion',
            'nota_final',
            'estado_tesis_id_estado',
            'estudiante_id_estudiante',
        ],
    ]) ?>

</div>
