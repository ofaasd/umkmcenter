<?php

namespace app\controllers;

use Yii;
use app\modules\user\models\UserPhoto;
use app\modules\user\models\UserPhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\helpers\Helpers;
use yii\helpers\Json;
use yii\helpers\Url;


/**
 * UserphotoController implements the CRUD actions for UserPhoto model.
 */
class UserphotoController extends Controller
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
     * Lists all UserPhoto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserPhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserPhoto model.
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
     * Creates a new UserPhoto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserPhoto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserPhoto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserPhoto model.
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
    public function actionUpload(){
        $id =Yii::$app->user->id;
        if(Yii::$app->request->post()){
            $nama = md5(date('Y-m-d H:i:s'));
            $gambar = explode(".",$_FILES['image']['name']);
            $extension = $gambar[1];
            if(empty(Helpers::getuserPhoto($id))){
                $model = new UserPhoto();
                $model->user_id = $id;
                $model->file = $nama . "." . $extension;
                if($model->save(false)){
                    $simpan = move_uploaded_file($_FILES['image']['tmp_name'], Yii::getAlias('@webroot') . "/asset/upload/profile/" . $nama . "." . $extension);
                    if($simpan){
                        return '{}';
                    }else{
                        return '{["error"=>"gagal upload"]}';
                    }
                }
            }else{
                $model = UserPhoto::findOne($id);
                $model->file = $nama . "." . $extension;
                if($model->save(false)){
                    $simpan = move_uploaded_file($_FILES['image']['tmp_name'], Yii::getAlias('@webroot') . "/asset/upload/profile/" . $nama . "." . $extension);
                    if($simpan){
                        return '{}';
                    }else{
                        return '{["error"=>"gagal upload"]}';
                    }
                }
                return '{["error"=>"foto sudah ada"]}';
            }
        }
    }
    public function actionRefresh(){
        $gambar = Helpers::getuserPhoto(Yii::$app->user->id);
        return "<img src='" . Url::base() . "/asset/upload/profile/" . $gambar['file'] . "' width='100'>";
    }
    /**
     * Finds the UserPhoto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserPhoto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserPhoto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
