<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TesisTutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tesis Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tesis-tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tesis Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tesistutor',
            'tipo_tutor_proyecto_id_tipo',
            'tesis_id_tesis',
            'profesor_id_profesor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
