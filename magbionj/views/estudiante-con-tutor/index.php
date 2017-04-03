<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudianteConTutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiante Con Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-con-tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estudiante Con Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_estudiante_tutor',
            'fecha',
            'estudiante_id_estudiante',
            'profesor_id_profesor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
