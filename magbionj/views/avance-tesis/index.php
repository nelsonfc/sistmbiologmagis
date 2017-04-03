<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvanceTesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avance Teses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avance-tesis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Avance Tesis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_avance',
            'porcentaje',
            'fecha',
            'tesis_id_tesis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
