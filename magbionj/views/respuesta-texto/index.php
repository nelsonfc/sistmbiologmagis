<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespuestaTextoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuesta Textos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respuesta-texto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Respuesta Texto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'respuesta:ntext',
            'id_pregunta_texto',
            'id_encuesta_con_estudiante',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
