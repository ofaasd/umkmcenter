<?php

namespace app\controllers;

use Yii;
use app\models\Omset;
use app\models\OmsetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Usaha;
use app\models\UsahaSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * OmsetController implements the CRUD actions for Omset model.
 */
class OmsetController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function init(){
        if (empty(Yii::$app->user->id)) {
            //throw new ForbiddenHttpException('You are not allowed to perform this action.');
            return $this->redirect(Url::base()."/user/login");
        }
    }
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
     * Lists all Omset models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!empty(Yii::$app->user->id) && Yii::$app->user->can("admin")){
            $model = Usaha::find()->all();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }elseif(!empty(Yii::$app->user->id)){
            $wilayah = (new \yii\db\Query())
                    ->select("wilayah_id")
                    ->from('user')
                    ->where("id = " . Yii::$app->user->id)->scalar();
            $model = Usaha::find()->where("wilayah_id=" . $wilayah)->all();
        }
        return $this->render('index', [
            'model' => $model,
            //'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Omset model.
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
     * Creates a new Omset model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Omset();
        $usaha = (new \yii\db\Query())
                 ->select(['id','nama_usaha'])
                 ->from('usaha')
                 ->all();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();
            return $this->redirect(['index']);
        }
        
        return $this->render('create', [
            'model' => $model,
            'usaha'=> ArrayHelper::map($usaha,'id','nama_usaha'),
        ]);
    }

    public function actionCreateomset($id){
        $model = new Omset();
        $usaha = (new \yii\db\Query())
                 ->select(['id','nama_usaha'])
                 ->from('usaha')
                 ->where("id=" .$id)
                 ->all();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'usaha'=> ArrayHelper::map($usaha,'id','nama_usaha'),
        ]);
    }

    public function actionAddomset(){
        
        $usaha_id = Yii::$app->request->get("usaha_id");
        $id = Yii::$app->request->get("id");
        if($id == 0){
            $model = new Omset;
        }else{
            $model = Omset::find()->where(['id'=>$id])->one();
        }
        
        $bulan = array();
        $bulan[0] = Yii::$app->request->get("bulan");
        $bulan[1] = Yii::$app->request->get("tahun");
        $usaha = (new \yii\db\Query())
                 ->select(['id','nama_usaha'])
                 ->from('usaha')
                 ->where("id=" .$usaha_id)
                 ->all();
         if ($model->load(Yii::$app->request->post()) ) {
            if($id == 0){
                $model->save();
            }else{
                $model->id = $id;
                $model->update();
            }
            
            return $this->redirect(['index', 'succ' => 1]);
        }

        return $this->render('create', [
            'model' => $model,
            'usaha'=> ArrayHelper::map($usaha,'id','nama_usaha'),
            'bulan' => $bulan,
        ]);
    }

    /**
     * Updates an existing Omset model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $usaha = (new \yii\db\Query())
                 ->select(['id','nama_usaha'])
                 ->from('usaha')
                 ->all();
        if ($model->load(Yii::$app->request->post())) {
            $model->bulan = $model->bulan . " " . Yii::$app->request->post("tahun");
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'usaha'=> ArrayHelper::map($usaha,'id','nama_usaha'),
            //'tahun' => $tahun,
        ]);
    }

    /**
     * Deletes an existing Omset model.
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
     * Finds the Omset model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Omset the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Omset::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
