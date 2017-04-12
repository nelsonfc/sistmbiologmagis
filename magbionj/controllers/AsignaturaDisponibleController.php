<?php

namespace app\controllers;

use Yii;
use app\models\AsignaturaDisponible;
use app\models\AsignaturaDisponibleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsignaturaDisponibleController implements the CRUD actions for AsignaturaDisponible model.
 */
class AsignaturaDisponibleController extends Controller
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
     * Lists all AsignaturaDisponible models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AsignaturaDisponibleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AsignaturaDisponible model.
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
     * Creates a new AsignaturaDisponible model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AsignaturaDisponible();

        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->save()) {
                $docentes = $model->profesor;
                $model2 = new \app\models\ProfesorConAsignatura();
                foreach ($docentes as $docente) {
                    $model2 = new \app\models\ProfesorConAsignatura();
                    $model2->profesor_id_profesor = $docente;
                    $model2->asignatura_disponible_id_asignatura_disponible = $model->id_asignatura_disponible;
                    $model2->cargo = 1;
                    $model2->save();
                }
                return ['success' => $model->save()];
            }else{
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AsignaturaDisponible model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $i = 0;
        $docentes = \app\models\ProfesorConAsignatura::find()->where(['asignatura_disponible_id_asignatura_disponible' => $id])->asArray()->all();
        foreach ($docentes as $docente) {
            $model->profesor[$i] = $docente['profesor_id_profesor'];
            $i++;
        }
        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->save()) {
                \app\models\ProfesorConAsignatura::deleteAll(['asignatura_disponible_id_asignatura_disponible' => $id]);
                $docentes = $model->profesor;
                $model2 = new \app\models\ProfesorConAsignatura();
                foreach ($docentes as $docente) {
                    $model2 = new \app\models\ProfesorConAsignatura();
                    $model2->profesor_id_profesor = $docente;
                    $model2->asignatura_disponible_id_asignatura_disponible = $model->id_asignatura_disponible;
                    $model2->cargo = 1;
                    $model2->save();
                }
                return ['success' => $model->save()];
            }else{
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AsignaturaDisponible model.
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
     * Finds the AsignaturaDisponible model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AsignaturaDisponible the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AsignaturaDisponible::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
