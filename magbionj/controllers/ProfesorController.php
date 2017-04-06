<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Profesor;
use app\models\ProfesorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfesorController implements the CRUD actions for Profesor model.
 */
class ProfesorController extends Controller
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
     * Lists all Profesor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfesorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profesor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profesor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profesor();

        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $user = new User();
            $rut = explode(".", $model->rut);
            $user->username = $rut[0] . $rut[1] . $rut[2];
            $model->rut = $rut[0] . $rut[1] . $rut[2];
            $user->nombre = $model->nombres.' '.$model->apellidos;
            $user->setPassword('123456');
            $user->email = $model->correo;
            $user->rol = 3;
            $user->estado_clave =1;
            $user->estado = 0;
            $user->nombre_rol = "Profesor";
            $user->generateAuthKey();
            $user->save();
            $model->id_user = $user->id;
            return ['success' => $model->save()];
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profesor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $user = User::findOne($model->id_user);
            $rut = explode(".", $model->rut);
            $user->username = $rut[0] . $rut[1] . $rut[2];
            $model->rut = $rut[0] . $rut[1] . $rut[2];
            $user->nombre = $model->nombres.' '.$model->apellidos;
            $user->email = $model->correo;
            $user->save();
            return ['success' => $model->save()];
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Profesor model.
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
     * Finds the Profesor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profesor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profesor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
