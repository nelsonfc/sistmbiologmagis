<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTutor */

$this->title = $model->id_proyectotutor;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-tutor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_proyectotutor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_proyectotutor], [
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
            'id_proyectotutor',
            'proyecto_tesis_id_proyecto',
            'tipo_tutor_proyecto_id_tipo',
            'profesor_id_profesor',
            'fecha',
        ],
    ]) ?>

</div>
