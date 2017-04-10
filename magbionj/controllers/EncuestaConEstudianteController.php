<?php

namespace app\controllers;

use app\models\PreguntaNumerica;
use Codeception\Module\Yii2;
use Yii;
use app\models\EncuestaConEstudiante;
use app\models\EncuestaConEstudianteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EncuestaConEstudianteController implements the CRUD actions for EncuestaConEstudiante model.
 */
class EncuestaConEstudianteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EncuestaConEstudiante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncuestaConEstudianteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EncuestaConEstudiante model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EncuestaConEstudiante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EncuestaConEstudiante();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ece]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate2()
    {
        $model = new EncuestaConEstudiante();


        if ($model->load(Yii::$app->request->post())) {

            $model->fecha_completado = date('Y-m-d');
            $model->anio = date('Y');
            if (date('m') > 6) {
                $model->semestre = 2;
            } else {
                $model->semestre = 1;
            }
            $model->id_estudiante = 1;
            $model->estado = 1;


            if ($model->save()) {
                return $this->redirect(['completarencuesta','id' => $model->id_encuesta]);
            }
        } else {
            return $this->render('create2', [
                'model' => $model,
            ]);
        }
    }

    public function actionCompletarencuesta($id)
    {
        $model = new PreguntaNumerica();
        $model->encuestas_id_encuesta;

        if ($model->load(Yii::$app->request->post())) {

            $model->fecha_completado = date('Y-m-d');
            $model->anio = date('Y');
            if (date('m') > 6) {
                $model->semestre = 2;
            } else {
                $model->semestre = 1;
            }
            $model->id_estudiante = 1;
            $model->estado = 1;


            if ($model->save()) {
                return $this->redirect(['completarencuesta','id' => $model->id_encuesta]);
            }
        } else {
            return $this->render('completarencuesta', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing EncuestaConEstudiante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ece]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EncuestaConEstudiante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EncuestaConEstudiante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EncuestaConEstudiante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EncuestaConEstudiante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
