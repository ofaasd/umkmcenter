<?php

namespace app\controllers;

use Yii;
use app\models\Program;
use app\models\Programusaha;
use app\models\ProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Url;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class ProgramController extends Controller
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
     * Lists all Program models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Program model.
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
     * Creates a new Program model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $query = new Query;
        $query->select("*,(select count(*) from programusaha where usaha_id = usaha.id and programusaha.program_id = 0) as jumlah")
              ->from("usaha");
        $usaha = $query->all();
        $model = new Program();

        if ($model->load(Yii::$app->request->post())) {
             $wilayah = (new \yii\db\Query())
                    ->select("wilayah_id")
                    ->from('user')
                    ->where("id = " . Yii::$app->user->id)->scalar();
            $model->wilayah_id = $wilayah;
            $model->save();
            $peserta = array();
            $peserta = Yii::$app->request->post("peserta");
            if(empty($peserta)){
                return $this->redirect(['index']);   
            }else{
                $hasil = 0;
                foreach($peserta as $value){
                    $programusaha = new Programusaha();
                    $programusaha->program_id = $model->id;
                    $programusaha->usaha_id = $value;
                    if($programusaha->save()){
                        $hasil ++;
                    }
                }
                if($hasil>0)
                    return $this->redirect(['index']);   
            }
        }

        return $this->render('create', [
            'model' => $model,
            'usaha' => $usaha,
        ]);
    }

    /**
     * Updates an existing Program model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Program model.
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
     * Finds the Program model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Program the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Program::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionAdd($id){
        $model = $this->findModel($id);
        $query = new Query;
        $usaha = $query->select("*,(select count(*) from programusaha where program_id=". $id." and usaha_id = usaha.id) as jumlah")->from("usaha,programusaha")->where("program_id = " . $id . " and programusaha.usaha_id=usaha.id")->all();

        $query2 = new Query;
        $query2->select("*,(select count(*) from programusaha where usaha_id = usaha.id and programusaha.program_id = '$id') as jumlah")
              ->from("usaha");
        $usaha_modal = $query2->all();
        return $this->render('add',[
            'model' => $model,
            'usaha' => $usaha,
            'usaha_modal' => $usaha_modal,
            'id' => $id,
        ]);
    }
    public function actionViewusaha($id){
        $model = $this->findModel($id);
        $query = new Query; 
        $usaha = $query->select("*")
                        ->from("programusaha")
                        ->innerJoin("usaha","usaha.id=usaha_id")
                        ->innerJoin("pemilik","pemilik.id=pemilik_id")
                        ->where("program_id = " . $id)->all();
        $judul = $model->nama;
        return $this->render('viewusaha',array(
            'model'=>$model,
            'usaha'=>$usaha,
            'judul'=>$judul,
        ));
    }
    public function actionAdddb(){
        if(Yii::$app->request->isAjax){
            $usaha_id = Yii::$app->request->post("usaha_id");
            $program_id = Yii::$app->request->post("program_id");
            $hasil = Yii::$app->db->createCommand("insert into programusaha (usaha_id,program_id) values(".$usaha_id.",".$program_id.")");
            if($hasil->execute()){
                return "success";
            }else{
                echo  "error";
                echo $usaha_id . " " . $program_id;
            }
        }else{
            return "error bukan ajax";
        }
    }
    public function actionDeldb(){
        if(Yii::$app->request->isAjax){
            $usaha_id = Yii::$app->request->post("usaha_id");
            $program_id = Yii::$app->request->post("program_id");
            $hasil = Yii::$app->db->createCommand("delete from programusaha where usaha_id=".$usaha_id." and program_id=".$program_id);
            if($hasil->execute()){
                return "success";
            }else{
                echo  "error";
                echo $usaha_id . " " . $program_id;
            }
        }else{
            return "error bukan ajax";
        }
    }
}
