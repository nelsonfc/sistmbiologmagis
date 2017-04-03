<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespuestaNumericaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuesta Numericas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respuesta-numerica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Respuesta Numerica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_respuestanumero',
            'valor_respuesta',
            'id_preguntanumerica',
            'id_ece',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
