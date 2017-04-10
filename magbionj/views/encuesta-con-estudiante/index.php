<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EncuestaConEstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encuesta Con Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuesta-con-estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Encuesta Con Estudiante', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Completar encuesta', ['create2'], ['class' => 'btn btn-success']) ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ece',
            'fecha_completado',
            'estado',
            'anio',
            'semestre',
            // 'id_encuesta',
            // 'id_estudiante',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
