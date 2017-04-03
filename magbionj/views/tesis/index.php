<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tesis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tesis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tesis',
            'nombre_tesis',
            'financiamiento',
            'fecha_rendicion',
            'nota_final',
            // 'estado_tesis_id_estado',
            // 'estudiante_id_estudiante',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
