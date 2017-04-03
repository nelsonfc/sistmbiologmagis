<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorProfesorProyecto */

$this->title = $model->id_revision;
$this->params['breadcrumbs'][] = ['label' => 'Revisor Profesor Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-profesor-proyecto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_revision], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_revision], [
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
            'id_revision',
            'nota_oral',
            'nota_escrita',
            'nota_final',
            'proyecto_tesis_id_proyecto',
            'profesor_id_profesor',
        ],
    ]) ?>

</div>
