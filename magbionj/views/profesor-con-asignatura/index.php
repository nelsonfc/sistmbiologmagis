<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfesorConAsignaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profesor Con Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-con-asignatura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profesor Con Asignatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_profesor_asignatura',
            'cargo',
            'asignatura_inscrita_id_asignatura_inscrita',
            'profesor_id_profesor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>