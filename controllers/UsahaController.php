<?php

namespace app\controllers;

use Yii;
use app\models\Usaha;
use app\models\UsahaSearch;
use app\models\Pemilik;
use app\models\Bidang;
use app\models\Izin;
use app\models\Kategori;
use app\models\Mentor;

use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsahaController implements the CRUD actions for Usaha model.
 */
class UsahaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Usaha models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsahaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usaha model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usaha model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usaha();
        $izin = new Izin();
        $pemilik = new Pemilik();

        if(Yii::$app->request->post()){
           
            
            //return var_dump($izin);
            
            if($izin->load(Yii::$app->request->post()) && $pemilik->load(Yii::$app->request->post()) && Model::validateMultiple([$izin, $pemilik])){
                
                
                $pemilik->save(false);
                $izin->save(false);
                $model->load(Yii::$app->request->post());
                $model->pemilik_id = $pemilik->id;
                $model->izin_id = $izin->id;
                if($model->save(false)){
                    return $this->redirect(['index']);
                }else{
                    return "error input usaha";
                }
            }else{
                
                return "error input izin";
            }
        }

        return $this->render('create', [
            'model' => $model,
            'izin' => $izin,
            'pemilik' => $pemilik,
        ]);
    }

    /**
     * Updates an existing Usaha model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $izin = Izin::findOne($model->izin_id);
        $pemilik = Pemilik::findOne($model->pemilik_id);
        if ($model->load(Yii::$app->request->post()) && $izin->load(Yii::$app->request->post()) && $pemilik->load(Yii::$app->request->post()) && Model::validateMultiple([$izin, $pemilik,$model])) {
            $pemilik->save();
            $izin->save();
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'izin' => $izin,
            'pemilik' => $pemilik,
        ]);
    }

    /**
     * Deletes an existing Usaha model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usaha model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usaha the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usaha::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
