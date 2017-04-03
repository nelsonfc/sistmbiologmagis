<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RevisorProfesorTesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Revisor Profesor Teses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-profesor-tesis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Revisor Profesor Tesis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_revision',
            'nota_oral',
            'nota_escrita',
            'nota_final',
            'profesor_id_profesor',
            // 'tesis_id_tesis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
