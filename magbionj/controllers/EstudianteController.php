<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Estudiante;
use app\models\EstudianteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstudianteController implements the CRUD actions for Estudiante model.
 */
class EstudianteController extends Controller
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
     * Lists all Estudiante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstudianteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudiante model.
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
     * Creates a new Estudiante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estudiante();
        $model->anio_ingreso = date("Y");
        $model->situacion_academica_id_situacion = 1;
        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $user = new User();
            if($model->rut != null){
                $rut = explode(".", $model->rut);
                $user->username = $rut[0] . $rut[1] . $rut[2];
                $model->rut = $rut[0] . $rut[1] . $rut[2];
            }else{
                $user->username = $model->id_extranjero;
            }
            $user->nombre = $model->nombres.' '.$model->apellido_paterno.' '.$model->apellido_materno;
            $user->setPassword('123456');
            $user->email = $model->correo;
            $user->rol = 2;
            $user->estado_clave =1;
            $user->estado = 0;
            $user->nombre_rol = "Estudiante";
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
     * Updates an existing Estudiante model.
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
            if($model->rut != null){
                $rut = explode(".", $model->rut);
                $user->username = $rut[0] . $rut[1] . $rut[2];
                $model->rut = $rut[0] . $rut[1] . $rut[2];
            }else{
                $user->username = $model->id_extranjero;
            }
            $user->nombre = $model->nombres.' '.$model->apellido_paterno.' '.$model->apellido_materno;
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
     * Deletes an existing Estudiante model.
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
     * Finds the Estudiante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estudiante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estudiante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
